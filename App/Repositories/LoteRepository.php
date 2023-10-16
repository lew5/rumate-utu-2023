<?php

class LoteRepository implements IRepositoryInterface
{
  private $_db;

  // OBTENER UN LOTE
  public function find($id)
  {
    $this->_db = DataBase::get();
    $result = null;

    try {

      $stm = $this->_db->prepare(
        "SELECT * FROM lotes
        WHERE id_lote = :id"
      );
      $stm->execute([
        'id' => $id
      ]);

      $data = $stm->fetchObject("Lote");

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

  // OBTENER TODOS LOS LOTES
  public function findAll()
  {
    $this->_db = DataBase::get();
    $result = [];
    try {
      $stm = $this->_db->prepare("SELECT * FROM lotes");
      $stm->execute();

      $result = $stm->fetchAll(PDO::FETCH_CLASS, "Lote");
    } catch (PDOException $e) {
      var_dump($e);
    } finally {
      $this->_db = null;
    }
    return $result;
  }

  // CREAR UN LOTE  
  public function create($loteModel)
  {
    $this->_db = DataBase::get();
    $lastInsertId = null;
    $stm = $this->_db->prepare(
      "INSERT INTO lotes (
          imagen_lote,
          precio_base_lote,
          mejor_oferta_lote,
          id_proveedor_lote,
          id_ficha_lote,
          id_categoria_lote
          ) 
        VALUES (
          :imagen,
          :precioBase,
          :mejorOferta,
          :idProveedor,
          :idFicha,
          :idCategoria
          )"
    );
    $stm->execute([
      'imagen' => $loteModel->getImagen(),
      'precioBase' => $loteModel->getPrecioBase(),
      'mejorOferta' => $loteModel->getPrecioBase(),
      'idProveedor' => $loteModel->getIdProveedor(),
      'idFicha' => $loteModel->getIdFicha(),
      'idCategoria' => $loteModel->getIdCategoria()
    ]);
    $lastInsertId = $this->_db->lastInsertId();
    $this->_db = null;

    return $lastInsertId;
  }

  // ACTUALIZAR UN LOTE
  public function update($loteModel)
  {
    $this->_db = DataBase::get();
    try {
      $stm = $this->_db->prepare(
        "UPDATE lotes
        SET 
          imagen_lote = :imagen,
          precio_base_lote = :precio,
          id_proveedor_lote = :idProveedor,
          id_categoria_lote = :idCategoria
        WHERE id_lote = :id"
      );
      $stm->execute([
        'id' => $loteModel->getId(),
        'imagen' => $loteModel->getImagen(),
        'precio' => $loteModel->getPrecioBase(),
        'idProveedor' => $loteModel->getIdProveedor(),
        'idCategoria' => $loteModel->getIdCategoria()
      ]);
    } catch (PDOException $e) {
      var_dump($e);
    } finally {
      $this->_db = null;
    }
  }
  // ELIMINAR UN LOTE
  public function delete($idLote)
  {
    $this->_db = DataBase::get();
    $stm = $this->_db->prepare(
      "DELETE FROM lotes WHERE id_lote = :id"
    );
    $stm->execute([
      'id' => $idLote
    ]);
    $this->_db = null;
    return $stm;
  }
}
?>