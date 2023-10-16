<?php

class PersonaRepository implements IRepositoryInterface
{
  private $_db;
  public function find($id)
  {
    $this->_db = DataBase::get();
    try {
      $result = null;

      $stm = $this->_db->prepare(
        "SELECT * FROM personas
        WHERE id_persona = :id"
      );
      $stm->execute([
        'id' => $id
      ]);

      $data = $stm->fetchObject("Persona");

      if ($data) {
        $result = $data;
      }
    } catch (PDOException $e) {
      var_dump($e);
    } finally {
      $this->_db = null;
    }
    return $result;
  }
  public function findAll()
  {
    $this->_db = DataBase::get();
    $result = [];
    try {
      $stm = $this->_db->prepare("SELECT * FROM personas");
      $stm->execute();
      $result = $stm->fetchAll(PDO::FETCH_CLASS, "Persona");
    } catch (PDOException $e) {
      var_dump($e);
    } finally {
      $this->_db = null;
    }
    return $result;
  }
  public function create($personaModel)
  {
    $this->_db = DataBase::get();
    $stm = $this->_db->prepare(
      "INSERT INTO PERSONAS (
        nombre_persona, 
        apellido_persona, 
        ci_persona, 
        barrio_persona, 
        calle_persona, 
        numero_persona, 
        telefono_persona, 
        estado_persona
        ) 
      VALUES (
        :nombre, 
        :apellido, 
        :ci, 
        :barrio, 
        :calle, 
        :numero, 
        :telefono, 
        :estado
        )"
    );
    $stm->execute([
      'nombre' => $personaModel->getNombre(),
      'apellido' => $personaModel->getApellido(),
      'ci' => $personaModel->getCi(),
      'barrio' => $personaModel->getBarrio(),
      'calle' => $personaModel->getCalle(),
      'numero' => $personaModel->getNumero(),
      'telefono' => $personaModel->getTelefono(),
      'estado' => $personaModel->getEstado()
    ]);
    $this->_db = null;
  }
  public function update($model)
  {
    // HAY QUE HACER UN UPDATE GENÉRICO
    // ALGO COMO ESTO 
    // protected function update($id, $column_id, $data)
    // {
    //   $columns = [];
    //   foreach ($data as $column => $value) {
    //     $columns[] = "$column = ?";
    //   }
    //   $columns = implode(', ', $columns);

    //   $query = "UPDATE {$this->table} SET {$columns} WHERE $column_id = ?";
    //   $data["$column_id"] = $id;

    //   $statement = $this->db->query($query, array_values($data));
    //   $rowCount = $statement->rowCount();
    //   if ($rowCount > 0) {
    //     return true;
    //   } else {
    //     return false;
    //   }
    // }
  }
  public function delete($id)
  {
    $this->_db = DataBase::get();
    $stm = $this->_db->prepare(
      "DELETE FROM personas WHERE id_persona = :id"
    );
    $stm->execute([
      'id' => $id
    ]);
    $this->_db = null;
    return $stm;
  }
}

?>