<?php
include("header.php");
include("include/nivel.php");
include("include/menu.php");
include("include/funciones.php");
?>
<div class="container" style="margin-top:30px">
<?php
$db=conectarse();
if (isset($_GET) AND isset($_GET["tabla"]) ){
    $tabla=$_GET["tabla"];
    $registro=$_GET["registro"];
    $campo=$_GET["campo"];
}
elseif (isset($_POST) AND isset($_POST["tabla"]) ){
    $tabla=$_POST["tabla"];
    $registro=$_POST["registro"];
    $campo=$_POST["campo"];
}

if ( !isset($tabla)) {echo "No se han recibido los parámetros necesarios";exit;};
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

if (isset($_POST["entrando"]) AND $_POST["entrando"]=="S" ){

    $contador=0;
    $modificables="";
    foreach ($valores[$_POST["tabla"]] as $valor) {
        if ($contador>0){
        $modificables.=$valor."='".$_POST[$valor]."',";
        }
    $contador++;
} 
$modificables=substr_replace($modificables ,"", -1);
    $sentencia="UPDATE ".$tabla." SET ".$modificables." WHERE ".$campo."=".$registro;
    //echo $sentencia;
    $result = $db->query($sentencia);
    echo '<div class="alert alert-success">Se han modificado sus datos correctamente</div>';
}



$sentencia="SELECT * FROM ".$tabla." WHERE ".$campo."=".$registro;
$result = $db->query($sentencia);
$row = $result->fetch_assoc();
?>

<form class="form-group" action="modificar.php" method="post">
    <input type="hidden" name="entrando" value="S" />
    <input type="hidden" name="tabla" value="<?php echo $tabla;?>" />
    <input type="hidden" name="registro" value="<?php echo $registro;?>" />
    <input type="hidden" name="campo" value="<?php echo $campo;?>" />
<?php
$contador=0;
foreach ($valores[$tabla] as $valor) {
    if ($contador>0){
        echo "<label for='".$campos[$tabla][$contador]."'>".$campos[$tabla][$contador]."</label>";
        echo"<input class='form-control' name='".$valor."' value='".$row[$valor]."'>";
    }
    $contador++;
} 
?>
<input type="submit" class="btn btn-primary" value="Modificar" />
<?php
include("footer.php");