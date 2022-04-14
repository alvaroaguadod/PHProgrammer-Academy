<?php
include("header.php");
include("include/nivel.php");
include("include/menu.php");
include("include/funciones.php");
?>
<div class="container" style="margin-top:30px">
<?php
$campos=array();
$campos["students"]=array("identificador","usuario","Correo electrónico","Nombre","Apellido","Teléfomo","Nif","Fecha de registro");
$campos["courses"]=array("id_course","name","description","date_start","date_end","active");
$campos["class"]=array("id_class","id_teacher", "id_course","id_schedule","name","color");
$campos["teachers"]=array("id_teacher","name","surname","telephone","nif","email");
$valores=array();
$valores["students"]=array("id","username","email","name","surname","telephone","nif","date_registered");
$valores["courses"]=array("id_course","name","description","date_start","date_end","active");
$valores["class"]=array("id_class","id_teacher", "id_course","id_schedule","name","color");
$valores["teachers"]=array("id_teacher","name","surname","telephone","nif","email");
$relacionadas=array();
$relacionadas["courses"]=array("students","enrollment","id","id_student","id_course","id_course",array("id_student","id_course"));
$relacionadas["students"]=array("courses","enrollment","id_course","id_student","id_course","id_course");
//if(!isset($_GET["tabla"]) OR !isset($_GET["relacionada"])){echo "No se han recibido los parámetros correctos";exit;}
$db = conectarse();
if (isset($_POST["entrando"]) AND $_POST["entrando"]=="s"){
  if(!isset($_SESSION)){
    session_start();
  }

  $idCurso = isset($_POST['id_curso']) ? $_POST['id_curso'] : false;
  $idEstudiante = isset($_POST['id_estudiante']) ? $_POST['id_estudiante'] : false;
      $sqlClase = "INSERT INTO enrollment (id_student, id_course) VALUES ($idEstudiante, $idCurso)";
      $asociarClase = mysqli_query($db, $sqlClase);
      //echo $sqlClase;

          
  



echo "<div class=\"alert alert-success\">Se ha registrado la clase</div>";
exit;

};
?>
<script>
$(function () {
$('#datepicker').datepicker();
});
</script>
<!------ Include the above in your HEAD tag ---------->


<h2>Formulario asociar curso - estudiante </h2>
  <div class="form-group">
  <form class="form form-control" name="login" action="nueva_relacion.php" method="POST">
    <input type="hidden" name="entrando" value="s">
    <label for="clase">Indique el curso</label>
    <select name="id_curso" class="form-control">
      <option value="">Elija un curso</option>
    <?php 

    $sqlIdCourses = "SELECT * FROM courses";
    $result = mysqli_query($db, $sqlIdCourses);
    while($select_courses = mysqli_fetch_assoc($result)){
        echo "<option";
        if (isset($_GET["id_course"]) AND $_GET["id_course"]==$select_courses['id_course']){echo " selected=selected";};
        echo " value=".$select_courses['id_course'].">".$select_courses['name']."</option>";
}
?>  
</select>
    <label for="surname">Indique el estudiante</label>
    <select name="id_estudiante" class="form-control">
      <option value="">Elija un estudiante</option>

   <?php 

       $sqlIdProfesor = "SELECT * FROM students";
       $result = mysqli_query($db, $sqlIdProfesor);
       
      while($select_profesor = mysqli_fetch_assoc($result)){
          echo "<option";
          if (isset($_GET["id_student"]) AND $_GET["id_student"]==$select_profesor['id']){echo " selected=selected";};
          echo " value=".$select_profesor['id'].">".$select_profesor['surname'].",".$select_profesor['name']."</option>";
      }
    ?>
    </select>
    <input  class="btn btn-primary" type="submit" class="fadeIn fourth" value="Asociar">
  </form>
</div>
</div>