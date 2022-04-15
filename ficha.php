<?php
include("header.php");
include("include/nivel.php");
include("include/menu.php");
include("include/funciones.php");
$literales=array();
$literales["students"]=array("Estudiante","name","Estudiantes Matrículados");
$literales["courses"]=array("Curso","name","Cursos Matrículados");
$literales["class"]=array("Clase","name");
$literales["teachers"]=array("Profesor","name");
$literales["schedule"]=array("Horario","id_schedule");
$campos=array();
$campos["students"]=array("Identificador","Usuario","Correo electrónico","Nombre","Apellido","Teléfomo","Nif","Fecha de registro");
$campos["courses"]=array("Identificador","Nombre del curso","Descripción","Fecha de inicio","Fecha fin","Activo");
$campos["class"]=array("Identificador","Profesor", "Curso","Identificador Horario","Nombre","Color");
$campos["teachers"]=array("Identificador","Nombre","Apellido","Teléfono","Nif","Correo electrónico");
$campos["schedule"]=array("Identificador","Clase","Hora inicio","Hora fin","Día");
$valores=array();
$valores["students"]=array("id","username","email","name","surname","telephone","nif","date_registered");
$valores["courses"]=array("id_course","name","description","date_start","date_end","active");
$valores["class"]=array("id_class","id_teacher", "id_course","id_schedule","name","color");
$valores["teachers"]=array("id_teacher","name","surname","telephone","nif","email");
$valores["schedule"]=array("id_schedule","id_class","time_start","time_end","day");
$relacionadas=array();
$relacionadas["courses"]=array("students","enrollment","id","id_student","id_course","id_course");
$relacionadas["students"]=array("courses","enrollment","id_course","id_course","id_student","id_course");

if ( !isset($_GET) AND !isset($_GET["tabla"]) ){echo "No se han recibido los parámetros necesarios";exit;};
$db=conectarse();
if (isset($valores[$_GET["tabla"]])){$campo_busqueda=$valores[$_GET["tabla"]][0];} else{$campo_busqueda="id";};
$sentencia="SELECT * FROM ".$_GET["tabla"]." WHERE ".$campo_busqueda."=".$_GET["id"]." LIMIT 1";
$result = $db->query($sentencia);
$row = $result->fetch_assoc();
$identificador=$valores[$_GET["tabla"]][0];
$campo=$valores[$_GET["tabla"]][0];
 ?>

    <nav style="margin-left:40px;margin-top:20px">
  <div class="nav nav-tabs" id="nav-tab" role="tablist">
    <a class="nav-link active" id="nav-home-tab" data-toggle="tab" href="#nav-home" role="tab" aria-controls="nav-home" aria-selected="true"><?php echo $literales[$_GET["tabla"]][0];?>: <?php echo $row[$literales[$_GET["tabla"]][1]];?></a> 
    <?php
    if (isset($relacionadas[$_GET["tabla"]][0])){
    echo '<a class="nav-link" id="nav-profile-tab" data-toggle="tab" href="#nav-profile" role="tab" aria-controls="nav-profile" aria-selected="false">'.$literales[$relacionadas[$_GET["tabla"]][0]][2].'</a>'; 
    }
    if ($_GET["tabla"]=="students") {
      echo '<a class="nav-link" id="nav-profile-tab2" data-toggle="tab" href="#nav-tab2" role="tab" aria-controls="nav-profile" aria-selected="false">Próximas clases</a>'; 
    };
    if ($_GET["tabla"]=="courses") {
      echo '<a class="nav-link" id="nav-profile-tab2" data-toggle="tab" href="#nav-tab2" role="tab" aria-controls="nav-profile" aria-selected="false">Próximas clases</a>'; 
    };
    ?>
  </div>
