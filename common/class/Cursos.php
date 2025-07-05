<?php
class Cursos
{
  private mysqli $conn;

  public function __construct(mysqli $conn)
  {
    $this->conn = $conn;
  }

  public function listarCursos($limit)
  {
    if ($limit) {
      $limit = ' LIMIT ' . $limit;
    }
    $stmt = $this->conn->prepare("SELECT * FROM cursos ORDER BY title ASC".$limit);
    $stmt->execute();

    $result = $stmt->get_result();
    $data = [];

    while ($row = $result->fetch_object()) {
      $data[] = $row;
    }

    return $data;
  }
  public function buscarCursos($search)
  {
    $search = "%{$search}%";
    $stmt = $this->conn->prepare("SELECT * FROM cursos WHERE title LIKE ? OR description LIKE ? ORDER BY title ASC");
    $stmt->bind_param("ss", $search, $search);
    $stmt->execute();
    $result = $stmt->get_result();
    $data = [];

    while ($row = $result->fetch_object()) {
      $data[] = $row;
    }
    return $data;
  }
}

?>