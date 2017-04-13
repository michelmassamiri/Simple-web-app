<!DOCTYPE html>
<html lang="fr">
    <head>
        <title>Les services</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    </head>
    <body>
    <?php include_once ("navbar.php"); ?>
        <div class="container">
            <div class="jumbotron">
                <?php

                    foreach ($services as $service){
                        $categorie = $service['categorie'];
                        $lieu = $service['lieu'];
                        $date = date_create($service['date']);
                        $date_formate = date_format($date, 'd-m-Y');
                        $contenu = $service['contenu'];
                        $auteur = $service['auteur'];
                        $id = $service['id'];
                        if($_SESSION['droit']) {
                            $link_modif = "../controller/services.php?service_id=" . urlencode($id);
                            $link_delete = "../controller/SupprimerService.php?service_id=" . urlencode($id);
                            $url_modif = htmlspecialchars($link_modif);
                            $url_delete = htmlspecialchars($link_delete);
                            $modif_button = '<a href='. $url_modif .' class="btn btn-success" role="button">Modifier un Service</a>';
                            $delete_button = '<a href='. $url_delete .' class="btn btn-danger" role="button">Supprimer un Service</a>';
                        }

                        $html = '
                        <div class = container>
                            <div class="row">
                                <div class="col-md-12 col-xs-12">
                                    <div class="thumbnail">
                                        <h3>Le Type de Service : ' .$categorie. '</h3>
                                        <h3>À : ' .$lieu. '</h3>
                                        <h3>La date du service : Le ' .$date_formate.'</h3>
                                        <p> Description du service : ' .$contenu.'</p>
                                        <p>Organisé par : '  .$auteur.'</p>
                                        '. $modif_button .' '. $delete_button .'
                                    </div>
                                </div>
                            </div>
                        </div>
                        ';

                        echo $html;

                    }
                ?>
            </div>
        </div>

    </body>



</html>
