<?php
class RegistroService
{
  private $usuarioService;
  private $personaService;
  private $usuarioDePersonaRepository;

  public function __construct()
  {
    $this->usuarioService = Container::resolve(UsuarioService::class);
    $this->personaService = Container::resolve(PersonaService::class);
    $this->usuarioDePersonaRepository = Container::resolve(UsuarioDePersonaRepository::class);
  }

  /**
   * Crea un nuevo usuario y una nueva persona, estableciendo la relación entre ellos.
   *
   * @param $PersonaModel $personaModel Modelo de datos de la persona a crear.
   * @return bool Devuelve true si la creación es exitosa, de lo contrario, devuelve false.
   */
  public function createUsuarioAndPersona($personaModel)
  {
    $this->usuarioDePersonaRepository->beginTransaction();
    try {
      // Crear el usuario
      $usuarioId = $this->usuarioService->createUsuario($personaModel->getUsuario());
      // Crear la persona
      $personaId = $this->personaService->createPersona($personaModel);
      // Crear la relación UsuarioDePersona
      $this->createUsuarioDePersona($usuarioId, $personaId);
      $this->usuarioDePersonaRepository->commit();
      return true;
    } catch (PDOException $e) {
      $this->usuarioDePersonaRepository->rollBack();
      return false;
    } finally {
      $this->usuarioDePersonaRepository->close();
    }
  }

  /**
   * Crea una nueva relación entre un usuario y una persona.
   *
   * @param int $usuarioId ID del usuario.
   * @param int $personaId ID de la persona.
   */
  private function createUsuarioDePersona($usuarioId, $personaId)
  {
    $usuarioDePersona = [
      "id_usuario_usuarios_de_personas" => $usuarioId,
      "id_persona_usuarios_de_persona" => $personaId,
    ];
    $this->usuarioDePersonaRepository->addUsuarioDePersona($usuarioDePersona);
  }
}

?>