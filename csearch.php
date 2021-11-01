<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>NIM - Search</title>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
	<link rel="stylesheet" type="text/css" href="css/main.css">
</head>
<body>

	<div id="main">
	<?php require 'partials/nav.php'; ?>

	<h1><tit>Search for property</tit></h1>

	<form action="csearchresults.php" method="POST" class="form-group">
		<label for="destination">Location:</label>
		<input type="text" name="destination" id="destination" placeholder="Enter location" class="form-control">
		
		<div class="form-group f-row">
			<div class="col">
		<label for="checkin">Check in:</label>
		<input type="date" name="checkin" id="checkin" class="form-control"> 
		</div> <div class="col">
			<label for="checkout">Check out:</label>
			<input type="date" name="checkout" id="checkout" class="form-control"></div></div>
		
		<label for="housetype">House type:</label>
		<select name="housetype" id="housetype" class="form-control">
			<option value="apartment">Apartment</option>
			<option value="house">House</option>
			<option value="lifestyle">Lifestyle Block</option>
		</select>
		
		<div class="form-group f-row">
			<div class="col">
		<label for="people">Number of people:</label>
		<input type="number" name="people" id="people" class="form-control" placeholder="1-10" min="1" max="10">
	</div><div class="col">
		<label for="rooms">Number of bedrooms:</label>
		<input type="number" name="rooms" id="rooms" class="form-control" placeholder="1-6" min="1" max="6">
		</div></div>

		<div class="form-group f-row">
			<div class="col">
		<label for="mincost">Min price:</label>
		<input type="number" name="mincost" id="mincost" class="form-control" placeholder="$50" min="50"> 
		</div><div class="col"> <label for="maxcost">Max price:</label> <input type="number" name="maxcost" id="maxcost" class="form-control" placeholder="$500+" min="50">
		</div></div>
		
		<div class="f-but">
		<button type="submit" class="btn btn-primary"> Search for property </button>
		<button type="reset" class="btn btn-danger"> Clear fields </button>
	</div>

	</form>

</div>

</body>
</html>