<?php
/**
 * Clase UsuarioDePersonaRepository
 *
 * Esta clase extiende la clase Repository y proporciona métodos específicos para interactuar con la tabla usuarios_de_personas en la base de datos.
 */
class UsuarioDePersonaRepository extends Repository
{
  /**
   * Constructor de la clase UsuarioDePersonaRepository.
   */
  public function __construct()
  {
    parent::__construct("usuarios_de_personas", "id_usuario_usuarios_de_personas", "UsuarioDePersona");
  }

  /**
   * Recupera todos los registros de usuarios_de_personas de la base de datos.
   *
   * @return mixed|null Devuelve una lista de objetos que representan todos los registros de usuarios_de_personas o null si no se encontraron registros.
   */
  public function find()
  {
    return $this->read();
  }

  /**
   * Busca un registro de usuarios_de_personas por su ID en la base de datos.
   *
   * @param mixed $id El ID del registro que se desea buscar.
   * @return mixed|null Devuelve un objeto que representa el registro encontrado o null si no se encontró ningún registro con el ID especificado.
   */
  public function findByUsuarioId($id)
  {
    return $this->read(
      [
        "$this->idColumn" => $id
      ]
    );
  }

  /**
   * Busca registros de usuarios_de_personas por el ID de la persona en la base de datos.
   *
   * @param mixed $id El ID de la persona para la cual se desean buscar los registros de usuarios_de_personas.
   * @return mixed|null Devuelve una lista de objetos que representan los registros encontrados por el ID de la persona o null si no se encontraron registros para esa persona.
   */
  public function findByPersonaId($id)
  {
    return $this->read(
      [
        "id_persona_usuarios_de_persona" => $id
      ]
    );
  }

  /**
   * Agrega un nuevo registro a la tabla usuarios_de_personas en la base de datos.
   *
   * @param array $data Un arreglo asociativo que contiene los datos del nuevo registro.
   */
  public function addUsuarioDePersona($data)
  {
    $this->create($data);
  }

  /**
   * Actualiza un registro existente en la tabla usuarios_de_personas en la base de datos.
   *
   * @param mixed $id El ID del registro que se va a actualizar.
   * @param array $data Un arreglo asociativo que contiene los datos actualizados del registro.
   */
  public function updateUsuarioDePersona($id, $data)
  {
    $this->update($id, $data);
  }

  /**
   * Elimina un registro de la tabla usuarios_de_personas en la base de datos.
   *
   * @param mixed $id El ID del registro que se va a eliminar.
   */
  public function deleteUsuarioDePersona($id)
  {
    $this->delete($id);
  }
}
?>