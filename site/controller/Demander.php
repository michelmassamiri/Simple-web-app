<?php
	$texteQuestion = $_POST["description"];
	
	include_once('../model/modDemander.php');
	
	header("location:../controller/faq.php");
?>