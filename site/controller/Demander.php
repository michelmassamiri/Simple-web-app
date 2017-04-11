<?php
    session_start();
    if(isset($_SESSION["login"]))
        $auteur = "Anonyme";
	$texteQuestion = $_POST["description"];
    $auteur = $_SESSION["login"];
	include_once('../model/modDemander.php');
	
	header("location:../controller/faq.php");
?>