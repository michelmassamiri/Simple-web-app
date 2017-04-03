<?php 
	include_once('conn.php');
	include_once('classReponse.php');
	
	// session_start();
	
	$conn = connectDB();
	
	//regarder dans base le dernier id reponse et rajouter 1 pour nouveaux id 
	$query = "SELECT id_reponse FROM PrTec_Reponse ORDER BY id_reponse ASC";
	$stmt = $conn->query($query);
	while ($data = $stmt->fetch()){
		$new_id = $data['id_reponse']; 
	}
	$new_id = $new_id + 1;
	echo date("Y/m/d");
	//$reponse = new reponse(nouveaux id, $id_question, auteur= login session, date("j/n/Y"), $texteReponse);
	$new_reponse = new Reponse($new_id, $id_question, 'enzo'/*$_SESSION['login']*/, date("Y/m/d"), $texteReponse);
	
	//ajoute $reponse a la bdd
	$query = 'INSERT INTO PrTec_Reponse VALUES ('.$new_reponse->getReponseID().', '.$new_reponse->getQuestionId().', \''.$new_reponse->getAuteur().'\', \''.$new_reponse->getReponse().'\', \''.$new_reponse->getDate().'\')';
	$stmt = $conn->query($query);
	if(!isset($stmt))
		echo'ERROR insert BDD';
	
	
?>