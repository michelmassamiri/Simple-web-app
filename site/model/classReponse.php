<?php
	class Reponse{
		private $id_reponse;
		private $id_question;
		private $auteur;
		private $date;
		private $reponse;
		
		public function __construct($id_reponse, $id_question, $auteur, $date, $reponse){
			$this->id_reponse = $id_reponse;
			$this->id_question = $id_question;
			$this->auteur = $auteur;
			$this->date = $date;
			$this->reponse = $reponse;
		}
		
		protected function setReponseID($id){
			$this->id_reponse = $id;
		}
		
		protected function setAuteur($auteur){
			$this->auteur = $auteur;
		}
		
		protected function setDate($date){
			$this->date = $date;
		}
		
		protected function setReponse($reponse){
			$this->reponse = $reponse;
		}
		
		public function getReponseID(){
			return $this->id_reponse;
		}
		
		public function getQuestionID(){
			return $this->id_question;
		}
		
		public function getAuteur(){
			return $this->auteur;
		}
		
		public function getDate(){
			return $this->date;
		}
		
		public function getReponse(){
			return $this->reponse;
		}
	}
?>