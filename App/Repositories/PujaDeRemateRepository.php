<?php
/**
 * Clase PujaDeRemateRepository
 *
 * Esta clase extiende la clase Repository y proporciona métodos específicos para interactuar con la tabla "pujas_de_remates" en la base de datos.
 */
class PujaDeRemateRepository extends Repository
{
  /**
   * Constructor de la clase PujaDeRemateRepository.
   */
  public function __construct()
  {
    parent::__construct("pujas_de_remates", "id_puja_puja_de_remate", "PujaDeRemate");
  }

  /**
   * Recupera todos los registros de pujas de remates de la base de datos.
   *
   * @return mixed|null Devuelve una lista de objetos que representan todos los registros de pujas de remates o null si no se encontraron registros.
   */
  public function find()
  {
    return $this->read();
  }

  /**
   * Busca un registro de puja de remate por su ID en la base de datos.
   *
   * @param mixed $id El ID de la puja de remate que se desea buscar.
   * @return mixed|null Devuelve un objeto que representa el registro de la puja de remate encontrado por su ID o null si no se encontró ningún registro.
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
   * Agrega un nuevo registro de puja de remate a la tabla "pujas_de_remates" en la base de datos.
   *
   * @param array $data Un arreglo asociativo que contiene los datos del nuevo registro de puja de remate.
   */
  public function addPujaDeRemate($data)
  {
    $this->create($data);
  }

  /**
   * Actualiza un registro existente en la tabla "pujas_de_remates" en la base de datos.
   *
   * @param mixed $id El ID del registro de puja de remate que se va a actualizar.
   * @param array $data Un arreglo asociativo que contiene los datos actualizados del registro de puja de remate.
   */
  public function updatePujaDeRemate($id, $data)
  {
    $this->update($id, $data);
  }

  /**
   * Elimina un registro de puja de remate de la tabla "pujas_de_remates" en la base de datos.
   *
   * @param mixed $id El ID del registro de puja de remate que se va a eliminar.
   */
  public function deletePujaDeRemate($id)
  {
    $this->delete($id);
  }
}
