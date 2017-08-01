<?php
	session_start();
?>
<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
	<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="css/style.css">
	<title>Ventes</title>
</head>
<body>
	<div id="wrapper" class="container">
		<figure>
			<img src="img/clefjob.png">
		</figure>
		<h1>Formulaire - Ventes</h1>
		<form id="form" method="post" action="testReponseForm.php">
			<fieldset>
				<div class="form-group">
					<div class="col-md-2">
						<label class="control-label">Civilité</label>
						<select class="form-control custom-select" name="civilite">
						  <option value="monsieur">Mr.</option>
						  <option value="madame">Mme.</option>
						</select>
					</div>
				</div>
				<div class="form-group">
					<div class="col-md-5">
						<label class="control-label">Nom</label>
						<input class="form-control" type="text" name="name" placeholder="Mon nom" required autofocus />
					</div>
				</div>
				<div class="form-group">
					<div class="col-md-5">
						<label class="control-label">Prénom</label>
						<input class="form-control" type="text" name="surname" placeholder="Mon prénom" required />
					</div>
				</div>
				<div class="form-group">
					<div class="col-md-6">
						<label class="control-label">Email</label>
						<input class="form-control" type="email" name="email" placeholder="exemple@mail.com" required />
					</div>
				</div>
				<div class="form-group">
					<div class="col-md-6">
						<label class="control-label">Sexe</label>
						<select class="form-control custom-select" name="gender">
						  <option value="homme">Homme</option>
						  <option value="femme">Femme</option>
						</select>
					</div>
				</div>
				<div class="form-group">
					<div class="col-md-6">
						<label class="control-label">Adresse</label>
						<input class="form-control" type="text" name="address" placeholder="N° de la rue + nom de la rue" required />
					</div>
				</div>
				<div class="form-group">
					<div class="col-md-6">
						<label class="control-label">Ville</label>
						<input class="form-control" type="text" name="city" placeholder="Ville" required />
					</div>
				</div>
				<div class="form-group">
					<div class="col-md-6">
						<label class="control-label" text">Code Postal</label>
						<input class="form-control" type="text" name="zipcode" placeholder="95140" required />
					</div>
				</div>
				<div class="form-group">
					<div class="col-md-6">
						<label class="control-label">Téléphone</label>
						<div class="input-group">
							<span class="input-group-addon">+33</span>
							<input class="form-control" type="tel" name="phonenumber" placeholder="06 12 34 56 78" required />
						</div>
					</div>
				</div>
				<div class="form-group">
					<div class="col-md-12">
						<input type="submit" class="btn btn-primary btn-block" value="Envoyer" />
					</div>
				</div>
			</fieldset>
		</form>
	</div>
</body>
</html>