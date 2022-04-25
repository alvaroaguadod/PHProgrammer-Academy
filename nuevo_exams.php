<?php
include("header.php");
include("include/nivel.php");
include("include/menu.php");
include("include/funciones.php");
?>
<div class="container" style="margin-top:30px">
  <?php
    $db = conectarse();
    if (isset($_POST["entrando"]) and $_POST["entrando"] == "s") {

      if (!isset($_SESSION)) {
        session_start();
    }
   
    //$idExam = $sql['Auto_increment'];
    $idClass = $_POST['id_class'] ? $_POST['id_class'] : false;
    $estudiante = $_POST['id_student'] ? $_POST['id_student'] : false;
    $examen = $_POST['examen'] ? $_POST['examen'] : false;
    $notaExamen = $_POST['notaExamen'] ? $_POST['notaExamen'] : false;
    
  //Insertamos en base de datos
    $sql = "INSERT INTO exams (id_class, id_student, name, mark) VALUES ('$idClass' , '$estudiante','$examen', '$notaExamen')";
    $insert = mysqli_query($db, $sql);
    if ($insert) {
      echo "<div class=\"alert alert-success\">Se ha registrado el examen " . $_POST["examen"] . "</div>";
    } else {
      echo "<div class=\"alert alert-error\">Ha ocurrido un error.</div>";
    }

    exit;
  };

  ?>

  <!------ Include the above in your HEAD tag ---------->

  <div class="container" style="margin-top:30px">
    <h2>Formulario de alta de exámenes</h2>
    <div class="form-group">
      <form class="form form-control" name="login" action="nuevo_exams.php" method="POST">
          <input type="hidden" name="entrando" value="s">
          <label for="clase">Indique a qué clase está asociado el examen</label>
          <select name="id_class" class="form-control" required>
            <option value="">Elija una clase</option>
            <?php

              $sqlIdClass = "SELECT * FROM class";
              $result = mysqli_query($db, $sqlIdClass);
              while ($select_class = mysqli_fetch_assoc($result)) {
                echo "<option value=" . $select_class['id_class'] . ">" . $select_class['name'] . "</option>";
              }
              ?>
          </select>
          <label for="name">Indique el estudiante</label>
          <select name="id_student" class="form-control" required>
            <option value="">Elija un estudiante</option>

            <?php

              $sqlIdStudent = "SELECT * FROM students";
              $result = mysqli_query($db, $sqlIdStudent);

              while ($select_student = mysqli_fetch_assoc($result)) {
                echo "<option value=" . $select_student['id'] . ">" . $select_student['name'] . "</option>";
              }
              ?>
          </select>

            <label for="trabajos">Nombre del examen</label>
            <input class="form-control" type="text" id="exam" name="examen" placeholder="nombre del examen" required>
            
            <label for="examenes">Nota del examen</label>
            <input class="form-control" type="text" id="mark" name="notaExamen" placeholder="xxxx" required>
            <input class="btn btn-primary" type="submit" class="fadeIn fourth" value="Añadir Examen">
        </form>
    </div>  
  </div>
</div>
<?php
include("footer.php");
?>