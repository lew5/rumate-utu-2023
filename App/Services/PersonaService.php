<?php
class PersonaService
{
  private $personaRepository;
  private $usuarioService;

  public function __construct()
  {
    $this->personaRepository = Container::resolve(PersonaRepository::class);
    $this->usuarioService = Container::resolve(UsuarioService::class);
  }

  /**
   * Crea una nueva persona en la base de datos.
   *
   * @param $PersonaModel $personaModel Modelo de datos de persona a crear.
   * @return int ID de la persona creada.
   */
  public function createPersona($personaModel)
  {
    $personaToAssocArray = $this->personaToAssocArray($personaModel);
    $this->personaRepository->addPersona($personaToAssocArray);
    return $this->personaRepository->lastInsertId();
  }

  /**
   * Obtiene todas las personas de la base de datos.
   *
   * @return array Arreglo de objetos de personas.
   */
  public function getPersona()
  {
    return $this->personaRepository->find();
  }

  /**
   * Obtiene una persona por su ID.
   *
   * @param int $id ID de la persona.
   * @return Persona Objeto de persona encontrado o null si no se encuentra.
   */
  public function getPersonaById($id)
  {
    return $this->personaRepository->findById($id);
  }

  /**
   * Obtiene personas con el tipo "PROVEEDOR" junto con sus usuarios asociados.
   *
   * @return array Arreglo de objetos de personas con tipo "PROVEEDOR" y sus usuarios asociados.
   */
  public function getPersonasConTipoProveedor()
  {
    $usuariosProveedor = $this->usuarioService->getUsuariosByTipo("PROVEEDOR");
    $personasConTipoProveedor = [];
    if ($usuariosProveedor) {
      foreach ($usuariosProveedor as $usuario) {
        $persona = $this->usuarioService->getPersonaByUsuarioId($usuario->getId());

        if ($persona) {
          $persona->setUsuario($usuario);
          $personasConTipoProveedor[] = $persona;
        }
      }
    }
    return $personasConTipoProveedor;
  }

  /**
   * Obtiene personas con el tipo "CLIENTE" junto con sus usuarios asociados.
   *
   * @return array Arreglo de objetos de personas con tipo "CLIENTE" y sus usuarios asociados.
   */
  public function getPersonasConTipoCliente()
  {
    $usuariosCliente = $this->usuarioService->getUsuariosByTipo("CLIENTE");

    $personasConTipoCliente = [];
    if ($usuariosCliente) {
      foreach ($usuariosCliente as $usuario) {
        $persona = $this->usuarioService->getPersonaByUsuarioId($usuario->getId());

        if ($persona) {
          $persona->setUsuario($usuario);
          $personasConTipoCliente[] = $persona;
        }
      }
    }
    return $personasConTipoCliente;
  }

  /**
   * Actualiza los datos de una persona en la base de datos.
   *
   * @param int $id ID de la persona a actualizar.
   * @param array $data Arreglo asociativo de datos de persona a actualizar.
   */
  public function updatePersona($id, $data)
  {
    $this->personaRepository->updatePersona($id, $data);
  }

  /**
   * Elimina una persona de la base de datos.
   *
   * @param int $id ID de la persona a eliminar.
   */
  public function deletePersona($id)
  {
    $this->personaRepository->deletePersona($id);
  }

  /**
   * Convierte un objeto de tipo PersonaModel a un arreglo asociativo de datos.
   *
   * @param $PersonaModel $personaModel Modelo de datos de persona.
   * @return array Arreglo asociativo de datos de persona.
   */
  private function personaToAssocArray($personaModel)
  {
    return [
      "nombre_persona" => $personaModel->getNombre(),
      "apellido_persona" => $personaModel->getApellido(),
      "ci_persona" => $personaModel->getCi(),
      "barrio_persona" => $personaModel->getBarrio(),
      "calle_persona" => $personaModel->getCalle(),
      "numero_persona" => $personaModel->getNumero(),
      "telefono_persona" => $personaModel->getTelefono()
    ];
  }
}

?>