<?php

session_start();

header('HTTP/1.1 200 OK');
header('Content-Type: application/json');
header("Access-Control-Allow-Origin: " . $_SERVER['HTTP_ORIGIN']);
header("Access-Control-Allow-Credentials: true");
header("Access-Control-Allow-Headers: Content-Type, Authorization");
header("Access-Control-Allow-Methods: GET, POST, OPTIONS, PUT, DELETE");

if ($_SERVER['REQUEST_METHOD'] === 'OPTIONS') {
  exit(0);
}

require_once 'config.php';

class ApiTma
{
  public $pessoas;

  public function __construct()
  {
    global $mysqli;
    $this->pessoas = new Pessoas($mysqli);
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
      'message' => $pessoa !== null ? 'Usuário encontrado com sucesso.' : 'Usuário não encontrado.',
      'data' => $pessoa
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
        'message' => 'Usuário não encontrado.'
      ]);
    } else {
      $this->pessoas->delete($id);
      return json_encode([
        'success' => true,
        'message' => 'Usuário deletado com sucesso.'
      ]);
    }
  }

  public function login($email, $senha) {
    $result = $this->pessoas->checkPassword($email, $senha);
    if ($result->status === 'success') {
      session_regenerate_id(true);
      $_SESSION['auth'] = true;
      $_SESSION['user'] = $result->data;
    }
    return json_encode($result);
  }

  public function checkAuth() {
    $isAuthenticated = isset($_SESSION['auth']) && $_SESSION['auth'] === true;
  
    return json_encode([
      'authenticated' => $isAuthenticated,
      'user' => $_SESSION['user'] ?? null
    ]);
  }
  
  public function logout() {
    session_destroy();
    return json_encode([
      'success' => true,
      'message' => 'Sessão encerrada com sucesso.'
    ]);
  }
}

$api = new ApiTma();

$action = $_GET['action'] ?? null;
$method = $_SERVER['REQUEST_METHOD'];
$input = json_decode(file_get_contents('php://input'), true);

switch ($action) {
  case 'login':
    if ($method === 'POST') {
      echo $api->login($input['email'] ?? '', $input['senha'] ?? '');
    } else {
      http_response_code(405);
      echo json_encode(['error' => 'Método não permitido.']);
    }
    break;

  case 'checkAuth':
    echo $api->checkAuth();
    break;

  case 'logout':
    echo $api->logout();
    break;

  case 'profile':
    if ($method === 'GET') {
      if (!isset($_SESSION['auth']) || $_SESSION['auth'] !== true) {
        echo json_encode(['success' => false, 'message' => 'Não autenticado.']);
        break;
      }
  
      $id = $_SESSION['user']->id ?? null;
  
      if (!$id) {
        echo json_encode(['success' => false, 'message' => 'ID de usuário não encontrado na sessão.']);
        break;
      }
  
      echo $api->getPessoaById($id);
    }
    break;

  case 'updateProfile':
    if ($method === 'PUT') {
      if (!isset($_SESSION['auth']) || $_SESSION['auth'] !== true) {
        echo json_encode(['success' => false, 'message' => 'Não autenticado.']);
        break;
      }
  
      $id = $_SESSION['user']->id ?? null;
  
      if (!$id) {
        echo json_encode(['success' => false, 'message' => 'ID de usuário não encontrado na sessão.']);
        break;
      }
  
      echo $api->updatePessoa($id, $input);
    }
    break;
  
  default:
    echo json_encode(['error' => 'Ação inválida.']);
    break;
}