<?php

class PersonaService implements IServiceInterface
{
  private $_personaRepository;

  public function __construct()
  {
    $this->_personaRepository = Container::resolve(PersonaRepository::class);
  }

  public function getById($id)
  {
    $result = null;
    try {
      $result = $this->_personaRepository->find($id);
    } catch (PDOException $e) {
      var_dump($e);
    }
    return $result;
  }

  public function getAll()
  {
    return $this->_personaRepository->findAll();
  }

  public function create($model)
  {
    try {
      $this->_personaRepository->create($model);
    } catch (PDOException $e) {
      var_dump($e);
    }
  }

  public function update($model)
  {
    try {
      $this->_personaRepository->update($model);
    } catch (PDOException $e) {
      var_dump($e);
    }
  }
  public function delete($id)
  {
    try {
      $this->_personaRepository->delete($id);
    } catch (PDOException $e) {
      var_dump($e);
    }
  }
}
?>