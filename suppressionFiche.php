<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	<title>Suppression de la fiche candidat en cours...</title>
</head>
<body>
	<?php
		header('Location: admin-bo.php');

		try {
			$bdd = new PDO('mysql:host=localhost;dbname=candidat;charset=utf8', 'root', '', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
		} catch (Exception $e) {
			die('Erreur : ' . $e->getMessage());
		}
		
		if(!empty($_POST['idfiche'])) {
			$suppression = $bdd->prepare('DELETE FROM informatique WHERE id = :idfiche');
		$suppression->execute(array(
			'idfiche' => strip_tags($_POST['idfiche'])
			));

		$suppression->closeCursor();
		}
	?>
</body>
</html>