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
	}

	$donnees = $bdd->prepare('SELECT * FROM informatique ' . $suiteRequete . ' ORDER BY id DESC');
	$donnees->execute($parametres);
	//Fin Requête

	while($result = $donnees->fetch()) {
		//Conversion de la date
		$dateformulaire = date_format(date_create_from_format('Y-m-d', $result['date_creation']), 'd/m/Y');
		echo '<tr id="' . $result['id'] . '" onclick="remplirChamps(this)" style="cursor: pointer" data-toggle="modal" data-target="#myModal">' .
				'<td style="display:none" id="id'. $result['id'] .'c0"><span>' . $result['id'] . '</span></td>' .
				'<td id="id'. $result['id'] .'c1"><span>' . $dateformulaire . '</span></td>' .
				'<td id="id'. $result['id'] .'c2"><span>' . $result['poste'] . '</span></td>' .
				'<td id="id'. $result['id'] .'c3"><span>' . $result['nom'] . '</span></td>' .
				'<td id="id'. $result['id'] .'c4"><span>' . $result['prenom'] . '</span></td>' .
				'<td id="id'. $result['id'] .'c5"><span>' . $result['email'] . '</span></td>' .
				'<td id="id'. $result['id'] .'c6"><span>' . $result['codepostal'] . '</span></td>' .
				'<td id="id'. $result['id'] .'c7"><span>' . $result['telephone'] . '</span></td>' .
				'<td id="id'. $result['id'] .'c8"><span>' . $result['sexe'] . '</span></td>' .
				'<td id="id'. $result['id'] .'c9"><span>' . $result['permis'] . '</span></td>' .
				'<td id="id'. $result['id'] .'c10"><span>' . $result['poleemploi'] . '</span></td>' .
			'</tr>';
	}

/*	$modifs = $bdd->prepare('UPDATE informatique SET poste=:datec WHERE id BETWEEN 1 AND 7');
	$modifs->execute(array(
		'datec' => '2017-08-01',
		));
	$modifs->closeCursor();*/

	$donnees->closeCursor();
?>