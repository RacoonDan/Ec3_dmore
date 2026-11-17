<?php
require_once "conexion.php";

$usuario = $_POST["usuario"];
$password = $_POST["password"];

$sql = "SELECT * FROM academia WHERE usuario = ? AND password = ?";

$stmt = mysqli_prepare($conexion, $sql);
mysqli_stmt_bind_param($stmt, "ss", $usuario, $password);
mysqli_stmt_execute($stmt);

$nr = mysqli_stmt_get_result($stmt);

if (mysqli_num_rows($nr) == 1) {

    header("Location: pagina.html");
    exit();

} else {

    echo "<script>alert('Usuario incorrecto');</script>";
    echo "<script>window.location.href='login.html';</script>";

}
