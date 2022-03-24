<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" media="screen" href="https://fontlibrary.org//face/bebas" type="text/css"/>
        <link rel="stylesheet" href="css/styles.css">
        <?php require_once 'bbdd.php';?>
        <title>Login</title>
    </head>

   
    <?php
    
    /*SECCIÓN DE LOGIN*/
    if(isset($_POST['login'])){
        $email=$_POST['email'];
        $pwd=$_POST['password'];
 
        $query = $connection->prepare(" SELECT * FROM users WHERE email='$email' AND password = '$pwd')");
        $query->bindParam("email", $user_email, PDO::PARAM_STR);
        $query->bindParam("pwd", $pwd, PDO::PARAM_STR);
        
        
        if($query->execute()==true){
            echo("Inicio de sesión correcto");
            session_start();
            var_dump($_SESSION);
    
        }else{
            echo("Algo ha ido mal, usuario ya creado");
        }
        
        //$result = $query->fetch(PDO::FETCH_ASSOC);

    } 
    ?>

    <body class="bodyInput">
        <div class="box">
            <form action="logiinc.php" method="post">
                    <span class="text-center">Sign in</span>
                <div class="input-container">
                    <input type="text" name="username" required=""/>
                    <label>Username</label>		
                </div>
                <div class="input-container">		 
                    <input type="password" name="pwd" required=""/>
                    <label>Password</label>
                    <a class="passForgot" href="" id="forgot_pass">Forgot Password?</a>
                </div>
                <button type="button" class="button-22">Login</button>
                <br>
                <a class="noAccount" href="register.html">¿No tienes cuenta?</a>

            </form>	
        </div>
    </body>
</html>