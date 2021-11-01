<?php
require 'includes/config.php';
$userDetails = (!empty($_GET['username']) && !empty($_GET['email']) && !empty($_GET['password'])) ? htmlspecialchars($_GET['username'] && $_GET['password'], ENT_QUOTES, 'utf-8') : '';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
	$username = $email = $password = $fname = $lname = $phone = '';
	$username = e($_POST['username']);
	$email = e($_POST['email']);
	$password = e($_POST['password']);
	$fname = e($_POST['fname']);
	$lname = e($_POST['lname']);
	$phone = e($_POST['phone']);

	if($_POST['username'] === '' || $_POST['password'] === '' || $_POST['email'] === '' || $_POST['phone'] || $_POST['lname'] || $_POST['fname']) {
		addMessage('error', "Registration was not successful.");
	}

	if($_POST['password'] != $_POST['confirm-password']) {
		addMessage('error', "The passwords don't match.");
	}

	else {
	$registered = addUser($dbh, $username, $fname, $lname, $email, $phone, $password);
	$user = getUser($dbh, $username);

		if($registered) {
		$_SESSION['username'] = $username;
		$_SESSION['email'] = $email;
		$_SESSION['fname'] = $fname;
		$_SESSION['lname'] = $lname;
		$_SESSION['phone'] = $phone;
		addMessage('success', "You have registered successfully.");
		redirect('cindex.php');
		}
	}
}

?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>NIM Management - Client Register</title>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
	<link rel="stylesheet" type="text/css" href="css/main.css">
</head>
<body>

	<div id="main">


		<h1><tit> Register </tit></h1>
	<?= showMessage(); ?>
		<form method="POST" action="cregister.php" onsubmit="return validate()" class="form-group">

	<label for="usermame"> Username </label>
	<input id="username" type="text" name="username" value="" placeholder="Username" required="" class="form-control">

	<label for="fname"> First name </label>
	<input id="fname" type="text" name="fname" value="" placeholder="First name" required="" class="form-control">

	<label for="lname"> Last name </label>
	<input id="lname" type="text" name="lname" value="" placeholder="Last name" required="" class="form-control">

	<label for="phone"> Phone number </label>
	<input id="phone" type="text" name="phone" value="" placeholder="Phone number" required="" class="form-control">

	<label for="email"> Email </label>
	<input id="email" type="email" name="email" required="" placeholder="Email" class="form-control">

	<label for="password"> Password </label>
	<input id="password" type="password" name="password" required="" placeholder="Password" class="form-control">

	<label for="confirm-password"> Confirm Password </label>
	<input id="confirm-password" type="password" name="confirm-password" required="" placeholder="Confirm Password" class="form-control">
	

	<button type="submit" class="btn btn-primary"> Register </button>
</form>
</div>
<script src="js/main.js"></script>
</body>
</html>