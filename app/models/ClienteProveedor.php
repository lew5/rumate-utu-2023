<?php
/**
 * La clase ClienteProveedor realiza operaciones CRUD en la tabla cliente_proveedor.
 */
class ClienteProveedor extends Database
{
  /**
   * @var int $id ID del cliente/proveedor.
   * @var string $estado Estado del cliente/proveedor.
   */

  private $id;
  private $estado;

  /**
   * Inserta un nuevo registro de cliente/proveedor en la base de datos.
   *
   * @param int $idClienteProveedor ID del cliente/proveedor a insertar.
   * @param string $estado Estado del cliente/proveedor a insertar.
   * @return void
   */
  public function insert($idClienteProveedor, $estado)
  {
    $this->query("INSERT INTO cliente_proveedor (id, estado) VALUES (:idClienteProveedor, :estado)", [
      'idClienteProveedor' => $idClienteProveedor,
      'estado' => $estado
    ]);
  }

  /**
   * Elimina un registro de cliente/proveedor de la base de datos.
   *
   * @param int $idClienteProveedor ID del cliente/proveedor a eliminar.
   * @return void
   */
  public function delete($idClienteProveedor)
  {
    $this->query("DELETE FROM cliente_proveedor WHERE id = :idClienteProveedor", [
      'idClienteProveedor' => $idClienteProveedor
    ]);
  }

  /**
   * Actualiza el estado de un registro de cliente/proveedor en la base de datos.
   *
   * @param int $idClienteProveedor ID del cliente/proveedor a actualizar.
   * @param string $estado Nuevo estado del cliente/proveedor.
   * @return void
   */
  public function update($idClienteProveedor, $estado)
  {
    $this->query("UPDATE cliente_proveedor SET estado = '$estado' WHERE id = :idClienteProveedor", [
      'idClienteProveedor' => $idClienteProveedor
    ]);
  }

  /**
   * Obtiene un registro de cliente/proveedor por su ID.
   *
   * @param int $idClienteProveedor ID del cliente/proveedor a buscar.
   * @return array|null Registro del cliente/proveedor encontrado o null si no se encuentra.
   */
  public function getById($idClienteProveedor)
  {
    return $this->query("SELECT * FROM cliente_proveedor WHERE id = :idClienteProveedor", [
      'idClienteProveedor' => $idClienteProveedor
    ])->find();
  }

  /**
   * Obtiene todos los registros de clientes/proveedores de la base de datos.
   *
   * @return array Conjunto de registros de clientes/proveedores.
   */
  public function getAll()
  {
    return $this->query("SELECT * FROM cliente_proveedor")->get();
  }
}
?>