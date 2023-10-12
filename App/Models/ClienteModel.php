<?php

class ClienteModel extends PersonaModel
{
  private $estado;
  private $pujas = [];
  public function __construct()
  {
    parent::__construct();
  }
  #region //* FUNCIONA 🟢
  public function getClientes()
  {
    $sql = "SELECT u.*, p.* FROM USUARIOS u
                  INNER JOIN USUARIOS_DE_PERSONAS up ON u.username_usuario = up.username_usuario_usuarios_de_personas
                  INNER JOIN PERSONAS p ON up.id_persona_usuarios_de_persona = p.id_persona
                  WHERE p.tipo_persona = 'CLIENTE'";
    return $this->sql($sql, true);
  }
  public function getCliente($id)
  {
    $sql = "SELECT u.*, p.* FROM USUARIOS u
                  INNER JOIN USUARIOS_DE_PERSONAS up ON u.username_usuario = up.username_usuario_usuarios_de_personas
                  INNER JOIN PERSONAS p ON up.id_persona_usuarios_de_persona = p.id_persona
                  WHERE p.tipo_persona = 'CLIENTE' AND p.id_persona = ?";
    return $this->sql($sql, false, $id);
  }
  #endregion

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