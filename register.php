<?php 
    require_once 'controllers/authController.php';
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

    <title>Cafe 3.0</title>
</head>
<body>
    <div class="index_background container">
        <div class="">
            <form id=formulario method="post" action="" class="log_form">
                <div class="container">
                    <img src="assets/logo.png" alt="logo" class="logo_img">
                </div>
                
                <div class="form_comp">
                    <img src="assets/email.png" alt="email" class="icon">
                    <input id="email" autocomplete="off" name="email" type="email" placeholder="Correo institucional" class="field" value="<?php echo $email; ?>">
                </div>

                <?php if(isset($errors['invalidEmail'])) : ?>
                    <p class="error"><?php echo $errors['invalidEmail']; ?></p>
                <?php endif; ?>

                <?php if(isset($errors['emailExists'])) : ?>
                    <p class="error"><?php echo $errors['emailExists']; ?></p>
                <?php endif; ?>

                <div class="form_comp">
                    <img src="assets/user_icon.png" alt="user" class="icon">
                    <input autocomplete="off" name="name" type="text" placeholder="Nombre" class="field" value="<?php echo $name; ?>">
                </div>
                
                <?php if(isset($errors['invalidName'])) : ?>
                    <p class="error"><?php echo $errors['invalidName']; ?></p>
                <?php endif; ?>

                <div class="form_comp">
                    <img src="assets/user_icon.png" alt="user" class="icon">
                    <input autocomplete="off" name="lastname" type="text" placeholder="Apellido" class="field" value="<?php echo $lastname; ?>">
                </div>
                
                <?php if(isset($errors['invalidLastName'])) : ?>
                    <p class="error"><?php echo $errors['invalidLastName']; ?></p>
                <?php endif; ?>

                <div class="form_comp">
                    <img src="assets/dolphin.png" alt="dolphin" class="icon">
                    <input 
                    onkeypress = "return isNumeric(event)"
                    oninput = "maxLengthCheck(this)" 
                    name="ID_IEST" 
                    type="number" 
                    placeholder="ID IEST"  
                    min = "1"
                    max = "99999"
                    class="field" 
                    value="<?php echo $idiest; ?>"/>
                </div>
                
                <?php if(isset($errors['invalidIdIest'])) : ?>
                    <p class="error"><?php echo $errors['invalidIdIest']; ?></p>
                <?php endif; ?>

                <?php if(isset($errors['idIestExists'])) : ?>
                    <p class="error"><?php echo $errors['idIestExists']; ?></p>
                <?php endif; ?>
    
                <div class="form_comp">
                    <img src="assets/password.png" alt="password" class="icon">
                    <input autocomplete="off" name="password" type="password" placeholder="Contraseña" class="field" value="<?php echo $password; ?>">
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
</body>
</html>