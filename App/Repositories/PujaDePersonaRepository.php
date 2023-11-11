<?php
/**
 * Clase PujaDePersonaRepository
 *
 * Esta clase extiende la clase Repository y proporciona métodos específicos para interactuar con la tabla "pujas_de_personas" en la base de datos.
 */
class PujaDePersonaRepository extends Repository
{
  /**
   * Constructor de la clase PujaDePersonaRepository.
   */
  public function __construct()
  {
    parent::__construct("pujas_de_personas", "id_puja_puja_de_persona", "PujaDePersona");
  }

  /**
   * Recupera todos los registros de pujas de personas de la base de datos.
   *
   * @return mixed|null Devuelve una lista de objetos que representan todos los registros de pujas de personas o null si no se encontraron registros.
   */
  public function find()
  {
    return $this->read();
  }

  /**
   * Busca un registro de puja de persona por su ID en la base de datos.
   *
   * @param mixed $id El ID de la puja de persona que se desea buscar.
   * @return mixed|null Devuelve un objeto que representa el registro de la puja de persona encontrado por su ID o null si no se encontró ningún registro.
   */
  public function findByPujaId($id)
  {
    return $this->read(
      [
        "$this->idColumn" => $id
      ]
    );
  }

  /**
   * Agrega un nuevo registro de puja de persona a la tabla "pujas_de_personas" en la base de datos.
   *
   * @param array $data Un arreglo asociativo que contiene los datos del nuevo registro de puja de persona.
   */
  public function addPujaDePersona($data)
  {
    $this->create($data);
  }

  /**
   * Actualiza un registro existente en la tabla "pujas_de_personas" en la base de datos.
   *
   * @param mixed $id El ID del registro de puja de persona que se va a actualizar.
   * @param array $data Un arreglo asociativo que contiene los datos actualizados del registro de puja de persona.
   */
  public function updatePujaDePersona($id, $data)
  {
    $this->update($id, $data);
  }

  /**
   * Elimina un registro de puja de persona de la tabla "pujas_de_personas" en la base de datos.
   *
   * @param mixed $id El ID del registro de puja de persona que se va a eliminar.
   */
  public function deletePujaDePersona($id)
  {
    $this->delete($id);
  }
}
