<?php

interface IServiceInterface
{
  public function getById($id);
  public function getAll();
  public function create($model);
  public function update($model);
  public function delete($id);
}