<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="css/admin.css">
	<title>Back Office Admin</title>
</head>
<body>

	<div class="container-fluid maindiv">

		<header>
			<div class="row">
				<div class="col-md-4 col-sm-4 col-xs-4">
					<a style="display: inline-block" href="#"><img class="img-responsive" style="margin: 10px 0 0 0" src="img/cjlogo.png" width="40" alt="Logo CLEFJOB"></a>
				</div>
				<div class="col-md-4 col-sm-4 col-xs-4" style="float: right;">
					<ul class="nav navbar-nav navbar-right">
				      <li><a class="hoverstyle" href="#"><span style="margin-right: 10px" class="glyphicon glyphicon-user"></span>S'inscrire</a></li>
				      <li><a class="hoverstyle" href="#"><span style="margin-right: 10px" class="glyphicon glyphicon-log-in"></span>Connexion</a></li>
				    </ul>
				</div>
			</div>
		</header>

		<div class="row text-center text-info" style="margin-top: -20px">
			<h1>Formulaires des candidats</h1>
		</div>

		<div class="row">
			<div class="col-md-12">
				<div class="col-md-12 text-center text-info">
					<h3>Filtrer la recherche</h3>
				</div>
			</div>
		</div>

		<div class="row" style="margin: 20px 0 20px 0">
			<div class="form-group">
				<div class="col-md-3">
					<div class="input-group">
						<span class="input-group-addon">Par nom</span>
						<input class="form-control" type="text" id="fname" placeholder="nom partiel ou complet" />
					</div>
				</div>
				<div class="col-md-3">
					<div class="input-group">
						<span class="input-group-addon">Par prénom</span>
						<input class="form-control" type="text" id="fsurname" placeholder="prénom partiel ou complet" />
					</div>
				</div>
				<div class="col-md-3">
					<div class="input-group">
						<span class="input-group-addon">Par email</span>
						<input class="form-control" type="text" id="femail" placeholder="exemple@mail.com" />
					</div>
				</div>
				<div class="col-md-3">
					<div class="input-group">
						<span class="input-group-addon">Par code postal</span>
						<input class="form-control" type="text" id="fzipcode" placeholder="95700" />
					</div>
				</div>
			</div>
		</div>

		<div class="row" style="margin: 0 0 30px 0">
			<div class="form-group">
				<div class="col-md-3">
					<div class="input-group">
						<span class="input-group-addon">Par téléphone</span>
						<input class="form-control" type="text" id="fphonenumber" placeholder="06 12 34 56 78" />
					</div>
				</div>
				<div class="col-md-3">
					<select id="gender" class="form-control custom-select" name="gender">
						<option value="" selected="selected">Choisir le sexe</option>
						<option value="homme">Homme</option>
						<option value="femme">Femme</option>
					</select>
				</div>
				<div class="col-md-3">
					<select id="gender" class="form-control custom-select" name="gender">
						<option value="" selected="selected">Possède le permis ?</option>
						<option value="oui">Oui</option>
						<option value="non">Non</option>
					</select>
				</div>
				<div class="col-md-3">
					<select id="gender" class="form-control custom-select" name="gender">
						<option value="" selected="selected">Inscrit au Pôle Emploi ?</option>
						<option value="oui">Oui</option>
						<option value="non">Non</option>
					</select>
				</div>
			</div>
		</div>

		<div class="row">
			<div id="searchbtn" class="col-md-4 col-md-offset-4" style="margin-bottom: 20px">
				<button class="btn btn-primary btn-block">Rechercher</button>
			</div>
		</div>
	</div>

	<div id="results" class="container-fluid">
		<div class="row">
			<table class="table table-striped table-hover table-bordered">
            <thead>
              <tr class="table-info">
                <th>Nom</th>
                <th>Prénom</th>
                <th>Email</th>
                <th>Code Postal</th>
                <th>Téléphone</th>
                <th>Sexe</th>
                <th>Permis ?</th>
                <th>Inscrit PE ?</th>
              </tr>
            </thead>
            <tbody>
            	<?php
					try {
						$bdd = new PDO('mysql:host=localhost;dbname=candidat;charset=utf8', 'root', '', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
					} catch (Exception $e) {
						die('Erreur : ' . $e->getMessage());
					}
					
					$donnees = $bdd->query('SELECT * FROM informatique');

					while($result = $donnees->fetch()) {
						echo '<tr>' . 
								'<td><span>' . $result['nom'] . '</span></td>' .
								'<td><span>' . $result['prenom'] . '</span></td>' .
								'<td><span>' . $result['email'] . '</span></td>' .
								'<td><span>' . $result['codepostal'] . '</span></td>' .
								'<td><span>' . $result['telephone'] . '</span></td>' .
								'<td><span>' . $result['sexe'] . '</span></td>' .
								'<td><span>' . $result['permis'] . '</span></td>' .
								'<td><span>' . $result['poleemploi'] . '</span></td>' .
							'</tr>';
					}
				?>
            </tbody>
          </table>
		</div>
	</div>
</body>
</html>