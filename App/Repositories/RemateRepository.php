<?php
/**
 * Clase RemateRepository
 *
 * Esta clase extiende la clase Repository y proporciona métodos específicos para interactuar con la tabla de remates en la base de datos.
 */
class RemateRepository extends Repository
{
  /**
   * Constructor de la clase RemateRepository.
   */
  public function __construct()
  {
    parent::__construct("remates", "id_remate", "Remate");
  }

  /**
   * Recupera todos los remates de la base de datos.
   *
   * @return mixed|null Devuelve una lista de objetos que representan todos los remates o null si no se encontraron remates.
   */
  public function find()
  {
    return $this->read();
  }

  /**
   * Busca un remate por su ID en la base de datos.
   *
   * @param mixed $id El ID del remate que se desea buscar.
   * @return mixed|null Devuelve un objeto que representa el remate encontrado o null si no se encontró ningún remate con el ID especificado.
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
   * Busca remates por título en la base de datos.
   *
   * @param string $tituloRemate El título del remate que se desea buscar.
   * @return mixed|null Devuelve una lista de objetos que representan los remates encontrados por título o null si no se encontraron remates con el título especificado.
   */
  public function findByTitle($tituloRemate)
  {
    return $this->search($tituloRemate, "titulo_remate");
  }

  /**
   * Agrega un nuevo remate a la base de datos.
   *
   * @param array $data Un arreglo asociativo que contiene los datos del nuevo remate.
   */
  public function addRemate($data)
  {
    $this->create($data);
  }

  /**
   * Actualiza un remate existente en la base de datos.
   *
   * @param mixed $id El ID del remate que se va a actualizar.
   * @param array $data Un arreglo asociativo que contiene los datos actualizados del remate.
   */
  public function updateRemate($id, $data)
  {
    $this->update($id, $data);
  }

  /**
   * Elimina un remate de la base de datos.
   *
   * @param mixed $id El ID del remate que se va a eliminar.
   */
  public function deleteRemate($id)
  {
    $this->delete($id);
  }
}
?>