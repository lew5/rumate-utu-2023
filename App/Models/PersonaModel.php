<?php

class PersonaModel extends Model
{

  public function __construct()
  {
    parent::__construct();
    $this->table = "personas";
  }

  public function obtenerTodasLasPersonas()
  {
    $todasLasPersonas = $this->all();
    if ($todasLasPersonas) {
      $personas = [];
      foreach ($todasLasPersonas as $per) {
        $personas[] = self::rellenarPersona($per);
      }
    }
    return $personas;
  }

  //! HAY BORRAR TODO ESTO PARA QUE LAS FUNCIONES NO RETORNEN UN OBJETO PERSONA





  public function obtenerPersona($id)
  {
    $per = $this->find($id, "id_persona");
    if ($per) {
      return self::rellenarPersona($per);
    } else {
      return $per;
    }
  }
  public function borrarPersona($id) // 🟡 //!Cannot delete or update a parent row: a foreign key constraint fails
  {
    return $this->delete($id, "id_persona");
  }
  public function actualizarPersona($id, $data)
  {
    return $this->update($id, "id_persona", $data);
  }
  public function crearPersona($data)
  {
    try {
      return $this->create($data);
    } catch (PDOException $e) {
      if ($e->getCode() == 1062) {
        return false;
      } else {
        return "Esa persona ya existe";
      }
    }
  }

  private function rellenarPersona($per)
  {
    $persona = Container::resolve(
      Persona::class,
      $per['id_persona'],
      $per['nombre_persona'],
      $per['apellido_persona'],
      $per['ci_persona'],
      $per['barrio_persona'],
      $per['calle_persona'],
      $per['numero_persona'],
      $per['telefono_persona']
    );
    return $persona;
  }
}

?>