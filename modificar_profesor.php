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
  $errores = array();

  $surname = $_POST['surname'] ? $_POST['surname'] : false;
  var_dump($surname);
  $dato = $_POST['dato'] ? $_POST['dato'] : false;

  if(empty($surname)){
      $errores = "debe introducir un nombre de usuario correcto";
  }
  if(empty($dato)){
      $errores = "debe introducir datos nuevos";
  }
  var_dump($_POST['campo']);
  //comprobamos valores
  if ($_POST['campo'] === "name"){
      $campo= "name";
  }
  if($_POST['campo'] === "surname"){
      $campo= "surname";   
  }
  if($_POST['campo'] === "email"){
      $campo= "email";
  }
  if($_POST['campo'] === "nif"){
      $campo= "nif";
  }
  if($_POST['campo'] === "telephone"){
      $campo= "telephone";
  }
  if(empty($campo)){
      $errores= 'Debe elegir un campo';
  }
  
  $sql = "UPDATE teachers SET $campo = '$dato' WHERE surname = '$surname'";
  $update = mysqli_query($db, $sql);
 
  if($update){
    echo "Se ha actualizado el profesor ".$_POST["name"];
  }
exit;
};
  
  ?>
<!------ Include the above in your HEAD tag ---------->


<div class="container" style="margin-top:30px">
<h2>Formulario para modificar datos de profesores</h2>
    <div class=form-group>
    <form class="form form-control" action="modificar_profesor.php" method="post">
      <input type="hidden" name="entrando" value="s">
      <label for="surname">Introduzca el nombre de usuario</label>
      
      <input class="form-control" type="text" id="name" name="surname" placeholder="nombre de usuario" required>
      <label for="campo">¿Que datos quiere modificar?</label>
        <select name="campo">
            <option value = "name">nombre</option>
            <option value = "surname">nombre de usuario</option>
            <option value = "telephone">telefono de contacto</option>
            <option value = "nif">nif</option>
            <option value = "email">email</option>
        </select><br/>

      <label for="dato">Introduzca los nuevos datos</label>
      <input class="form-control" type="text" name="dato" placeholder="nuevos datos" required>
      
      <input  class="btn btn-primary" type="submit" class="fadeIn fourth" value="Modificar datos" required>
    </form>
</div>
</div>
<?php
include("footer.php");