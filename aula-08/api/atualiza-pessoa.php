<?php
require_once '../config.php';
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
  $result = $pessoas->update(
    $data['id'],
    array(
      'nome' => $data['nome'],
      'email' => $data['email'],
      'senha' => $data['senha'],
      'cpf' => $data['cpf'],
      'nascimento' => $data['nascimento']
    )
  );

  if (!$result) {
    http_response_code(400);
    echo json_encode([
      'message' => 'Erro ao atualizar pessoa',
      'result' => $result
    ]);
    exit;
  }
  http_response_code(200);

  $pessoa = $result->data;
  echo json_encode([
    'message' => 'Pessoa atualizada com sucesso',
    'result' => $result
  ]);
} catch (Exception $e) {
  http_response_code(500);
  echo json_encode(['message' => 'Erro ao adicionar pessoa: ' . $e->getMessage()]);
}
