<?php

//TODO : La mise joure du service ne marche pas encore a cause de la reccuperation de l'ID.

if(isset($_POST["service_id"])) {
    /* Get the Service Id */
    $id = $_POST["service_id"];
    require ('../view/update_service.php');

    echo $id;
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
    $result = update_service($data, $id);

    if($result) {
        header("location:../controller/services.php");
    }
}

?>