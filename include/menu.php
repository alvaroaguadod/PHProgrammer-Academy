<nav class="navbar navbar-expand-lg navbar-light bg-light">


  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item">
        <a class="nav-link" href="gestion.php">Inicio</a>
      </li>

      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          Nuevo
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
          <a class="dropdown-item" href="nuevo_curso.php">Curso</a>
          <a class="dropdown-item" href="nuevo_asignatura.php">Asignatura</a>
          <a class="dropdown-item" href="nuevo_profesor.php">Profesor</a>
          <a class="dropdown-item" href="nueva_clase.php">Clase</a>
      </li>

	  <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          Consultar
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
          <a class="dropdown-item" href="listado.php?tabla=students&tipo=Estudiantes">Listado Estudiantes</a>
          <a class="dropdown-item" href="listado.php?tabla=courses&tipo=Cursos">Listado Cursos</a>
          <a class="dropdown-item" href="listado.php?tabla=teachers&tipo=Profesores">Listado Profresores</a>
          <a class="dropdown-item" href="listado.php?tabla=class&tipo=Clases">Listado Clases</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="adios.php">Desconectar</a>
      </li>

      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          Eliminar
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
          <a class="dropdown-item" href="eliminar_curso.php">Curso</a>
          <a class="dropdown-item" href="eliminar_asignatura.php">Asignatura</a>
          <a class="dropdown-item" href="eliminar_profesor.php">Profesor</a>
      </li>

      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          Modificar
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
          <a class="dropdown-item" href="modificar_curso.php">Curso</a>
          <a class="dropdown-item" href="modificar_clase.php">Clase</a>
          <a class="dropdown-item" href="modificar_profesor.php">Profesor</a>
      </li>
    </ul>

  </div>
</nav>