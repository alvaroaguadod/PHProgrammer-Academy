<?php
include("header.php");
include("include/nivel.php");
include("include/menu.php");
?>
<div class="container" style="margin-top:30px">

<h5 text-align: center>Hola, <?php echo $_SESSION["usuario"]; ?>.</h5>

<h2>Administra la información<br> 
    que necesites fácilmente. </h2>
    
<div class="alert alert-info">Desde el Panel Administración podrás crear, consultar, eliminar y modificar la información del ente que necesites. </div>
<div class="alert alert-info">En la pestaña de Nuevo podrás crear un curso, una asignatura, una clase o introducir un nuevo profesor. Así como, configurar el día y hora de las clases, el color con el que se muestra en el horario, junto con el profesor que la imparte y el curso al que pertenece.</div>
<div class="alert alert-info">En la pestaña de Consultar podrás revisar cuatro listados diferentes. El Listado de Estudiantes, el de Cursos, el de Profesores y el de Clases. En las fichas de cada uno de ellos, podrás modificar o eliminar los registros necesarios.</div>
<div class="alert alert-info">En la ficha de estudiante, puedes consultar los cursos a los que está inscrito e inscribirlo en un nuevo curso</div>
<div class="alert alert-info">En la ficha del curso, se pueden consultar los estudiantes matriculados e inscribir nuevos alumnos</div>
<div class="alert alert-info">En la pestaña de Eliminar podrás borrar el curso, la asignatura o el profesor que ya no se realize o que ya no esté en nuestro equipo. </div>
<div class="alert alert-info">En la pestaña de Modificar podrás corregir la información de Curso, Clase o Profesor que indiques.</div> 

</div>
<?php
include("footer.php");