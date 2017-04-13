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
                        $date_formate = date_format($date, 'Y-m-d');
                        $contenu = $service['contenu'];
                        $auteur = $service['auteur'];
                        $id = $service['id'];
                        $html = '
                        <div class = container>
                            <div class="row">
                                <div class="col-md-12 col-xs-12">
                                    <div class="thumbnail">
                                        <h3>' .$categorie. '</h3>
                                        <h3>' .$lieu. '</h3>
                                        <h3>' .$date_formate.'</h3>
                                        <p>'  .$contenu.'</p>
                                        <p>'  .$auteur.'</p>
                                     </div>
                                </div>
                            </div>
                         </div>
                        ';

                        echo $html;

                        if($_SESSION['droit']) {
                            ?>
                            <?php $link = "../controller/services.php?service_id=" . urlencode($id); ?>
                            <a href="<?php echo htmlspecialchars($link); ?>" class="btn btn-info" role="button">Modifier un Service</a>
                            <?php

                        }
                    }
                ?>
            </div>
        </div>

    </body>



</html>
