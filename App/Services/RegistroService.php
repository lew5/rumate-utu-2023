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

  public function createUsuarioAndPersona($personaModel)
  {
    $usuarioRegistrado = false;
    $this->usuarioDePersonaRepository->beginTransaction();
    try {
      // Crear el usuario
      $usuarioId = $this->usuarioService->createUsuario($personaModel->getUsuario());
      // Crear la persona
      $personaId = $this->personaService->createPersona($personaModel);
      // Crear la relación UsuarioDePersona
      $this->createUsurarioDePersona($usuarioId, $personaId);
      $this->usuarioDePersonaRepository->commit();
      $usuarioRegistrado = true;
    } catch (PDOException $e) {
      $this->usuarioDePersonaRepository->rollBack();
    } finally {
      $this->usuarioDePersonaRepository->close();
    }
    return $usuarioRegistrado;
  }

  private function createUsurarioDePersona($usuarioId, $personaId)
  {
    $usuarioDePersona = [
      "id_usuario_usuarios_de_personas" => $usuarioId,
      "id_persona_usuarios_de_persona" => $personaId,
    ];
    $this->usuarioDePersonaRepository->addUsuarioDePersona($usuarioDePersona);
  }
}
?>