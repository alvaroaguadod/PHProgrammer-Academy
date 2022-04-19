 <?php
 include("header.php");
 include("include/nivel.php");
 include("include/menu.php");
 include("include/funciones.php");
 ?>
 <div class="container" style="margin-top:30px">
 <?php
  if (isset($_POST["entrando"]) AND $_POST["entrando"]=="s"){
    $db = conectarse();
   
  $sentencia = "INSERT INTO students (username, pass,email,name, surname, telephone,nif) VALUES ('".$_POST["username"]."', '".$_POST["pass"]."', '".$_POST["email"]."', '".$_POST["name"]."', '".$_POST["surname"]."', '".$_POST["telephone"]."', '".$_POST["nif"]."') ";
  
  //echo $sentencia;
    $result = $db->query($sentencia);
  if($result){
    echo "<div class=\"alert alert-success\">Se ha registrado el estudiante ".$_POST["name"]."</div>";
  }
  else {
    echo "<div class=\"alert alert-error\">Ha ocurrido un error.</div>";
  }
  //var_dump($result);
  
  };
  ?>
<script>
$(function () {
  $('#datepicker').datepicker();
});
</script>
<!------ Include the above in your HEAD tag ---------->

<h2>Formulario de alta de estudiante</h2>
    <div class=form-group>
    <form class="form form-control" name="login" action="nuevo_estudiante.php" method="post">
      <input type="hidden" name="entrando" value="s" required>
      <label for="username">Nombre de usuario</label>
      <input class="form-control" type="text" id="username" name="username" placeholder="nombre de usuario" required>
      <label for="pass">Password</label>
      <input class="form-control" type="password" id="pass" name="pass" placeholder="Password" required>
      <label for="fechainicio">Correo electrónico</label>
      <input class="form-control" type="email" name="email" placeholder="email" required>
      <label for="name">Nombre</label>
      <input class="form-control" type="text" id="name" name="name" placeholder="Nombre" required>
      <label for="activo">Apellido</label>
      <input class="form-control" type="text" id="surname" name="surname" placeholder="Apellido" required>
      <label for="activo">Teléfono</label>
      <input class="form-control" type="text" id="telephone" name="telephone" placeholder="Teléfono" required>
      <label for="activo">Nif</label>
      <input class="form-control" type="text" id="nif" name="nif" placeholder="Nif" required>
      <input  class="btn btn-primary" type="submit" class="fadeIn fourth" value="Añadir estudiante">
    </form>
</div>
</div>
<?php
include("footer.php");