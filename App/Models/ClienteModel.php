<?php

class ClienteModel extends Model
{
  public function __construct()
  {
    parent::__construct();
    $this->table = "clientes";
  }


  //! HAY BORRAR TODO ESTO PARA QUE LAS FUNCIONES NO RETORNEN UN OBJETO CLIENTE
  public function obtenerTodosLosClientes(): array //✅
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
  public function obtenerCliente(int $id): Cliente|bool //✅
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
}

?>