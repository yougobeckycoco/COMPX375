<?php
require 'includes/config.php';

if($_SERVER["REQUEST_METHOD"] == "GET") {
	$client = isset($_GET['client']) ? $_GET['client'] : '';
	if (!empty($client)) {
		$clients = searchHistory($dbh, $client);
	}
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
	<title>NIM - History of reviews</title>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
	<link rel="stylesheet" type="text/css" href="css/main.css">
</head>
<body>

	<div id="main">

		<?php require 'partials/navigation.php'; ?>

		<h1><tit> History of reviews </tit></h1>

		<form action="history.php" method="GET" class="form-group">
			<label for="client">Enter client name</label>
		<input type="text" name="client" placeholder="Enter client first or last name" class="form-control"/>
		<div class="f-but"><button type="submit" class="btn btn-primary">Search</button></div>
		</form>


		
		<div class="h-list">
			<div class="h-head">Full name</div>
			<div class="h-head">Address</div>
			<div class="h-head">Damage</div>
			<div class="h-head">Payment</div>
			<div class="h-head">Tidiness</div>
			<div class="h-head">Comment</div>

		<?php
      if(!empty($clients)):
        foreach ($clients as $cli):
    ?>
    <div class="h-entry"> <?= substr($cli['fname'], 0, 150) ?> <?= substr($cli['lname'], 0, 150) ?> </div>
    <div class="h-entry"> <?= substr($cli['address'], 0, 150) ?> </div>
    <div class="h-entry"> <?= substr($cli['damage_rating'], 0, 150) ?> out of 5 </div>
    <div class="h-entry"> <?= substr($cli['payment_rating'], 0, 150) ?> out of 5 </div>
    <div class="h-entry"> <?= substr($cli['tidiness_rating'], 0, 150) ?> out of 5 </div>
    <div class="h-entry"> <?= substr($cli['comment'], 0, 150) ?>   </div>

    <div class="h-entryg"></div>

<?php
        endforeach;
        else:
      ?>
    <div class="h-entry">
     No reviews.
    </div>
     <div class="h-entryg"></div>
    <?php
        endif;
      ?>
</div>

	</div>

</body>
</html>