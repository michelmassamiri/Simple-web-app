<?php
	$texteReponse = $_POST["description"];
	$id_question = $_GET["id"];
	
	include_once('../model/modRepondre.php');
	
	header("location:../controller/faq.php");
?>