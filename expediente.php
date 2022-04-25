<?php
session_start();
include("header.php");
include("include/nivel3.php");
include("include/menu_estudiante.php");
include("include/funciones.php");
$db=conectarse();
echo '<div class="container" style="margin-top:30px">';
if (isset($_POST["entrando"]) AND $_POST["entrando"]=="S" ){

    $sentencia="UPDATE notifications SET trabajo='".$_POST["work"]."',examen='".$_POST["exam"]."',evaluación continua='".$_POST["continuous_assessment"]."',nota final='".$_POST["final_note"]."' WHERE students.id=".$_SESSION["id"];
    //echo $sentencia;
    $result = $db->query($sentencia);
    echo '<div class="alert alert-success">Se han modificado sus datos correctamente</div>';
}

?>

<h1>Expediente</h1>

<div class="alert alert-info">Página para consultar su expediente</diV>
<div class="container">
<form class="form-group" action="expediente.php" method="post">
    <input type="hidden" name="entrando" value="S" />
<?php

$sentencia="SELECT * FROM notifications WHERE students.id=".$_SESSION["id"];
$result = $db->query($sentencia);
$row = $result->fetch_assoc();
?>

<?php
                echo "<laber for='trabajo'>Nota del Trabajo</label>";
                echo "<input class='form-control' type='text' name='trabajo' value='".$row["work"]."' required />";
                echo "<laber for='nombre'>Nombre</label>";
                echo "<input class='form-control' type='text' name='name' value='".$row["exam"]."' required />";
                echo "<laber for='surname'>Apellidos</label>";
                echo "<input class='form-control' type='text' name='surname' value='".$row["continuous_assessment"]."' required />";
                echo "<laber for='telephone'>Teléfono</label>";
                echo "<input class='form-control' type='text' name='telephone' value='".$row["final_note"]."' required />";
                echo "<input type='submit' class='btn btn-primary' />"
?>            
</tr>
</form>
<div>
</div>
<?php
include("footer.php");