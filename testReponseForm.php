<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	<title>Traitement du formulaire</title>
</head>
<body>
	<?php

		header('Location: fiche-candidat-informatique.php');
		try {
			$bdd = new PDO('mysql:host=localhost;dbname=candidat;charset=utf8', 'root', '', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
		} catch (Exception $e) {
			die('Erreur : ' . $e->getMessage());
		}
		$reponse = $bdd->query('SELECT * FROM jeux_video') or die($bdd->errorInfo());

		while($donnees = $reponse->fetch()) {
	?>
		<p>
			<strong>Jeu</strong> : <?php echo $donnees['nom']; ?> <br>
			Le possesseur du jeu est : <?php echo $donnees['possesseur']; ?>, et il le vend à <?php echo $donnees['prix']; ?> € ! <br>
			Ce jeu fonctionne sur <?php echo $donnees['console']; ?> et on peut y jouer à <?php echo $donnees['nbre_joueurs_max']; ?> au maximum <br>
			<?php echo $donnees['possesseur']; ?> a laissé ces commentaires sur <?php echo $donnees['nom']; ?> : <em><?php echo $donnees['commentaires'] ?></em>
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


	<?php
		try {
			$hxh = new PDO('mysql:host=localhost;dbname=candidat;charset=utf8', 'root', '', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
		} catch (Exception $e) {
			die('Erreur : ' . $e->getMessage());
		}

		$req = $hxh->prepare('SELECT * FROM jeux_video WHERE possesseur=:proprietaire AND prix<:price ORDER BY prix');
		$req->execute(array('proprietaire' => $_POST['surname'], 'price' => $_POST['city']));

		echo '<ul>';
		while($rep = $req->fetch()) {
			echo '<li>' . $rep['nom'] . ' (' . $rep['prix'] . ' €)</li>';
		}
		echo '</ul>';


		/*$ins = $hxh->prepare('INSERT INTO jeux_video(nom, possesseur, console, prix, nbre_joueurs_max, commentaires) VALUES (:nom, :possesseur, :console, :prix, :nbre_joueurs_max, :commentaires)');
		echo 'Jeu bien ajouté !';
		$ins->execute(array(
			'nom' => $_POST['name'],
			'possesseur' => $_POST['surname'],
			'console' => $_POST['address'],
			'prix' => $_POST['city'],
			'nbre_joueurs_max' => $_POST['zipcode'],
			'commentaires' => $_POST['phonenumber']
			));*/

		$upd = $hxh->prepare('UPDATE jeux_video SET prix=:price WHERE nom=:game');
		$upd->execute(array(
			'price' => $_POST['name'],
			'game' => $_POST['address']
			));

/*		$del = $bdd->prepare('DELETE FROM jeux_video WHERE nom=:game');
		$del->execute(array('game' => $_POST['address']));
*/
		$req->closeCursor();
	?>





	<!-- <?php
		try {
			$bbc = new PDO('mysql:host=localhost;dbname=candidat;charset=utf8', 'root', '');
			$requete = $bdd->query('SELECT * FROM jeux_video WHERE possesseur=\'Patrick\' AND prix < 20 ORDER BY prix DESC LIMIT 2,2');
		} catch (Exception $e) {
			die("Erreur : " . $e.getMessage());
		}

		echo 'Liste des jeux de Patrick : ' . '<br /><br />';
		while($reponse = $requete->fetch()) {
			echo $reponse['nom'] .'. Prix : ' . $reponse['prix'] . '<br />';
		}
		$requete->closeCursor();
	?> -->
</body>
</html>