<?php
    require_once "conexion.php";
    
    //TRABAJANDO CON LAS VARIABLES

    $usuario=$_POST["usuario"];
    $password=$_POST["password"];
    $sql=mysqli_query($con, "SELECT * FROM academia WHERE usuario='".$usuario."' and password'".$password."' ");
    $nr=mysqli_num_rows($sql);

    //USO MI CONDICIONAL

    if ($nr == 1){
        header("Location: pagina.html");
    }else{
        echo "<script>alert('Usuario incorrecto');</script>";
        echo "<script>window.location.href=('login.php');</script>";
    }
?>
