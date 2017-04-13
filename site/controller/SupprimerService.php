<?php

if(isset($_GET["service_id"])) {
    $id = $_GET["service_id"];

    /* Call the model */
    require ('../model/services.php');

    $res = delete_service($id);
    if($res) {
       header("location:../controller/services.php");
    }

}