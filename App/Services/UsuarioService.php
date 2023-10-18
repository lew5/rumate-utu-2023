<?php
class UsuarioService
{
  private $userRepository;

  public function __construct()
  {
    $this->userRepository = Container::resolve(UsuarioRepository::class);
  }

  public function createUsuario($usuarioModel, $password)
  {
    $hashedPassword = PasswordHash::hashPassword($password);
    $usuarioModel->setPassword($hashedPassword);
    $usuarioAssocArray = $this->usuarioToAssocArray($usuarioModel);
    $this->userRepository->addUsuario($usuarioAssocArray);
  }

  public function getUsuarioById($id)
  {
    return $this->userRepository->findById($id);
  }

  public function updateUsuario($id, $data)
  {
    $this->userRepository->updateUsuario($id, $data);
  }

  public function deleteUsuario($id)
  {
    $this->userRepository->deleteUsuario($id);
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