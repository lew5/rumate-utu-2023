<?php

interface IUsuarioServiceInterface
{
  public function getByUsername($username);
  public function getAll();
  public function create($model);
  public function update($model);
  public function delete($username);
}