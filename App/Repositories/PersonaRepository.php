<?php
/**
 * Clase PersonaRepository
 *
 * Esta clase extiende la clase Repository y proporciona métodos específicos para interactuar con la tabla de personas en la base de datos.
 */
class PersonaRepository extends Repository
{
  /**
   * Constructor de la clase PersonaRepository.
   */
  public function __construct()
  {
    parent::__construct("personas", "id_persona", "Persona");
  }

  /**
   * Recupera todas las personas de la base de datos.
   *
   * @return mixed|null Devuelve una lista de objetos que representan todas las personas o null si no se encontraron personas.
   */
  public function find()
  {
    return $this->read();
  }

  /**
   * Busca una persona por su ID en la base de datos.
   *
   * @param mixed $id El ID de la persona que se desea buscar.
   * @return mixed|null Devuelve un objeto que representa la persona encontrada o null si no se encontró ninguna persona con el ID especificado.
   */
  public function findById($id)
  {
    return $this->read(
      [
        "$this->idColumn" => $id
      ]
    );
  }

  /**
   * Agrega una nueva persona a la base de datos.
   *
   * @param array $data Un arreglo asociativo que contiene los datos de la nueva persona.
   */
  public function addPersona($data)
  {
    $this->create($data);
  }

  /**
   * Actualiza una persona existente en la base de datos.
   *
   * @param mixed $id El ID de la persona que se va a actualizar.
   * @param array $data Un arreglo asociativo que contiene los datos actualizados de la persona.
   */
  public function updatePersona($id, $data)
  {
    $this->update($id, $data);
  }

  /**
   * Elimina una persona de la base de datos.
   *
   * @param mixed $id El ID de la persona que se va a eliminar.
   */
  public function deletePersona($id)
  {
    $this->delete($id);
  }
}
?>