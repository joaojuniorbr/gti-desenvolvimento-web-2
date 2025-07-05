<?php
class Contato
{
    private mysqli $conn;

    public function __construct(mysqli $conn)
    {
        $this->conn = $conn;
    }

    public function validaEmail ($email) {
      $regex = '/^[^\s@]+@[^\s@]+\.[^\s@]+$/';
      return preg_match($regex, $email);
    }

    public function listarContatos()
    {
        $stmt = $this->conn->prepare("SELECT * FROM contato");
        $stmt->execute();

        $result = $stmt->get_result();
        $data = [];

        while ($row = $result->fetch_object()) {
            $data[] = $row;
        }

        return $data;
    }
    public function salvarContatos($data)
    {
        if ($data['nome'] === '') {
            return (object) ['error' => 'Nome é um campo obrigatório'];
        }
        if (!$this->validaEmail($data['email'])) {
            return (object) ['error' => 'Email está em um formato inválido'];
        }
        if ($data['telefone'] === '') {
            return (object) ['error' => 'Telefone é um campo obrigatório'];
        }

        $stmt = $this->conn->prepare("
            INSERT INTO contato (nome, email, telefone)
            VALUES (?, ?, ?)
        ");

        if (!$stmt) {
            return (object) ['error' => 'Erro ao preparar a query: ' . $this->conn->error];
        }

        $stmt->bind_param("sss", $data['nome'], $data['email'], $data['telefone']);

        if (!$stmt->execute()) {
            return (object) ['error' => 'Erro ao executar a query: ' . $stmt->error];
        }

        $idInserido = $this->conn->insert_id;

        return (object) [
            'success' => true,
            'id' => $idInserido
        ];
    }
}

?>