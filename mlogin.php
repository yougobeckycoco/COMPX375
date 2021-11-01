<?php
require 'includes/config.php';

if($_SERVER["REQUEST_METHOD"] === "POST") {
    $username = $password = '';

    if(empty($_POST['username']) || empty($_POST['password'])) {
        addMessage('error', 'Please enter both fields.');
    }

    $username = strtolower($_POST['username']);
    $password = strtolower($_POST['password']);
    $user = getAdmin($dbh, $username);

    if(!empty($user) && $username === strtolower($user['username']) && $password === strtolower($user['password'])) {
        $_SESSION['username'] = $user['username'];
        $_SESSION['password'] = $user['password'];
        addMessage('success', 'You have been logged in.');
        redirect('mindex.php');
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
	<title>NIM - Admin Login</title>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
	<link rel="stylesheet" type="text/css" href="css/main.css">
</head>
<body>

	<div id="main">


<form method="POST" action="mlogin.php" class="form-group">
    
    <h1><tit> Log in </tit></h1>
    <?= showMessage() ?> 
    <div class="form-group f-row">
        <div class="col">
    <label for="username"> Username </label>
    <input type="text" name="username" required="" placeholder="Username" class="form-control">
</div> <div class="col">
    <label for="password"> Password </label>
    <input type="password" name="password" required="" placeholder="Password" class="form-control">
    </div>

    
</div>
<div class="f-but">

<button type="submit" class="btn btn-success"> Login </button>
<button type="reset" class="btn btn-danger"> Clear fields </button>

</div>
</form>
</div>

</body>
</html>