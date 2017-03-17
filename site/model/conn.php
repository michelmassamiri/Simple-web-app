<?php

function connectDB ()
{
    try {
        $ini_array = parse_ini_file("config.ini");
        $server = "localhost";
        $user = "root";
        $pass = $ini_array["pass"];
        $conn = new PDO("mysql:host=localhost;dbname=WEB", $user, $pass);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    } catch (PDOException $err) {
        echo "Connection to DB FAILED" . $err->getMessage();

    }
    return $conn;
}


?>