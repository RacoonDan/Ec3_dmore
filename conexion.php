<?php
$host = getenv("MYSQLHOST");
$user = getenv("MYSQLUSER");
$password = getenv("MYSQLPASSWORD");
$db = getenv("MYSQLDATABASE");
$port = getenv("MYSQLPORT");

$con = mysqli_connect($host, $user, $password, $db, (int)$port);

if (!$con) {
    die("Error de conexión: " . mysqli_connect_error());
}

mysqli_set_charset($con, "utf8mb4");
?>
