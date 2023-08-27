<?php
class ClienteProveedorRealizaPuja extends Database
{
  private $puja;
  private $clienteProveedor;

  public function insert($idPuja, $idClienteProveedor)
  {
    $this->query("INSERT INTO cliente_proveedor_realiza_puja (puja,cliente_proveedor) VALUES (:idPuja,:idClienteProveedor)", [
      'idPuja' => $idPuja,
      'idClienteProveedor' => $idClienteProveedor
    ]);
  }

  public function getById($idPuja)
  {
    return $this->query("SELECT * FROM cliente_proveedor_realiza_puja WHERE puja = :idPuja", [
      'idPuja' => $idPuja
    ])->find();
  }

  public function getAll()
  {
    return $this->query("SELECT * FROM cliente_proveedor_realiza_puja")->get();
  }
}
?>