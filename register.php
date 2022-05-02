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
    <link rel="preload" href="styles/normalize.css" as="style">
    <link rel="stylesheet" href="styles/normalize.css">

    <!--Styles-->
    <link rel="preload" href="styles/styles.css" as="style">
    <link rel="stylesheet" href="styles/styles.css">

    <title>Cafe 3.0</title>
</head>
<body>
    <div class="index_background container">
        <div class="">
            <form method="" action="" class="log_form" novalidate>
                <div class="container">
                    <img src="assets/logo.png" alt="logo" class="logo_img">
                </div>
                
                <div class="form_comp">
                    <img src="assets/email.png" alt="email" class="icon">
                    <input autocomplete="off" name="email" type="email" placeholder="Correo institucional" class="field" value="">
                </div>

                <div class="form_comp">
                    <img src="assets/user_icon.png" alt="user" class="icon">
                    <input autocomplete="off" name="name" type="text" placeholder="Nombre" class="field" value="">
                </div>

                <div class="form_comp">
                    <img src="assets/user_icon.png" alt="user" class="icon">
                    <input autocomplete="off" name="lastname" type="text" placeholder="Apellido" class="field" value="">
                </div>

                <div class="form_comp">
                    <img src="assets/dolphin.png" alt="dolphin" class="icon">
                    <input autocomplete="off" name="ID_IEST" type="number" placeholder="ID IEST" class="field" value="">
                </div>
    
                <div class="form_comp">
                    <img src="assets/password.png" alt="password" class="icon">
                    <input autocomplete="off" name="password" type="password" placeholder="Contraseña" class="field">
                </div>
                
                <div class="container">
                    <input type="submit" value="Registrarse" class="submit">
                </div>

                <div class="container">
                    <a class="form_link" href="index.html">O inicia sesión</a>
                </div>
            </form>
        </div>
    </div>
</body>
</html>