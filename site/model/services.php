<?php

function get_services() {
    require ('conn.php');

    $services = array();

    $db = connectDB();
    $response = $db->query('SELECT * FROM PrTec_Services');

    while($data = $response->fetch()){
        $services[] = $data;
    }

    return $services;

}

function add_service($categorie, $auteur, $adresse, $date, $lieu, $contenu){
  require('conn.php');

  $db = connectDB();

  $req = $db->prepare('INSERT INTO PrTec_Services(categorie, auteur, adresse, date, lieu, contenu) VALUES(:categorie, :auteur, :adresse, :date, :lieu, :contenu)');
  $req->execute(array(
  	'categorie' => $categorie,
  	'auteur' => $auteur,
  	'adresse' => $adresse,
  	'date' => $date,
  	'lieu' => $lieu,
  	'contenu' => $contenu
  	));

  return ($req->rowCount() == 1) ? true : false ;
}

function update_service($data, $id) {
    require('conn.php');

    $db = connectDB();

    $vars = array();
    $sql_array = array();
    foreach ($data as $key => $value) {
        if(empty($value)) {
            continue;
        }
        else {
            $vars[] = "{$key} = :nouv_{$key}" ;
            $sql_array["nouv_{$key}"] = $value;
        }
    }

    $vars_imploded = implode("," , $vars);
    $sql = "UPDATE PrTec_Services SET {$vars_imploded} WHERE id = {$id}";

    $req = $db->prepare($sql);
    $req->execute($sql_array);

    return ($req->rowCount() == 1) ? true : false ;
}

function delete_service($id) {
    require ('conn.php');

    $db = connectDB();
    //$sql = "DELETE FROM PrTec_Services WHERE id = {$id}";

    $req = $db->prepare("DELETE FROM PrTec_Services WHERE id=:id");
    $req->bindValue(':id',$id);

    $req->execute();
    return ($req->rowCount() == 1) ? true : false ;
}

?>
