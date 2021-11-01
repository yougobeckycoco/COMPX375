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

		<h1><tit> Show results </tit></h1>
		<h6>Showing results: for Hillcrest, 5/11/2021 to 10/12/2021, House, 4 people, 2 rooms, $50 to $550</h6>
		<a class="filter">Sort by low to high</a>

		<div id="results">
			
			<div class="result">
				<div class="rpic"><img src="http://placehold.it/300x200">
					<div class="rbk"><a href="viewproperty.php" class="rmore">More information</a></div>
				</div>
				<div class="stats"><h2><tit>Hillcrest, 3216</tit></h2>
					<p><b>4</b> people, <b>2</b> bedrooms</p>
					<price>$450 per week</price>
			</div>

		</div>
	</div>

</body>
</html>