<?php 
class Cursos{
  private mysqli $conn;

  public function __construct(mysqli $conn)
  {
    $this->conn = $conn;
  }
    
  public function listarCursos(){
    $stmt = $this->conn->prepare("SELECT * FROM cursos ORDER BY title ASC");
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