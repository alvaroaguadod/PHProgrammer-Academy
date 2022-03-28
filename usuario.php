<?php
session_start();
include("header.php");
include("include/nivel3.php");
include("include/menu_estudiante.php");
include("include/funciones.php");
?>
<div class="container" style="margin-top:30px">
<h1>Página de estudiante</h1>

<p>Esta es la página de estudiante. En esta página se puede mostrar la información para el estudiante de la aplicación</p>

<?php
$db=conectarse();
$sentencia="SELECT courses.name AS CURSO FROM enrollment INNER JOIN courses ON enrollment.id_course=courses.id_course INNER JOIN students ON students.id=enrollment.id_student WHERE students.id=".$_SESSION["id"];
$result = $db->query($sentencia);
while ($row = $result->fetch_assoc()) {
?>

            <tr>
                <?php
                echo $row["CURSO"]."<br />";
                ?>            
</tr>
<?php
};
?>
</div>
<?php
include("footer.php");