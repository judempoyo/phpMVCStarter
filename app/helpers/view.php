<?php 
function view($path, $data = [])
{
  extract($data);
  require dirname(__DIR__) . "/Views/$path.php";
}