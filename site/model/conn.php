<?php
<<<<<<< HEAD
function connectDB (){   
    try{
        $conn = new PDO('mysql:host=' . $this->conf['db_hostname'] . '; dbname=' . $this->conf['db_name'], $this->conf['db_user'], $this->conf['db_password']);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }catch(PDOException $err){
        echo "Connection to DB FAILED " . $err->getMessage();
    }
    return $conn;
=======
try{
	$ini_array = parse_ini_file("config.ini");
	$server = "localhost";
	$user = "root";
	$pass = $ini_array["pass"];
	$conn = new PDO("mysql:host=localhost;dbname=WEB",$user,$pass);
	$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
}catch(PDOException $err){
	echo "Connection to DB FAILED" . $err->getMessage();
>>>>>>> 1d43a2ee58a1401ad6d8f1e99b9cc8eb3de853a5
}
?>