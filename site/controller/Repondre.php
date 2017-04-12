<?php
session_start();
if( !isset($_SESSION['session_id']) || session_id() == $_SESSION['session_id']){
    session_regenerate_id();
    $_SESSION['session_id'] = session_id();
}
if(!isset($_SESSION["login"])){
    $_SESSION['session_id'] = session_id();
    $_SESSION['login'] = "Anonyme";
    $_SESSION['droits'] = 0;
}

$texteReponse = $_POST["description"];
$id_question = $_GET["id"];
$auteur = $_SESSION["login"];
	
include_once('../model/modRepondre.php');
	
header("location:../controller/faq.php");
?>