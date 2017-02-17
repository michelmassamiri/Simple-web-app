<?php
try{
	$server = "localhost";
	$user = "root";
	$pass = "needsomething";
	$conn = new PDO("mysql:host=localhost;dbname=WEB",$user,$pass);
	$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
}catch(PDOException $err){
	echo "Connection to DB FAILED" . $err->getMessage();
}

?>