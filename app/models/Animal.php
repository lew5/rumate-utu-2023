<?php
/**
 * La clase Animal se encarga de gestionar la información de animales en la base de datos.
 */
class Animal extends Database
{
  /**
   * @var int $idAnimal Identificador único del animal.
   */
  private $idAnimal;

  /**
   * @var int $idClienteProveedorAnimal Identificador del cliente o proveedor asociado al animal.
   */
  private $idClienteProveedorAnimal;

  /**
   * @var int $idLoteAnimal Identificador del lote asociado al animal.
   */
  private $idLoteAnimal;

  /**
   * @var string $sexoAnimal Sexo del animal (por ejemplo, "macho" o "hembra").
   */
  private $sexoAnimal;

  /**
   * @var string $razaAnimal Raza del animal.
   */
  private $razaAnimal;

  /**
   * @var int $edadAnimal Edad del animal en meses.
   */
  private $edadAnimal;

  /**
   * @var float $pesoAnimal Peso del animal en kilogramos.
   */
  private $pesoAnimal;

  /**
   * @var string $especieAnimal Especie del animal (por ejemplo, "bovino" o "porcino").
   */
  private $especieAnimal;

  /**
   * Inserta un nuevo registro de animal en la base de datos.
   */
  public function insert()
  {
    $this->query("INSERT INTO animales (idClienteProveedor_animal, idLote_animal, sexoAnimal, razaAnimal, edadAnimal, pesoAnimal, especieAnimal) VALUES (:idClienteProveedorAnimal, :idLoteAnimal, :sexoAnimal, :razaAnimal, :edadAnimal, :pesoAnimal, :especieAnimal)", [
      'idClienteProveedorAnimal' => $this->idClienteProveedorAnimal,
      'idLoteAnimal' => $this->idLoteAnimal,
      'sexoAnimal' => $this->sexoAnimal,
      'razaAnimal' => $this->razaAnimal,
      'edadAnimal' => $this->edadAnimal,
      'pesoAnimal' => $this->pesoAnimal,
      'especieAnimal' => $this->especieAnimal
    ]);
  }

  /**
   * Elimina un registro de animal de la base de datos.
   *
   * @param int $idAnimal Identificador único del animal a eliminar.
   */
  public function delete($idAnimal)
  {
    $this->query("DELETE FROM animales WHERE idAnimal = :idAnimal", [
      'idAnimal' => $idAnimal
    ]);
  }

  /**
   * Actualiza la información de un animal en la base de datos.
   *
   * @param int $idAnimal Identificador único del animal a actualizar.
   * @param array $animalActualizado Array con los nuevos datos del animal.
   */
  public function update($idAnimal, $animalActualizado)
  {
    $this->query("UPDATE animales SET 
    idClienteProveedor_animal = :idClienteProveedorAnimal,
    idLote_animal = :idLoteAnimal, 
    sexoAnimal = :sexoAnimal, 
    razaAnimal = :razaAnimal, 
    edadAnimal = :edadAnimal, 
    pesoAnimal = :pesoAnimal, 
    especieAnimal = :especieAnimal  
    WHERE idAnimal = :idAnimal", [
      'idClienteProveedorAnimal' => $animalActualizado['idClienteProveedorAnimal'],
      'idLoteAnimal' => $animalActualizado['idLoteAnimal'],
      'sexoAnimal' => $animalActualizado['sexoAnimal'],
      'razaAnimal' => $animalActualizado['razaAnimal'],
      'edadAnimal' => $animalActualizado['edadAnimal'],
      'pesoAnimal' => $animalActualizado['pesoAnimal'],
      'especieAnimal' => $animalActualizado['especieAnimal'],
      'idAnimal' => $idAnimal
    ]);
  }

  /**
   * Obtiene un registro de animal por su identificador único.
   *
   * @param int $idAnimal Identificador único del animal.
   * @return array|null El registro de animal encontrado o null si no se encuentra.
   */
  public function getById($idAnimal)
  {
    return $this->query("SELECT * FROM animales WHERE idAnimal = :idAnimal", [
      'idAnimal' => $idAnimal
    ])->find();
  }

  /**
   * Obtiene todos los registros de animales de la base de datos.
   *
   * @return array Conjunto de registros de animales.
   */
  public function getAll()
  {
    return $this->query("SELECT * FROM animales")->get();
  }


  public function getIdAnimal()
  {
    return $this->idAnimal;
  }

  public function setIdClienteProveedorAnimal($idClienteProveedorAnimal)
  {
    $this->idClienteProveedorAnimal = $idClienteProveedorAnimal;
  }

  public function getIdClienteProveedorAnimal()
  {
    return $this->idClienteProveedorAnimal;
  }

  public function setIdLoteAnimal($idLoteAnimal)
  {
    $this->idLoteAnimal = $idLoteAnimal;
  }

  public function getIdLoteAnimal()
  {
    return $this->idLoteAnimal;
  }

  public function setSexoAnimal($sexoAnimal)
  {
    $this->sexoAnimal = $sexoAnimal;
  }

  public function getSexoAnimal()
  {
    return $this->sexoAnimal;
  }

  public function setRazaAnimal($razaAnimal)
  {
    $this->razaAnimal = $razaAnimal;
  }

  public function getRazaAnimal()
  {
    return $this->razaAnimal;
  }

  public function setEdadAnimal($edadAnimal)
  {
    $this->edadAnimal = $edadAnimal;
  }

  public function getEdadAnimal()
  {
    return $this->edadAnimal;
  }

  public function setPesoAnimal($pesoAnimal)
  {
    $this->pesoAnimal = $pesoAnimal;
  }

  public function getPesoAnimal()
  {
    return $this->pesoAnimal;
  }

  public function setEspecieAnimal($especieAnimal)
  {
    $this->especieAnimal = $especieAnimal;
  }

  public function getEspecieAnimal()
  {
    return $this->especieAnimal;
  }
}


?>