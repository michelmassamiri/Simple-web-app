<!DOCTYPE html>
<html lang="en">
	<head>
		<title>Entreprise</title>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
	</head>
	<body>
      	<?php
                include_once ("navbar.php");
				?>
		<div class="container">
			<div class="jumbotron">
			
				<?php
                include_once ("../controller/function.php");
                $websiteFunctions = new WebsiteFunctions();
                $websiteFunctions -> usersView();
                //$websiteFunctions -> usersXMLList($websiteFunctions -> getUsers());

				?>
				
			</div>
		</div>
	</body>
</html>