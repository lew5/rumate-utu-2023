<?php
//MODELS
Container::bind(DataBase::class, function () {
  $config = require BASE_PATH . "/Config/config.php";
  return new DataBase($config['database'], "root", "");
});

Container::bind(Model::class, function () {
  return new Model();
});

Container::bind(UsuarioModel::class, function () {
  return new UsuarioModel();
});

Container::bind(Usuario::class, function (int $id, string $nombre, string $apellido, string $ci, string $barrio, string $calle, string $numero, string $telefono, string $tipo, string $username, string $password, string $email) {
  return new Usuario(
    $id,
    $nombre,
    $apellido,
    $ci,
    $barrio,
    $calle,
    $numero,
    $telefono,
    $tipo,
    $username,
    $password,
    $email
  );
});

Container::bind(PersonaModel::class, function () {
  return new PersonaModel();
});

Container::bind(Persona::class, function (int $id, string $nombre, string $apellido, string $ci, string $barrio, string $calle, string $numero, string $telefono, string $tipo) {
  return new Persona(
    $id,
    $nombre,
    $apellido,
    $ci,
    $barrio,
    $calle,
    $numero,
    $telefono,
    $tipo
  );
});

Container::bind(View::class, function () {
  return new View();
});

Container::bind(Router::class, function () {
  return new Router();
});

Container::bind(Route::class, function ($router) {
  return new Route($router);
});
?>