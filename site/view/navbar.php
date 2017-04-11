<?php
	$path = "/projettechnotmpp/site/";
?>
<nav class="navbar navbar-default">
	<div class="container-fluid">
		<div class="navbar-header">
			<a class="navbar-brand" href="<?php echo $path; ?>">Website Test Users</a>
		</div>
		<ul class="nav navbar-nav">
			<li class="active"><a href="<?php echo $path; ?>index.php">Home</a></li>
			<li><a href="<?php echo $path; ?>view/listusers.php">Liste des utilisateurs</a></li>
			<li><a href="<?php echo $path; ?>view/users.php">Add User</a></li>
            <li><a href="<?php echo $path; ?>controller/faq.php">FAQ</a></li>
            <li><a href="<?php echo $path; ?>controller/services.php">Afficher les services</a></li>
        </ul>
	</div>
</nav>
