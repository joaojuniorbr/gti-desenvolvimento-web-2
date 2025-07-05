<?php

require_once __DIR__ . '/env.php';

loadEnv();

$database['server'] = getenv('MYSQL_HOST') ?? 'localhost';
$database['user'] = getenv('MYSQL_USER') ?? 'joaojunior';
$database['password'] = getenv('MYSQL_PASSWORD') ?? 'teste@123';
$database['database'] = getenv('MYSQL_DATABASE') ?? '';
$database['port'] = (int)(getenv('MYSQL_PORT') ?? 3306);

mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);

try {
  $mysqli = new mysqli(
    $database['server'],
    $database['user'],
    $database['password'],
    $database['database'],
    $database['port']
  );
  $mysqli->set_charset("utf8mb4");
} catch (Exception $e) {
  error_log($e->getMessage());
  print_r($e);
  exit('Erro ao conectar ao banco de dados');
}
