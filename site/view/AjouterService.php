<!DOCTYPE html>
<html lang="fr">
<head>
    <title>Ajouter Un service</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<body>
<?php include_once ("navbar.php"); ?>

<div class="jumbotron">
    <div class="container">
        <form data-toggle="data-validator" class="form-horizontal" role="form" method="POST" action="../controller/AjouterService.php">
            <div class="form-group row">
                <label for="example-text-input" class="col-2 col-form-label">Categorie</label>
                <div class="col-10">
                    <input class="form-control" type="text" name="categorie" id="example-text-input" required>
                </div>
            </div>
            <div class="form-group row">
                <label for="example-auteur-input" class="col-2 col-form-label">Auteur</label>
                <div class="col-10">
                    <input class="form-control" type="text" name="auteur" id="example-search-input" required>
                </div>
            </div>
            <div class="form-group row">
                <label for="example-adresse-input" class="col-2 col-form-label">L'adresse</label>
                <div class="col-10">
                    <input class="form-control" type="text" name="adresse" id="example-email-input" required>
                </div>
            </div>
            <div class="form-group row">
                <label for="example-date-input" class="col-2 col-form-label">Date</label>
                <div class="col-10">
                    <input class="form-control" type="date" name="date" id="example-date-input" required>
                </div>
            </div>
            <div class="form-group row">
                <label for="example-lieu-input" class="col-2 col-form-label">Lieu du service</label>
                <div class="col-10">
                    <input class="form-control" type="text" name="lieu" id="example-url-input" required>
                </div>
            </div>
            <div class="form-group row">
                <label for="example-contenu-input" class="col-2 col-form-label">Description du service</label>
                <div class="col-10">
                    <textarea class="form-control" name="contenu" rows="5" id="contenu"></textarea>
                </div>
            </div>
            <button type="submit" class="btn btn-success">Ajouter le service</button>
        </form>
    </div>
</div>
