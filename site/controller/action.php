<?php
include ($_SERVER["DOCUMENT_ROOT"] . "/site/controller/function.php");

/*@Description: This file is expecting a POST request containing variables needed to create a new user
 * POST variables(types): nom (string), prenom(string), birthdate(date), tel(string 10 num), password(string),
 * email(string)
 * @Called by : users.php
 * @Call : Call the confirmation page
 * @Includes : function.php*/

//TODO: ADD SERVER REQUEST METHOD
$websiteFunctions = new WebsiteFunctions;
$POSTArray = array($_POST["nom"], $_POST["prenom"], $_POST["birthdate"], $_POST["tel"], $_POST["password"], $_POST["email"]);
if ($websiteFunctions -> testIssetEmpty($POSTArray)
	&& is_string($_POST["nom"])
	&& is_string($_POST["prenom"])
	&& is_string($_POST["tel"])
	&& $websiteFunctions -> emailAlreadyExist($_POST["email"])) {
	$nom = $_POST["nom"];
	$prenom = $_POST["prenom"];
	$birthdate = date_create($_POST["birthdate"]); //need to explode "-" and format yyyy-mm-dd
	$tel = $_POST["tel"];
	$password = $_POST["password"];
	$email = $_POST["email"];
	$uuid = $websiteFunctions -> randomUUID();
	$websiteFunctions -> addUser($nom, $prenom, $birthdate, $tel, $email, md5($password));
	$websiteFunctions -> addUUID($uuid,$email);
	header("Location: confirm.php?uuid=" . $websiteFunctions -> randomUUID());
	exit;
}
header('Location: ../index.php');
?>
