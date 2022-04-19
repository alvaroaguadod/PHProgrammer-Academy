 <?php
  include("header.php");
  include("include/nivel.php");
  include("include/menu.php");
  include("include/funciones.php");
  if (isset($_POST["entrando"]) and $_POST["entrando"] == "s") {
    $db = conectarse();

    $active = isset($_POST['active']) ? $_POST['active'] : false;
    if ($active == 's') {
      $active = 1;
    }
    if ($active == 'n') {
      $active = 0;
    }
    $sentencia = "INSERT INTO courses (name, description, date_start, date_end, active) VALUES ('" . $_POST["name"] . "', '" . $_POST["description"] . "', '" . $_POST["date_start"] . "', '" . $_POST["date_end"] . "', '$active') ";

    //echo $sentencia;
    $result = $db->query($sentencia);
    if ($result) {
      echo "<div class=\"alert alert-success\">Se ha registrado el curso " . $_POST["name"] . "</div>";
    } else {
      echo "<div class=\"alert alert-error\">Ha ocurrido un error.</div>";
    }
    exit;
  };
  
  ?>
 <script>
   $(function() {
     $('#datepicker').datepicker();
   });
 </script>
 <!------ Include the above in your HEAD tag ---------->

 <div class="container" style="margin-top:30px">
   <h2>Formulario de alta de un curso</h2>
   <div class=form-group>
     <form class="form form-control" name="login" action="nuevo_curso.php" method="post">
       <input type="hidden" name="entrando" value="s" required>
       <label for="nombrecurso">Nombre del curso</label>
       <input class="form-control" type="text" id="name" name="name" placeholder="nombre del curso" required>
       <label for="descripcion">Descripción</label>
       <input class="form-control" type="text" id="description" name="description" placeholder="descripcion del curso" required>
       <label for="fechainicio">Fecha inicio curso</label>
       <input class="form-control" type="date" name="date_start" placeholder="fecha de inicio" required>
       <label for="fechafin">Fecha fin curso</label>
       <input class="form-control" type="date" id="date_end" name="date_end" placeholder="fecha de fin" required>
       <label for="activo">Activo</label>
       <select class="form-control" id="active" name="active" required="required">
         <option value="">Elija uno</option>
         <option value="s">Sí</option>
         <option value="n">No</option>
       </select>
       <input class="btn btn-primary" type="submit" class="fadeIn fourth" value="Añadir curso">
     </form>
   </div>
 </div>
 <?php
  include("footer.php");
