<?php

require_once '../../utils/database.php';
require_once '../../common/class/Pessoas.php';

if (!isset($_GET['id'])) {
  header('Location: ' . $_SERVER['HTTP_REFERER']);
  exit;
}

$pessoas = new Pessoas($mysqli);
$result = $pessoas->delete($_GET['id']);

header('Location: ' . $_SERVER['HTTP_REFERER']);
exit;
