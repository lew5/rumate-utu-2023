<?php

interface IRepositoryInterface
{
  public function find($id);
  public function findAll();
  public function create($model);
  public function update($model);
  public function delete($id);
}

?>