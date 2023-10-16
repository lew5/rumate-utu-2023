<?php

class UsuarioService implements IUsuarioServiceInterface
{
  private $_usuarioRepository;

  public function __construct()
  {
    $this->_usuarioRepository = Container::resolve(UsuarioRepository::class);
  }

  // OBTENER UN USUARIO
  public function getByUsername($username)
  {
    $result = null;
    try {
      $result = $this->_usuarioRepository->find($username);
    } catch (PDOException $e) {
      var_dump($e);
    }
    return $result;
  }

  // OBTENER TODOS LOS USUARIOS
  public function getAll()
  {
    return $this->_usuarioRepository->findAll();
  }

  // CREAR UN USUARIO
  public function create($usuarioModel)
  {
    $hashPassword = Container::resolve(PasswordHash::class)::hashPassword($usuarioModel->getPassword());
    $usuarioModel->setPassword($hashPassword);
    $this->_usuarioRepository->create($usuarioModel);
  }

  // ACTUALIZAR UN USUARIO
  public function update($usuarioModel)
  {
    try {
      $this->_usuarioRepository->update($usuarioModel);
    } catch (PDOException $e) {
      var_dump($e);
    }
  }
  // ELIMINAR UN USUARIO
  public function delete($username)
  {
    try {
      $this->_usuarioRepository->delete($username);
    } catch (PDOException $e) {
      var_dump($e);
    }
  }
}
?>