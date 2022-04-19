<?php
include_once 'header.php';
?>

<!-- Aquí está el contenido principal de nuestra página -->
<br>
<main class="principal">
    <div class="typewriter">
        <h4>¡Bienvenido a PHProgrammer Academy!</h1>
    </div>
</main>

<section class="contenedor section">
   

    <div class="iconos-usuarios">
        <div class="icono">
            <img style="width:25%" src="images/alumni.png" alt="alumni">
            <h3>Área de Alumnos</h3>
            <p>Podréis seleccionar los cursos en los que estáis inscritos. Visualizar vuestras asignaturas y clases y vuestras notas de evaluación continua, exámenes y notas finales.</p>
        </div>
        <div class="icono">
            <img style="width:25%" src="images/profesores.png" alt="profesores">
            <h3>Área de Profesores</h3>
            <p>Acceso a vuestras clases y a los expedientes de los alumnos matriculados en ellas. Podréis modificar trabajos y exámenes, horas y días de entrega y las notas de los trabajos, de la EC y final.</p>
        </div>
        <div class="icono">
            <img style="width:25%" src="images/admin.png" alt="Administrador">
            <h3>Área de Administrador</h3>
            <p>Acceso y modificación de los expedientes de los alumnos con las asignaturas que cursa cada uno y las notas de los trabajos y exámenes. También a todas las asignaturas, sus agendas y porcentajes de notas.</p>
        </div>
    </div>
</section>

<section class="section_config">
    <h2 class="encabezado-usuarios">Configuración</h2>
    <div class="iconos-usuarios">
        <div class="icono">
            <img style="width:25%" src="images/register.png" alt="register">
            <h3>Registro</h3>
            <p>Para acceder a vuestras respectivas áreas, debéis registraros con los datos personales requeridos.</p>
        </div>
        <div class="icono">
            <img style="width:25%" src="images/candado.png" alt="candado">
            <h3>Login</h3>
            <p>Una vez logueados, podréis acceder a vuestra área de referencia y consultar los contenidos específicos.</p>
        </div>
        <div class="icono">
            <img style="width:25%" src="images/profile.png" alt="profile">
            <h3>Perfil</h3>
            <p>Podréis consultar vuestros datos de perfil y modificarlos si fuera necesario.</p>
        </div>
    </div>
</section>
<?php
include_once 'footer.php';
?>