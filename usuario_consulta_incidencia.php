<?php
include("header.php");
include("include/nivel3.php");
include("include/menu_estudiante.php");
include("include/funciones.php");
?>
<div class="container">
<?php
if ( (!isset($_GET) OR !isset($_GET["id_incidence"]))){echo "No se han recibido los parámetros necesarios";exit;};
$db=conectarse();

$sentencia="UPDATE incidences SET response_read_at='".date("Y-m-d H:i:s")."' WHERE id_incidence=".$_GET["id_incidence"]." LIMIT 1";
$result = $db->query($sentencia);
$sentencia="SELECT * FROM incidences WHERE id_incidence=".$_GET["id_incidence"]." AND id_student=".$_SESSION["id"]." LIMIT 1";
$result = $db->query($sentencia);
$row = $result->fetch_assoc();
?>

<h1>Consulta incidencia</h1>

<div class="container">
<form class="form-group" action="consulta_incidencia.php" method="post">
    <input type="hidden" name="entrando" value="S" />
    <input type="hidden" name="id_incidence" value="<?php echo $_GET["id_incidence"];?>" />
    <div class="form-group">
    <label for="response">Descripción de la consulta</label>
    <p><?php echo $row["description"];?></p>
  </div>
  <div class="form-group">
    <label for="response">Repuesta</label>
    <p><?php echo $row["response"];?></p>
  </div>
<input type='submit' class='btn btn-primary' />

</form> 

</div>
<?php
include("footer.php");