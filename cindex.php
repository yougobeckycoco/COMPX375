<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>NIM - Homepage</title>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
	<link rel="stylesheet" type="text/css" href="./css/main.css">
</head>
<body>



<div id="main">

	<?php require 'partials/nav.php'; ?>
	

	<form action="csearchresults.php" method="POST">
<div class="form-group f-row">
		
			<div class="col">
				<label for="destination">Enter destination</label>
		<input type="text" name="destination" id="destination" placeholder="Enter destination" class="form-control">
	</div><div class="col">
		<label for="checkin">Check in date</label>
		<input type="date" name="checkin" id="checkin" class="form-control">
	</div><div class="col">
		<label for="checkout">Check out date</label>
		<input type="date" name="checkout" id="checkout" class="form-control">

	</div></div>
	

<div class="f-but">
	<button type="submit" class="btn btn-primary"> Search for properties </button>
</div>
	
	</div>
	
</div>

	</form>

	<h1><tit>Current reservations</tit></h1>

	<p>Currently none</p>
</div>

</body>
</html>