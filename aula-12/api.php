<?php

header('Content-Type: application/json');

require_once 'config.php';

class ApiCidades
{
  public $cidades;

  public function __construct()
  {
    global $mysqli;
    $this->cidades = new Cidades($mysqli);
  }

  public function getEstados()
  {
    $data = $this->cidades->getEstados();
    return json_encode(array_merge(['success' => true, 'data' => $data]));
  }

  public function getCidades($estado)
  {
    $data = $this->cidades->getCidades($estado);
    return json_encode(array_merge(['success' => true, 'data' => $data]));
  }
}

$api = new ApiCidades();

if ($_SERVER['REQUEST_METHOD'] === 'GET') {
  if (isset($_GET['estado'])) {
    echo $api->getCidades($_GET['estado']);
  } else {
    echo $api->getEstados();
  }
}
