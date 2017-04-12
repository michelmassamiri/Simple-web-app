<div class="jumbotron">
	<div class="container">
		<h1> Services pour les handicapés et les séniors </h1>
		<?php
		session_start();
		if (!isset($_SESSION["login"])) {
			include_once("login.php");
		}	
		else{
            echo $_SESSION["droits"];
			echo "Welcome " . $_SESSION["login"] . "!<br\>";

		}
		?>
	</div>
</div>

</html>