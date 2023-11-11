<?php
/**
 * Clase LoteRepository
 *
 * Esta clase extiende la clase Repository y proporciona métodos específicos para interactuar con la tabla lotes en la base de datos.
 */
class LoteRepository extends Repository
{
  /**
   * Constructor de la clase LoteRepository.
   */
  public function __construct()
  {
    parent::__construct("lotes", "id_lote", "Lote");
  }

  /**
   * Recupera todos los registros de lotes de la base de datos.
   *
   * @return mixed|null Devuelve una lista de objetos que representan todos los registros de lotes o null si no se encontraron registros.
   */
  public function find()
  {
    return $this->read();
  }

  /**
   * Busca un registro de lote por su ID en la base de datos.
   *
   * @param mixed $id El ID del lote que se desea buscar.
   * @return mixed|null Devuelve un objeto que representa el registro del lote encontrado por su ID o null si no se encontró ningún registro.
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
   * Busca registros de lotes por el ID del proveedor en la base de datos.
   *
   * @param mixed $id El ID del proveedor para el cual se desean buscar los registros de lotes relacionados.
   * @return mixed|null Devuelve una lista de objetos que representan los registros de lotes relacionados con el proveedor o null si no se encontraron registros para ese proveedor.
   */
  public function findByProveedorId($id)
  {
    return $this->read(
      [
        "id_proveedor_lote" => $id
      ]
    );
  }

  /**
   * Obtiene el ID de la ficha relacionada con un lote específico en la base de datos.
   *
   * @param mixed $id El ID del lote para el cual se desea obtener el ID de la ficha relacionada.
   * @return mixed|null Devuelve el ID de la ficha relacionada con el lote o null si no se encontró ninguna ficha relacionada.
   */
  public function getFichaIdByLoteId($id)
  {
    return $this->read(
      [
        "$this->idColumn" => $id
      ],
      "id_ficha_lote"
    );
  }

  /**
   * Agrega un nuevo registro de lote a la tabla lotes en la base de datos.
   *
   * @param array $data Un arreglo asociativo que contiene los datos del nuevo registro de lote.
   */
  public function addLote($data)
  {
    $this->create($data);
  }

  /**
   * Actualiza un registro existente en la tabla lotes en la base de datos.
   *
   * @param mixed $id El ID del registro de lote que se va a actualizar.
   * @param array $data Un arreglo asociativo que contiene los datos actualizados del registro de lote.
   */
  public function updateLote($id, $data)
  {
    $this->update($id, $data);
  }

  /**
   * Elimina un registro de lote de la tabla lotes en la base de datos.
   *
   * @param mixed $id El ID del registro de lote que se va a eliminar.
   */
  public function deleteLote($id)
  {
    $this->delete($id);
  }

  /**
   * Obtiene el usuario con la mejor oferta en un lote y remate específicos en la base de datos.
   *
   * @param mixed $loteId El ID del lote para el cual se desea encontrar el usuario con la mejor oferta.
   * @param mixed $idRemate El ID del remate al que pertenece el lote.
   * @return mixed|string Devuelve un arreglo asociativo con el ID y el nombre de usuario del usuario con la mejor oferta o una cadena indicando "Sin ofertas" si no hay ofertas o "Error" en caso de error.
   */
  public function obtenerUsuarioConMejorOferta($loteId, $idRemate)
  {
    try {
      $stmt = $this->db->prepare(
        "SELECT USUARIOS.id_usuario, USUARIOS.username_usuario
                FROM USUARIOS
                JOIN USUARIOS_DE_PERSONAS ON USUARIOS.id_usuario = USUARIOS_DE_PERSONAS.id_usuario_usuarios_de_personas
                JOIN PUJAS_DE_PERSONAS ON USUARIOS_DE_PERSONAS.id_persona_usuarios_de_persona = PUJAS_DE_PERSONAS.id_persona_puja_de_persona
                JOIN PUJAS_DE_REMATES ON PUJAS_DE_PERSONAS.id_puja_puja_de_persona = PUJAS_DE_REMATES.id_puja_puja_de_remate
                JOIN PUJAS ON PUJAS_DE_REMATES.id_puja_puja_de_remate = PUJAS.id_puja
                WHERE PUJAS_DE_REMATES.id_lote_puja_de_remate = :id_lote
                AND PUJAS_DE_REMATES.id_remate_puja_de_remate = :id_remate
                ORDER BY PUJAS.monto_puja DESC
                LIMIT 1;"
      );
      $stmt->bindParam(':id_lote', $loteId, PDO::PARAM_INT);
      $stmt->bindParam(':id_remate', $idRemate, PDO::PARAM_INT);
      $stmt->execute();

      $row = $stmt->fetch(PDO::FETCH_ASSOC);

      if ($row) {
        return $row;
      } else {
        return "Sin ofertas";
      }
    } catch (PDOException $e) {
      echo "Error: " . $e->getMessage();
      return "Error";
    }
  }
}
?>