<?php
session_start();
//TODO : Securiser l'echange service id.

/* Call the view in order to do the modifications */
if(empty($_POST)){
    require ('../view/update_service.php');
}

/* The view  have sent back the controller the user modifications */
else {
    /* Build the data array for the model */
    $Post_array = array(
        'categorie' => $_POST["categorie"],
        'auteur' => $_POST["auteur"],
        'adresse' => $_POST["adresse"],
        'date' => $_POST["date"],
        'lieu' => $_POST["lieu"],
        'contenu' => $_POST["contenu"]
    );

    $data = array();
    foreach ($Post_array as $key => $value) {
        if(empty($value)) {
            continue;
        }
        else {
            $data["{$key}"] = $value;
        }
    }

    /* Call the model */
    require ('../model/services.php');
    $result = update_service($data, $_SESSION["service_id"]);

    if($result) {
        header("location:../controller/services.php");
    }

}


?>