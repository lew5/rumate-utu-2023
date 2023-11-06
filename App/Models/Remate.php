<?php
/**
 * Clase Remate
 *
 * La clase `Remate` representa una entidad en la aplicación que almacena información sobre remates. Se utiliza para gestionar detalles como el identificador, título, imagen, fechas de inicio y finalización, estado y una colección de lotes asociados a un remate.
 */
class Remate
{
  /**
   * @var int El atributo `$id_remate` almacena el identificador único del remate.
   */
  private $id_remate;

  /**
   * @var string El atributo `$titulo_remate` guarda el título del remate.
   */
  private $titulo_remate;

  /**
   * @var string El atributo `$imagen_remate` almacena la imagen asociada al remate.
   */
  private $imagen_remate;

  /**
   * @var string El atributo `$fecha_inicio_remate` guarda la fecha de inicio del remate.
   */
  private $fecha_inicio_remate;

  /**
   * @var string El atributo `$fecha_final_remate` almacena la fecha de finalización del remate.
   */
  private $fecha_final_remate;

  /**
   * @var string El atributo `$estado_remate` representa el estado del remate, inicializado en "Pendiente".
   */
  private $estado_remate = "Pendiente";

  /**
   * @var array El atributo `$lotes` almacena una colección de lotes asociados a un remate.
   */
  private $lotes = [];

  public function getId()
  {
    return $this->id_remate;
  }

  public function setId($id)
  {
    $this->id_remate = $id;
  }

  public function getTitulo()
  {
    return $this->titulo_remate;
  }

  public function setTitulo($titulo)
  {
    $this->titulo_remate = $titulo;
  }

  public function getImagen()
  {
    return $this->imagen_remate;
  }

  public function setImagen($imagen)
  {
    $this->imagen_remate = $imagen;
  }

  public function getFechaInicio()
  {
    return $this->fecha_inicio_remate;
  }

  public function setFechaInicio($fechaInicio)
  {
    $this->fecha_inicio_remate = $fechaInicio;
  }

  public function getFechaFinal()
  {
    return $this->fecha_final_remate;
  }

  public function setFechaFinal($fechaFinal)
  {
    $this->fecha_final_remate = $fechaFinal;
  }

  public function getEstado()
  {
    return $this->estado_remate;
  }

  public function setEstado($estado)
  {
    $this->estado_remate = $estado;
  }

  public function getLotes()
  {
    return $this->lotes;
  }

  public function setLotes($lote)
  {
    $this->lotes = $lote;
  }
}

?>