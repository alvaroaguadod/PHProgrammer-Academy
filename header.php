<?php
if (!isset($_SESSION)) session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    

    <link href="https://fonts.googleapis.com/css?family=Lato:300, 400, 700, 900">
    <link rel="stylesheet" media="screen" href="https://fontlibrary.org//face/bebas" type="text/css"/>
    <script src="http://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"
    ></script>
    <script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.11.5/js/dataTables.bootstrap4.min.js"></script>
    <script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>
    <link href="https://cdn.datatables.net/1.11.5/css/dataTables.bootstrap4.min.css">

<link href="http://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<link rel="stylesheet" href="css/styles.css">
<script src="http://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>

    <title>PHProgrammer Academy</title>
</head>

<body>

    <header class="site-header">  
        <div class="barra">
            <p class="logoTitle"><b>PHP</b>rogrammer <b>Academy</b></p>
<?php
if (!isset($_SESSION) OR !isset($_SESSION["nivel"])){
?>
            <nav class="navegacion">
                <a href="login_admin.html">Login como administrador</a>
                <a href="login.html">Login</a>
                <a href="register.html">Register</a>
            </nav>
<?php
}

?>

        </div>
    </header>