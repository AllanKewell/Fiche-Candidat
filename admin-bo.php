<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="css/admin.css">
	<title>Back Office Admin</title>
</head>
<body>

	<div class="container-fluid">

		<header>
			<div class="row">
				<div class="col-md-4">
					<a style="display: inline-block" href="#"><img class="img-responsive" style="margin: 10px 0 0 0" src="img/cjlogo.png" width="50" height="41" alt="Logo CLEFJOB"></a>
				</div>
				<div class="col-md-8">
					<ul class="nav navbar-nav navbar-right">
				      <li><a href="#"><span style="margin-right: 10px" class="glyphicon glyphicon-user"></span>S'inscrire</a></li>
				      <li><a href="#"><span style="margin-right: 10px" class="glyphicon glyphicon-log-in"></span>Connexion</a></li>
				    </ul>
				</div>
			</div>
		</header>

		<div class="row">
			<div id="criteres" class="col-md-12">
				
			</div>
		</div>
		<div class="row">
			<div id="searchbtn" class="col-md-4 col-md-offset-4">
				<button class="btn btn-primary btn-block">Rechercher</button>
			</div>
		</div>
	</div>

	<?php
		try {
			$bdd = new PDO('mysql:host=localhost;dbname=candidat;charset=utf8', 'root', '', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
		} catch (Exception $e) {
			die('Erreur : ' . $e->getMessage());
		}
		
		$donnees = $bdd->query('SELECT * FROM informatique');

		while($result = $donnees->fetch()) {
			echo $result['nom'] . ', ' . $result['prenom'] . ', ' . $result['email'] . ', ' . $result['permis'] . '<br />';
		}
	?>
</body>
</html>