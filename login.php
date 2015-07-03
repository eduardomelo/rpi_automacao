<?php
session_start();
require_once("./bd/connection.php");

$login = (!empty($_POST["login"])) ? trim($_POST["login"]) : "";
$password = (!empty($_POST["password"])) ? trim($_POST["password"]) : "";

if (!empty($login) && !empty($password)) {
	$user_sql = "SELECT `id`, `login`, `password` FROM `users` WHERE `login` = '" . $login . "' AND `password` = '" . $password . "';";

	$result = $connection->query($user_sql)->fetch_row();

	if (!is_null($result)) {
		$_SESSION['user']['id'] = $result[0];
		$_SESSION['user']['login'] = $result[1];
		$_SESSION['user']['password'] = $result[2];

		header('Location: ./home.php');
    	die();
	}
	else {
		usleep(500000); //espera 500 milisegundos
		
		$_SESSION['alerts']['login'] = "Dados incorretos!";
		
		header('Location: ./index.php');
	    die();
	}
}
else {
	$_SESSION['alerts']['login'] = "Informe o usuário e senha!";
	header('Location: ./index.php');
    die();
}
?>