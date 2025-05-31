<?php

include('../utils/database.php');
include('../common/class/Pessoas.php');
include('../assets/styles.php');

$SESSION_KEY = 'user';

session_start();

class Authentication
{
  private static $sessionKey = 'user';

  public static function isLoggedIn()
  {
    return isset($_SESSION[self::$sessionKey]);
  }

  public static function getUser()
  {
    return isset($_SESSION[self::$sessionKey]) ? $_SESSION[self::$sessionKey] : null;
  }

  public static function login($email, $password)
  {
    global $mysqli;

    $pessoas = new Pessoas($mysqli);
    $user = $pessoas->findByEmail($email);

    if ($pessoas->checkPassword($email, $password)->status !== 'success') {
      $result = array(
        'status' => 'error',
        'message' => 'Email ou senha inválidos.'
      );
      return (object) $result;
    }

    $_SESSION[self::$sessionKey] = $user;
    $result = array(
      'status' => 'success',
      'message' => 'Login bem-sucedido.'
    );
    return (object) $result;
  }

  public static function logout()
  {
    unset($_SESSION[self::$sessionKey]);
  }
}
