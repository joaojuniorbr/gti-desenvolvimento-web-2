<?php

require_once '../config.php';
require_once '../class/Pessoas.php';

if (!isset($_GET['id'])) {
  header('Location: ' . $_SERVER['HTTP_REFERER']);
  exit;
}

$pessoas = new Pessoas($mysqli);
$result = $pessoas->delete($_GET['id']);

header('Location: ' . $_SERVER['HTTP_REFERER']);
exit;
