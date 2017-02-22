
<?php
include_once("../view/header.php");
include_once("../view/navbar.php");
//add a verification for external inputs
if(isset($_GET["uuid"]) && !empty($_GET["uuid"])){
	include_once("function.php");
	$websiteFunctions = new websiteFunctions();
	if($websiteFunctions -> checkUUIDExist($_GET["uuid"])){
		//$websiteFunctions -> getLink($_GET["uuid"]);
		echo "<p> Merci de vous êtes inscrit sur notre site ! <br>";
		echo "Pour finaliser votre inscription merci de cliquer sur le lien suivant pour confirmer votre inscription : " . $link ."<br/></p>";
	}else{
		echo "<p> Une erreur est survenue </p> <br>";
	}
}

?>