<?php
require 'includes/config.php';

if($_SERVER["REQUEST_METHOD"] === "POST") {
        redirect('mindex.php');
    }
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>NIM - Review client</title>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
	<link rel="stylesheet" type="text/css" href="css/main.css">
</head>
<body>

	<div id="main">

	<?= require 'partials/navigation.php'; ?>
	
	<form method="POST" action="reviewclient.php" class="form-group">

		<input type="text" name="firstname" id="firstname" placeholder="Enter client first name" class="form-control">
		<input type="text" name="lastname" id="lastname" placeholder="Enter client last name" class="form-control">
		<br>
		<input type="text" name="address" id="address" placeholder="Enter property address" class="form-control">
		<input type="date" name="reviewdate" id="reviewdate" class="form-control">
		<br>
		<label for="damage">Rate damage (1-5)</label>
		<input type="number" name="damage" id="damage" min="1" max="5" class="form-control">
		<br>
		<textarea name="damagecomm" id="damagecomm" placeholder="Enter comment about damage rating" class="form-control"></textarea>
		<br>
		<label for="payment">Rate payment (1-5)</label>
		<input type="number" name="payment" id="payment" min="1" max="5" class="form-control">
		<br>
		<textarea name="paymentcomm" id="paymentcomm" placeholder="Enter comment about payment rating" class="form-control"></textarea>
		<br>
		<label for="tidiness">Rate tidiness (1-5)</label>
		<input type="number" name="tidiness" id="tidiness" min="1" max="5" class="form-control">
		<br>
		<textarea name="tidycomm" id="tidycomm" placeholder="Enter comment about tidiness rating" class="form-control"></textarea>
		<button type="submit" class="btn btn-default">Add review</button>
		
	</form>

</div>

</body>
</html>