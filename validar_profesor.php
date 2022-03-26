
<?php
include("include/funciones.php");

if($_POST){
    $db = conectarse();
}

if(!isset($_SESSION)){
    session_start();
}

//asignamos valor del post a variable y comprobamos valores antes de insertar:

$nombre = $_POST['nombre'] ? $_POST['nombre']: false;
$nombre_usuario = $_POST['nombre_usuario'] ? $_POST['nombre_usuario']: false;
$telefono = $_POST['telefono'] ? $_POST['telefono']: false;
$nif = $_POST['nif'] ? $_POST['nif']: false;
$email = $_POST['email'] ? $_POST['email']: false;

$errores = array();

if(empty($nombre) && is_numeric($nombre)){
    $errores ="Introduce un nombre correcto";
}
if(empty($nombre_usuario)){
    $errores ="Introduce un nombre de usuario";
}
if(empty($telefono) && !preg_match("[/0-9/]", $telefono)){
    $errores ="Introduce un numero de telefono correcto";
}
if(empty($nif) && (count_chars($nif)>10)){
    $errores ="Introduce un nif correcto";
}
if(empty($email) && !filter_var($email, FILTER_VALIDATE_EMAIL)){
    $errores ="Introduce un email correcto";
}

//Insertamos en base de datos

$sql = "INSERT INTO teachers (name, surname, telephone, nif, email) VALUES('$nombre', '$nombre_usuario', '$telefono', '$nif', '$email')";
$insert = mysqli_query($db, $sql);
if($insert){
    $_SESSION['completado'] = 'Se ha registrado correctamente';
}
header('Location: nuevo_profesor.php');