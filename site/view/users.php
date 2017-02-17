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
<script type="text/javascript">
function checkmail(){
	var email = document.geElementById("inputEmail").value;
	if(email){
		$.ajax({
			type: 'post',
			url: 'checkmail.php'
			data: {
				email=email,
			}, success: function(response) {
				$('#email_status').html(response);
				if(response == "OK")
					return true;
				else
					return false;
			}
		})
	}
}
</script>
	<div class="container">
		<div class="jumbotron">
		    <?php include_once("navbar.php");
		    ?>
			<form data-toggle="data-validator" class="form-horizontal" role="form" method="POST" action="../controller/action.php">
				<div class="form-group">
					<label class="control-label"> Nom : </label>
					<input type="text" name="nom" class="form-control" placeholder="Nom" required>
					<label class="control-label"> Prenom : </label>
					<input type="text" name="prenom" class="form-control" placeholder="Prenom" required>
				</div>
				<div class="form-group has-feedback">
					<label class="control-label"> Date de naissance : </label>
					<input type="date" name="birthdate" class="form-control" id="exampleofDOB1" data-error="dd/mm/yyyy" required>
				</div>
				<div class="form-group">
					<label class="control-label"> Numéro de téléphone : </label>
					<input type="text" class="form-control bfh-phone" data-country="FR" name="tel" required>
				</div>
				<div class="form-group">
					<label class="control-label"> E-mail : </label>
					<input type="email" name="email" class="form-control" id="inputEmail" placeholder="Email" data-error="Email invalid" required>
				</div>
				<div class="form-group">
					<label for="inputPassword" class="control-label"> Mot de passe : </label>
					<input type="password" class="form-control" data-min-length="6" data-max-length="20" name="password" placeholder="Enter your password" id="inputPassword" required>
					<div class="help-block with-errors">Mininum of 6 characters. Maximum of 20 characters</div>
					<label for="inputPassordConfirm" class="control-label"> Confirmer votre mot de passe : </label>			
					<input type="password" class="form-control" placeholder="Confirm your password" name="cpassword" data-min-length="6" data-max-length="20" id="inputPasswordConfirm" data-match="#inputPassword" data-error="The passwords doesn't match" required>
					<div class="help-block with-errors"></div>
				</div>
				<div class="form-group">
					<button type="submit" class="btn btn-default">Enregistrer</button>
				</div>
			</form>
		</div>
	</div>
</body>
</html>		