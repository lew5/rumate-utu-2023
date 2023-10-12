<?php
namespace MyApp\Http\Controllers;

use Ratchet\MessageComponentInterface;
use Ratchet\ConnectionInterface;
use PDO;
use PDOException;

class RemateWebSocket implements MessageComponentInterface
{

  protected $clients;
  public function __construct()
  {
    $this->clients = new \SplObjectStorage;
    echo "Servidor iniciado...\n";
  }
  public function onOpen(ConnectionInterface $conn)
  {
    $this->clients->attach($conn);
    echo "New connection! ({$conn->resourceId})\n";

    try {
      //!HACER ESTO EN EL VIEW
      $pdo = new PDO('mysql:host=localhost;dbname=rumate_db', 'root', '');
      $id3_lote = 3;
      $pdo->beginTransaction();


      $stmt = $pdo->prepare("SELECT precio_final_lote FROM LOTES WHERE id_lote = :id_lote");
      $stmt->bindParam(':id_lote', $id3_lote, PDO::PARAM_INT);
      $stmt->execute();


      $precioFinal = $stmt->fetch(PDO::FETCH_ASSOC);
      $precioFinal = intval($precioFinal['precio_final_lote']);
      $pdo->commit();
      foreach ($this->clients as $client) {
        // if ($from !== $client) {
        // The sender is not the receiver, send to each client connected
        $client->send($precioFinal);
        // }
      }
    } catch (PDOException $e) {
      // Si ocurre un error, realiza un rollback para deshacer cualquier cambio
      $pdo->rollBack();
      echo "Error: " . $e->getMessage();
    } finally {
      $pdo = null;
    }

  }

  public function onMessage(ConnectionInterface $from, $msg)
  {

    try {
      // Establece la conexión a la base de datos
      $pdo = new PDO('mysql:host=localhost;dbname=rumate_db', 'root', '');

      // Inicia una transacción
      $pdo->beginTransaction();

      // Reemplaza los valores entre comillas simples con los datos reales de la puja, cliente, remate y lote
      $monto_puja = intval($msg); // Reemplaza con el monto de la puja
      $id_cliente = 2; // Reemplaza con el ID del cliente
      $id_remate = 3; // Reemplaza con el ID del remate
      $id_lote = 3; // Reemplaza con el ID del lote

      $stmt = $pdo->prepare("SELECT precio_final_lote FROM LOTES WHERE id_lote = :id_lote");
      $stmt->bindParam(':id_lote', $id_lote, PDO::PARAM_INT);
      $stmt->execute();
      $precioFinal = $stmt->fetch(PDO::FETCH_ASSOC);
      $precioFinal = intval($precioFinal['precio_final_lote']);
      echo $precioFinal;

      if ($monto_puja > $precioFinal) {


        // Inserta un registro en la tabla PUJAS para registrar la puja
        $stmt = $pdo->prepare("INSERT INTO PUJAS (monto_puja) VALUES (:monto_puja)");
        $stmt->bindParam(':monto_puja', $monto_puja, PDO::PARAM_STR);
        $stmt->execute();

        // Recupera el ID de la puja recién creada
        $id_puja = $pdo->lastInsertId();

        // Inserta un registro en la tabla PUJAS_DE_CLIENTES para vincular la puja al cliente
        $stmt = $pdo->prepare("INSERT INTO PUJAS_DE_CLIENTES (id_puja_puja_de_cliente, id_cliente_puja_de_cliente) VALUES (:id_puja, :id_cliente)");
        $stmt->bindParam(':id_puja', $id_puja, PDO::PARAM_INT);
        $stmt->bindParam(':id_cliente', $id_cliente, PDO::PARAM_INT);
        $stmt->execute();

        // Verificar si la puja es mayor que el precio final actual del lote
        $stmt = $pdo->prepare("SELECT precio_final_lote FROM LOTES WHERE id_lote = :id_lote");
        $stmt->bindParam(':id_lote', $id_lote, PDO::PARAM_INT);
        $stmt->execute();
        $row = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($monto_puja > $row['precio_final_lote']) {
          // Si la puja es mayor, actualizar el precio final del lote
          $stmt = $pdo->prepare("UPDATE LOTES SET precio_final_lote = :precio_final_lote WHERE id_lote = :id_lote");
          $stmt->bindParam(':precio_final_lote', $monto_puja, PDO::PARAM_STR);
          $stmt->bindParam(':id_lote', $id_lote, PDO::PARAM_INT);
          $stmt->execute();
        }

        // Insertar un registro en la tabla PUJAS_DE_REMATES para vincular la puja al remate y lote específicos
        $stmt = $pdo->prepare("INSERT INTO PUJAS_DE_REMATES (id_puja_puja_de_remate, id_remate_puja_de_remate, id_lote_puja_de_remate) 
        VALUES (:id_puja, :id_remate, :id_lote)");
        $stmt->bindParam(':id_puja', $id_puja, PDO::PARAM_INT);
        $stmt->bindParam(':id_remate', $id_remate, PDO::PARAM_INT);
        $stmt->bindParam(':id_lote', $id_lote, PDO::PARAM_INT);
        $stmt->execute();

        // Realiza el commit para guardar los cambios en la base de datos
        $pdo->commit();
        echo ("ok!");
        foreach ($this->clients as $client) {
          // if ($from !== $client) {
          // The sender is not the receiver, send to each client connected
          $client->send($monto_puja);
          // }
        }
      }
    } catch (PDOException $e) {
      // Si ocurre un error, realiza un rollback para deshacer cualquier cambio
      $pdo->rollBack();
      echo "Error: " . $e->getMessage();
    }

    // Cierra la conexión a la base de datos
    $pdo = null;

  }

  public function onClose(ConnectionInterface $conn)
  {
    // The connection is closed, remove it, as we can no longer send it messages
    $this->clients->detach($conn);

    echo "Connection {$conn->resourceId} has disconnected\n";
  }

  public function onError(ConnectionInterface $conn, \Exception $e)
  {
    echo "An error has occurred: {$e->getMessage()}\n";

    $conn->close();
  }
}