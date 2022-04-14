<?php
include("header.php");
include("include/nivel.php");
include("include/menu.php");
include("include/funciones.php");
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
$relacionadas["courses"]=array("students","enrollment","id","id_student","id_course","id_course");
$relacionadas["students"]=array("courses","enrollment","id_course","id_course","id_student","id_course");

if ( !isset($_GET) AND !isset($_GET["tabla"]) ){echo "No se han recibido los parámetros necesarios";exit;};
$db=conectarse();
if (isset($valores[$_GET["tabla"]])){$campo_busqueda=$valores[$_GET["tabla"]][0];} else{$campo_busqueda="id";};
$sentencia="SELECT * FROM ".$_GET["tabla"]." WHERE ".$campo_busqueda."=".$_GET["id"]." LIMIT 1";
$result = $db->query($sentencia);
$row = $result->fetch_assoc();
 ?>

    <nav style="margin-left:40px;margin-top:20px">
  <div class="nav nav-tabs" id="nav-tab" role="tablist">
    <a class="nav-link active" id="nav-home-tab" data-toggle="tab" href="#nav-home" role="tab" aria-controls="nav-home" aria-selected="true">Identificador: <?php echo $row[$valores[$_GET["tabla"]][0]];?></a>
    <?php
    if (isset($relacionadas[$_GET["tabla"]][0])){
    echo '<a class="nav-link" id="nav-profile-tab" data-toggle="tab" href="#nav-profile" role="tab" aria-controls="nav-profile" aria-selected="false">'.$relacionadas[$_GET["tabla"]][0].'</a>'; 
    }
    ?>
  </div>
</nav>
<div class="tab-content" style="margin-left:40px" id="nav-tabContent">
  <div class="tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">     
     <?php
      foreach ($valores[$_GET["tabla"]] as $key => $valor) {
                    
        echo $campos[$_GET["tabla"]][$key].": ". $row[$valor]."<br />";
        
    }
      ?></div>
    <?php 
    if (isset($relacionadas[$_GET["tabla"]])){?>
  <div class="tab-pane fade" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab">
    <?php
          if ($_GET["tabla"]=="students") {
            echo "<h4>Cursos matrículados</h4>";
          $sqlIdRelacionados = "SELECT courses.name AS nombre_curso, courses.id_course AS id_curso FROM courses INNER JOIN enrollment ON courses.id_course = enrollment.id_course INNER JOIN students ON students.id=enrollment.id_student WHERE enrollment.id_student= ".$row[$valores[$_GET["tabla"]][0]]."";
          //echo $sqlIdRelacionados;
          $result = mysqli_query($db, $sqlIdRelacionados);
          while($select_courses = mysqli_fetch_assoc($result)){
              echo "<a class=\"btn btn-default\" href=\"ficha.php?tabla=courses&id=".$select_courses["id_curso"]."\">".$select_courses["nombre_curso"]."</a><br />";
    }
    ?>
    <p><a class="btn btn-default" href="nueva_relacion.php?tabla=<?php echo $_GET["tabla"];?>&relacionada=<?php echo $relacionadas[$_GET["tabla"]][0];?>&intermedia=<?php echo $relacionadas[$_GET["tabla"]][0];?>&id_student=<?php echo $row[$valores[$_GET["tabla"]][0]];?>">Matricular en curso </a></p>
 <?php
  }
  if ($_GET["tabla"]=="courses") {
    echo "<h4>Cursos matrículados</h4>";
  $sqlIdRelacionados = "SELECT CONCAT(students.surname,', ',students.name) AS nombre_estudiante, students.id AS id_estudiante FROM courses INNER JOIN enrollment ON courses.id_course = enrollment.id_course INNER JOIN students ON students.id=enrollment.id_student WHERE enrollment.id_course= ".$row[$valores[$_GET["tabla"]][0]]."";
  //echo $sqlIdRelacionados;
  $result = mysqli_query($db, $sqlIdRelacionados);
  while($select_courses = mysqli_fetch_assoc($result)){
      echo "<a class=\"btn btn-default\" href=\"ficha.php?tabla=students&id=".$select_courses["id_estudiante"]."\">".$select_courses["nombre_estudiante"]."</a><br />";
}
?>
<p><a class="btn btn-default" href="nueva_relacion.php?tabla=<?php echo $_GET["tabla"];?>&relacionada=<?php echo $relacionadas[$_GET["tabla"]][0];?>&intermedia=<?php echo $relacionadas[$_GET["tabla"]][0];?>&id_course=<?php echo $row[$valores[$_GET["tabla"]][0]];?>">Matricular a alumno </a></p>
<?php
}
    //echo $relacionadas[$_GET["tabla"]][0];
    ?>
  </div>
  <?php
}
?>
</div>
<?php
include("footer.php");