<?php
/**
 * Clase FichaRepository
 *
 * Esta clase extiende la clase Repository y proporciona métodos específicos para interactuar con la tabla de fichas en la base de datos.
 */
class FichaRepository extends Repository
{
  /**
   * Constructor de la clase FichaRepository.
   */
  public function __construct()
  {
    parent::__construct("fichas", "id_ficha", "Ficha");
  }

  /**
   * Recupera todas las fichas de la base de datos.
   *
   * @return mixed|null Devuelve una lista de objetos que representan todas las fichas o null si no se encontraron fichas.
   */
  public function find()
  {
    return $this->read();
  }

  /**
   * Busca una ficha por su ID en la base de datos.
   *
   * @param mixed $id El ID de la ficha que se desea buscar.
   * @return mixed|null Devuelve un objeto que representa la ficha encontrada o null si no se encontró ninguna ficha con el ID especificado.
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
   * Agrega una nueva ficha a la base de datos.
   *
   * @param array $data Un arreglo asociativo que contiene los datos de la nueva ficha.
   */
  public function addFicha($data)
  {
    $this->create($data);
  }

  /**
   * Actualiza una ficha existente en la base de datos.
   *
   * @param mixed $id El ID de la ficha que se va a actualizar.
   * @param array $data Un arreglo asociativo que contiene los datos actualizados de la ficha.
   */
  public function updateFicha($id, $data)
  {
    $this->update($id, $data);
  }

  /**
   * Elimina una ficha de la base de datos.
   *
   * @param mixed $id El ID de la ficha que se va a eliminar.
   */
  public function deleteFicha($id)
  {
    $this->delete($id);
  }
}
?>