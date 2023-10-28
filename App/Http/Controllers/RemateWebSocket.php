<?php
namespace MyApp\Http\Controllers;

use Ratchet\MessageComponentInterface;
use Ratchet\ConnectionInterface;
use PDO;
use PDOException;

class RemateWebSocket implements MessageComponentInterface
{
  protected $clients;
  protected $groups = [];
  private $pdo;

  public function __construct()
  {
    $this->clients = new \SplObjectStorage;
    echo "Servidor iniciado...\n";


    // Establecer la conexión a la base de datos en el constructor
    $this->pdo = new PDO('mysql:host=localhost;dbname=rumate_db', 'root', '');
  }

  public function onOpen(ConnectionInterface $conn)
  {
    $query = $conn->httpRequest->getUri()->getQuery();
    parse_str($query, $queryParams);

    if (isset($queryParams['id_lote'])) {
      $loteId = $queryParams['id_lote'];
      if (!isset($this->groups[$loteId])) {
        $this->groups[$loteId] = new \SplObjectStorage;
      }
      $this->groups[$loteId]->attach($conn);
      echo "New connection! ({$conn->resourceId}) to lote $loteId\n";
    }
  }

  public function onMessage(ConnectionInterface $from, $msg)
  {
    $data = json_decode($msg, true);

    if ($data && isset($data['type']) && $data['type'] === "puja") {
      $montoPuja = (float) $data['monto'];
      $idCliente = (int) $data['id_usuario'];
      $idRemate = (int) $data['id_remate'];
      $idLote = (int) $data['id_lote'];

      try {
        $precioFinal = $this->obtenerPrecioFinalDelLote($idLote);

        if ($montoPuja > $precioFinal) {
          $this->insertarNuevaPuja($montoPuja, $idCliente, $idRemate, $idLote);
          $mejorOferta = $this->obtenerPrecioFinalDelLote($idLote);
          $mejorOferta = number_format($mejorOferta, 2, '.', '');
          echo $mejorOferta;
          $mejorOfertaData = [
            'usuario' => $idCliente,
            'monto' => $mejorOferta
          ];

          $mejorOfertaData = json_encode($mejorOfertaData);
          if (isset($this->groups[$idLote])) {
            foreach ($this->groups[$idLote] as $client) {
              $client->send($mejorOfertaData);
            }
          }
        }
      } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
      }
    }
  }

  public function onClose(ConnectionInterface $conn)
  {
    foreach ($this->groups as $group) {
      if ($group->contains($conn)) {
        $group->detach($conn);
      }
    }
    echo "Connection {$conn->resourceId} has disconnected\n";
  }

  public function onError(ConnectionInterface $conn, \Exception $e)
  {
    echo "An error has occurred: {$e->getMessage()}\n";
    $conn->close();
  }
  private function insertarNuevaPuja($montoPuja, $idCliente, $idRemate, $idLote)
  {
    $idUsuario = $idCliente;
    try {
      // Iniciar una transacción
      $this->pdo->beginTransaction();
      $idCliente = $this->getIdPersona($idCliente);
      // Insertar la nueva puja en la tabla PUJAS
      $stmt = $this->pdo->prepare("INSERT INTO PUJAS (monto_puja) VALUES (:monto_puja)");
      $stmt->bindParam(':monto_puja', $montoPuja, PDO::PARAM_STR);
      $stmt->execute();

      // Obtener el ID de la nueva puja
      $idPuja = $this->pdo->lastInsertId();

      // Insertar la relación entre la nueva puja y el cliente en la tabla PUJAS_DE_PERSONAS
      $stmt = $this->pdo->prepare("INSERT INTO PUJAS_DE_PERSONAS (id_puja_puja_de_persona, id_persona_puja_de_persona) VALUES (:id_puja, :id_cliente)");
      $stmt->bindParam(':id_puja', $idPuja, PDO::PARAM_INT);
      $stmt->bindParam(':id_cliente', $idCliente, PDO::PARAM_INT);
      $stmt->execute();

      // Verificar si la puja es mayor que el precio final actual del lote
      $stmt = $this->pdo->prepare("SELECT mejor_oferta_lote FROM LOTES WHERE id_lote = :id_lote");
      $stmt->bindParam(':id_lote', $idLote, PDO::PARAM_INT);
      $stmt->execute();
      $row = $stmt->fetch(PDO::FETCH_ASSOC);

      if ($montoPuja > $row['mejor_oferta_lote']) {
        // Si la puja es mayor, actualizar el precio final del lote
        $stmt = $this->pdo->prepare("UPDATE LOTES SET mejor_oferta_lote = :mejor_oferta_lote WHERE id_lote = :id_lote");
        $stmt->bindParam(':mejor_oferta_lote', $montoPuja, PDO::PARAM_STR);
        $stmt->bindParam(':id_lote', $idLote, PDO::PARAM_INT);
        $stmt->execute();
      }

      // Insertar un registro en la tabla PUJAS_DE_REMATES para vincular la puja al remate y lote específicos
      $stmt = $this->pdo->prepare("INSERT INTO PUJAS_DE_REMATES (id_puja_puja_de_remate, id_remate_puja_de_remate, id_lote_puja_de_remate) 
            VALUES (:id_puja, :id_remate, :id_lote)");
      $stmt->bindParam(':id_puja', $idPuja, PDO::PARAM_INT);
      $stmt->bindParam(':id_remate', $idRemate, PDO::PARAM_INT);
      $stmt->bindParam(':id_lote', $idLote, PDO::PARAM_INT);
      $stmt->execute();

      // Confirmar la transacción
      $this->pdo->commit();
    } catch (PDOException $e) {
      // En caso de error, realiza un rollback de la transacción
      $this->pdo->rollBack();
      echo "Error: " . $e->getMessage();
    }
  }

  // Función para obtener el precio final de un lote
  private function obtenerPrecioFinalDelLote($idLote)
  {
    try {
      $stmt = $this->pdo->prepare("SELECT mejor_oferta_lote FROM LOTES WHERE id_lote = :id_lote");
      $stmt->bindParam(':id_lote', $idLote, PDO::PARAM_INT);
      $stmt->execute();
      $row = $stmt->fetch(PDO::FETCH_ASSOC);

      return (float) $row['mejor_oferta_lote'];
    } catch (PDOException $e) {
      // Manejar el error, por ejemplo, lanzar una excepción o devolver un valor predeterminado
      return 0.0;
    }
  }
  // Función para enviar un mensaje a todos los clientes conectados
  private function enviarMensajeATodos($mensaje)
  {
    foreach ($this->clients as $client) {
      $client->send($mensaje);
    }
  }

  private function getIdPersona($idUsuario)
  {
    try {
      // Establece la conexión a la base de datos
      $pdo = new PDO('mysql:host=localhost;dbname=rumate_db', 'root', '');

      // Prepara la consulta para obtener el id_persona en base al id_usuario
      $stmt = $pdo->prepare("SELECT id_persona_usuarios_de_persona FROM USUARIOS_DE_PERSONAS WHERE id_usuario_usuarios_de_personas = :id_usuario");
      $stmt->bindParam(':id_usuario', $idUsuario, PDO::PARAM_INT);
      $stmt->execute();

      // Obtén el id_persona
      $row = $stmt->fetch(PDO::FETCH_ASSOC);
      $idPersona = $row['id_persona_usuarios_de_persona'];

      return $idPersona;
      // Ahora $idPersona contiene el id_persona relacionado con el $idUsuario
    } catch (PDOException $e) {
      // Maneja cualquier error de conexión o consulta
      echo "Error: " . $e->getMessage();
    }
  }
}
