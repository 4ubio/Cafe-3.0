<?php 
    //require_once 'controllers/authController.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!--Google Fonts-->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,400;0,700;1,600&display=swap" rel="stylesheet">

    <!--Normalize-->
    <link rel="preload" href="/styles/normalize.css" as="style">
    <link rel="stylesheet" href="/styles/normalize.css">

    <!--Styles-->
    <link rel="preload" href="/styles/styles.css" as="style">
    <link rel="stylesheet" href="/styles/styles.css">

    <title>Admin - Cafe 3.0</title>
</head>
<body>
    <div class="index_background_color container">
        <div class="">
            <form method="post" action="" class="log_form" novalidate>
                <div class="container">
                    <img src="/assets/logo.png" alt="logo" class="logo_img">
                </div>

                <p class="p_admin">Administración</p>

                <div class="form_comp">
                    <img src="/assets/user_icon.png" alt="user" class="icon">
                    <input autocomplete="off" name="user" type="user" placeholder="Usuario" class="field" value="">
                </div>
    
                <div class="form_comp">
                    <img src="/assets/password.png" alt="password" class="icon">
                    <input autocomplete="off" name="password" type="password" placeholder="Contraseña" class="field" value="">
                </div>
                
                <div class="container">
                    <input type="submit" value="Iniciar sesión" class="submit" name="login">
                </div>
            </form>
        </div>
    </div>
</body>
</html>