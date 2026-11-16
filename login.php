<?php
    $host="localhost";
    $user="root";
    $password="120419";
    $db="academia";

    $con=mysqli_connect($host, $user, $password, $db) or die("Problemas al conectar");
        mysqli_select_db($con,$db);
    
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