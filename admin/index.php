<!--
     Copyright (C) 2017  Michel Massamiri, Enzo Peruzzetto, Matthias Paulmier

     This program is free software: you can redistribute it and/or modify
     it under the terms of the GNU Affero General Public License as
     published by the Free Software Foundation, either version 3 of the
     License, or (at your option) any later version.

     This program is distributed in the hope that it will be useful,
     but WITHOUT ANY WARRANTY; without even the implied warranty of
     MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
     GNU Affero General Public License for more details.

     You should have received a copy of the GNU Affero General Public License
     along with this program.  If not, see <http://www.gnu.org/licenses/>.
   -->
<!DOCTYPE html>
<html lang="en">
    <head>
	<title>Intallation</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    </head>
    <div class="container">
	<h1>Installation du projet</h1>
        <h2>Bienvenue dans le script d'installation de votre projet</h2><br><br>
        <div class="container">
            <form date-toggle="date-validator" class="form-horizontal" action="install.php" method="POST">
		<div class="form-group">
                    <h3>Installation de la base de données</h3>
                    <p>
                        Après avoir terminé de saisir les information demandées sur cette page, un script installera le site sur votre serveur ainsi qu'une base de données.<br>
                        Le site sera alors opérationnel. 
                    </p>
                    <label class="control-label"> Veuillez saisir le nom de votre projet : </label>
		    <input type="text" name="project_name" placeholder="Nom du projet" class="form-control" required><br>
                    <p>
                        Ce script installe une base de données sur votre serveur. Cette base de données est nécessaire pour le bon fonctionnement du site.<br>
                        Cette base de données nécessite les informations suivantes : 
                    </p>
		    <label class="control-label"> Veuillez saisir le nom de la base de données : </label>
		    <input type="text" name="dbname" placeholder="Nom de la base de données" required class="form-control"><br>
                    <p>
                        Les identifiants de la base de données sont nécessaires pour installer celle-ci.
                    </p>
                    <label class="control-label"> Veuillez saisir le nom de d'utilisateur : </label>
		    <input type="text" name="dbuser" placeholder="Nom d'utilisateur de la base de données" required class="form-control"><br>
                    <label class="control-label"> Veuillez saisir le mot de passe pour cet utilisateur : </label>
		    <input type="text" name="dbpass" placeholder="Mot de passe" required class="form-control"><br>
                    <h3>Création du super utilisateur</h3>
                    <p>
                        Afin de pouvoir effectuer des actions d'administrations, nous devons créer un compte super utilisateur<br>
                        Veuillez saisir le nom et le mot de passe de cet utilisateur.
                    </p>
		    <label class="control-label"> Veuillez saisir le nom du super utilisateur : </label>
		    <input type="text" name="suname" placeholder="Nom du super utilisateur" required class="form-control"><br>
		    <label class="control-label"> Veuillez saisir le mot de passe du super utilisateur : </label>
		    <input type="password" name="supass1" placeholder="Mot de passe" required class="form-control"><br>
		    <input type="password" name="supass2" placeholder="Saisir à nouveau" required class="form-control"><br>
                    <h3>Localisation</h3>
                    <p>
                        Vous allez maintenant pouvoir choisir ou installer votre site.
                    </p>
		    <label class="control-label"> Veuillez saisir le chemin du répertoire d'intallation (chemin actuel par défaut) : </label>
		    <input type="text" name="location" value="<?php echo exec(pwd); ?>" required class="form-control"><br>
		</div>
		<div class="form-group">
		    <button type="submit" class="btn btn-default">Installation</button>
                </div>
            </form>
        </div>
    </div>
</html>

