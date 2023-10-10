<?php

class ClienteModel extends PersonaModel
{
  private $estado;
  private $pujas = [];

  private $tabla = "clientes";
  public function __construct()
  {
    parent::__construct();
    $this->table = "personas";
  }


  //! HAY BORRAR TODO ESTO PARA QUE LAS FUNCIONES NO RETORNEN UN OBJETO CLIENTE
  public function obtenerTodosLosClientes()
  {
    $sql = "SELECT
                P.*,
                U.username_usuario,
                U.email_usuario,
                C.estado_cliente
            FROM
                CLIENTES C
            INNER JOIN
                PERSONAS P ON C.id_persona_cliente = P.id_persona
            LEFT JOIN
                USUARIOS U ON P.id_persona = U.id_persona_usuario";
    $todosLosClientes = $this->db->query($sql)->fetchAll();
    if ($todosLosClientes) {
      $clientes = [];
      foreach ($todosLosClientes as $cli) {
        $clientes[] = self::rellenarCliente($cli);
      }
    }
    return $clientes;
  }
  public function obtenerCliente($id)
  {
    $sql = "SELECT
                P.*,
                U.username_usuario,
                U.email_usuario,
                C.estado_cliente
            FROM
                CLIENTES C
            INNER JOIN
                PERSONAS P ON C.id_persona_cliente = P.id_persona
            LEFT JOIN
                USUARIOS U ON P.id_persona = U.id_persona_usuario
            WHERE
                C.id_persona_cliente = ?";
    $cli = $this->db->query($sql, [$id])->fetch();
    return self::rellenarCliente($cli);
  }

  public function realizarPuja($montoPuja, $idCliente, $idLote, $idRemate)
  {
    try {

      // Inicia una transacción
      $this->db->getConnection()->beginTransaction();

      $sql = "SELECT precio_final_lote FROM LOTES WHERE id_lote = ?;";
      $precioFinal = $this->db->query($sql, [$idLote])->fetch();
      $precioFinal = (intval($precioFinal['precio_final_lote']));
      if ($montoPuja > $precioFinal) {
        // Inserta un registro en la tabla PUJAS para registrar la puja
        $sql = "INSERT INTO PUJAS (monto_puja) VALUES (?);";
        $this->db->query($sql, [$montoPuja]);

        // Recupera el ID de la puja recién creada
        $idPuja = $this->db->getConnection()->lastInsertId();

        // Inserta un registro en la tabla PUJAS_DE_CLIENTES para vincular la puja al cliente
        $sql = "INSERT INTO PUJAS_DE_CLIENTES (id_puja_puja_de_cliente, id_cliente_puja_de_cliente) VALUES (?, ?)";
        $this->db->query($sql, [$idPuja, $idCliente]);

        // Verificar si la puja es mayor que el precio final actual del lote
        $sql = "SELECT precio_final_lote FROM LOTES WHERE id_lote = ?";
        $row = $this->db->query($sql, [$idLote])->fetch();

        if ($montoPuja > $row['precio_final_lote']) {
          // Si la puja es mayor, actualizar el precio final del lote
          $sql = "UPDATE LOTES SET precio_final_lote = ? WHERE id_lote = ?";
          $this->db->query($sql, [$montoPuja, $idLote]);
        }

        // Insertar un registro en la tabla PUJAS_DE_REMATES para vincular la puja al remate y lote específicos
        $sql = "INSERT INTO PUJAS_DE_REMATES (id_puja_puja_de_remate, id_remate_puja_de_remate, id_lote_puja_de_remate) 
        VALUES (?, ?, ?)";
        $this->db->query($sql, [$idPuja, $idRemate, $idLote]);

        // Realiza el commit para guardar los cambios en la base de datos
        $this->db->getConnection()->commit();
      }
    } catch (PDOException $e) {
      // Si ocurre un error, realiza un rollback para deshacer cualquier cambio
      $this->db->getConnection()->rollBack();
      echo "Error: " . $e->getMessage();
    }

    // Cierra la conexión a la base de datos
    $this->db->cerrarConexion();
  }

  //! ESTO ES DEL CONTROLADOR
  private function rellenarCliente($cli)
  {
    if ($cli) {
      $usuario = Container::resolve(Usuario::class);
      $usuario->setUsername($cli['username_usuario']);
      $usuario->setEmail($cli['email_usuario']);
      $cliente = Container::resolve(
        Cliente::class,
        $cli['id_persona'],
        $cli['nombre_persona'],
        $cli['apellido_persona'],
        $cli['ci_persona'],
        $cli['barrio_persona'],
        $cli['calle_persona'],
        $cli['numero_persona'],
        $cli['telefono_persona'],
        $cli['estado_cliente']
      );
      $cliente->setUsuario($usuario);
      $usuario->setPersona($cliente);
      return $cliente;
    } else {
      return $cli;
    }

  }
  #region //* SETTERS Y GETTERS
  public function getEstado()
  {
    return $this->estado;
  }

  public function setEstado($estado)
  {
    $this->estado = $estado;
  }

  public function getPujas()
  {
    return $this->pujas;
  }

  public function setPujas($pujas)
  {
    $this->pujas = $pujas;
  }
  #endregion
}

?>