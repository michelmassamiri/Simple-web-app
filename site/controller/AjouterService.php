<?php

//TODO : Verifier l'histoire de time.

/* Build the data array for the model */
$Post_array = array(
    'categorie' => $_POST["categorie"],
    'auteur' => $_POST["auteur"],
    'adresse' => $_POST["adresse"],
    'date' => $_POST["date"],
    'lieu' => $_POST["lieu"],
    'contenu' => $_POST["contenu"]
);

$phptime = strtotime($_POST['date']);
$mysqltime = date ("Y-m-d H:i:s", $phptime);

/* Call the model */
require ('../model/services.php');
$result = add_service($Post_array['categorie'], $Post_array['auteur'], $Post_array['adresse'], $mysqltime, $Post_array['lieu'], $Post_array['contenu']);

if($result) {
    header("location:../controller/services.php");
}