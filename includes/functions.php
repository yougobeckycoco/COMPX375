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
  $sth = $dbh->prepare('SELECT * FROM users WHERE username = :username OR email = :email LIMIT 1');
  $sth->bindValue(':username', $username, PDO::PARAM_STR);
  $sth->bindValue(':email', $username, PDO::PARAM_STR);
  $sth->execute();
  $row = $sth->fetch();
  if (!empty($row)) {
    return $row;
  }
  return false;
}

function addUser($dbh, $username, $email, $password) {
  $sth = $dbh->prepare("INSERT INTO users (username, email, password) VALUES (:username, :email, :password)");
  $sth->bindParam(':username', $username, PDO::PARAM_STR);
  $sth->bindParam(':email', $email, PDO::PARAM_STR);
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

function adminUser() {
  if(loggedIn() && $_SESSION['admin'] == 1) {
    return true;
  }
  return false;
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

function addEstablishment($dbh, $establishment_name, $establishment_address, $establishment_phone, $establishment_website, $establishment_description, $establishment_country, $establishment_type) {
  $sth = $dbh->prepare("INSERT INTO establishment (establishment_name, establishment_address, establishment_phone, establishment_website, establishment_description, establishment_country, establishment_type) VALUES (:establishment_name, :establishment_address, :establishment_phone, :establishment_website, :establishment_description, :establishment_country, :establishment_type)");
  $sth->bindParam(':establishment_name', $establishment_name, PDO::PARAM_STR);
  $sth->bindParam(':establishment_address', $establishment_address, PDO::PARAM_STR);
  $sth->bindParam(':establishment_phone', $establishment_phone, PDO::PARAM_STR);
  $sth->bindParam(':establishment_website', $establishment_website, PDO::PARAM_STR);
  $sth->bindParam(':establishment_description', $establishment_description, PDO::PARAM_STR);
  $sth->bindParam(':establishment_country', $establishment_country, PDO::PARAM_STR);
  $sth->bindParam(':establishment_type', $establishment_type, PDO::PARAM_STR);
  $success = $sth->execute();
  return $success;
}

function get_gravatar( $email, $s = 80, $d = 'mm', $r = 'g', $img = false, $atts = array() ) {
  $url = 'https://www.gravatar.com/avatar/';
  $url .= md5( strtolower( trim( $email ) ) );
  $url .= "?s=$s&d=$d&r=$r";
  if ( $img ) {
    $url = '<img src="' . $url . '"';
    foreach ( $atts as $key => $val )
      $url .= ' ' . $key . '="' . $val . '"';
      $url .= ' />';
    }
    return $url;
}

function userOwns($id) {
  if (loggedIn() && $_SESSION['id'] == $id) {
    return true;
  }
  return false;
}

function e($value) {
  return htmlspecialchars($value, ENT_QUOTES, 'UTF-8');
}

function saveFeedback($dbh, $name, $email, $comment) {
   $sth = $dbh->prepare("INSERT INTO feedback (name, email, comment, created_at) VALUES (:name, :email, :comment, NOW())");
   $sth->bindParam(':name', $name, PDO::PARAM_STR);
   $sth->bindParam(':email', $email, PDO::PARAM_STR);
   $sth->bindParam(':comment', $comment, PDO::PARAM_STR);
   $success = $sth->execute();
   return $success;
}

function dd($data) {
 die(var_dump($data));
}

function searchEstablishment($dbh, $searchQ) {
  $sth = $dbh->prepare("SELECT * FROM establishment WHERE establishment_name OR establishment_type LIKE :search");
  $sth->bindValue(':search', '%' . $searchQ . '%', PDO::PARAM_STR);
  $sth->execute();
  $result = $sth->fetchAll();
  return $result;
}

function singleEstab($id, $dbh) {
  $sth = $dbh->prepare("SELECT * FROM establishment WHERE id = :id LIMIT 1");
  $sth->bindParam(':id', $id, PDO::PARAM_STR);
  $sth->execute();
  $result = $sth->fetch();
  return $result;
}

function getReview($id, $dbh) {
  $sth = $dbh->prepare("SELECT reviews.id, reviews.title, reviews.comment, reviews.user_id, reviews.establishment_id, reviews.created_at, reviews.price, users.username, users.email FROM reviews INNER JOIN users ON reviews.user_id = users.id WHERE reviews.establishment_id = :id ORDER BY reviews.created_at DESC");
  $sth->bindParam(':id', $id, PDO::PARAM_STR);
  $sth->execute();
  $result = $sth->fetchAll();
  if(!empty($result)) {
    return $result;
  }
  return false;
}

function addReview($dbh, $title, $comment, $establishment_id, $price) {
   $sth = $dbh->prepare("INSERT INTO reviews (title, comment, user_id, establishment_id, created_at, updated_at, price) VALUES (:title, :comment, :user_id, :establishment_id, NOW(), NOW(), :price)");
   $sth->bindParam(':title', $title, PDO::PARAM_STR);
   $sth->bindParam(':comment', $comment, PDO::PARAM_STR);
   $sth->bindParam(':user_id', $_SESSION['id'], PDO::PARAM_INT);
   $sth->bindParam(':establishment_id', $establishment_id, PDO::PARAM_INT);
   $sth->bindParam(':price', $price, PDO::PARAM_STR);
   $success = $sth->execute();
   return $success;
}

function deleteReview($id, $dbh) {
  $result = $dbh->prepare("DELETE FROM reviews WHERE id = :id LIMIT 1");
  $result->bindParam(':id', $id);
  $result->execute();
}

function formatTime($timestamp)
{
  // Get time difference and setup arrays
  $difference = time() - $timestamp;
  $periods = array("second", "minute", "hour", "day", "week", "month", "years");
  $lengths = array("60","60","24","7","4.35","12");
 
  // Past or present
  if ($difference === 0) {
    return 'Just now';
  }
  if ($difference >= 0)
  {
    $ending = "ago";
  }
  else
  {
    $difference = -$difference;
    $ending = "to go";
  }
 
  // Figure out difference by looping while less than array length
  // and difference is larger than lengths.
  $arr_len = count($lengths);
  for($j = 0; $j < $arr_len && $difference >= $lengths[$j]; $j++)
  {
    $difference /= $lengths[$j];
  }
 
  // Round up
  $difference = round($difference);
 
  // Make plural if needed
  if($difference != 1)
  {
    $periods[$j].= "s";
  }
 
  // Default format
  $text = "$difference $periods[$j] $ending";
 
  // over 24 hours
  if($j > 2)
  {
    // future date over a day formate with year
    if($ending == "to go")
    {
      if($j == 3 && $difference == 1)
      {
        $text = "Tomorrow at ". date("g:i a", $timestamp);
      }
      else
      {
        $text = date("F j, Y \a\\t g:i a", $timestamp);
      }
      return $text;
    }
 
    if($j == 3 && $difference == 1) // Yesterday
    {
      $text = "Yesterday at ". date("g:i a", $timestamp);
    }
    else if($j == 3) // Less than a week display -- Monday at 5:28pm
    {
      $text = date("l \a\\t g:i a", $timestamp);
    }
    else if($j < 6 && !($j == 5 && $difference == 12)) // Less than a year display -- June 25 at 5:23am
    {
      $text = date("F j \a\\t g:i a", $timestamp);
    }
    else // if over a year or the same month one year ago -- June 30, 2010 at 5:34pm
    {
      $text = date("F j, Y \a\\t g:i a", $timestamp);
    }
  }
 
  return $text;
}

function deleteEstab($id, $dbh) {
  $result = $dbh->prepare("DELETE FROM establishment WHERE id = :id LIMIT 1");
  $result->bindParam(':id', $id);
  $result->execute();
}

function editEstab($id, $dbh) {
  $sth = $dbh->prepare("SELECT * FROM establishment WHERE id = :id LIMIT 1");
  $sth->bindParam(':id', $id, PDO::PARAM_STR);
  $sth->execute();
  $result = $sth->fetch();
  return $result;
}

function updateEstab($id, $dbh, $name, $address, $phone, $website, $description, $country, $type) {
  $sth = $dbh->prepare("UPDATE establishment SET establishment_name = :establishment_name, establishment_address = :establishment_address, establishment_phone = :establishment_phone, establishment_website = :establishment_website, establishment_description = :establishment_description, establishment_country = :establishment_country, establishment_type = :establishment_type WHERE id = :id");
  $sth->bindParam(':id', $id, PDO::PARAM_STR);
  $sth->bindParam(':establishment_name', $name, PDO::PARAM_STR);
  $sth->bindParam(':establishment_address', $address, PDO::PARAM_STR);
  $sth->bindParam(':establishment_phone', $phone, PDO::PARAM_STR);
  $sth->bindParam(':establishment_website', $website, PDO::PARAM_STR);
  $sth->bindParam(':establishment_description', $description, PDO::PARAM_STR);
  $sth->bindParam(':establishment_country', $country, PDO::PARAM_STR);
  $sth->bindParam(':establishment_type', $type, PDO::PARAM_STR);
  $result = $sth->execute();
  return $result;
}