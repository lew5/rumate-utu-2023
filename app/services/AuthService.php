<?php
/**
 * AuthService: Servicio de autenticación que verifica las credenciales de usuario.
 */
class AuthService
{
  /**
   * @var User $user Instancia del modelo de usuario.
   */
  protected $user;

  /**
   * Constructor de AuthService.
   *
   * @param User $user Instancia del modelo de usuario.
   */
  public function __construct(User $user)
  {
    $this->user = $user;
  }

  /**
   * Autentica al usuario utilizando las credenciales proporcionadas.
   *
   * @param string $username Nombre de usuario.
   * @param string $password Contraseña (debe ser un hash seguro, no debe ser una contraseña en texto claro).
   * @return User|null Retorna una instancia del modelo de usuario si la autenticación es exitosa, o null si falla.
   */
  public function authenticate($username, $password)
  {
    // Verifica si el usuario existe en la base de datos y si las credenciales son válidas.
    if ($this->user->findUser($username, $password)) {
      // Si el usuario es válido, llena la instancia del modelo de usuario con los datos del usuario.
      $this->user->fill($username);
      return $this->user;
    } else {
      // Si la autenticación falla, retorna null.
      return null;
    }
  }
}
?>