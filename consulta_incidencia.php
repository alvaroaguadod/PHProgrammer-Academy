<?php
include("header.php");
include("include/nivel.php");
include("include/menu.php");
include("include/funciones.php");
?>
<div class="container">
<?php
if ( (!isset($_GET) OR !isset($_GET["id_incidence"])) AND (!isset($_POST) OR !isset($_POST["entrando"])) ){echo "No se han recibido los parámetros necesarios";exit;};
$db=conectarse();
if (isset($_POST["entrando"]) AND $_POST["entrando"]=="S"){
  $sentencia="UPDATE incidences SET response='".$_POST["response"]."' WHERE id_incidence=".$_POST["id_incidence"]." LIMIT 1";
  $result = $db->query($sentencia);
  if($result){
    echo "<div class=\"alert alert-success\">Se ha registrado la respuesta</div>";
  }
  else {
    echo "<div class=\"alert alert-error\">Ha ocurrido un error.</div>";
  }
  exit;
};
$sentencia="UPDATE incidences SET incidence_read_at='".date("Y-m-d H:i:s")."' WHERE id_incidence=".$_GET["id_incidence"]." LIMIT 1";
$result = $db->query($sentencia);
$sentencia="SELECT * FROM incidences WHERE id_incidence=".$_GET["id_incidence"]." LIMIT 1";
$result = $db->query($sentencia);
$row = $result->fetch_assoc();
?>

<h1>Consulta incidencia</h1>

<div class="alert alert-info">Formulario de respuesta de indicencias</div>
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
    <textarea class="form-control" name="response" id="response" rows="3"></textarea>
  </div>
<input type='submit' class='btn btn-primary' />

</form> 

</div>
<?php
include("footer.php");