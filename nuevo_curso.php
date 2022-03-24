 <?php
 include("header.php");
 include("include/nivel.php");
 include("include/menu.php");
  if (isset($_POST["entrando"]) AND $_POST["entrando"]=="s"){
    $db = conectarse();
  $sentencia="INSERT INTO courses (name, description, date_start, date_end, active) VALUES ('".$_POST["name"]."', '".$_POST["description"]."', '".$_POST["date_start"]."', '".$_POST["date_end"]."', '".$_POST["active"]."') ";
  //echo $sentencia;
  $result = $db->query($sentencia);
  echo "Se ha registrado el curso ".$_POST["name"];
  exit;

  };
  ?>
<script>
$(function () {
  $('#datepicker').datepicker();
});
</script>
<!------ Include the above in your HEAD tag ---------->

<div class="container" style="margin-top:30px">
<h2>Formulario de alta de curso</h2>
    <div class=form-group>
    <form class="form form-control" name="login" action="nuevo_curso.php" method="post">
      <input type="hidden" name="entrando" value="s">
      <label for="nombrecurso">Nombre del curso</label>
      <input class="form-control" type="text" id="name" name="name" placeholder="nombre del curso">
      <label for="descripcion">Descripción</label>
      <input class="form-control" type="text" id="description" name="description" placeholder="descripcion del curso">
      <label for="fechainicio">Fecha inicio curso</label>
      <input class="form-control" type="text" name="date_start" placeholder="fecha de inicio" >
      <label for="fechafin">Fecha fin curso</label>
      <input class="form-control" type="text" id="date_end" name="date_end" placeholder="fecha de fin">
      <label for="activo">Activo</label>
      <select class="form-control"  id="active" name="active" required="required">
        <option value="">Elija uno</option>
        <option value="s">Sí</option>
        <option value="n">No</option>
</select>
      <input  class="btn btn-primary" type="submit" class="fadeIn fourth" value="Añadir curso">
    </form>
</div>
</div>
<?php
include("footer.php");