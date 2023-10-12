<?php

Container::bind(DataBase::class, function () {
  return new DataBase();
});
//MODELS
Container::bind(Model::class, function () {
  return new Model();
});

Container::bind(UsuarioModel::class, function () {
  return new UsuarioModel();
});

Container::bind(PersonaModel::class, function () {
  return new PersonaModel();
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