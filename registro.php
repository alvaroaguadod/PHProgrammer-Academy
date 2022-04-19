 <?php
 include("header.php");
 include("include/funciones.php");
?>
<div class="container" style="margin-top:30px">
<?php
    $db = conectarse();
    $select= "SELECT * FROM students WHERE email='".$_POST['email']."' OR username='".$_POST['username']."'" ;
    $result = $db->query($select);
    if(mysqli_num_rows($result)>0){
      echo "<div class=\"alert alert-warning\">Ha ocurrido un error. Usuario ya registrado en el sistema</div>";
      echo '<a class="btn btn-primary" href="register.html"> Pulse aqui para probar de nuevo</a>';
      exit;
    }
  $sentencia="INSERT INTO students (username, pass, email, name, surname, telephone,nif, date_registered) VALUES ('".$_POST["username"]."', '".$_POST["password"]."', '".$_POST["email"]."', '".$_POST["name"]."', '".$_POST["surname"]."', '".$_POST["telephone"]."', '".$_POST["nif"]."','".date("Y-m-d H:i:s")."') ";
  //echo $sentencia;
  $result = $db->query($sentencia);
  if($result){
    echo "<div class=\"alert alert-info\">Se ha registrado correctamente</div>";
  }else{
    echo "<div class=\"alert alert-warning\">Ha ocurrido un error. Vuelve a intentarlo</div>";
  }
  
  ?>
  <form action="login.html">
  <input  class="btn btn-primary" type="submit"  value="Pulse aqui para acceder">'
  </form>
  <?php
  exit;
  ?>
</div>
<?php
include("footer.php");