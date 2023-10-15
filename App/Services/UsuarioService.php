<?php

class UsuarioService
{
  private $_usuarioRepository;

  public function __construct()
  {
    $this->_usuarioRepository = Container::resolve(UsuarioRepository::class);
  }

  // OBTENER TODOS LOS USUARIOS
  public function getAll()
  {
    return $this->_usuarioRepository->findAll();
  }
  // OBTENER UN USUARIO
  public function get($username)
  {
    $result = null;
    try {
      $result = $this->_usuarioRepository->find($username);
    } catch (PDOException $e) {
      var_dump($e);
    }
    return $result;
  }

  // CREAR UN USUARIO
  public function create($model)
  {
    try {
      $this->_usuarioRepository->add($model);
    } catch (PDOException $e) {
      var_dump($e);
    }
  }

  // ACTUALIZAR UN USUARIO
  public function update($model)
  {
    try {
      $this->_usuarioRepository->update($model);
    } catch (PDOException $e) {
      var_dump($e);
    }
  }
  // ELIMINAR UN USUARIO
  public function delete($username)
  {
    try {
      $this->_usuarioRepository->remove($username);
    } catch (PDOException $e) {
      var_dump($e);
    }
  }
}
?>