<?php

class Imagen
{
  public static function guardarImagen($file, $filename, $folder)
  {
    $uploaded_file = $file['tmp_name'];
    $upl_img_properties = getimagesize($uploaded_file);
    $new_file_name = $filename;
    $folder_path = BASE_PATH . "/public/imgs/$folder/";
    $image_type = $upl_img_properties[2];
    switch ($image_type) {
      //PNG Image
      case IMAGETYPE_PNG:
        $image_type_id = imagecreatefrompng($uploaded_file);
        $target_layer = self::image_resize($image_type_id, $upl_img_properties[0], $upl_img_properties[1]);
        imagepng($target_layer, $folder_path . $new_file_name);
        return $new_file_name;
      //JPEG Image
      case IMAGETYPE_JPEG:
        $image_type_id = imagecreatefromjpeg($uploaded_file);
        $target_layer = self::image_resize($image_type_id, $upl_img_properties[0], $upl_img_properties[1]);
        imagejpeg($target_layer, $folder_path . $new_file_name);
        return $new_file_name;
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

  public static function generarNombre($file)
  {
    $img_ext = pathinfo($file['name'], PATHINFO_EXTENSION);
    return date("YmdHis") . "." . $img_ext;
  }
}

?>