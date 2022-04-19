<?php
include("header.php");
include("include/nivel.php");
include("include/menu.php");
include("include/funciones.php");
if (isset($_POST["entrando"]) and $_POST["entrando"] == "s") {

  $db = conectarse();

  if (!isset($_SESSION)) {
    session_start();
  }

  $nombre = $_POST['name'] ? $_POST['name'] : false;
  $nombre_usuario = $_POST['surname'] ? $_POST['surname'] : false;
  $telefono = $_POST['telefono'] ? $_POST['telefono'] : false;
  $nif = $_POST['nif'] ? $_POST['nif'] : false;
  $email = $_POST['email'] ? $_POST['email'] : false;

  $errores = array();

  if (empty($nombre) && is_numeric($nombre)) {
    $errores = "Introduce un nombre correcto";
  }
  if (empty($nombre_usuario)) {
    $errores = "Introduce un nombre de usuario";
  }
  if (empty($telefono) && !preg_match("[/0-9/]", $telefono)) {
    $errores = "Introduce un numero de telefono correcto";
  }
  if (empty($nif) && (count_chars($nif) > 10)) {
    $errores = "Introduce un nif correcto";
  }
  if (empty($email) && !filter_var($email, FILTER_VALIDATE_EMAIL)) {
    $errores = "Introduce un email correcto";
  }

  //Insertamos en base de datos

  $sql = "INSERT INTO teachers (name, surname, telephone, nif, email) VALUES('$nombre', '$nombre_usuario', '$telefono', '$nif', '$email')";
  $insert = mysqli_query($db, $sql);
  if ($insert) {
    echo "<div class=\"alert alert-success\">Se ha registrado el profesor " . $_POST["name"] . "</div>";
  } else {
    echo "<div class=\"alert alert-error\">Ha ocurrido un error.</div>";
  }

  exit;
};

?>
<!------ Include the above in your HEAD tag ---------->


<div class="container" style="margin-top:30px">
  <h2>Formulario de alta de profesores</h2>
  <div class=form-group>
    <form class="form form-control" action="nuevo_profesor.php" method="post">
      <input type="hidden" name="entrando" value="s" required>
      <label for="nombre">Nombre Profesor</label>
      <input class="form-control" type="text" id="name" name="name" placeholder="nombre del profesor" required>
      <label for="nombre_usuario">Nombre de usuario</label>
      <input class="form-control" type="text" id="description" name="surname" placeholder="nombre de usuario" required>
      <label for="telefono">Telefono de contacto</label>
      <input class="form-control" type="text" name="telefono" placeholder="xxxxxxxxx" required>
      <label for="nif">Nif </label>
      <input class="form-control" type="text" id="date_end" name="nif" placeholder="xxxxxxxxx-X" required>
      <label for="email">Email</label>
      <input class="form-control" type="email" id="date_end" name="email" placeholder="email@email.com" required>
      <input class="btn btn-primary" type="submit" class="fadeIn fourth" value="Añadir profesor">
    </form>
  </div>
</div>
<?php
include("footer.php");
