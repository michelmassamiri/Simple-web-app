<!DOCTYPE html>
<html lang="en">
<head>
	<title>Website Test Users - Add User</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<body>
<?php
include_once("navbar.php");
session_start();
if( !isset($_SESSION['session_id']) || session_id() == $_SESSION['session_id']){
    session_regenerate_id();
    $_SESSION['session_id'] = session_id();
}
if(!isset($_SESSION["login"])){
    $auteur = "Anonyme";
    $_SESSION['droits'] = 0;
}
?>

<div class="jumbotron">
    <div class="container">
			<h2>Bienvenue dans la Foire Aux Question</h2>
			<br />
			<form method="POST" action="../controller/Demander.php">
			<textarea name="description" placeholder="Poser vôtre question ici." rows="5" cols="100" required></textarea>
			<br /><button type="submit" class="btn btn-success btn-lg" >Posez votre question</button>
			</form>
			<br />
			<?php
			foreach ($faq->getArrayQ() as $question){
				if( isset($question)){
					echo '<div class="panel panel-primary">';
					echo '<div class="panel-heading">Question de '.$question->getAuteur().': '.$question->getQuestion().' Poster le '.$question->getdate().'</p></div>';
					echo '<div class="panel-body">';
					foreach ($faq->getReponseQuestion($question) as $reponse){
						if(isset($reponse)){
							echo '<h3>Reponse de '.$reponse->getAuteur().':</h3>';
							echo '<p>'.$reponse->getReponse().'<br />';
							echo 'repondu le '.$reponse->getdate().'</p>';
                            if($_SESSION['droit'] == 1)
                                echo '<a href="../controller/supprimerQRU.php?id='.$reponse->getReponseID().'&value=1" > <button type="submit" class="btn btn-danger"> supprimer la réponse</button></a>';
							
						}
					}
					echo '<form method="POST" action="../controller/Repondre.php?id='.$question->getID().'">';
					echo '<textarea name="description" placeholder="Poser vôtre reponse ici." rows="5" cols="100" required></textarea>';
					echo '<br /><button type="submit" class="btn btn-primary">Repondre</button>';
					echo '</form>';
					echo '</div>';
                    if($_SESSION['droit'] == 1)
                        echo '<a href="../controller/supprimerQRU.php?id='.$question->getID().'&value=0 ><button type="submit" class="btn btn-danger"> supprimer la question</button></a>';
					echo'</div>';
					echo '<br />';
				}
				
			} 
			?>
			
			
			
			
		</div>
</div>
</body>
</html>	
		

