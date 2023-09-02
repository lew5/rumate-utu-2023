<?php
header("Content-Type: application/json");
$_POST = json_decode(file_get_contents("php://input"), true);
if (isset($_POST['Animal'])) {
  $animal = App::resolve("Animal");
  $animal->setIdClienteProveedorAnimal($_POST['Animal']['idClienteProveedorAnimal']);
  $animal->setIdLoteAnimal($_POST['Animal']['idLoteAnimal']);
  $animal->setSexoAnimal($_POST['Animal']['sexoAnimal']);
  $animal->setRazaAnimal($_POST['Animal']['razaAnimal']);
  $animal->setEdadAnimal($_POST['Animal']['edadAnimal']);
  $animal->setPesoAnimal($_POST['Animal']['pesoAnimal']);
  $animal->setEspecieAnimal($_POST['Animal']['especieAnimal']);
  $animal->insert();
}
?>