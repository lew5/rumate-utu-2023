<?php

class UsuarioDePersonaRepository extends BaseRepository implements IRepositoryInterface
{
  private $_db;
  private $table = "usuarios_de_personas";
  private $obj = "UsuarioDePersona";

  public function find($username)
  {
    return $this->readOne($username, $this->table, "username_usuario_usuarios_de_personas", $this->obj);
  }

  public function findAll()
  {
    return $this->readAll($this->table, $this->obj);
  }

  public function create($usuarioDePersonaModel)
  {
    $this->_db = DataBase::get();
    $stm = $this->_db->prepare(
      "INSERT INTO USUARIOS_DE_PERSONAS (
        username_usuario_usuarios_de_personas,
        id_persona_usuarios_de_persona
      ) 
      VALUES (
        :username,
        :id_persona
      )"
    );
    $stm->execute([
      'username' => $usuarioDePersonaModel->getUsername(),
      'id_persona' => $usuarioDePersonaModel->getIdPersona()
    ]);
    $this->_db = null;
  }

  public function update($model)
  {
  }

  public function delete($username)
  {
    return $this->deleteOne($username, $this->table, "username_usuario_usuarios_de_personas");
  }
}


?>