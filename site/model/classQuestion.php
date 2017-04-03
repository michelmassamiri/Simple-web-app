<?php 
	class Question{
		private $id_question;
		private $auteur;
		private $question;
		private $date;
		
		public function __construct($id_question, $auteur, $question, $date){
			$this->id_question = $id_question;
			$this->auteur = $auteur;
			$this->question = $question;
			$this->date = $date;
		}
		
		protected function setID($id){
			$this->id_question = $id;
		}
		
		protected function setAuteur($auteur){
			$this->auteur = $auteur;
		}
		
		protected function setQuestion($question){
			$this->question = $question;
		}
		
		protected function setDate($date){
			$this->date = $date;
		}
		
		public function getID(){
			return $this->id_question;
		}
		
		public function getAuteur(){
			return $this->auteur;
		}
		
		public function getQuestion(){
			return $this->question;
		}
		
		public function getDate(){
			return $this->date;
		}
	}
?>