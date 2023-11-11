<?php
/**
 * Clase UsuarioRepository
 *
 * Esta clase extiende la clase Repository y proporciona métodos específicos para interactuar con la tabla de usuarios en la base de datos.
 */
class UsuarioRepository extends Repository
{
  /**
   * Constructor de la clase UsuarioRepository.
   */
  public function __construct()
  {
    parent::__construct("usuarios", "id_usuario", "Usuario");
  }

  /**
   * Recupera todos los usuarios de la base de datos.
   *
   * @return mixed|null Devuelve una lista de objetos que representan todos los usuarios o null si no se encontraron usuarios.
   */
  public function find()
  {
    return $this->read();
  }

  /**
   * Busca un usuario por su ID en la base de datos.
   *
   * @param mixed $id El ID del usuario que se desea buscar.
   * @return mixed|null Devuelve un objeto que representa el usuario encontrado o null si no se encontró ningún usuario con el ID especificado.
   */
  public function findById($id)
  {
    return $this->read(
      [
        "$this->idColumn" => $id
      ]
    );
  }

  /**
   * Busca un usuario por su nombre de usuario en la base de datos.
   *
   * @param string $username El nombre de usuario que se desea buscar.
   * @return mixed|null Devuelve un objeto que representa el usuario encontrado por nombre de usuario o null si no se encontró ningún usuario con el nombre de usuario especificado.
   */
  public function findByUsername($username)
  {
    return $this->read(
      [
        'username_usuario' => $username
      ]
    );
  }

  /**
   * Busca usuarios por tipo en la base de datos.
   *
   * @param string $tipo El tipo de usuario que se desea buscar.
   * @return mixed|null Devuelve una lista de objetos que representan los usuarios encontrados por tipo o null si no se encontraron usuarios con el tipo especificado.
   */
  public function findByTipo($tipo)
  {
    return $this->read(
      [
        'tipo_usuario' => $tipo
      ]
    );
  }

  /**
   * Agrega un nuevo usuario a la base de datos.
   *
   * @param array $data Un arreglo asociativo que contiene los datos del nuevo usuario.
   */
  public function addUsuario($data)
  {
    $this->create($data);
  }

  /**
   * Actualiza un usuario existente en la base de datos.
   *
   * @param mixed $id El ID del usuario que se va a actualizar.
   * @param array $data Un arreglo asociativo que contiene los datos actualizados del usuario.
   */
  public function updateUsuario($id, $data)
  {
    $this->update($id, $data);
  }

  /**
   * Elimina un usuario de la base de datos.
   *
   * @param mixed $id El ID del usuario que se va a eliminar.
   */
  public function deleteUsuario($id)
  {
    $this->delete($id);
  }
}
?>