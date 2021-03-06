<?php
	session_start();
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html lang="fr" xmlns="http://www.w3.org/1999/xhtml">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
	<link rel="stylesheet" type="text/css" href="css/formulaire.css">
	<title>Formulaire Logistique</title>
</head>
<body>
	<form method="post" action="reponse-logistique.php">

		<?php if(array_key_exists('errors', $_SESSION)): ?>
			<div class="formulaire-errors">
				<?= implode('<br>', $_SESSION['errors']); ?>
			</div>
		<?php unset($_SESSION['errors']); endif; ?>
		<p class="titre">Fiche candidat pour métier logistique</p>
		
		<fieldset id="formulaire">
			<p id="civilite">
				<label>Civilité : </label>
				<input type="radio" name="civilite" value="Mr" />Mr
				<input type="radio" name="civilite" value="Mlle" />Mlle
				<input type="radio" name="civilite" value="Mme" />Mme
			</p><br />

			<label>Nom : </label>
			<input type="text" name="nom" size="30" /><br />
			<label>Prénom : </label>
			<input type="text" name="prenom" size="30" /><br />
			<label>Adresse : </label>
			<input type="text" name="adresse" size="30" /><br />
			<label>Code postal : </label>
			<input type="text" name="codepostal" size="30" /><br />
			<label>Ville : </label>
			<input type="text" name="ville" size="30" /><br />
			<br />
			<label>Votre chien préféré : </label>
			<select name="chien">
				<option value="akita">Akita</option>
				<option value="golden">Golden</option>
				<option value="labrador">Labrador</option>
				<option value="rantanplan">Rantanplan</option>
				<option value="hanouna">Cyril Hanouna</option>
			</select>
		</fieldset>
		<p id="buttons">
	    	<input type="submit" value="Valider" />
		</p>
	</form>
</body>
</html>