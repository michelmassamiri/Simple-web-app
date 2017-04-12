<div class="jumbotron">
	<div class="container">
		<h1> Services pour les handicapés et les séniors </h1>
<?php
     session_start();
if( !isset($_SESSION['session_id']) || session_id() == $_SESSION['session_id']){
    session_regenerate_id();
    $_SESSION['session_id'] = session_id();
}
if (!isset($_SESSION["login"])) {
    include_once("login.php");
}	
else{
    echo "Welcome " . $_SESSION["login"] . "!<br\>";
    if($_SESSION['droit'] == 1){
        echo '<p>Vous avez les droits administrateurs vous pouvez gérer, supprimer, ajouter des utilisateurs ,des services, des réponses et questions.<br/>Bonne session!</p>';
    }
    else{
        echo'<p>Bonjour chèr(e)s client(e)s vous avez la possibilité sur se site de poser des questions sur vos besoins mais aussi de répondre aux questions des autres personnes dans la section FAQ.</p>
<p>Vous pouvez aussi consulter les services disponibles dans la section \"les services\"</p>';
    }  
          
}
?>
	</div>
</div>

</html>