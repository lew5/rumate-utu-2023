<?php
/**
 * Clase PujaRepository
 *
 * Esta clase extiende la clase Repository y proporciona métodos específicos para interactuar con la tabla "pujas" en la base de datos.
 */
class PujaRepository extends Repository
{
  /**
   * Constructor de la clase PujaRepository.
   */
  public function __construct()
  {
    parent::__construct("pujas", "id_puja", "Puja");
  }

  /**
   * Recupera todos los registros de pujas de la base de datos.
   *
   * @return mixed|null Devuelve una lista de objetos que representan todos los registros de pujas o null si no se encontraron registros.
   */
  public function find()
  {
    return $this->read();
  }

  /**
   * Busca un registro de puja por su ID en la base de datos.
   *
   * @param mixed $id El ID de la puja que se desea buscar.
   * @return mixed|null Devuelve un objeto que representa el registro de la puja encontrado por su ID o null si no se encontró ningún registro.
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
   * Agrega un nuevo registro de puja a la tabla "pujas" en la base de datos.
   *
   * @param array $data Un arreglo asociativo que contiene los datos del nuevo registro de puja.
   */
  public function addPuja($data)
  {
    $this->create($data);
  }

  /**
   * Actualiza un registro existente en la tabla "pujas" en la base de datos.
   *
   * @param mixed $id El ID del registro de puja que se va a actualizar.
   * @param array $data Un arreglo asociativo que contiene los datos actualizados del registro de puja.
   */
  public function updatePuja($id, $data)
  {
    $this->update($id, $data);
  }

  /**
   * Elimina un registro de puja de la tabla "pujas" en la base de datos.
   *
   * @param mixed $id El ID del registro de puja que se va a eliminar.
   */
  public function deletePuja($id)
  {
    $this->delete($id);
  }
}
