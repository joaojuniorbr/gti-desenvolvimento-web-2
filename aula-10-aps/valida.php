<?php

include './config.php';

$auth = new Authentication();

$onAuthentication = $auth->login($_POST['email'], $_POST['senha']);

if ($onAuthentication->status === 'success') {
  header('Location: ./index.php');
  exit;
} else {
  $_SESSION['error'] = $onAuthentication->message;
  header('Location: ./login.php?error=1');
  exit;
}
