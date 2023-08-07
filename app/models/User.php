<?php
/**
 * La clase User representa un usuario en el sistema y hereda propiedades y métodos de la clase Database.
 */
class User extends Database
{
  /**
   * @var int El ID del usuario.
   */
  private $id;

  /**
   * @var string El nombre de usuario del usuario.
   */
  private $username;

  /**
   * @var string El rol del usuario.
   */
  private $rol;

  /**
   * Obtiene el ID del usuario.
   * @return int El ID del usuario.
   */
  public function getId()
  {
    return $this->id;
  }

  /**
   * Obtiene el nombre de usuario del usuario.
   * @return string El nombre de usuario del usuario.
   */
  public function getUsername()
  {
    return $this->username;
  }

  /**
   * Obtiene el rol del usuario.
   * @return string El rol del usuario.
   */
  public function getRol()
  {
    return $this->rol;
  }

  /**
   * Establece el ID del usuario.
   * @param int $id El ID del usuario.
   */
  public function setId($id)
  {
    $this->id = $id;
  }

  /**
   * Establece el nombre de usuario del usuario.
   * @param string $username El nombre de usuario del usuario.
   */
  public function setUsername($username)
  {
    $this->username = $username;
  }

  /**
   * Establece el rol del usuario.
   * @param string $rol El rol del usuario.
   */
  public function setRol($rol)
  {
    $this->rol = $rol;
  }

  /**
   * Rellena las propiedades del usuario utilizando el nombre de usuario proporcionado.
   * @param string $username El nombre de usuario del usuario.
   */
  public function fill($username)
  {
    $data = $this->query("SELECT u.id, u.username, r.nombre AS rol FROM usuario u JOIN rol r ON u.rol = r.id WHERE u.username = :user", ['user' => $username])->findOrFail();
    $this->id = $data['id'];
    $this->username = $data['username'];
    $this->rol = $data['rol'];
  }

  /**
   * Busca un usuario en la base de datos por su nombre de usuario y contraseña.
   * @param string $username El nombre de usuario del usuario.
   * @param string $password La contraseña del usuario.
   * @return array|null Los datos del usuario si se encuentra, o null si no se encuentra.
   */
  public function findUser($username, $password)
  {
    return $this->query("SELECT * FROM usuario WHERE username = :username AND password = :password", [
      'username' => $username,
      'password' => $password
    ])->find();
  }
}
?>