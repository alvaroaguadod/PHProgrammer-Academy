<?php
include("header.php");
include("include/nivel.php");
include("include/menu.php");
include("include/funciones.php");
if ( !isset($_GET) AND !isset($_GET["tabla"]) ){echo "No se han recibido los parámetros necesarios";exit;};
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
                <th>id</th>
                <th>username</th>
                <th>pass</th>
                <th>email</th>
                <th>name</th>
                <th>surname</th>
                <th>telephone</th>
                <th>nif</th>
                <th>fecha registro</th>
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
                <td><a href="ficha.php?tabla=students&id=<?php echo $row["id"];?>"><?php echo $row["id"];?></a></td>
                <td><?php echo $row["username"];?></td>
                <td><?php echo $row["pass"];?></td>
                <td><?php echo $row["email"];?></td>
                <td><?php echo $row["name"];?></td>
                <td><?php echo $row["surname"];?></td>
                <td><?php echo $row["telephone"];?></td>
                <td><?php echo $row["nif"];?></td>
                <td><?php echo $row["date_registered"];?></td>              
</tr>

<?php    
}
?>
        </tbody>

    </table>
<?php
include("footer.php");