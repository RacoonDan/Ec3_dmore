<?php
    require_once "conexion.php";
    
    //TRABAJANDO CON LAS VARIABLES

    $usuario=$_POST["usuario"];
    $password=$_POST["password"];
    $sql = "SELECT * FROM usuarios WHERE
usuario = '$usuario' AND
password = '$password'";
    $nr=mysqli_query($conexion, $sql);

    //USO MI CONDICIONAL

    if ($nr == 1){
        header("Location: pagina.html");
    }else{
        echo "<script>alert('Usuario incorrecto');</script>";
        echo "<script>window.location.href=('login.html');</script>";
    }
?>
