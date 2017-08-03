<?php
	try {
		$bdd = new PDO('mysql:host=localhost;dbname=candidat;charset=utf8', 'root', '', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
	} catch (Exception $e) {
		die('Erreur : ' . $e->getMessage());
	}

	$inputs = $_POST['inputs'];
	if($inputs) {
		$arrayInputs = explode(',', $inputs);
	}

	//Requête
	$bddFields = ['nom', 'prenom', 'email', 'sexe', 'codepostal', 'telephone', 'permis', 'poleemploi'];
	$marqueurs = [':fname', ':fsurname', ':femail', ':fgender', ':fzipcode', ':fphonenumber', ':fpermis', ':fpoleemploi'];
	$marqueursName = ['fname', 'fsurname', 'femail', 'fgender', 'fzipcode', 'fphonenumber', 'fpermis', 'fpoleemploi'];
	$tempRequete = 'WHERE ';
	$parametres = [];

	for($i=0; $i<count($marqueurs); $i++) {
		if(!empty($arrayInputs[$i])) {
			$tempRequete .= $bddFields[$i] . ' LIKE ' . $marqueurs[$i] . ' AND ';
			$parametres[$marqueursName[$i]] = "%".$arrayInputs[$i]."%";
		}
	}

	if(!empty($tempRequete)) {
		$suiteRequete = substr($tempRequete, 0, strlen($tempRequete) - 4);
	} else {
		$suiteRequete = 'ca marche pas';
	}

	$donnees = $bdd->prepare('SELECT * FROM informatique ' . $suiteRequete);
	$donnees->execute($parametres);
	//Fin Requête

	while($result = $donnees->fetch()) {
		//Conversion de la date
		$dateformulaire = date_format(date_create_from_format('Y-m-d', $result['date_creation']), 'd/m/Y');
		echo '<tr>' . 
				'<td><span>' . $dateformulaire . '</span></td>' .
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

	$modifs = $bdd->prepare('UPDATE informatique SET date_creation=:datec WHERE id BETWEEN 1 AND 7');
	$modifs->execute(array(
		'datec' => '2017-08-01',
		));
	$modifs->closeCursor();

	$donnees->closeCursor();
?>