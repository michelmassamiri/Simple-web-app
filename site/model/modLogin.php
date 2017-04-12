<?php
include_once('conn.php');

function check($login, $password){
    $conn = connectDB();
    $query = "SELECT * FROM PrTec_Users WHERE login=\"".$login."\" AND password=\"".$password."\"";
    $stmt = $conn->query($query);
    $data = $stmt->fetch();
    if( !isset($data))
        return 0;//pas dans la bdd
    else
        return 1;
}

function getdroit($login, $password){
    $conn = connectDB();
    $query = "SELECT * FROM PrTec_Users WHERE login=\"".$login."\" AND password=\"".$password."\"";
    echo 'droit';
    $stmt = $conn->query($query);
    echo 'conn';
    $data = $stmt->fetch();
    echo $data['droits'];
    if (isset($data['droits']))
        return $data['droits'];
    else
        echo 'error';
}
