<?php

header('Content-Type: application/json');

require_once 'config.php';

class ApiPessoas
{
  public $pessoas;

  public function __construct()
  {
    global $mysqli;
    $this->pessoas = new Pessoas($mysqli);
  }

  public function getPessoas($page, $limit)
  {
    $data = $this->pessoas->list($page, $limit);
    return json_encode(array_merge(['success' => true], (array)$data));
  }

  public function createPessoa($data)
  {
    $result = $this->pessoas->create($data);
    return json_encode($result);
  }

  public function getPessoaById($id)
  {
    $pessoa = $this->pessoas->findById($id);

    return json_encode([
      'success' => $pessoa !== null,
      'message' => $pessoa !== null ? 'Pessoa encontrada com sucesso.' : 'Pessoa não encontrada.',
      'data' => [$pessoa]
    ]);
  }

  public function updatePessoa($id, $data)
  {
    $result = $this->pessoas->update($id, $data);
    return json_encode($result);
  }
  public function deletePessoa($id)
  {
    $pessoa = $this->pessoas->findById($id);

    if ($pessoa === null) {
      return json_encode([
        'success' => false,
        'message' => 'Pessoa não encontrada.'
      ]);
    } else {
      $this->pessoas->delete($id);
      return json_encode([
        'success' => true,
        'message' => 'Pessoa deletada com sucesso.'
      ]);
    }
  }
  public function checkPassword($email, $senha)
  {
    $result = $this->pessoas->checkPassword($email, $senha);
    return json_encode($result);
  }
}

$api = new ApiPessoas();

if ($_SERVER['REQUEST_METHOD'] === 'GET') {
  if (isset($_GET['id'])) {
    echo $api->getPessoaById($_GET['id']);
  } else {
    echo $api->getPessoas($_GET['page'] ?? 1, $_GET['limit'] ?? 10);
  }
} elseif ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_GET['checkPassword'])) {
  $email = $_POST['email'] ?? '';
  $senha = $_POST['senha'] ?? '';
  echo $api->checkPassword($email, $senha);
} elseif ($_SERVER['REQUEST_METHOD'] === 'POST') {
  $data = json_decode(file_get_contents('php://input'), true);
  if (isset($data['id'])) {
    echo $api->updatePessoa($data['id'], $data);
  } else {
    echo $api->createPessoa($data);
  }
} elseif ($_SERVER['REQUEST_METHOD'] === 'DELETE') {
  if (isset($_GET['id'])) {
    echo $api->deletePessoa($_GET['id']);
  }
} elseif ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['checkPassword'])) {
  $email = $_POST['email'] ?? '';
  $senha = $_POST['senha'] ?? '';
  echo $api->checkPassword($email, $senha);
}
