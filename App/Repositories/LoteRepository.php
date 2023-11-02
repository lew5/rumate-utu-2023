<?php

class LoteRepository extends Repository
{
  public function __construct()
  {
    parent::__construct("lotes", "id_lote", "Lote");
  }

  public function find()
  {
    return $this->read();
  }

  public function findById($id)
  {
    return $this->read(
      [
        "$this->idColumn" => $id
      ]
    );
  }

  public function getFichaIdByLoteId($id)
  {
    return $this->read(
      [
        "$this->idColumn" => $id
      ],
      "id_ficha_lote"
    );
  }

  public function addLote($data)
  {
    $this->create($data);
  }

  public function updateLote($id, $data)
  {
    $this->update($id, $data);
  }

  public function deleteLote($id)
  {
    $this->delete($id);
  }

  public function obtenerUsuarioConMejorOferta($loteId, $idRemate)
  {
    try {
      // Prepara la consulta SQL para obtener el nombre de usuario relacionado con un lote y un remate
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
          LIMIT 1;
          "
      );
      $stmt->bindParam(':id_lote', $loteId, PDO::PARAM_INT);
      $stmt->bindParam(':id_remate', $idRemate, PDO::PARAM_INT);
      $stmt->execute();

      $row = $stmt->fetch(PDO::FETCH_ASSOC);

      if ($row) {
        return $row;
      } else {
        return "Usuario Desconocido";
      }
    } catch (PDOException $e) {
      echo "Error: " . $e->getMessage();
      return "Error";
    }
  }
}
?>