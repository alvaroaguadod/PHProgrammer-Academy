<?php
session_start();
include("header.php");
include("include/nivel3.php");
include("include/menu_estudiante.php");
include("include/funciones.php");
$db=conectarse();
echo '<div class="container" style="margin-top:30px">';
if (isset($_POST["entrando"]) AND $_POST["entrando"]=="S" ){

    $sentencia="UPDATE students SET username='".$_POST["username"]."',name='".$_POST["name"]."',surname='".$_POST["surname"]."',email='".$_POST["email"]."',pass='".$_POST["pass"]."',telephone='".$_POST["telephone"]."',nif='".$_POST["nif"]."' WHERE students.id=".$_SESSION["id"];
    //echo $sentencia;
    $result = $db->query($sentencia);
    echo '<div class="alert alert-success">Se han modificado sus datos correctamente</div>';
}

?>

<h1>Mi perfil</h1>

<div class="alert alert-info">Página para modificar su perfil</diV>
<div class="container">
<form class="form-group" action="mi_perfil.php" method="post">
    <input type="hidden" name="entrando" value="S" />
<?php

$sentencia="SELECT * FROM students WHERE students.id=".$_SESSION["id"];
$result = $db->query($sentencia);
$row = $result->fetch_assoc();
?>

<?php
                echo "<laber for='username'>Usuario de acceso</label>";
                echo "<input class='form-control' type='text' name='username' value='".$row["username"]."' required />";
                echo "<laber for='nombre'>Nombre</label>";
                echo "<input class='form-control' type='text' name='name' value='".$row["name"]."' required />";
                echo "<laber for='surname'>Apellidos</label>";
                echo "<input class='form-control' type='text' name='surname' value='".$row["surname"]."' required />";
                echo "<laber for='telephone'>Teléfono</label>";
                echo "<input class='form-control' type='text' name='telephone' value='".$row["telephone"]."' required />";
                echo "<laber for='nif'>NIF</label>";
                echo "<input class='form-control' type='text' name='nif' value='".$row["nif"]."' required />";
                echo "<laber for='email'>Correo electrónico</label>";
                echo "<input class='form-control' type='email' name='email' value='".$row["email"]."' required />";
                echo "<laber for='pass'>Contraseña</label>";
                echo "<input class='form-control' type='password' name='pass' value='".$row["pass"]."' required />";
                echo "<input type='submit' class='btn btn-primary' />"
?>            
</tr>
</form>
<div>
</div>
<?php
include("footer.php");