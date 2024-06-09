<?php
$server = 'localhost';
$username = 'davidmurillo';
$password = 'Lucha533.';
$database = 'cursoMySql';

$db = mysqli_connect($server, $username, $password, $database);
mysqli_query($db, "SET NAMES 'utf8'");

session_start();

?>