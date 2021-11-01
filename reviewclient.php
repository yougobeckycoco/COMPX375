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

	<?php require 'partials/navigation.php'; ?>

	<h1><tit> Add review </tit></h1>

	<form method="POST" action="reviewclient.php">

		<div class="form-group f-row">
			<div class="col">
				<label for="firstname">Client's first name</label>
		<input type="text" name="firstname" id="firstname" placeholder="Enter client first name" class="form-control"> </div>
		<div class="col">
			<label for="lastname">Client's last name</label>
		<input type="text" name="lastname" id="lastname" placeholder="Enter client last name" class="form-control">
		</div> </div>

		<div class="form-group f-row">
			<div class="col">
				<label for="address">Property address</label>
		<input type="text" name="address" id="address" placeholder="Enter property address" class="form-control"> </div>
		<div class="col"><label for="reviewdate">Review date</label>
		<input type="date" name="reviewdate" id="reviewdate" class="form-control">
		</div></div>
<div class="form-b"></div>
		<div class="form-group f-row">
			<div class="col">
		<label for="damage">Rate damage (1 as worst - 5 as best)</label>
		<input type="number" name="damage" id="damage" min="1" max="5" class="form-control" placeholder="1-5">
		</div><div class="col">
		<textarea name="damagecomm" id="damagecomm" placeholder="Enter comment about damage rating" class="form-control" rows="3"></textarea>
		</div></div>
<div class="form-b"></div>
		<div class="form-group f-row">
			<div class="col">
		<label for="payment">Rate payment (1 as worst - 5 as best)</label>
		<input type="number" name="payment" id="payment" min="1" max="5" class="form-control" placeholder="1-5">
		</div><div class="col">
		<textarea name="paymentcomm" id="paymentcomm" placeholder="Enter comment about payment rating" class="form-control" rows="3"></textarea>
		</div></div>
<div class="form-b"></div>
		<div class="form-group f-row">
			<div class="col">
		<label for="tidiness">Rate tidiness (1 as worst - 5 as best)</label>
		<input type="number" name="tidiness" id="tidiness" min="1" max="5" class="form-control" placeholder="1-5">
		</div><div class="col">
		<textarea name="tidycomm" id="tidycomm" placeholder="Enter comment about tidiness rating" class="form-control" rows="3"></textarea>
	</div></div>
	<div class="f-but">
		<button type="submit" class="btn btn-primary">Add review</button>
		<button type="reset" class="btn btn-danger"> Clear fields </button>
		</div>
	</form>

</div>

</body>
</html>