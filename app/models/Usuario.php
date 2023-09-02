<?php
/**
 * La clase Usuario se encarga de gestionar la información de usuarios en la base de datos.
 */
class Usuario extends Database
{
  /**
   * @var string $username Nombre de usuario único.
   */
  private $username;

  /**
   * @var string $password Contraseña del usuario (almacenada de forma segura).
   */
  private $password;

  /**
   * @var string $email Dirección de correo electrónico del usuario.
   */
  private $email;

  /**
   * @var int $idPersonaUsuario Identificador único de la persona asociada al usuario.
   */
  private $idPersonaUsuario;

  /**
   * @var string $estadoClienteProveedor Estado del cliente o proveedor asociado al usuario.
   */
  private $estadoClienteProveedor;

  /**
   * Inserta un nuevo registro de usuario en la base de datos.
   */
  public function insert()
  {
    $this->query("INSERT INTO usuarios (
        username, 
        password, 
        email, 
        idPersona_usuario) 
      VALUES (
        :username, 
        :password, 
        :email, 
        :idPersonaUsuario)",
      [
        'username' => $this->username,
        'password' => password_hash($this->password, PASSWORD_BCRYPT),
        'email' => $this->email,
        'idPersonaUsuario' => $this->idPersonaUsuario
      ]
    );
  }

  /**
   * Elimina un registro de usuario de la base de datos.
   *
   * @param string $username Nombre de usuario único a eliminar.
   */
  public function delete($username)
  {
    $this->query("DELETE FROM usuarios WHERE username = :username", [
      'username' => $username
    ]);
  }

  /**
   * Actualiza la información de un usuario en la base de datos.
   *
   * @param string $username Nombre de usuario único a actualizar.
   * @param array $usuarioActualizado Array con los nuevos datos del usuario.
   */
  public function update($username, $usuarioActualizado)
  {
    $this->query("UPDATE usuarios SET 
    username = :newUsername,
    password = :password, 
    email = :email, 
    idPersona_usuario = :idPersonaUsuario 
    WHERE username = :username", [
      'newUsername' => $usuarioActualizado['username'],
      'password' => password_hash($usuarioActualizado['password'], PASSWORD_BCRYPT),
      'email' => $usuarioActualizado['email'],
      'idPersonaUsuario' => $usuarioActualizado['idPersona_usuario'],
      'username' => $username
    ]);
  }

  /**
   * Obtiene un registro de usuario por su nombre de usuario único.
   *
   * @param string $username Nombre de usuario único.
   * @return array|null El registro de usuario encontrado o null si no se encuentra.
   */
  public function getById($username)
  {
    return $this->query("SELECT * FROM usuarios WHERE username = :username", [
      'username' => $username
    ])->find();
  }

  /**
   * Obtiene todos los registros de usuarios de la base de datos.
   *
   * @return array Conjunto de registros de usuarios.
   */
  public function getAll()
  {
    return $this->query("SELECT * FROM usuarios")->get();
  }

  /**
   * Llena los datos de un usuario y su estado de cliente o proveedor.
   *
   * @param string $username Nombre de usuario único.
   */
  public function fill($username)
  {
    $data = $this->query("SELECT 
                          u.username, 
                          cp.estadoClienteProveedor 
                          AS estado
                          FROM usuarios u
                          INNER JOIN clientes_proveedores cp 
                          ON u.idPersona_usuario = cp.idPersona_clienteProveedor
                          WHERE u.username = :user", ['user' => $username])->find();
    $this->username = $data['username'];
    $this->estadoClienteProveedor = $data['estado'];
  }

  /**
   * Busca un usuario por nombre de usuario y contraseña.
   *
   * @param string $username Nombre de usuario único.
   * @param string $password Contraseña del usuario.
   * @return array|null El registro de usuario encontrado o null si no se encuentra.
   */
  public function findUser($username, $password)
  {
    $hashPassword = $this->query("SELECT password FROM usuarios WHERE username = :username", [
      'username' => $username,
    ])->find();

    if (password_verify($password, $hashPassword['password'])) {
      $query = $this->query("SELECT * FROM usuarios WHERE username = :username AND password = :password", [
        'username' => $username,
        'password' => $hashPassword['password']
      ])->find();
    }
    return $query ?? null;
  }

  // Getters y setters
  public function setUsername($username)
  {
    $this->username = $username;
  }

  public function getUsername()
  {
    return $this->username;
  }

  public function setPassword($password)
  {
    $this->password = $password;
  }

  public function getPassword()
  {
    return $this->password;
  }

  public function setEmail($email)
  {
    $this->email = $email;
  }

  public function getEmail()
  {
    return $this->email;
  }

  public function setIdPersonaUsuario($idPersonaUsuario)
  {
    $this->idPersonaUsuario = $idPersonaUsuario;
  }

  public function getIdPersonaUsuario()
  {
    return $this->idPersonaUsuario;
  }
  public function setEstadoClienteProveedor($estadoClienteProveedor)
  {
    $this->estadoClienteProveedor = $estadoClienteProveedor;
  }

  public function getEstadoClienteProveedor()
  {
    return $this->estadoClienteProveedor;
  }
}


?>