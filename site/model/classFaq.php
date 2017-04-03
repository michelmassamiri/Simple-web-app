<?php
	include_once('classQuestion.php');
	include_once('classReponse.php');

	class FAQ{
		private $question;
		private $reponse;
		
		public function __construct(){
			$this->question = array();
			$this->reponse  = array();
		}
		
		public function getArrayQ(){
			return $this->question;
		}
		
		public function getArrayR(){
			return $this->reponse;
		}
		
		public function AddQuestion($question){
			$this->question[$question->getID()] = $question;			
		}
		
		public function AddReponse($reponse){
			$this->reponse[$reponse->getReponseID()] = $reponse;			
		}
		
		public function getReponseQuestion($question){
			$id = $question->getID();
			$reponseQuestion = array();
			foreach ($this->reponse as $reponse){
				if($reponse->getQuestionID() == $id){
					array_push($reponseQuestion, $reponse);
				}
			}
			return $reponseQuestion;
		}
		
	}
?>