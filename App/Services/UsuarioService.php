<?php

/**
 * La clase UsuarioService se encarga de gestionar los usuarios en el sistema, incluyendo la creación, obtención, actualización y eliminación de usuarios.
 */
class UsuarioService
{
  /**
   * @var UsuarioRepository Instancia del repositorio de usuarios para acceder a los datos de los usuarios.
   */
  private $usuarioRepository;

  /**
   * @var UsuarioDePersonaRepository Instancia del repositorio de relaciones entre usuarios y personas.
   */
  private $usuarioDePersonaRepository;

  /**
   * @var PersonaRepository Instancia del repositorio de personas para acceder a los datos de las personas asociadas a usuarios.
   */
  private $personaRepository;

  /**
   * Constructor de la clase UsuarioService.
   * 
   * @return void
   */
  public function __construct()
  {
    $this->usuarioRepository = Container::resolve(UsuarioRepository::class);
    $this->usuarioDePersonaRepository = Container::resolve(UsuarioDePersonaRepository::class);
    $this->personaRepository = Container::resolve(PersonaRepository::class);
  }

  /**
   * Crea un nuevo usuario en el sistema, hasheando la contraseña proporcionada.
   * 
   * @param object $usuarioModel El modelo de usuario que contiene los datos del usuario.
   * @return $int El ID del usuario recién creado.
   */
  public function createUsuario($usuarioModel)
  {
    $password = $usuarioModel->getPassword();
    $hashedPassword = PasswordHash::hashPassword($password);
    $usuarioModel->setPassword($hashedPassword);
    $usuarioAssocArray = $this->usuarioToAssocArray($usuarioModel);
    $this->usuarioRepository->addUsuario($usuarioAssocArray);
    return $this->usuarioRepository->lastInsertId();
  }

  /**
   * Obtiene un usuario por su ID.
   * 
   * @param int $id El ID del usuario a buscar.
   * @return object|bool El objeto usuario si existe, o false si no se encuentra.
   */
  public function getUsuarioById($id)
  {
    return $this->usuarioRepository->findById($id);
  }

  /**
   * Obtiene un usuario por su nombre de usuario (username).
   * 
   * @param string $username El nombre de usuario a buscar.
   * @return object|bool El objeto usuario si existe, o false si no se encuentra.
   */
  public function getUsuarioByUsername($username)
  {
    return $this->usuarioRepository->findByUsername($username);
  }

  /**
   * Obtiene usuarios por tipo (por ejemplo, "ADMINISTRADOR" o "CLIENTE").
   * 
   * @param string $tipo El tipo de usuario a buscar.
   * @return array|bool Un array de objetos de usuario si existen, o false si no se encuentran.
   */
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

  /**
   * Obtiene la persona asociada a un usuario por su ID de usuario.
   * 
   * @param int $id El ID del usuario cuya persona se desea obtener.
   * @return object|bool El objeto persona si existe, o false si no se encuentra.
   */
  public function getPersonaByUsuarioId($id)
  {
    $idPersona = $this->usuarioDePersonaRepository->findByUsuarioId($id)->getIdPersona();
    $persona = $this->personaRepository->findById($idPersona);
    return $persona;
  }

  /**
   * Obtiene un usuario por el ID de la persona asociada.
   * 
   * @param int $personaId El ID de la persona asociada al usuario.
   * @return object|null El objeto usuario si existe, o null si no se encuentra.
   */
  public function getUsuarioByPersonaId($personaId)
  {
    $usuarioDePersona = $this->usuarioDePersonaRepository->findByPersonaId($personaId);
    if ($usuarioDePersona) {
      $usuarioId = $usuarioDePersona->getIdUsuario();
      return $this->usuarioRepository->findById($usuarioId);
    }
    return null;
  }

  /**
   * Actualiza un usuario y la persona asociada a él.
   * 
   * @param int $id El ID del usuario a actualizar.
   * @param array $data Los datos actualizados del usuario y la persona.
   * @return object|bool El objeto usuario actualizado si la actualización se realiza con éxito, o false en caso de error.
   */
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

  /**
   * Actualiza únicamente los datos del usuario sin afectar a la persona asociada.
   * 
   * @param int $id El ID del usuario a actualizar.
   * @param array $data Los datos actualizados del usuario.
   * @return void
   */
  public function updateUsuarioAndPersona($id, $data)
  {
    $this->usuarioRepository->updateUsuario($id, $data);
  }

  /**
   * Elimina un usuario del sistema, junto con las relaciones y la persona asociada.
   * 
   * @param int $id El ID del usuario a eliminar.
   * @return bool true si la eliminación se realiza con éxito, o false en caso de error.
   */
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

  /**
   * Convierte un modelo de usuario a un array asociativo.
   * 
   * @param object $usuarioModel El modelo de usuario a convertir.
   * @return array Un array asociativo con los datos del usuario.
   */
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