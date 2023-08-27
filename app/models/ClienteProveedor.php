<?php
class ClienteProveedor extends Database
{
  private $id;
  private $estado;

  public function insert($idClienteProveedor, $estado)
  {
    $this->query("INSERT INTO cliente_proveedor (id,estado) VALUES (:idClienteProveedor,:estado)", [
      'idClienteProveedor' => $idClienteProveedor,
      'estado' => $estado
    ]);
  }

  public function delete($idClienteProveedor)
  {
    $this->query("DELETE FROM cliente_proveedor WHERE id = :idEmpleado", [
      'idClienteProveedor' => $idClienteProveedor
    ]);
  }

  public function update($idClienteProveedor, $estado)
  {
    $this->query("UPDATE cliente_proveedor SET estado = '$estado' WHERE id = :idClienteProveedor", [
      'idClienteProveedor' => $idClienteProveedor
    ]);
  }

  public function getById($idClienteProveedor)
  {
    return $this->query("SELECT * FROM cliente_proveedor WHERE id = :idClienteProveedor", [
      'idClienteProveedor' => $idClienteProveedor
    ])->find();
  }

  public function getAll()
  {
    return $this->query("SELECT * FROM cliente_proveedor")->get();
  }
}
?>