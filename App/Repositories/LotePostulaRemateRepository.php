<?php
/**
 * Clase LotePostulaRemateRepository
 *
 * Esta clase extiende la clase Repository y proporciona métodos específicos para interactuar con la tabla lotes_postulan_remates en la base de datos.
 */
class LotePostulaRemateRepository extends Repository
{
  /**
   * Constructor de la clase LotePostulaRemateRepository.
   */
  public function __construct()
  {
    parent::__construct("lotes_postulan_remates", "id_remate_lote_postula_remate", "LotePostulaRemate");
  }

  /**
   * Recupera todos los registros de lotes_postulan_remates de la base de datos.
   *
   * @return mixed|null Devuelve una lista de objetos que representan todos los registros de lotes_postulan_remates o null si no se encontraron registros.
   */
  public function find()
  {
    return $this->read();
  }

  /**
   * Busca registros de lotes_postulan_remates por el ID del remate en la base de datos.
   *
   * @param mixed $id El ID del remate para el cual se desean buscar los registros de lotes_postulan_remates.
   * @return mixed|null Devuelve una lista de objetos que representan los registros encontrados por el ID del remate o null si no se encontraron registros para ese remate.
   */
  public function findByRemateId($id)
  {
    return $this->read(
      [
        "$this->idColumn" => $id
      ]
    );
  }

  /**
   * Busca los IDs de los lotes relacionados con un remate específico en la base de datos.
   *
   * @param mixed $id El ID del remate para el cual se desean buscar los IDs de los lotes relacionados.
   * @return mixed|null Devuelve una lista de IDs de lotes relacionados con el remate o null si no se encontraron registros.
   */
  public function findLotesByRemateId($id)
  {
    return $this->read(
      [
        "$this->idColumn" => $id
      ],
      "id_lote_lote_postula_remate"
    );
  }

  /**
   * Busca el remate relacionado con un lote específico en la base de datos.
   *
   * @param mixed $id El ID del lote para el cual se desea buscar el remate relacionado.
   * @return mixed|null Devuelve un objeto que representa el remate relacionado con el lote o null si no se encontró ningún remate para ese lote.
   */
  public function findRemateByLoteId($id)
  {
    return $this->read(
      [
        "id_lote_lote_postula_remate" => $id
      ]
    );
  }

  /**
   * Agrega un nuevo registro a la tabla lotes_postulan_remates en la base de datos.
   *
   * @param array $data Un arreglo asociativo que contiene los datos del nuevo registro.
   */
  public function addLoteDeRemate($data)
  {
    $this->create($data);
  }

  /**
   * Actualiza un registro existente en la tabla lotes_postulan_remates en la base de datos.
   *
   * @param mixed $id El ID del registro que se va a actualizar.
   * @param array $data Un arreglo asociativo que contiene los datos actualizados del registro.
   */
  public function updateLoteDeRemate($id, $data)
  {
    $this->update($id, $data);
  }

  /**
   * Elimina un registro de la tabla lotes_postulan_remates en la base de datos.
   *
   * @param mixed $id El ID del registro que se va a eliminar.
   */
  public function deleteLoteDeRemate($id)
  {
    $this->delete($id);
  }

  /**
   * Elimina registros de la tabla lotes_postulan_remates en la base de datos por el ID del lote.
   *
   * @param mixed $id El ID del lote para el cual se desean eliminar registros relacionados.
   */
  public function deleteLoteDeRemateByLoteId($id)
  {
    $this->idColumn = "id_lote_lote_postula_remate";
    $this->delete($id);
  }
}
?>