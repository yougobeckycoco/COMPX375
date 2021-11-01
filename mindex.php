<?php
require 'includes/config.php';

if($_SERVER["REQUEST_METHOD"] == "GET") {
	$client = isset($_GET['client']) ? $_GET['client'] : '';
	if (!empty($client)) {
		$clients = searchClient($dbh, $client);
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
	<title>NIM - Admin Homepage</title>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
	<link rel="stylesheet" type="text/css" href="css/main.css">
</head>
<body>

	

	<div id="main">

		<?php require 'partials/navigation.php'; ?>

<h1><tit> Search clients </tit></h1>
		
		<form action="mindex.php" method="GET" class="form-group">
			<label for="client">Enter client name</label>
		<input type="text" name="client" placeholder="Enter client first or last name" class="form-control"/>
		<div class="f-but">
		<button type="submit" class="btn btn-primary">Search</button>
	</div>
		</form>

		<div class="c-list">
			<div class="c-head">Full name</div>
			<div class="c-head">Email</div>
			<div class="c-head">Phone</div>
			<div class="c-head">View client history</div>


<?php
        if(!empty($clients)):
        foreach ($clients as $cli):
    ?>
<div class="c-entry"> <?= substr($cli['fname'], 0, 150) ?> <?= substr($cli['lname'], 0, 150) ?> 
</div>
 <div class="c-entry"> <?= substr($cli['email'], 0, 150) ?> 
 </div> 
 <div class="c-entry"> <?= substr($cli['phone'], 0, 150) ?>
 </div> 
 <div class="c-entry">   <a href="./history.php?client=<?= $cli['fname'] ?>">View history</a>
 </div>
 <div class="c-entryg"></div>

<?php
        endforeach;
        else:
      ?>
    <div class="c-entry">
     No clients found.
    </div>
     <div class="c-entryg"></div>
    <?php
        endif;
      ?>
		</div>
		
	</div>

</body>
</html>