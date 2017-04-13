<?php include_once('header.php'); ?>
	<body>
      	<?php
                include_once ("navbar.php");
				?>
<div class="jumbotron">
      <div class="container">
			
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