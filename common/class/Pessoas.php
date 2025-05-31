<?php

class Pessoas
{
  private mysqli $conn;

  public function __construct(mysqli $conn)
  {
    $this->conn = $conn;
  }

  private function generateUuid()
  {
    return bin2hex(random_bytes(8));
  }

  private function validate($data)
  {
    $errors = [];

    if (!filter_var($data['email'] ?? '', FILTER_VALIDATE_EMAIL)) {
      $errors[] = "Email inválido.";
    }

    if (!isset($data['senha']) || strlen($data['senha']) < 6) {
      $errors[] = "A senha deve ter no mínimo 6 caracteres.";
    }

    if (!empty($data['nascimento']) && !preg_match('/^\d{4}-\d{2}-\d{2}$/', $data['nascimento'])) {
      $errors[] = "A data de nascimento deve estar no formato YYYY-MM-DD.";
    } elseif (!empty($data['nascimento']) && !strtotime($data['nascimento'])) {
      $errors[] = "Data de nascimento inválida.";
    }

    return $errors;
  }

  public function create($data)
  {
    $errors = $this->validate($data);
    if (!empty($errors)) {
      return (object)['success' => false, 'errors' => $errors];
    }

    $uuid = $this->generateUuid();
    $senhaHash = password_hash($data['senha'], PASSWORD_BCRYPT);

    $stmt = $this->conn->prepare("
            INSERT INTO pessoas (id, nome, email, senha, cpf, nascimento)
            VALUES (?, ?, ?, ?, ?, ?)
        ");

    $stmt->bind_param(
      "ssssss",
      $uuid,
      $data['nome'],
      $data['email'],
      $senhaHash,
      $data['cpf'],
      $data['nascimento']
    );

    $stmt->execute();

    return (object)['success' => true, 'data' => $this->findById($uuid)];
  }

  public function findById($id)
  {
    $stmt = $this->conn->prepare("SELECT id, nome, email, cpf, nascimento FROM pessoas WHERE id = ?");
    $stmt->bind_param("s", $id);
    $stmt->execute();

    $result = $stmt->get_result();
    return $result->num_rows > 0 ? $result->fetch_object() : null;
  }

  public function list($page = 1, $limit = 10)
  {
    $offset = ($page - 1) * $limit;

    $stmt = $this->conn->prepare("SELECT * FROM pessoas ORDER BY nome LIMIT ? OFFSET ?");
    $stmt->bind_param("ii", $limit, $offset);
    $stmt->execute();

    $result = $stmt->get_result();
    $data = [];

    while ($row = $result->fetch_object()) {
      $data[] = $row;
    }

    $countResult = $this->conn->query("SELECT COUNT(*) as total FROM pessoas");
    $total = $countResult->fetch_assoc()['total'];

    return (object)[
      'data' => $data,
      'total' => (int)$total,
      'page' => $page,
      'limit' => $limit,
      'pages' => ceil($total / $limit),
    ];
  }

  public function delete($id)
  {
    $stmt = $this->conn->prepare("DELETE FROM pessoas WHERE id = ?");
    $stmt->bind_param("s", $id);
    $stmt->execute();
  }

  public function update($id, $data)
  {
    $fields = [];
    $values = [];

    foreach ($data as $key => $value) {
      if ($value !== null && $value !== '') {
        $fields[] = "$key = ?";
        $values[] = $value;
      }
    }

    if (empty($fields)) {
      return false;
    }

    $values[] = $id;

    $sql = "UPDATE pessoas SET " . implode(", ", $fields) . " WHERE id = ?";

    $types = str_repeat('s', count($values));

    $stmt = $this->conn->prepare($sql);
    $stmt->bind_param($types, ...$values);
    $stmt->execute();

    return (object)['success' => true, 'data' => $this->findById($id)];
  }

  public function login($email, $senha)
  {
    $stmt = $this->conn->prepare("SELECT * FROM pessoas WHERE email = ?");
    $stmt->bind_param("s", $email);
    $stmt->execute();

    $result = $stmt->get_result();
    if ($result->num_rows === 0) {
      return (object)['success' => false, 'message' => 'Email não encontrado.'];
    }

    $pessoa = $result->fetch_object();
    if (!password_verify($senha, $pessoa->senha)) {
      return (object)['success' => false, 'message' => 'Senha incorreta.'];
    }

    return (object)['success' => true, 'data' => $pessoa];
  }

  public function maskCpf($cpf)
  {
    $cpfNumerico = preg_replace('/\D/', '', $cpf);

    if (strlen($cpfNumerico) !== 11) {
      return 'CPF inválido';
    }

    $inicio = substr($cpfNumerico, 0, 3);
    $fim = substr($cpfNumerico, -2);

    return $inicio . '.***.***-' . $fim;
  }

  public function maskNascimento($nascimento)
  {
    $data = DateTime::createFromFormat('Y-m-d', $nascimento);
    if (!$data) {
      return 'Data inválida';
    }

    return $data->format('d/m/Y');
  }
}
