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

function addUser($dbh, $username, $fname, $lname, $email, $phone, $password) {
  $sth = $dbh->prepare("INSERT INTO user (username, fname, lname, email, phone, password) VALUES (:username, :fname, :lname, :email, :phone, :password)");
  $sth->bindParam(':username', $username, PDO::PARAM_STR);
  $sth->bindParam(':fname', $fname, PDO::PARAM_STR);
  $sth->bindParam(':lname', $lname, PDO::PARAM_STR);
  $sth->bindParam(':email', $email, PDO::PARAM_STR);
  $sth->bindParam(':phone', $phone, PDO::PARAM_STR);
  $sth->bindParam(':password', $password, PDO::PARAM_STR);
  $success = $sth->execute();
  return $success;
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

function getAdmin($dbh, $username) {
  $sth = $dbh->prepare('SELECT * FROM user WHERE username = :username AND password = "admin" LIMIT 1');
  $sth->bindValue(':username', $username, PDO::PARAM_STR);
  $sth->execute();
  $row = $sth->fetch();
  if (!empty($row)) {
    return $row;
}
  }
  return false;

function searchClient($dbh, $search) {
  $sth = $dbh->prepare("SELECT * FROM user WHERE lname = :search OR fname = :search");
  $sth->bindValue(':search', $search, PDO::PARAM_STR);
  $sth->execute();
  $result = $sth->fetchAll();
  return $result;
}

function e($value) {
  return htmlspecialchars($value, ENT_QUOTES, 'UTF-8');
}

function searchHistory($dbh, $search) {
  $sth = $dbh->prepare("SELECT user.username, user.fname, user.lname, client_rating.username, client_rating.damage_rating, client_rating.payment_rating, client_rating.tidiness_rating, client_rating.comment, client_rating.property_id, property.address FROM client_rating INNER JOIN user ON client_rating.username = user.username INNER JOIN property ON client_rating.property_id = property.property_id WHERE user.lname = :search OR user.fname = :search");
  $sth->bindValue(':search', $search, PDO::PARAM_STR);
  $sth->execute();
  $result = $sth->fetchAll();
  return $result;
}