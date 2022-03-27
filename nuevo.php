<?php
include("cabecera.php");
include("menu.php");
$validado=false;
$db = new mysqli('localhost', 'horarios_escolares', 'horarios_escolares', 'horarios_escolares');
if ($db->connect_error) {
        die('Connect Error (' . $db->connect_errno . ') '
            . $mysqli->connect_error);};
if (isset($_GET["accion"]) AND $_GET["accion"]=="entrando"){
echo "Insertando registro";
$campos=array();
$valores=array();
foreach ($_GET as $key => $value){

    if ($key!="tabla" AND $key!="accion"){
$campos[]=$key;
$valores[]=$value;
    }
} 
echo "INSERT INTO horarios_escolares.".$_GET["tabla"]." (".implode(",",$campos).") VALUES (".implode(",",$valores).")";
exit;   
}
            
$result = $db->query("describe horarios_escolares.".$_GET["tabla"]);
echo "<div class='container'>";
echo "<form>";
echo "<input type='hidden' name='tabla' value='".$_GET["tabla"]."' />";
echo "<input type='hidden' name='accion' value='entrando' />";
if ($result->num_rows > 0) {
    // output data of each row
    while ($row = $result->fetch_assoc()) {
        if ($row["Field"] != "id") {
            echo "<div class='form-group'>";
            echo  "<label for='" . $row["Field"] . "'>" . $row["Field"] . "</label> <input type='text' size='50' class='form-control' name='" . $row["Field"] . "' >";
            echo "</form>";
        }
    }
    echo "<input type='submit' value='Submit'></form>";
};
echo "</div>";