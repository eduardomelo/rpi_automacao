<?php
$connection = mysqli_connect("127.0.0.1", "root", "root", "rpi_automacao");

if ($connection->connect_errno) {
	echo "Failed to connect to MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
}
?>
