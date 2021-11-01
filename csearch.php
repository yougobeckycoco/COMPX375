<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>NIM Management - Search</title>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
	<link rel="stylesheet" type="text/css" href="css/main.css">
</head>
<body>
	<div id="main">
	<?= require 'partials/nav.php'; ?>

	<form action="csearchresults.php" method="POST" class="form-group">
		<label for="destination">Destination:</label>
		<input type="text" name="destination" id="destination" placeholder="Enter destination" class="form-control">
		<br>
		<label for="checkin">Dates:</label>
		<input type="date" name="checkin" id="checkin"> to <input type="date" name="checkout" id="checkout" class="form-control">
		<br>
		<label for="housetype">House type:</label>
		<select name="housetype" id="housetype" class="form-control">
			<option value="apartment">Apartment</option>
			<option value="house">House</option>
			<option value="lifestyle">Lifestyle Block</option>
		</select>
		<br>
		<label for="people">Number of people:</label>
		<input type="number" name="people" id="people" class="form-control">
		<br>
		<label for="rooms">Number of rooms:</label>
		<input type="number" name="rooms" id="rooms" class="form-control">
		<br>
		<label for="mincost">Price range:</label>
		<input type="number" name="mincost" id="mincost" class="form-control"> to <input type="number" name="maxcost" id="maxcost" class="form-control">
		<br>
		<button type="submit" class="btn btn-default"> Search </button>

	</form>

</div>

</body>
</html>