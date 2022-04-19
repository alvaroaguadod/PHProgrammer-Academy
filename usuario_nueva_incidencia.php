<?php
session_start();
include("header.php");
include("include/nivel3.php");
include("include/menu_estudiante.php");
include("include/funciones.php");
$db=conectarse();
echo '<div class="container" style="margin-top:30px">';
if (isset($_POST["entrando"]) AND $_POST["entrando"]=="S" ){

    $sentencia="INSERT INTO incidences (id_student,description) VALUES (".$_SESSION["id"].",'".$_POST["description"]."')";
    //echo $sentencia;
    $result = $db->query($sentencia);
    if($result){
      echo '<div class="alert alert-success">Incidencia enviada correctamente</div>';
    }else{
      echo '<div class="alert alert-error">Ha ocurrido un error</div>';
    }
    
    exit;
}

?>

<h1>Nueva incidencia</h1>

<div class="alert alert-info">Formulario de envío de indicencias</div>
<div class="container">
<form class="form-group" action="usuario_nueva_incidencia.php" method="post">
    <input type="hidden" name="entrando" value="S" />
    <div class="form-group">
    <label for="description">Descripción de la consulta</label>
    <textarea class="form-control" name="description" id="description" rows="3"></textarea>
  </div>
<input type='submit' class='btn btn-primary' />

</form>

</div>
<?php
include("footer.php");