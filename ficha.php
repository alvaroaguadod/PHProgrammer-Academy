<?php
include("header.php");
include("include/nivel.php");
include("include/menu.php");
include("include/funciones.php");
if ( !isset($_GET) AND !isset($_GET["tabla"]) ){echo "No se han recibido los parámetros necesarios";exit;};
$db=conectarse();
$sentencia="SELECT * FROM ".$_GET["tabla"]." WHERE id=".$_GET["id"]." LIMIT 1";
$result = $db->query($sentencia);
$row = $result->fetch_assoc();
 ?>
    <div class="container" style="margin-top:30px">
    <div class="panel panel-default">
      <div class="panel-heading">
        <h3 class="panel-title"><?php echo $row["surname"];?>, <?php echo $row["name"];?></h3>
      </div>
      <div class="panel-body">
      Usuario: <?php echo $row["username"];?><br />
      Teléfono: <?php echo $row["telephone"];?><br />
      Nif: <?php echo $row["nif"];?><br />
      Fecha de registro: <?php echo $row["date_registered"];?><br />
      </div>
    </div>
    </div>
<?php
include("footer.php");