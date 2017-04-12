<?php
include_once('conn.php');

function check($login, $password){
    $conn = connectDB();
    $query = "SELECT * FROM PrTec_Users WHERE login=\"".$login."\" AND password=\"".$password."\"";
    echo $query;
    $stmt = $conn->query($query);
    $data = $stmt->fetch();
    if( $stmt->rowCount() ==1 )
        return true;
    else
        return false;//pas dans la bdd
}

function getdroit($login, $password){
    $conn = connectDB();
    $query = "SELECT * FROM PrTec_Users WHERE login=\"".$login."\" AND password=\"".$password."\"";
    $stmt = $conn->query($query);
    $data = $stmt->fetch();
    if (isset($data))
        return $data['droits'];
    else
        echo 'error';
}
