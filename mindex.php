<?php
require 'includes/config.php';
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>NIM - Admin Homepage</title>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
	<link rel="stylesheet" type="text/css" href="css/main.css">
</head>
<body>

	

	<div id="main">

		<?= require 'partials/navigation.php'; ?>

		
		<form action="history.php" method="GET">
		<input type="text" name="client" placeholder="Enter client first or last name" />
		<button>Search</button>
		</form>

		
		
	</div>

</body>
</html>