</nav>
<div class="tab-content" style="margin-left:40px" id="nav-tabContent">
  <div class="tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">  

     <?php
     echo "<div class=\"list-group\">";
      foreach ($valores[$_GET["tabla"]] as $key => $valor) {
                    
        echo "<button type=\"button\" class=\"list-group-item list-group-item-action\">".$campos[$_GET["tabla"]][$key].": ". $row[$valor]."</button>";
        
    }
    
      ?>
      <button type="button" class="list-group-item list-group-item-action"><a href="modificar.php?tabla=<?php echo $_GET["tabla"];?>&registro=<?php echo $identificador;?>&campo=<?php echo $campo;?>"><i class="fas fa-edit" style="font-size:24px"></i></a> <a href="borrar.php?tabla=<?php echo $_GET["tabla"];?>&registro=<?php echo $identificador;?>&campo=<?php echo $campo;?>"><i class="fas fa-trash" style="font-size:24px"></i></a></button>
      </div> 
    </div>
    <?php 
    if (isset($relacionadas[$_GET["tabla"]])){?>
  <div class="tab-pane fade" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab">
    <?php
          if ($_GET["tabla"]=="students") {

            echo "<div class=\"list-group\">";
          $sqlIdRelacionados = "SELECT courses.name AS nombre_curso, courses.id_course AS id_curso FROM courses INNER JOIN enrollment ON courses.id_course = enrollment.id_course INNER JOIN students ON students.id=enrollment.id_student WHERE enrollment.id_student= ".$row[$valores[$_GET["tabla"]][0]]."";
          //echo $sqlIdRelacionados;
          $result = mysqli_query($db, $sqlIdRelacionados);
          while($select_courses = mysqli_fetch_assoc($result)){
              echo "<button type=\"button\" class=\"list-group-item list-group-item-action\"><a  href=\"ficha.php?tabla=courses&id=".$select_courses["id_curso"]."\">".$select_courses["nombre_curso"]."</a></button>";
    }
    echo "</div>";
    ?>

    <p><a class="btn btn-default" href="nueva_relacion.php?tabla=<?php echo $_GET["tabla"];?>&relacionada=<?php echo $relacionadas[$_GET["tabla"]][0];?>&intermedia=<?php echo $relacionadas[$_GET["tabla"]][0];?>&id_student=<?php echo $row[$valores[$_GET["tabla"]][0]];?>">Matricular en curso </a></p>
 <?php
  }
  if ($_GET["tabla"]=="courses") {

    echo "<div class=\"list-group\">";
  $sqlIdRelacionados = "SELECT CONCAT(students.surname,', ',students.name) AS nombre_estudiante, students.id AS id_estudiante FROM courses INNER JOIN enrollment ON courses.id_course = enrollment.id_course INNER JOIN students ON students.id=enrollment.id_student WHERE enrollment.id_course= ".$row[$valores[$_GET["tabla"]][0]]."";
  //echo $sqlIdRelacionados;
  $result = mysqli_query($db, $sqlIdRelacionados);
  while($select_courses = mysqli_fetch_assoc($result)){
      echo "<button type=\"button\" class=\"list-group-item list-group-item-action\"><a href=\"ficha.php?tabla=students&id=".$select_courses["id_estudiante"]."\">".$select_courses["nombre_estudiante"]."</a></button>";
}
echo "</div>";
?>

<p><a class="btn btn-default" href="nueva_relacion.php?tabla=<?php echo $_GET["tabla"];?>&relacionada=<?php echo $relacionadas[$_GET["tabla"]][0];?>&intermedia=<?php echo $relacionadas[$_GET["tabla"]][0];?>&id_course=<?php echo $row[$valores[$_GET["tabla"]][0]];?>">Matricular a alumno </a></p>
<?php
}

    //echo $relacionadas[$_GET["tabla"]][0];
    ?>
  </div>
  <?php
  if ($_GET["tabla"]=="students") {
    echo "<div class=\"tab-pane fade\" id=\"nav-tab2\" role=\"tabpanel\" aria-labelledby=\"nav-profile-tab\">";
    echo "<div class=\"list-group\">";
    $sqlHorarios = "SELECT schedule.id_schedule,schedule.time_start,schedule.time_end,schedule.day, class.name AS clase FROM schedule INNER JOIN class ON class.id_class = schedule.id_class AND class.id_schedule=schedule.id_schedule INNER JOIN courses ON courses.id_course=class.id_course INNER JOIN enrollment ON courses.id_course=enrollment.id_course INNER JOIN students ON students.id=enrollment.id_student WHERE students.id= ".$row[$valores[$_GET["tabla"]][0]]."";
    //echo $sqlIdRelacionados;
    $result = mysqli_query($db, $sqlHorarios);
    while($horarios = mysqli_fetch_assoc($result)){
        echo "<button type=\"button\" class=\"list-group-item list-group-item-action\"><a  href=\"ficha.php?tabla=schedule&id=".$horarios["id_schedule"]."\">".$horarios["clase"]." ".$horarios["day"].": ".$horarios["time_start"]." - ".$horarios["time_end"]."</a></button>";
}
echo "</div>";

    echo "</div>";
  };
  if ($_GET["tabla"]=="courses") {
    echo "<div class=\"tab-pane fade\" id=\"nav-tab2\" role=\"tabpanel\" aria-labelledby=\"nav-profile-tab\">";
    echo "<div class=\"list-group\">";
    $sqlHorarios = "SELECT schedule.id_schedule,schedule.time_start,schedule.time_end,schedule.day, class.name AS clase FROM schedule INNER JOIN class ON class.id_class = schedule.id_class AND class.id_schedule = schedule.id_schedule INNER JOIN courses ON courses.id_course=class.id_course WHERE courses.id_course= ".$row[$valores[$_GET["tabla"]][0]]."";
    //echo $sqlIdRelacionados;
    $result = mysqli_query($db, $sqlHorarios);
    while($horarios = mysqli_fetch_assoc($result)){
        echo "<button type=\"button\" class=\"list-group-item list-group-item-action\"><a  href=\"ficha.php?tabla=schedule&id=".$horarios["id_schedule"]."\">".$horarios["clase"]." ".$horarios["day"].": ".$horarios["time_start"]." - ".$horarios["time_end"]."</a></button>";
}
echo "</div>";

    echo "</div>";
  };
}
?>
</div>
<?php
include("footer.php");