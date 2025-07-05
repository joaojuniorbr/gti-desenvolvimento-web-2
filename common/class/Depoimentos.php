<?php 
class Depoimentos{
  private mysqli $conn;

  public function __construct(mysqli $conn)
  {
    $this->conn = $conn;
  }
    
  public function listarDepoimentos(){
    $stmt = $this->conn->prepare("SELECT * FROM depoimentos ORDER BY createdat ASC");
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