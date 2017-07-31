<?php
	function connect_db() {
		$server = 'localhost';
		$name_db = 'candidat';
		$login = 'root';
		$password = '';

		$db = mysqli_connect($server, $login, $password, $name_db)or die("La connexion à échouée.");

		return $db;
	}

	function disconnect_db($db) {
		mysqli_close($db);
		$db = 0;
	}
?>