<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>NIM - Search results</title>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
	<link rel="stylesheet" type="text/css" href="css/main.css">
</head>
<body>

	

	<div id="main">

		<?php require 'partials/nav.php'; ?>
		<p>Showing results for destination, date to date, house type, # people, # rooms, $## to $##</p>
		<a>Sort by low to high</a>

		<div id="results">
			
			<div class="result">
				<img src="http://placehold.it/200">
				<a href="viewproperty.php">link to result</a>
				<div class="stats"><h2>Hillcrest, 3216</h2>
					<p>4 people, 2 bedrooms</p>
					<price>$450 per week</price>
			</div>

		</div>
	</div>

</body>
</html>