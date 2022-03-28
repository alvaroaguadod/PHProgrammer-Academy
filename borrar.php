<?php
include("header.php");
include("include/nivel.php");
include("include/menu.php");
include("include/funciones.php");
$db=conectarse();
$tabla=$_GET["tabla"];
$registro=$_GET["registro"];
$campo=$_GET["campo"];
$sentencia="DELETE FROM ".$tabla." WHERE ".$campo."=".$registro;
$result = mysqli_query($db,$sentencia);
?>
<div class="container" style="margin-top:30px">
<div class="alert alert-success">Registro borrado correctamente</diV>
<?php
include("footer.php");