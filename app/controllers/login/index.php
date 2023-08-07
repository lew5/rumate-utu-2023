<?php
/**
 * Procesa el formulario de inicio de sesión cuando se envía.
 */
if (isset($_POST['login-btn'])) {
  // Obtener el nombre de usuario y la contraseña del formulario.
  $username = isset($_POST['username']) ? trim($_POST['username']) : "";
  $password = isset($_POST['password']) ? md5($_POST['password']) : "";

  // Incluir el archivo de modelo User.php.
  model("User.php");

  // Resuelve la instancia del modelo de usuario usando la clase App.
  $user = App::resolve("User");

  // Intenta encontrar al usuario en la base de datos usando el nombre de usuario y la contraseña.
  if ($user->findUser($username, $password)) {
    // Si el usuario se encuentra, llena la instancia del usuario con sus datos.
    $user->fill($username);
    $_SESSION['id'] = $user->getId();
    $_SESSION['username'] = $user->getUsername();
    $_SESSION['rol'] = $user->getRol();
    // Redirige al usuario a la página de inicio.
    header("Location: /");
    exit();
  } else {
    // Si las credenciales son incorrectas, muestra un mensaje de error y carga la vista de inicio de sesión nuevamente.
    $error_message = "Usuario o contraseña incorrectos";
    view("login/index.view.php", [
      'title' => "Rumate - Login",
      'error' => isset($error_message) ? $error_message : null,
      'username' => $username
    ]);
  }
} else {
  // Si no se ha enviado el formulario, carga la vista de inicio de sesión por defecto.
  view("login/index.view.php", [
    'title' => "Rumate - Login",
  ]);
}
?>