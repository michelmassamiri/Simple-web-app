<?php

include_once('conn.php');

function supprQ($idquestion){
    $conn = connectDB();
    
    //suppr reponse de la question
    $query = "DELETE FROM PrTec_Reponse WHERE id_question=".$idquestion;
    $stmt = $conn->query($query);

    //suppr question
    $query = "DELETE FROM PrTec_Question WHERE id_question=".$idquestion;
    $stmt = $conn->query($query);
}

function supprR($idreponse){
    $conn = connectDB();
    
    //suppr reponse
    $query = "DELETE FROM PrTec_Reponse WHERE id_reponse=".$idreponse;
    $stmt = $conn->query($query);
}

function supprU($email){
    $conn = connectDB();
    echo 'conn';
    //suppr user
    $query = "DELETE FROM PrTec_Users WHERE email=\"".$email."\"";
    echo '<br/>'.$query;
    $stmt = $conn->query($query);
    echo 'fin';
}
?>
