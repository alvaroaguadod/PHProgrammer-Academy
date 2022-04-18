<?php
include("header.php");
include("include/nivel.php");
include("include/menu.php");
include("include/funciones.php");
?>
<script>
    $(document).ready(function() {
    $('#listado').DataTable();
} );
</script>
<div class="container" style="margin-top:30px">
<h1>Listado de incidencias</h1>
<table id="listado" class="table table-striped table-bordered" style="width:100%">
        <thead>
            <tr>
                <th>Identificador</th>
                <th>Alumno</th>
                <th>Descripcion</th>
                <th>Respuesta</th>
            </tr>
        </thead>
        <tbody>
<?php
$db=conectarse();
$sentencia="SELECT * FROM incidences INNER JOIN students ON students.id=incidences.id_student";
$result = $db->query($sentencia);
while ($row = $result->fetch_assoc()) {
?>

            <tr>
                <td><a href="consulta_incidencia.php?id_incidence=<?php echo $row["id_incidence"];?>"><?php echo $row["id_incidence"];?></a></td>
                <td><?php echo $row["name"]." ".$row["surname"];?></td>
                <td><?php echo substr($row["description"],0,25);?></td>
                <td><?php
                 if($row["response"]=="")
                    {
                        echo "<a class=\"btn btn-primary\" style=\"margin-top:0px\" href=\"consulta_incidencia.php?id_incidence=".$row["id_incidence"]."\">Consultar/Responder</a>";
                    }
                    else{
                        echo substr($row["response"],0,25);
                    }
                        
                 ?></td>

 </tr>

<?php    
}
?>
        </tbody>

    </table>
<?php
include("footer.php");