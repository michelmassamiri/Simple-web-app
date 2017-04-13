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
?>
