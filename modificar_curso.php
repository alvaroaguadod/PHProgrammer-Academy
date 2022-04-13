<?php
 include("header.php");
 include("include/nivel.php");
 include("include/menu.php");
 include("include/funciones.php");
  if (isset($_POST["entrando"]) AND $_POST["entrando"]=="s"){
   // var_dump($_POST);
  $db = conectarse();
  
  if(!isset($_SESSION)){
    session_start();
  }
  $errores = array();

  $name = $_POST['name'] ? $_POST['name'] : false;
  
  $dato = $_POST['dato'] ? $_POST['dato'] : false;

  if(empty($name)){
      $errores = "debe introducir un nombre de curso correcto";
  }
  if(empty($dato)){
      $errores = "debe introducir datos nuevos";
  }
  
  //comprobamos valores
  if ($_POST['campo'] === "name"){
      $campo= "name";
  }
  if($_POST['campo'] === "description"){
      $campo= "description";   
  }
  if($_POST['campo'] === "date_start"){
      $campo= "date_start";
  }
  if($_POST['campo'] === "date_end"){
      $campo= "date_end";
  }
  if($_POST['campo'] === "active"){
      $campo= "active";
      if($dato ==="si"){
        $dato = 1;
      }
      if($dato==="no"){
        $dato=0;
      }
  }
  if(empty($campo)){
      $errores= 'Debe elegir un campo';
  }
  
  $sql = "UPDATE courses SET $campo = '$dato' WHERE name = '$name'";
  $update = mysqli_query($db, $sql);
 
  if($update){
    echo "Se ha actualizado el curso ".$_POST["name"];
  }
exit;
};
  
  ?>
<!------ Include the above in your HEAD tag ---------->


<div class="container" style="margin-top:30px">
<h2>Formulario para modificar datos de cursos</h2>
    <div class=form-group>
    <form class="form form-control" action="modificar_curso.php" method="post">
      <input type="hidden" name="entrando" value="s">
      
      <label for="name">Introduzca el nombre del curso</label>      
      <input class="form-control" type="text" id="name" name="name" placeholder="nombre del curso" required>

      <label for="campo">¿Que datos quiere modificar?</label>
        <select name="campo">
            <option value = "name">nombre</option>
            <option value = "description">descripcion del curso</option>
            <option value = "date_start">fecha de inicio(xx-xx-xxxx)</option>
            <option value = "date_end">fecha fin de curso(xx-xx-xxxx)</option>
            <option value = "active">activo (si / no )</option>
        </select><br/>

      <label for="dato">Introduzca los nuevos datos</label>
      <input class="form-control" type="text" name="dato" placeholder="nuevos datos" required>
      
      <input  class="btn btn-primary" type="submit" class="fadeIn fourth" value="Modificar datos">
    </form>
</div>
</div>
<?php
include("footer.php");