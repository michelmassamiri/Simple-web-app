<?php
	include_once('conn.php');
	include_once('classQuestion.php');
	
	$conn = connectDB();
	
	//regarder dans base le dernier id reponse et rajouter 1 pour nouveaux id 
	$query = "SELECT id_question FROM PrTec_Question ORDER BY id_question ASC";
	$stmt = $conn->query($query);
	while ($data = $stmt->fetch()){
		$new_id = $data['id_question']; 
	}
	$new_id = $new_id + 1;
	
	$new_question = new Question($new_id, $auteur, $texteQuestion, date("Y/m/d") );
	
	//ajoute $reponse a la bdd
	$query = 'INSERT INTO PrTec_Question VALUES ('.$new_question->getID().', \''.$new_question->getAuteur().'\', \''.$new_question->getQuestion().'\', \''.$new_question->getDate().'\')';
	$stmt = $conn->query($query);
	if(!isset($stmt))
		echo'ERROR insert BDD';



?>