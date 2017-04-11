<?php

function get_services() {
    require ('conn.php');

    $services = array();

    $db = connectDB();
    $response = $db->query('SELECT * FROM PrTec_Services');

    while($data = $response->fetch()){
        $services[] = $data;
    }

    return $services;

}
?>