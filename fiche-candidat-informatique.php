<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
	<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="css/style.css">
	<title>Informatique</title>
</head>
<body>
	<div id="wrapper" class="container">
		<figure>
			<img src="img/clefjob.png">
		</figure>
		<h1>Fiche Candidat - Informatique</h1>
		<form id="form" method="post" action="traitement-form.php" style="margin-top: 40px">
			<fieldset>
				<div class="col-md-12">
					<div class="input-group">
							<span class="input-group-addon">Poste</span>
							<input class="form-control" type="text" id="poste" name="poste" value="Informatique" disabled/>
					</div>
				</div>

				<div class="form-group">
					<div class="col-md-2">
						<label class="control-label" for="civilite">Civilité</label>
						<select class="form-control custom-select" id="civilite" name="civilite">
						  <option value="mr" selected="selected">Mr.</option>
						  <option value="mme">Mme.</option>
						</select>
					</div>
				</div>
				<div class="form-group">
					<div class="col-md-5">
						<label class="control-label" for="name">Nom</label>
						<input class="form-control" type="text" id="name" name="name" placeholder="Mon nom" required autofocus />
					</div>
				</div>
				<div class="form-group">
					<div class="col-md-5">
						<label class="control-label" for="surname">Prénom</label>
						<input class="form-control" type="text" id="surname" name="surname" placeholder="Mon prénom" required />
					</div>
				</div>
				<div class="form-group">
					<div class="col-md-6">
						<label class="control-label" for="email">Email</label>
						<input class="form-control" type="email" id="email" name="email" placeholder="exemple@mail.com" required />
					</div>
				</div>
				<div class="form-group">
					<div class="col-md-6">
						<label class="control-label" for="gender">Sexe</label>
						<select id="gender" class="form-control custom-select" name="gender">
						  <option value="Homme" selected="selected">Homme</option>
						  <option value="Femme">Femme</option>
						</select>
					</div>
				</div>
				<div class="form-group">
					<div class="col-md-6">
						<label class="control-label" for="address">Adresse</label>
						<input class="form-control" type="text" id="address" name="address" placeholder="N° de la rue + nom de la rue" required />
					</div>
				</div>
				<div class="form-group">
					<div class="col-md-6">
						<label class="control-label" for="city">Ville</label>
						<input class="form-control" type="text" id="city" name="city" placeholder="Ville" required />
					</div>
				</div>
				<div class="form-group">
					<div class="col-md-6">
						<label class="control-label" for="zipcode">Code Postal</label>
						<input class="form-control" type="text" id="zipcode" name="zipcode" placeholder="95140" required />
					</div>
				</div>
				<div class="form-group">
					<div class="col-md-6">
						<label class="control-label" for="phonenumber">Téléphone</label>
						<div class="input-group">
							<span class="input-group-addon">+33</span>
							<input class="form-control" type="tel" id="phonenumber" name="phonenumber" placeholder="06 12 34 56 78" required />
						</div>
					</div>
				</div>
				<div class="form-group">
					<div class="col-md-12">
						<label class="control-label" for="message">Message supplémentaire</label>
						<textarea class="form-control" id="message" name="message" placeholder="Facultatif" rows="3" ></textarea>
					</div>
				</div>
				<div class="form-group">
					<div class="col-md-6">
						<label class="control-label">Véhiculé ?</label>
						<label class="radiolabel radio-inline"><input class="radioinput" type="radio" name="permis" value="Oui">Oui</label>
						<label class="radiolabel radio-inline"><input class="radioinput" type="radio" name="permis" value="Non" checked>Non</label>
					</div>
				</div>
				<div class="form-group">
					<div class="col-md-6">
						<label class="control-label">Inscrit PE ?</label>
						<label class="radiolabel radio-inline"><input class="radioinput" type="radio" name="poleemploi" value="Oui">Oui</label>
						<label class="radiolabel radio-inline"><input class="radioinput" type="radio" name="poleemploi" value="Non" checked>Non</label>
					</div>
				</div>
				<div class="form-group">
					<div class="col-md-12">
						<button type="submit" class="btn btn-primary btn-block">Envoyer</button>
					</div>
				</div>
			</fieldset>
		</form>
	</div>
</body>
</html>

<!-- <div class="form-group">
	<p>Commentaire : Bouton radio en dessous du label</p>
	<div class="col-md-3">
		<label class="control-label">Véhiculé ?</label>
		<div class="radio">
			<label class="radiolabel radio-inline"><input class="radioinput" type="radio" name="permis">Oui</label>
		</div>
			<label class="radiolabel radio-inline"><input class="radioinput" type="radio" name="permis">Non</label>
		<div class="radio">
		</div>
	</div>
</div> -->