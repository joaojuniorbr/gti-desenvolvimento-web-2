<?php
require_once '../../utils/database.php';
require_once '../class/Pessoas.php';

header('Content-Type: application/json');

$data = json_decode(file_get_contents('php://input'), true);


if (!$data) {
  http_response_code(400);
  echo json_encode(['message' => 'Dados inválidos']);
  exit;
}

$pessoas = new Pessoas($mysqli);

try {
  $result = $pessoas->create(
    array(
      'nome' => $data['nome'],
      'email' => $data['email'],
      'senha' => $data['senha'],
      'cpf' => $data['cpf'],
      'nascimento' => $data['nascimento']
    )
  );

  if (!$result->success) {
    http_response_code(400);
    echo json_encode([
      'message' => 'Erro ao adicionar pessoa: ' . implode(', ', $result->errors),
      'result' => $result
    ]);
    exit;
  }
  http_response_code(201);

  $pessoa = $result->data;
  echo json_encode([
    'message' => 'Pessoa adicionada com sucesso',
    'result' => $result
  ]);
} catch (Exception $e) {
  http_response_code(500);
  echo json_encode(['message' => 'Erro ao adicionar pessoa: ' . $e->getMessage()]);
}
