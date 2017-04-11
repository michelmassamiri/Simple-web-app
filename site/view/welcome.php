<div class="jumbotron">
	<div class="container">
		<h1> Welcome to this test website </h1>
		<?php
		session_start();
		if (!isset($_SESSION["login"])) {
			include_once("login.php");
		}	
		else{
            
			echo "Welcome " . $_SESSION["login"] . "!\n";

			if (session_status() != PHP_SESSION_NONE) {
				echo "<form action=\"controller/login.php\" method=\"GET\">";
				echo "<button type=\"submit\" class=\"btn btn-default\" name=\"logout\" value=\"1\"> Se déconnecter </button>"	;
				echo "</form>";
			}	
		}
		?>
	</div>
</div>

</html>