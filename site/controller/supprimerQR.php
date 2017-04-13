<?php

include_once('../model/modSupprQR.php');

session_start();
if( !isset($_SESSION['session_id']) || session_id() == $_SESSION['session_id']){
    session_regenerate_id();
    $_SESSION['session_id'] = session_id();
}
if(!isset($_SESSION["login"])){
    $auteur = "Anonyme";
    $_SESSION['droits'] = 0;
}

$value = $_GET['value'];
if(isset($value)){
    if($value == 0){
        $idquestion = $_GET['id'];
        if(isset($idquestion))
            supprQ($idquestion);
    }else{
        $idreponse = $_GET['id'];
        if(isset($idreponse))
            supprR($idreponse);
    }
}

header('location: ./faq.php');

?>
    