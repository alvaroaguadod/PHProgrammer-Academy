<?php
//include("cabecera.php");
//include("menu.php");
session_start();
include("include/funciones.php");
$db = conectarse();

        if (isset($_POST["tipo"]) AND $_POST["tipo"]=="usuario"){$sentencia="SELECT username,id, pass AS password FROM students WHERE username='".$_POST["login"]."'";}
        elseif (isset($_POST["tipo"]) AND $_POST["tipo"]=="administrador"){$sentencia="SELECT username, password FROM users_admin WHERE username='".$_POST["login"]."'";}
        else {echo "No se han recibido parámetros correctos para la validación";exit;};
        $result = $db->query($sentencia);
        $row = $result->fetch_all(MYSQLI_ASSOC);
        if ($db->affected_rows==1)
        {
            if ($row[0]["password"]==$_POST["password"])
                {
                    if ($_POST["tipo"]=="usuario"){$_SESSION["id"]=$row[0]["id"];$_SESSION["usuario"]=$row[0]["username"];$_SESSION["nivel"]=3;$destino="usuario.php";};
                    if ($_POST["tipo"]=="administrador"){$_SESSION["usuario"]=$row[0]["username"];$_SESSION["nivel"]=9;$destino="gestion.php";};
                }
            else{
                include("header.php");
                echo '<div class="container" style="margin-top:30px"><div class="alert alert-danger">Lo sentimos, contraseña incorrecta.</div>';
                if ($_POST["tipo"]=="usuario"){
                    echo  '<form action="login.html"><input  class="btn btn-primary" type="submit"  value="Pulse aqui para acceder"></form>';
                }else{
                    echo  '<form action="login_admin.html"><input  class="btn btn-primary" type="submit"  value="Pulse aqui para acceder"></form>';
                }
                
                exit;}
        } 
        
        else {
            include("header.php");
            if ($_POST["tipo"]=="usuario"){
                echo '<div class="container" style="margin-top:30px"><div class="alert alert-danger">Usuario no localizado. Puede darse de alta como usuario en</div>   <form action="register.html"><input  class="btn btn-primary" type="submit"  value="Pulse aqui para acceder"></form></div>';
            }else{
                echo '<div class="container" style="margin-top:30px"><div class="alert alert-danger">Lo sentimos, usuario no localizado.</div>';
                echo  '<form action="login_admin.html"><input  class="btn btn-primary" type="submit"  value="Pulse aqui para acceder"></form>';
            }
            
            exit;
        }
        

header('Location: '.$destino);
//echo "<h2>Bienvenido al sistema usuario ".$row[0]["username"]."!!</h2>";
?>