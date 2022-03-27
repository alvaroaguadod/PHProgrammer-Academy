<?php
include("header.php");
include("include/nivel.php");
include("include/menu.php");
include("include/funciones.php");
if ( !isset($_GET) AND !isset($_GET["tabla"]) ){echo "No se han recibido los parámetros necesarios";exit;};
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
            </tr>
        </thead>
        <tbody>
<?php
$db=conectarse();
$sentencia="SELECT * FROM ".$_GET["tabla"];
$result = $db->query($sentencia);
while ($row = $result->fetch_assoc()) {
?>

            <tr>
                <?php
                $contador=0;
                foreach ($valores[$_GET["tabla"]] as $valor) {
                    if ($contador==0){echo"<td><a href='ficha.php?tabla=".$_GET["tabla"]."&id=".$row[$valor]."'>".$row[$valor]."</a></td>";}
                    else {echo"<td>".$row[$valor]."</td>";};
                    $contador++;
                }
                ?>            
</tr>

<?php    
}
?>
        </tbody>

    </table>
<?php
include("footer.php");