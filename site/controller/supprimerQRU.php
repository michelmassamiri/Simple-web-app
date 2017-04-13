<?php

include_once('../model/modSupprQRU.php');

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
        header('location: ./faq.php');
    }if($value == 1){
        $idreponse = $_GET['id'];
        if(isset($idreponse))
            supprR($idreponse);
        header('location: ./faq.php');
    }if($value == 2){
        echo'suppr users';
        $email = $_GET['email'];
        echo 'email: '.$email;
        if(isset($email)){
            echo 'avant suppr';
            supprU($email);
            echo 'apres suppr';
        }
        echo 'header';
        header('location: ../view/listusers.php');
    }
}



?>
    