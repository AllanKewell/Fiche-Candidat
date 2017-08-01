<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	<title>Traitement du formulaire</title>
</head>
<body>
	<?php
		try {
			$bdd = new PDO('mysql:host=localhost;dbname=candidat;charset=utf8', 'root', '');
		} catch (Exception $e) {
			die('Erreur : ' . $e->getMessage());
		}
		$reponse = $bdd->query('SELECT * FROM jeux_video');

		while($donnees = $reponse->fetch()) {
	?>
		<p>
			<strong>Jeu</strong> : <?php echo $donnees['nom']; ?> <br>
			Le possesseur du jeu est : <?php echo $donnees['possesseur']; ?>, et il le vend à <?php $donnees['prix']; ?> € ! <br>
			Ce jeu fonctionne sur <?php echo $donnees['console']; ?> et on peut y jouer à <?php echo $donnees['nbre_joueurs_max']; ?> au maximum <br>
			<?php echo $donnees['possesseur']; ?> a laissé ces commentaires sur <?php $donnees['nom']; ?> : <em><?php $donnees['commentaires'] ?></em>
		</p>
	<?php
		}
		$reponse->closeCursor();
	?>
	<br>
	<br>
	<h1>Yo</h1>
	<p>Nom : <?php echo $_POST['name']?> </p>
	<p>Nom : <?php echo $_POST['surname']?> </p>
	<p>Nom : <?php echo htmlspecialchars($_POST['city'])?> </p>
	<p>Nom : <?php echo strip_tags($_POST['message'])?> </p>
	<p>Nom : <?php echo $_POST['civilite']?> </p>
	<p>Nom : <?php echo $_POST['gender']?> </p>
	<p>Nom : <?php echo $_POST['permis']?> </p>
	<p>Nom : <?php echo $_POST['poleemploi']?> </p>
	<p>Pour changer de nom, clique <a href="fiche-candidat-informatique.php">ici</a></p>
</body>
</html>