<?php

class Cidades
{
  private mysqli $conn;

  public function __construct(mysqli $conn)
  {
    $this->conn = $conn;
  }

  public function getEstados()
  {
    $stmt = $this->conn->prepare("SELECT * FROM estados ORDER BY estado ASC");
    $stmt->execute();

    $result = $stmt->get_result();
    $data = [];

    while ($row = $result->fetch_object()) {
      $data[] = $row;
    }

    return $data;
  }

  public function getCidades($estado)
  {
    $stmt = $this->conn->prepare("SELECT * FROM cidades WHERE estado = ? ORDER BY cidade ASC");
    $stmt->bind_param("s", $estado);
    $stmt->execute();

    $result = $stmt->get_result();
    $data = [];

    while ($row = $result->fetch_object()) {
      $data[] = $row;
    }

    return $data;
  }

}