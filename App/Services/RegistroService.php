<?php

class RegistroService
{
  private $_usuarioService;
  private $_personaService;
  private $_usuarioDePersonaRepository;

  public function __construct()
  {
    $this->_usuarioService = Container::resolve(UsuarioService::class);
    $this->_personaService = Container::resolve(PersonaService::class);
    $this->_usuarioDePersonaRepository = Container::resolve(UsuarioDePersonaRepository::class);
  }

  public function create($personaModel)
  {
    $db = DataBase::get();
    $db->beginTransaction();
    $usuarioRegistrado = false;
    try {
      $this->_usuarioService->create($personaModel->getUsuario());
      $username = $personaModel->getUsuario()->getUsername();
      $personaId = $this->_personaService->create($personaModel);
      $usuarioDePersona = Container::resolve(UsuarioDePersona::class);
      $usuarioDePersona->setUsername($username);
      $usuarioDePersona->setIdPersona($personaId);
      $this->_usuarioDePersonaRepository->create($usuarioDePersona);
      $db->commit();
      $usuarioRegistrado = true;
    } catch (PDOException $e) {
      $db->rollBack();
      var_dump($e);
    } finally {
      $db = null;
    }
    return $usuarioRegistrado;
  }
}

?>