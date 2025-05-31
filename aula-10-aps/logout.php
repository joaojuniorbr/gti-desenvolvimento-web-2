<?php

include './config.php';

$auth = new Authentication();
$auth->logout();

header('Location: ./login.php');
exit;
