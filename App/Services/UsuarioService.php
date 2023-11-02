<?php
class UsuarioService
{
  private $usuarioRepository;
  private $personaRepository;
  private $usuarioDePersonaRepository;

  public function __construct()
  {
    $this->usuarioRepository = Container::resolve(UsuarioRepository::class);
    $this->usuarioDePersonaRepository = Container::resolve(UsuarioDePersonaRepository::class);
    $this->personaRepository = Container::resolve(PersonaRepository::class);
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

  public function getUsuariosByTipo($tipo)
  {
    $usuario = $this->usuarioRepository->findByTipo($tipo);
    if (is_object($usuario)) {
      $usuarios[] = $usuario;
      return $usuarios;
    } else {
      return $usuario;
    }
  }
  public function getPersonaByUsuarioId($id)
  {
    $idPersona = $this->usuarioDePersonaRepository->findByUsuarioId($id)->getIdPersona();
    $persona = $this->personaRepository->findById($idPersona);
    return $persona;
  }

  public function getUsuarioByPersonaId($personaId)
  {
    $usuarioDePersona = $this->usuarioDePersonaRepository->findByPersonaId($personaId);
    if ($usuarioDePersona) {
      $usuarioId = $usuarioDePersona->getIdUsuario();
      return $this->usuarioRepository->findById($usuarioId);
    }
    return null;
  }

  public function updateUsuario($id, $data)
  {
    $usuarioData = $data['usuario'];
    $personaData = $data['persona'];
    $usuario = $this->usuarioRepository->findByUsername($usuarioData['username_usuario']);
    if ($usuario && $usuario->getUsername() == $usuarioData['username_usuario'] && $usuario->getId() != $id) {
      return false;
    } else {
      $usuario = null;
      $this->usuarioRepository->beginTransaction();
      try {
        $this->usuarioRepository->updateUsuario($usuarioData['id_usuario'], $usuarioData);
        $this->personaRepository->updatePersona($personaData['id_persona'], $personaData);
        $usuario = $this->usuarioRepository->findById($id);
        $this->usuarioRepository->commit();
      } catch (PDOException $e) {
        var_dump($e->errorInfo);
        $this->usuarioRepository->rollback();
      } finally {
        $this->usuarioRepository->close();
      }
    }
    return $usuario;
  }

  public function updateUsuarioAndPersona($id, $data)
  {
    $this->usuarioRepository->updateUsuario($id, $data);
  }

  public function deleteUsuario($id)
  {
    $this->usuarioRepository->beginTransaction();
    try {
      $this->usuarioDePersonaRepository->deleteUsuarioDePersona($id);
      $this->usuarioRepository->deleteUsuario($id);
      $this->usuarioRepository->commit();
      return true;
    } catch (PDOException $e) {
      // var_dump($e->errorInfo);
      $this->usuarioRepository->rollback();
      return false;
    } finally {
      $this->usuarioRepository->close();
    }
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