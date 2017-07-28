<?php
	function connect_db() {
		$server = 'localhost';
		$name_db = 'candidat';
		$login = 'root';
		$password = '';

		$db = mysql_connect($server, $login, $password)or die("La connexion à échouée.");
		mysql_select_db($name_db, $db)or die("Impossible de choisir cette base de données");

		return $db;
	}

	function disconnect_db($db) {
		mysql_close($db);
		$db = 0;
	}
?>