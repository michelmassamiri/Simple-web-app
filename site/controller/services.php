<?php

//Call the model
require('../model/services.php');

//Get the services from the data base via the model
$services = get_services();

//Show the services via the view
require('../view/listServices.php');

?>