<?php
session_start();

$user = "";
$password = "";
$host = "localhost";
$database = "f_basico";

$db = mysqli_connect($host, $user, $password, $database);

if (!isset($db)) {
    die("No se pudo");
}
