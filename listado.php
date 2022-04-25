<?php
include("header.php");
include("include/nivel.php");
include("include/menu.php");
include("include/funciones.php");
if ( !isset($_GET) AND !isset($_GET["tabla"]) ){echo "No se han recibido los parámetros necesarios";exit;};
$campos=array();
$campos["students"]=array("Identificador","Usuario","Correo electrónico","Nombre","Apellido","Teléfomo","Nif","Fecha de registro");
$campos["courses"]=array("Identificador","Nombre del curso","Descripción","Fecha de inicio","Fecha fin","Activo");
$campos["class"]=array("Identificador","Profesor", "Curso","Identificador Horario","Nombre","Color");
$campos["teachers"]=array("Identificador","Nombre","Apellido","Teléfono","Nif","Correo electrónico");
$campos["notifications"]=array("Identificador","id Alumno","Trabajo","Examen","Evaluación Continua","Nota Final");
$valores=array();
$valores["students"]=array("id","username","email","name","surname","telephone","nif","date_registered");
$valores["courses"]=array("id_course","name","description","date_start","date_end","active");
$valores["class"]=array("id_class","teacher", "course","id_schedule","name","color");
$valores["teachers"]=array("id_teacher","name","surname","telephone","nif","email");
$valores["notifications"]=array("id_notification","id_student","work","exam","continuous_assessment","final_note");

?>
<script>
    $(document).ready(function() {
    $('#listado').DataTable();
} );
</script>
<div class="container" style="margin-top:30px">
<h1>Listado de <?php echo $_GET["tipo"];?></h1>
<table id="listado" class="table table-striped table-bordered" style="width:100%">
        <thead>
            <tr>
                <?php
               
                foreach ($campos[$_GET["tabla"]] as $valor) {
                    
                    echo"<th>".$valor."</th>";
                    
                }
                ?>
                <th>Editar</th>
                <th>Eliminar</th>
            </tr>
        </thead>
        <tbody>
<?php
$db=conectarse();
if ($_GET["tabla"]=="class") {$campos_nombres="*,teachers.name AS teacher, courses.name as course";$nombres=" INNER JOIN teachers ON teachers.id_teacher=class.id_teacher INNER JOIN courses ON courses.id_course=class.id_course";} else {$campos_nombres="*";$nombres="";};
$sentencia="SELECT $campos_nombres FROM ".$_GET["tabla"].$nombres;
$result = $db->query($sentencia);
while ($row = $result->fetch_assoc()) {
?>

            <tr>
                <?php
                $contador=0;
                foreach ($valores[$_GET["tabla"]] as $valor) {
                    if ($contador==0){$identificador=$row[$valor];$campo=$valores[$_GET["tabla"]][0]; echo"<td><a href='ficha.php?tabla=".$_GET["tabla"]."&id=".$row[$valor]."'>".$row[$valor]."</a></td>";}
                    else {
                        echo"<td>";
                        if ($valor=="id_schedule") {echo "<a href=\"ficha.php?tabla=schedule&id=".$row[$valor]."\">".$row[$valor]."</a>";}
                        else {echo $row[$valor];};
                        echo "</td>";
                    };
                    $contador++;
                }
                ?>  
 <td><a href="modificar.php?tabla=<?php echo $_GET["tabla"];?>&registro=<?php echo $identificador;?>&campo=<?php echo $campo;?>"><i class="fas fa-edit" style="font-size:24px"></i></a></td>          
<td><a href="borrar.php?tabla=<?php echo $_GET["tabla"];?>&registro=<?php echo $identificador;?>&campo=<?php echo $campo;?>"><i class="fas fa-trash" style="font-size:24px"></i></a></td>
</tr>

<?php    
}
?>
        </tbody>

    </table>
<?php
include("footer.php");