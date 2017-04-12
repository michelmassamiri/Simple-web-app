<?php
include_once('../model/modLogin.php');
session_start();

if( !isset($_SESSION['session_id']) || session_id() == $_SESSION['session_id']){
    session_regenerate_id();
    $_SESSION['session_id'] = session_id();
}
if(!isset($_SESSION["login"])){
    $auteur = "Anonyme";
    $_SESSION['droits'] = 0;
}
$login = $_POST["login"];
$password = $_POST["password"];

if(isset($login) && isset($password)){
    if(check($login, $password)){
        $_SESSION["login"] = $login;
        $_SESSION["password"] = $password;
        $_SESSION["droit"] = getdroit($login, $password);
    }
    header('location:../index.php');
}else{
    include_once('../index.php');
}



?>