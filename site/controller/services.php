<?php

session_start();

/* Check if the admin want to edit a service so the update contraller will take the charge */
if(isset($_GET["service_id"])) {
    /* Get the Service Id */
    $id = $_GET["service_id"];
    $_SESSION["service_id"] = $id;
    require ('ModifierService.php');
}

/* No modifications demanded */
else {
    /* Call the model */
    require('../model/services.php');

    /* Get the services from the data base via the model */
    $services = get_services();

    /* Show the services via the view */
    require('../view/listServices.php');
}


?>