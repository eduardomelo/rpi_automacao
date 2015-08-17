<?php
session_start();
require_once("./bd/connection.php");

if (empty($_SESSION['user']['id'])) {
    header('Location: ./index.php');
    die();
}

$pin = (!empty($_POST["pin"])) ? $_POST["pin"] : "";
$status = (!empty($_POST["status"])) ? $_POST["status"] : "";

if ((!empty($pin) && preg_match("@^[0-9]{1,2}$@", $pin)) && (!empty($status) && preg_match("@^(true|false)$@", $status))) {
	$status = ($status === "true") ? 1 : 0;

	passthru("gpio mode " . $pin . " out", $err);
	passthru("gpio write " . $pin . " " . $status, $err);

	$device_sql = "UPDATE `devices` SET `status` ='" . $status . "' WHERE `pin` ='" . $pin . "';";
	
	if(mysqli_query($connection, $device_sql)) {
		$_SESSION['alerts']['update'] = "Update realizado com sucesso!";
	}
	else {
		$_SESSION['alerts']['update'] = "Falha no update!";
	}
	
}/*
else {
	$_SESSION['alerts']['login'] = "Operação inválida!";
	header('Location: ./index.php');
    die();
}
*/
?>