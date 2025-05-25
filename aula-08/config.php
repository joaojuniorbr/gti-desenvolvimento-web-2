<?php

$database['server'] = 'localhost';
$database['user'] = 'joaojunior';
$database['password'] = 'teste@123';
$database['database'] = 'ifprweb';

mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);

try {
  $mysqli = new mysqli($database['server'], $database['user'], $database['password'], $database['database']);
  $mysqli->set_charset("utf8mb4");
} catch (Exception $e) {
  error_log($e->getMessage());
  print_r($e);
  exit('Erro ao conectar ao banco de dados');
}
