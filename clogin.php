<?php
require 'includes/config.php';

if($_SERVER["REQUEST_METHOD"] === "POST") {
    $username = $password = '';

    if(empty($_POST['username']) || empty($_POST['password'])) {
        addMessage('error', 'Please enter both fields.');
    }

    $username = strtolower($_POST['username']);
    $password = strtolower($_POST['password']);
    $user = getUser($dbh, $username);

    if(!empty($user) && ($username === strtolower($user['username']) || $username === strtolower($user['email'])) && password_verify($password, $user['password'])) {
        $_SESSION['username'] = $user['username'];
        $_SESSION['email'] = $user['email'];
        addMessage('success', 'You have been logged in.');
        redirect('cindex.php');
        }
    else {
        addMessage('error', 'Username and password do not match.');
    }
}
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>NIM Management - Client Login</title>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
	<link rel="stylesheet" type="text/css" href="./css/main.css">
</head>
<body>

<div id="main">

<form method="POST" action="clogin.php" class="form-group">

    <h1> Log In </h1>
    
    <?= showMessage() ?> 
    <label for="username"> Username/Email </label>
    <input type="text" name="username" required="" placeholder="Username/Email" class="form-control">

    <label for="password"> Password </label>
    <input type="password" name="password" required="" placeholder="Password" class="form-control">

    <button type="submit" class="btn btn-default"> Login </button>
</form>
</div>