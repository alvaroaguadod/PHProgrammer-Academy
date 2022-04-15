<?php
session_start();
include("header.php");
include("include/nivel3.php");
include("include/menu_estudiante.php");
include("include/funciones.php");
?>
<div class="container" style="margin-top:30px">
<h5 text-align: center>Hola, <?php echo $_SESSION["usuario"];?>.</h5>

<h2>Configura tu perfil como lo desees. </h2>
    <br>
    <div class="alert alert-info">Aquí podrás hacer modificación del nombre de usuario, correo electrónico y contraseña.</div>
    <div class="alert alert-info">En la opción calendario, puedes visualizar las siguientes clases</div>


</div>

<?php
$db=conectarse();
$sentencia="SELECT courses.name AS CURSO FROM enrollment INNER JOIN courses ON enrollment.id_course=courses.id_course INNER JOIN students ON students.id=enrollment.id_student WHERE students.id=".$_SESSION["id"];
$result = $db->query($sentencia);
while ($row = $result->fetch_assoc()) {
?>

            <tr>
                <?php
                //echo $row["CURSO"]."<br />";
                ?>            
</tr>
<?php
};
?>
</div>
<?php
include("footer.php");