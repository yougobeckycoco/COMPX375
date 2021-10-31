<?php

function connectDatabase($host, $database, $user, $pass) {
  try {
  $dbh = new PDO('mysql:host=' . $host . ';dbname=' . $database, $user, $pass, array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
 return $dbh;
} catch (PDOException $e) {
  print('Error! ' . $e->getMessage() . '<br>');
  die();
  }
}

function getUser($dbh, $username) {
  $sth = $dbh->prepare('SELECT * FROM user WHERE username = :username OR email = :email LIMIT 1');
  $sth->bindValue(':username', $username, PDO::PARAM_STR);
  $sth->bindValue(':email', $username, PDO::PARAM_STR);
  $sth->execute();
  $row = $sth->fetch();
  if (!empty($row)) {
    return $row;
  }
  return false;
}

function redirect($url) {
  header('Location: ' . $url);
  die();
}

function loggedIn() {
  return !empty($_SESSION['username']);
}

function addMessage($type, $message) {
  $_SESSION['flash'][$type][] = $message;
}

function showMessage($type = null) {
  $messages = '';
  if(!empty($_SESSION['flash'])) {
    foreach ($_SESSION['flash'] as $key => $message) {
      if(($type && $type === $key) || !$type) {
        foreach ($message as $k => $value) {
          unset($_SESSION['flash'][$key][$k]);
          $key = ($key == 'error') ? 'danger': $key;
          $messages .= '<div class="alert alert-' . $key . '">' . $value . '</div>' . "\n";
        }
      }
    }
  }
  return $messages;
}