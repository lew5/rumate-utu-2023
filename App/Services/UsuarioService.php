<?php
class UsuarioService
{
  private $usuarioRepository;

  public function __construct()
  {
    $this->usuarioRepository = Container::resolve(UsuarioRepository::class);
  }

  public function createUsuario($usuarioModel)
  {
    $password = $usuarioModel->getPassword();
    $hashedPassword = PasswordHash::hashPassword($password);
    $usuarioModel->setPassword($hashedPassword);
    $usuarioAssocArray = $this->usuarioToAssocArray($usuarioModel);
    $this->usuarioRepository->addUsuario($usuarioAssocArray);
    return $this->usuarioRepository->lastInsertId();
  }

  public function getUsuarioById($id)
  {
    return $this->usuarioRepository->findById($id);
  }

  public function getUsuarioByUsername($username)
  {
    return $this->usuarioRepository->findByUsername($username);
  }

  public function updateUsuario($id, $data)
  {
    $this->usuarioRepository->updateUsuario($id, $data);
  }

  public function deleteUsuario($id)
  {
    $this->usuarioRepository->deleteUsuario($id);
  }

  private function usuarioToAssocArray($usuarioModel)
  {
    return [
      "username_usuario" => $usuarioModel->getUsername(),
      "password_usuario" => $usuarioModel->getPassword(),
      "email_usuario" => $usuarioModel->getEmail(),
      "tipo_usuario" => $usuarioModel->getTipo()
    ];
  }

}

?>