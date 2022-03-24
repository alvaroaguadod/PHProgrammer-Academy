 <?php
 include("header.php");
 include("include/funciones.php");

    $db = conectarse();
  $sentencia="INSERT INTO students (username, pass, email, name, surname, telephone,nif, date_registered) VALUES ('".$_POST["username"]."', '".$_POST["password"]."', '".$_POST["email"]."', '".$_POST["name"]."', '".$_POST["surname"]."', '".$_POST["telephone"]."', '".$_POST["nif"]."','".date("Y-m-d H:i:s")."') ";
  //echo $sentencia;
  $result = $db->query($sentencia);
  echo "Se ha registrado correctamente";
  ?>
  <form action="login.html">
  <input  class="btn btn-primary" type="submit"  value="Pulse aqui para acceder">'
  </form>
  <?php
  exit;
  ?>
<script>
$(function () {
  $('#datepicker').datepicker();
});
</script>
<!------ Include the above in your HEAD tag ---------->

<div class="container" style="margin-top:30px">
<h2>Formulario de alta de asignatura</h2>
    <div class="form-group">
    <form class="form form-control" name="login" action="nuevo_curso.php" method="post">
      <input type="hidden" name="entrando" value="s">
      <label for="idteacher">Seleccione Profesor</label>
      <input class="form-control" type="text" id="id_teacher" name="id_teacher" placeholder="profesor">
      <label for="idcourse">Seleccione Curso</label>
      <input class="form-control" type="text" id="id_course" name="id_course" placeholder="curso">
      <label for="idschedule">Seleccione el horario</label>
      <input class="form-control" type="text" name="idschedule" placeholder="horario asignatura" >
      <label for="name">Nombre clase</label>
      <input class="form-control" type="text" id="name" name="name" placeholder="nombre asignatura">
      <label for="color">Color asignatura</label>
      <input class="form-control" type="text" id="color" name="color" placeholder="color asignatura">
      <input  class="btn btn-primary" style="font-size:2rem;" type="submit" class="fadeIn fourth" value="Añadir asignatura">
    </form>
</div>
</div>
<?php
include("footer.php");