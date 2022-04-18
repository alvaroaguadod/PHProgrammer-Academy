<?php
session_start();
include("header.php");
include("include/nivel3.php");
include("include/menu_estudiante.php");
include("include/funciones.php");
$db=conectarse();
echo '<div class="container" style="margin-top:30px">';
$sentencia="SELECT * FROM incidences WHERE id_student=".$_SESSION["id"];
$result = $db->query($sentencia);
if (mysqli_num_rows($result)==0){
    echo '<div class="alert alert-info">No hay ninguna </div>';
}
else{
    ?>
    <h1>Listado de incidencias</h1>
<table id="listado" class="table table-striped table-bordered" style="width:100%">
        <thead>
            <tr>
                <th>Identificador</th>
                <th>Descripcion</th>
                <th>Respuesta</th>
            </tr>
        </thead>
        <tbody>
<?php
while ($row = $result->fetch_assoc()) {
?>

            <tr>
                <td>
                    <?php
                    if ($row["response_read_at"]==NULL AND $row["response"]!=""){
                    echo "<i class=\"fa fa-envelope\" style=\"color:red\" aria-hidden=\"true\"></i> ";
                     
                    }
                    else{
                    echo "<i class=\"fa fa-envelope\" aria-hidden=\"true\"></i> ";
                    }
                    ?>
                    
                    <a href="usuario_consulta_incidencia.php?id_incidence=<?php echo $row["id_incidence"];?>"><?php echo $row["id_incidence"];?></a></td>
                <td><?php echo substr($row["description"],0,25);?></td>
                <td><?php echo substr($row["response"],0,25);?></td>

            </tr>

<?php    
}
?>
        </tbody>

    </table>
    <?php
    while($row=mysqli_fetch_array($result)){
        print_r($row);
    };
}
?>
<a class="btn btn-primary" href="usuario_nueva_incidencia.php">Enviar nueva indicencia</a>

</div>
<?php
include("footer.php");