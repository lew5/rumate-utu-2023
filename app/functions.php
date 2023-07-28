<?php

function vd($value)
{
  var_dump($value);
  die();
}


function authorize($condition, $status = Response::FORBIDDEN)
{
  return (!$condition) ?? abort();
}

?>