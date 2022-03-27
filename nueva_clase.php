 <?php
 include("header.php");
 include("include/nivel.php");
 include("include/menu.php");
 include("include/funciones.php");
 $db = conectarse();
  if (isset($_POST["entrando"]) AND $_POST["entrando"]=="s"){


    
    if(!isset($_SESSION)){
      session_start();
    }

    

    $name_class = isset($_POST['name_class']) ? $_POST['name_class'] : false;
    $idCurso = isset($_POST['id_curso']) ? $_POST['id_curso'] : false;
    $horario_inicio = isset($_POST['time_start']) ? $_POST['time_start'] : false;
    $horario_fin = isset($_POST['time_end']) ? $_POST['time_end'] : false;
    $dia_semana = isset($_POST['day']) ? $_POST['day'] : false;
    $idProfesor = isset($_POST['id_profesor']) ? $_POST['id_profesor'] : false;
    $color = isset($_POST['color']) ? $_POST['color'] : false;


  
        /*
        $sqlIdProfesor = "SELECT id_teacher FROM teachers WHERE surname= '$profesor' ";
        //obtenemos el valor entero del id profesor con el nombre introducido introducido en formulario
        $select_profesor = mysqli_fetch_assoc(mysqli_query($db, $sqlIdProfesor));
        $idProfesor = intval($select_profesor['id_teacher']);
        
        //obtenemos el entero del array asociativo de la consulta del id del curso con un nombre introducido en formulario
        $sqlCurso = "SELECT id_course FROM courses WHERE name='$name_class' ";
        $select_curso = mysqli_fetch_assoc(mysqli_query($db, $sqlCurso));
        $idCurso =intval($select_curso['id_course']);
        */
        $sqlHorario= "SHOW TABLE STATUS LIKE 'schedule'";
        $sql= mysqli_fetch_assoc(mysqli_query($db, $sqlHorario));
        $idHorario = $sql['Auto_increment'];

        $sqlClase = "INSERT INTO class (id_teacher, id_course, id_schedule, name, color) VALUES ($idProfesor, $idCurso , $idHorario,'$name_class', '$color')";
        $asociarClase = mysqli_query($db, $sqlClase);
        echo $sqlClase;

        if($asociarClase){
             //obtenemos el id de clase creada
            $sqlIdClase= "SELECT id_class FROM class WHERE id_teacher=$idProfesor AND id_course=$idCurso";    
            $sqlIdClase_select = mysqli_fetch_assoc(mysqli_query($db, $sqlIdClase));
            $idClase = intval($sqlIdClase_select['id_class']);

            //Insertamos en el horario con el idClase
            $sqlHorario = "INSERT INTO schedule (id_schedule, id_class, time_start, time_end, day) VALUES ($idHorario , $idClase, '$horario_inicio', '$horario_fin', '$dia_semana' )";
            $sqlHorario_insert = mysqli_query($db, $sqlHorario);
            echo $sqlHorario;

            
    
    }


  echo "Se ha registrado la clase ".$_POST["name_class"];
  exit;

  };
  ?>
<script>
$(function () {
  $('#datepicker').datepicker();
});
</script>
<!------ Include the above in your HEAD tag ---------->

<div class="container" style="margin-top:30px">
<h2>Formulario asociar curso </h2>
    <div class="form-group">
    <form class="form form-control" name="login" action="nueva_clase.php" method="POST">
      <input type="hidden" name="entrando" value="s">
      <label for="clase">Indique el curso</label>
      <select name="id_curso" class="form-control">
        <option value="">Elija un curso</option>
      <?php 

      $sqlIdCourses = "SELECT * FROM courses";
      $result = mysqli_query($db, $sqlIdCourses);
      while($select_courses = mysqli_fetch_assoc($result)){
          echo "<option value=".$select_courses['id_course'].">".$select_courses['name']."</option>";
}
?>  
</select>
      <label for="surname">Indique el profesor</label>
      <select name="id_profesor" class="form-control">
        <option value="">Elija un profesor</option>

     <?php 

         $sqlIdProfesor = "SELECT * FROM teachers";
         $result = mysqli_query($db, $sqlIdProfesor);
         
        while($select_profesor = mysqli_fetch_assoc($result)){
            echo "<option value=".$select_profesor['id_teacher'].">".$select_profesor['name']."</option>";
        }
      ?>
      </select>

      <label for="idschedule">Seleccione hora de inicio</label>
      <input class="form-control" type="time" name="time_start" placeholder="horario inicio asignatura" >

      <label for="idschedule">Seleccione hora de fin</label>
      <input class="form-control" type="time" name="time_end" placeholder="horario fin de asignatura" >
      
      <label for="name_class">¿Cual es el nombre del aula?</label>
      <input class="form-control" type="text" id="name" name="name_class" placeholder="nombre aula">

      <label for="name_class">¿Que dia?</label>
      <input class="form-control" type="date" id="name" name="day" placeholder="indique dia">
      
      <label for="color">¿Con que color identifica la clase?</label>
      <input class="form-control" type="color" id="color" name="color" placeholder="color asignatura">
      <input  class="btn btn-primary" type="submit" class="fadeIn fourth" value="Asociar">
    </form>
</div>
</div>
<?php
include("footer.php");