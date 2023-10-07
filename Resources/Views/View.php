<?php

class View
{
  protected $data = [];

  public function assign($key, $value)
  {
    $this->data[$key] = $value;
  }

  public function render($template)
  {
    if (file_exists($template)) {
      extract($this->data);
      require $template;
    } else {
      throw new Exception("Archivo de Vista no encontrado: $template");
    }
  }
}