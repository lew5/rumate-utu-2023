<?php

class GuardarImagen
{
  public static function guardarImagen($file)
  {
    $uploaded_file = $file['tmp_name'];
    $upl_img_properties = getimagesize($uploaded_file);
    $new_file_name = self::generarNombre();
    $folder_path = BASE_PATH . "/public/imgs/remate/";
    $img_ext = pathinfo($file['name'], PATHINFO_EXTENSION);
    $image_type = $upl_img_properties[2];
    switch ($image_type) {
      //PNG Image
      case IMAGETYPE_PNG:
        $image_type_id = imagecreatefrompng($uploaded_file);
        $target_layer = self::image_resize($image_type_id, $upl_img_properties[0], $upl_img_properties[1]);
        imagepng($target_layer, $folder_path . $new_file_name . "." . $img_ext);
        return $new_file_name . "." . $img_ext;
      //JPEG Image
      case IMAGETYPE_JPEG:
        $image_type_id = imagecreatefromjpeg($uploaded_file);
        $target_layer = self::image_resize($image_type_id, $upl_img_properties[0], $upl_img_properties[1]);
        imagejpeg($target_layer, $folder_path . $new_file_name . "." . $img_ext);
        return $new_file_name . "." . $img_ext;
      default:
        return false;
    }
  }

  private static function image_resize($image_type_id, $img_width, $img_height)
  {

    $target_width = 120;
    $target_height = 120;
    $target_layer = imagecreatetruecolor($target_width, $target_height);
    imagecopyresampled($target_layer, $image_type_id, 0, 0, 0, 0, $target_width, $target_height, $img_width, $img_height);
    return $target_layer;
  }

  private static function generarNombre()
  {
    // Genera un nombre único basado en la fecha y hora actual
    return date("YmdHis");
  }
}

?>