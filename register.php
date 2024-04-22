<?php 
    require_once 'controllers/authController.php';
    $messageGet = $_GET['message'] ?? null;
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
    <link rel="preload" href="styles/normalize.css" as="style">
    <link rel="stylesheet" href="styles/normalize.css">

    <!--Styles-->
    <link rel="preload" href="styles/styles.css" as="style">
    <link rel="stylesheet" href="styles/styles.css">

    <script src="https://kit.fontawesome.com/00d4455b7c.js" crossorigin="anonymous"></script>

    <title>Cafe 3.0</title>
</head>
<body>
    <div class="register_background container">
        <div class="">
            <form method="post" action="" class="log_form" novalidate>
                <div class="container">
                    <div class="logos">
                    <img src="assets/delfin.png" alt="logo" class="logo_img">
                    <img src="assets/Cafe1.png" alt="logo" class="cafe1_img">
                    </div>
                </div>

                <?php if(intval($messageGet) === 1) : ?>
                    <p class="info__alert">Una vez creada tu cuenta correctamente, regresa a la app e inicia sesión.</p>
                <?php endif; ?>
                
                <div class="form_comp" id="email">
                    <img src="assets/email.png" alt="email" class="icon">
                    <div class="grupo-input">
                        <input id="email" autocomplete="off" name="email" type="email" placeholder="Correo institucional" class="field" value="<?php echo $email; ?>">
                        <i class="validacion fa-solid fa-circle-xmark"></i>
                    </div>  
                </div>

                <?php if(isset($errors['invalidEmail'])) : ?>
                    <p class="error"><?php echo $errors['invalidEmail']; ?></p>
                <?php endif; ?>

                <?php if(isset($errors['emailExists'])) : ?>
                    <p class="error"><?php echo $errors['emailExists']; ?></p>
                <?php endif; ?>

                <div class="form_comp" id="name">
                    <img src="assets/user_icon.png" alt="user" class="icon">
                    <div class="grupo-input">
                        <input id="name" autocomplete="off" name="name" type="text" placeholder="Nombre" class="field" value="<?php echo $name; ?>">
                        <i class="validacion fa-solid fa-circle-xmark"></i>
                    </div>
                </div>
                
                <?php if(isset($errors['invalidName'])) : ?>
                    <p class="error"><?php echo $errors['invalidName']; ?></p>
                <?php endif; ?>

                <div class="form_comp" id="lastname">
                    <img src="assets/user_icon.png" alt="user" class="icon">
                    <div class="grupo-input">
                        <input autocomplete="off" name="lastname" type="text" placeholder="Apellido" class="field" value="<?php echo $lastname; ?>">
                        <i class="validacion fa-solid fa-circle-xmark"></i>
                    </div>
                </div>
                
                <?php if(isset($errors['invalidLastName'])) : ?>
                    <p class="error"><?php echo $errors['invalidLastName']; ?></p>
                <?php endif; ?>

                <div class="form_comp" id="idiest">
                    <img src="assets/dolphin.png" alt="dolphin" class="icon">
                    <div class="grupo-input">
                        <input
                        id="idiest" 
                        onkeypress = "return isNumeric(event)"
                        oninput = "maxLengthCheck(this)" 
                        name="ID_IEST" 
                        type="number" 
                        placeholder="ID IEST"  
                        min = "1"
                        max = "99999"
                        class="field" 
                        value="<?php echo $idiest; ?>"/>
                        <i class="validacion fa-solid fa-circle-xmark"></i>
                    </div>
                    
                </div>
                
                <?php if(isset($errors['invalidIdIest'])) : ?>
                    <p class="error"><?php echo $errors['invalidIdIest']; ?></p>
                <?php endif; ?>

                <?php if(isset($errors['idIestExists'])) : ?>
                    <p class="error"><?php echo $errors['idIestExists']; ?></p>
                <?php endif; ?>
    
                <div class="form_comp" id="password">
                    <img src="assets/password.png" alt="password" class="icon">
                    <div class="grupo-input">
                        <input autocomplete="off" name="password" type="password" placeholder="Contraseña" class="field" value="<?php echo $password; ?>">
                        <i class="validacion fa-solid fa-circle-xmark"></i>
                    </div>
                    
                </div>
                
                <?php if(isset($errors['password'])) : ?>
                    <p class="error"><?php echo $errors['password']; ?></p>
                <?php endif; ?>
                
                <div class="container">
                    <input type="submit" value="Registrarse" class="submit" name="signup">
                </div>

                <div class="container">
                    <a class="form_link" href="index.php">O inicia sesión</a>
                </div>
            </form>
        </div>
    </div>
    <script src="js/idIest.js"></script>
    <script src="js/formulario.js"></script>
</body>
</html>