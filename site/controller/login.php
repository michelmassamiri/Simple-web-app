<?php
if(isset($_GET["logout"]) && $_GET["logout"] == 1){
    //deconnecte todo
}
else{
    $login = $_POST["login"];
    $password = $_POST["password"];

    if(!isset($login) && !isset($password)){
        if(check($login, $password)){//todo dans model qui verifie dans la bdd
            $_SESSION["login"] = $login;
            $_SESSION["password"] = $password;
            $_SESSION["droit"] = getdroit($login);//todo dans model qui retourne le droit de l'auteur
        }
    }
}

header("location:../view/welcome");

?>