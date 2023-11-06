<?php

/**
 * Clase para el manejo y procesamiento de imágenes.
 */
class Imagen
{
  /**
   * Guarda una imagen en el servidor con redimensionamiento opcional.
   *
   * @param array $file      El archivo de imagen a guardar.
   * @param string $filename El nombre del archivo de imagen resultante.
   * @param string $folder   La carpeta de destino en la que se guardará la imagen.
   * @return string|false     El nombre del archivo guardado o `false` en caso de error.
   */
  public static function guardarImagen($file, $filename, $folder)
  {
    $uploaded_file = $file['tmp_name'];
    $upl_img_properties = getimagesize($uploaded_file);
    $new_file_name = $filename;
    $folder_path = BASE_PATH . "/public/imgs/$folder/";
    $image_type = $upl_img_properties[2];

    switch ($image_type) {
      // Procesa imágenes PNG
      case IMAGETYPE_PNG:
        $image_type_id = imagecreatefrompng($uploaded_file);
        $target_layer = self::image_resize($image_type_id, $upl_img_properties[0], $upl_img_properties[1]);
        imagepng($target_layer, $folder_path . $new_file_name);
        return $new_file_name;
      // Procesa imágenes JPEG
      case IMAGETYPE_JPEG:
        $image_type_id = imagecreatefromjpeg($uploaded_file);
        $target_layer = self::image_resize($image_type_id, $upl_img_properties[0], $upl_img_properties[1]);
        imagejpeg($target_layer, $folder_path . $new_file_name);
        return $new_file_name;
      // Tipo de imagen no admitido
      default:
        return false;
    }
  }

  /**
   * Redimensiona una imagen a las dimensiones especificadas.
   *
   * @param resource $image_type_id Identificador de la imagen a redimensionar.
   * @param int $img_width          Ancho de la imagen original.
   * @param int $img_height         Alto de la imagen original.
   * @return resource               Identificador de la imagen redimensionada.
   */
  private static function image_resize($image_type_id, $img_width, $img_height)
  {
    $target_width = 120;
    $target_height = 120;
    $target_layer = imagecreatetruecolor($target_width, $target_height);
    imagecopyresampled($target_layer, $image_type_id, 0, 0, 0, 0, $target_width, $target_height, $img_width, $img_height);
    return $target_layer;
  }

  /**
   * Genera un nombre único para un archivo de imagen basado en la fecha y la extensión del archivo original.
   *
   * @param array $file El archivo de imagen original.
   * @return string     El nombre de archivo único generado.
   */
  public static function generarNombre($file)
  {
    $img_ext = pathinfo($file['name'], PATHINFO_EXTENSION);
    return date("YmdHis") . "." . $img_ext;
  }
}

?>