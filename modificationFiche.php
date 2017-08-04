<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	<title>Modification de la fiche candidat en cours...</title>
</head>
<body>
	<?php
		header('Location: admin-bo.php');

		try {
			$bdd = new PDO('mysql:host=localhost;dbname=candidat;charset=utf8', 'root', '', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
		} catch (Exception $e) {
			die('Erreur : ' . $e->getMessage());
		}
		
		if(!empty($_POST['idactif'])) {
			$insertion = $bdd->prepare('UPDATE informatique SET nom = :nom, prenom = :prenom, email = :email, sexe = :sexe, codepostal = :codepostal, telephone = :telephone, permis = :permis, poleemploi = :poleemploi WHERE id = :idactif');
		$insertion->execute(array(
			/*'civilite' => strip_tags($_POST['civilite']),
			'poste' => strip_tags($_POST['poste']),*/
			'nom' => strip_tags($_POST['name']),
			'prenom' => strip_tags($_POST['surname']),
			'email' => strip_tags($_POST['email']),
			'sexe' => strip_tags($_POST['gender']),
			/*'adresse' => strip_tags($_POST['address']),
			'ville' => strip_tags($_POST['city']),*/
			'codepostal' => strip_tags($_POST['zipcode']),
			'telephone' => strip_tags($_POST['phonenumber']),
			/*'message' => strip_tags($_POST['message']),*/
			'permis' => strip_tags($_POST['permis']),
			'poleemploi' => strip_tags($_POST['poleemploi']),
			'idactif' => strip_tags($_POST['idactif'])
			));

		$insertion->closeCursor();
		}
	?>
</body>
</html>