<nav class="navbar navbar-expand-lg navbar-light bg-light">


  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
    <li class="nav-item">
        <a class="nav-link" href="usuario.php">Inicio</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="calendario.php">Calendario</a>
      </li>
      <li class="nav-item">
        <a class="nav-link"
        <?php
        $dbmenu = new mysqli('localhost', 'horarios_escolares', 'horarios_escolares', 'horarios_escolares');
        if ($dbmenu->connect_error) {
          die('Connect Error (' . $dbmenu->connect_errno . ') '
            . $mysqli->connect_error);
        } 
        $sentencia="SELECT * FROM incidences WHERE response_read_at IS NULL AND response!='' AND id_student=".$_SESSION["id"];
        $result = $dbmenu->query($sentencia);
      //  if (mysqli_num_rows($result)>0){ echo " style=\"color:red;font-weight:bolder\" "; };
        ?>
        href="usuario_incidencias.php">Incidencias</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="expediente.php">Expediente</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="mi_perfil.php">Mi Perfil</a>
      </li>
      <!--
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          Nuevo
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
          <a class="dropdown-item" href="nuevo_curso.php">Curso</a>
          <a class="dropdown-item" href="nuevo_asignatura.php">Asignatura</a>
      </li>
	  <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          Consultar
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
          <a class="dropdown-item" href="nuevo_curso.php">Cursos</a>
          <a class="dropdown-item" href="nuevo_asignatura.php">Asignaturas</a>
      </li>
-->
      <li class="nav-item">
        <a class="nav-link" href="adios.php">Desconectar</a>
      </li>
    </ul>

  </div>
</nav>