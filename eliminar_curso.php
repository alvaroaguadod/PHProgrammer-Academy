<?php
 include("header.php");
 include("include/nivel.php");
 include("include/menu.php");
 include("include/funciones.php");
if (isset($_POST["entrando"]) AND $_POST["entrando"]=="s"){
  
  $db = conectarse();
  
  if(!isset($_SESSION)){
    session_start();
  }
  
  $surname= isset($_POST['surname']) ? $_POST['surname'] : false;
  $sql = "DELETE FROM course WHERE surname = '$surname'";
  $delete = mysqli_query($db, $sql);
  if($delete){
    echo "Se ha eliminado el profesor ".$_POST["surname"];
  }
exit;
};
  ?>

<!------ Include the above in your HEAD tag ---------->

<div class="container" style="margin-top:30px">
<h2>Formulario eliminar Curso</h2>
    <div class=form-group>
        <form class="form form-control" name="delete" action="eliminar_curso.php" method="POST">
        <input type="hidden" name="entrando" value="s">
        <label for="surname">Nombre del curso</label>
        <input class="form-control" type="text" name="name" placeholder="nombre del curso" required>
        <label for="si">¿Esta seguro que quiere eliminarlo?</label><br/>
        <label><input type="checkbox" value="si" required/> SI </label><br/>
        <input  class="btn btn-primary" type="submit" class="fadeIn fourth" value="Eliminar curso">
        </form>
</div>
</div>
<?php
include("footer.php");