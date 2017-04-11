<?php
    session_start();
    if(isset($_SESSION["login"]))
        $auteur = "Anonyme";
	$texteReponse = $_POST["description"];
	$id_question = $_GET["id"];
    $auteur = $_SESSION["login"];
	
	include_once('../model/modRepondre.php');
	
	header("location:../controller/faq.php");
?>