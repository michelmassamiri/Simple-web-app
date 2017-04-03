<?php
// Accès aux données
include_once('classFaq.php');
include_once('conn.php');

$conn = connectDB();
$faq = new FAQ();
$arrayquestion = array();
$arrayReponse = array();

//question
$query = "SELECT * FROM PrTec_Question";
$stmt = $conn->query($query);
while( $data = $stmt->fetch()){
	$question = new Question($data['id_question'], $data['auteur'], $data['question'], $data['date']);
	$faq->addQuestion($question);
}


//reponse
$query = "SELECT * FROM PrTec_Reponse";
$stmt = $conn->query($query);
while( $data = $stmt->fetch()){
	$reponse = new Reponse($data['id_reponse'], $data['id_question'], $data['auteur'], $data['date'], $data['reponse']);
	$faq->addReponse($reponse);
}



?>