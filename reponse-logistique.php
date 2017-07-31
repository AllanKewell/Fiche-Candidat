<?php
include("connectDB.php");

$errors = [];

if(!array_key_exists('civilite', $_POST) || empty($_POST['civilite'])) {
	$errors['civilite'] = "Veuillez renseigner votre civilité";
}

if(!array_key_exists('nom', $_POST) || empty($_POST['nom'])) {
	$errors['nom'] = "Veuillez renseigner votre nom";
}

if(!array_key_exists('prenom', $_POST) || empty($_POST['prenom'])) {
	$errors['prenom'] = "Veuillez renseigner votre prénom";
}

if(!array_key_exists('adresse', $_POST) || empty($_POST['adresse'])) {
	$errors['adresse'] = "Veuillez renseigner votre adresse";
}

if(!array_key_exists('codepostal', $_POST) || empty($_POST['codepostal'])) {
	$errors['codepostal'] = "Veuillez renseigner votre code postal";
}

if(!array_key_exists('ville', $_POST) || empty($_POST['ville'])) {
	$errors['ville'] = "Veuillez renseigner votre ville";
}

if(!empty($errors)) {
	session_start();
	$_SESSION['errors'] = $errors;
	header('Location: fiche-candidat-logistique.php');
} else {
	$db = connect_db();

	foreach($_POST as $index => $valeur) {
		$$index = mysqli_real_escape_string($db, trim($valeur));
	}

	if($db) {
		$request = mysqli_prepare($db, 'INSERT INTO data_candidat(civilite, nom, prenom, adresse, codepostal, ville, chien)
					VALUES(?, ?, ?, ?, ?, ?, ?)');
		mysqli_stmt_bind_param($request, "sssssss", $civilite, $nom, $prenom, $adresse, $codepostal, $ville, $chien);
		mysqli_stmt_execute($request);

		echo "Vos informations sont bien sauvegardées. Merci et à bientôt.";

		disconnect_db($db);
	}
}

?>