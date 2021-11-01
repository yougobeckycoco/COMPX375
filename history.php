<?php
require 'includes/config.php';

if($_SERVER["REQUEST_METHOD"] == "GET") {
	$client = e($_GET['client']);
	if (!empty($client)) {
		$clients = searchHistory($dbh, $client);
	else{
		$clients = '';
	}
}
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>NIM - History of clients</title>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
	<link rel="stylesheet" type="text/css" href="css/main.css">
</head>
<body>

	<div id="main">

		<?= require 'partials/navigation.php'; ?>

		<form action="history.php" method="GET" class="form-group">
		<input type="text" name="client" placeholder="Enter client first or last name" class="form-control"/>
		<button type="submit" class="btn btn-default">Search</button>

		
		<?php
      if(!empty($clients)):
        foreach ($clients as $cli):
    ?>

    <p> <?= substr($cli['fname'], 0, 150) ?> <?= substr($cli['lname'], 0, 150) ?> &nbsp; <?= substr($cli['address'], 0, 150) ?> &nbsp; <?= substr($cli['damage_rating'], 0, 150) ?> &nbsp; <?= substr($cli['payment_rating'], 0, 150) ?> &nbsp; <?= substr($cli['tidiness_rating'], 0, 150) ?>  &nbsp; <?= substr($cli['comment'], 0, 150) ?>   </p>

<?php
        endforeach;
        else:
      ?>
    <li class="list-unstyled">
    <p> No clients under this name. </p>
    </li>
    <?php
        endif;
      ?>


	</div>

</body>
</html>