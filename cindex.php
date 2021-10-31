<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>NIM Management - Homepage</title>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
	<link rel="stylesheet" type="text/css" href="./css/main.css">
</head>
<body>

<?php require 'partials/nav.php'; ?>

<div id="main">
	
	<h1>Welcome, first last</h1>

	<form action="csearchresults.php" method="POST">

		<input type="text" name="destination" id="destination" placeholder="Enter destination">
		<label for="checkin">Check in date</label>
		<input type="date" name="checkin" id="checkin">
		<label for="checkout">Check out date</label>
		<input type="date" name="checkout" id="checkout">

		<button>Search</button>

	</form>

	<h1>Current reservations</h1>
	<p>None</p>
</div>

</body>
</html>