<?php

class PersonaModel extends UsuarioModel
{
  protected $id;
  protected $nombre;
  protected $apellido;
  protected $ci;
  protected $barrio;
  protected $calle;
  protected $numero;
  protected $telefono;
  protected $tipo;
  private $tabla = "personas";
  public function __construct()
  {
    parent::__construct();
  }

  #region //* FUNCIONA 🟢
  public function getPersonas()
  {
    return $this->all($this->tabla);
  }

  public function getPersona($id)
  {
    return $this->find($this->tabla, $id, "id_persona");
  }

  #endregion

  //! HAY BORRAR TODO ESTO PARA QUE LAS FUNCIONES NO RETORNEN UN OBJETO PERSONA
  // public function borrarPersona($id) // 🟡 //!Cannot delete or update a parent row: a foreign key constraint fails
  // {
  //   return $this->delete($id, "id_persona");
  // }
  // public function actualizarPersona($id, $data)
  // {
  //   return $this->update($id, "id_persona", $data);
  // }
  // public function crearPersona($data)
  // {
  //   try {
  //     return $this->create($data);
  //   } catch (PDOException $e) {
  //     if ($e->getCode() == 1062) {
  //       return false;
  //     } else {
  //       return "Esa persona ya existe";
  //     }
  //   }
  // }

  // private function rellenarPersona($per)
  // {
  //   $persona = Container::resolve(
  //     Persona::class,
  //     $per['id_persona'],
  //     $per['nombre_persona'],
  //     $per['apellido_persona'],
  //     $per['ci_persona'],
  //     $per['barrio_persona'],
  //     $per['calle_persona'],
  //     $per['numero_persona'],
  //     $per['telefono_persona']
  //   );
  //   return $persona;
  // }


  //* SETTERS Y GETTERS
  public function getId()
  {
    return $this->id;
  }

  public function setId($id)
  {
    $this->id = $id;
  }

  public function getNombre()
  {
    return $this->nombre;
  }

  public function setNombre($nombre)
  {
    $this->nombre = $nombre;
  }

  public function getApellido()
  {
    return $this->apellido;
  }

  public function setApellido($apellido)
  {
    $this->apellido = $apellido;
  }

  public function getTelefono()
  {
    return $this->telefono;
  }

  public function setTelefono($telefono)
  {
    $this->telefono = $telefono;
  }

  public function getBarrio()
  {
    return $this->barrio;
  }

  public function setBarrio($barrio)
  {
    $this->barrio = $barrio;
  }

  public function getCalle()
  {
    return $this->calle;
  }

  public function setCalle($calle)
  {
    $this->calle = $calle;
  }

  public function getNumero()
  {
    return $this->numero;
  }

  public function setNumero($numero)
  {
    $this->numero = $numero;
  }

  public function getTipo()
  {
    return $this->tipo;
  }

  public function setTipo($tipo)
  {
    $this->tipo = $tipo;
  }

  public function getCi()
  {
    return $this->ci;
  }

  public function setCi($ci)
  {
    $this->ci = $ci;
  }
}

?>