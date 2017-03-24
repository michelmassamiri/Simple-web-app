<?php

function connectDB ()
{
    try {
        $ini_array = parse_ini_file("../conf/app.ini");
        $server = $ini_array["db_hostname"];
        $user = $ini_array["db_user"];
        $pass = $ini_array["db_password"];
        $conn = new PDO("mysql:host=$server;dbname=$user", $user, $pass);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    } catch (PDOException $err) {
        echo "Connection to DB FAILED" . $err->getMessage();

    }
    return $conn;
}


?>