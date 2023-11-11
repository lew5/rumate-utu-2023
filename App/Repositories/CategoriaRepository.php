<?php
/**
 * Clase CategoriaRepository
 *
 * Esta clase extiende la clase Repository y proporciona métodos específicos para interactuar con la tabla de categorías en la base de datos.
 */
class CategoriaRepository extends Repository
{
  /**
   * Constructor de la clase CategoriaRepository.
   */
  public function __construct()
  {
    parent::__construct("categorias", "id_categoria", "Categoria");
  }

  /**
   * Recupera todas las categorías de la base de datos.
   *
   * @return mixed|null Devuelve una lista de objetos que representan todas las categorías o null si no se encontraron categorías.
   */
  public function find()
  {
    return $this->read();
  }

  /**
   * Busca una categoría por su ID en la base de datos.
   *
   * @param mixed $id El ID de la categoría que se desea buscar.
   * @return mixed|null Devuelve un objeto que representa la categoría encontrada o null si no se encontró ninguna categoría con el ID especificado.
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
   * Agrega una nueva categoría a la base de datos.
   *
   * @param array $data Un arreglo asociativo que contiene los datos de la nueva categoría.
   */
  public function addCategoria($data)
  {
    $this->create($data);
  }

  /**
   * Actualiza una categoría existente en la base de datos.
   *
   * @param mixed $id El ID de la categoría que se va a actualizar.
   * @param array $data Un arreglo asociativo que contiene los datos actualizados de la categoría.
   */
  public function updateCategoria($id, $data)
  {
    $this->update($id, $data);
  }

  /**
   * Elimina una categoría de la base de datos.
   *
   * @param mixed $id El ID de la categoría que se va a eliminar.
   */
  public function deleteCategoria($id)
  {
    $this->delete($id);
  }
}
?>