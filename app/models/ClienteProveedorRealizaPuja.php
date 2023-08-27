<?php
/**
 * La clase ClienteProveedorRealizaPuja se encarga de gestionar las relaciones entre pujas y clientes/proveedores en la base de datos.
 */
class ClienteProveedorRealizaPuja extends Database
{
  /**
   * @var int $puja ID de la puja realizada por el cliente/proveedor.
   * @var int $clienteProveedor ID del cliente/proveedor que realiza la puja.
   */

  private $puja;
  private $clienteProveedor;

  /**
   * Inserta un nuevo registro que relaciona una puja con un cliente/proveedor en la base de datos.
   *
   * @param int $idPuja ID de la puja a relacionar.
   * @param int $idClienteProveedor ID del cliente/proveedor que realiza la puja.
   * @return void
   */
  public function insert($idPuja, $idClienteProveedor)
  {
    $this->query("INSERT INTO cliente_proveedor_realiza_puja (puja, cliente_proveedor) VALUES (:idPuja, :idClienteProveedor)", [
      'idPuja' => $idPuja,
      'idClienteProveedor' => $idClienteProveedor
    ]);
  }

  /**
   * Obtiene la relación entre una puja y un cliente/proveedor según el ID de la puja.
   *
   * @param int $idPuja ID de la puja para buscar la relación.
   * @return array|null Registro que contiene la relación o null si no se encuentra.
   */
  public function getById($idPuja)
  {
    return $this->query("SELECT * FROM cliente_proveedor_realiza_puja WHERE puja = :idPuja", [
      'idPuja' => $idPuja
    ])->find();
  }

  /**
   * Obtiene todas las relaciones entre pujas y clientes/proveedores de la base de datos.
   *
   * @return array Conjunto de registros que contienen las relaciones entre pujas y clientes/proveedores.
   */
  public function getAll()
  {
    return $this->query("SELECT * FROM cliente_proveedor_realiza_puja")->get();
  }
}
?>