<?php 
    //Crear sesiones
    session_start();

    //Database connection
    require '../includes/config/database.php';
    $db = conectardb();

    $errors = array();
    $user = "";
    $password = "";

    //Cuando el usuario admin oprima el botón iniciar sesión
    if(isset($_POST['login'])){
        $user = $_POST['user'];
        $password = $_POST['password'];

        //Validations
        if(empty($user)){
            $errors['invalidUser'] = "Ingresa el usuario";
        }
        if(empty($password)){
            $errors['password'] = "Ingresa tu contraseña";
        }

        //Si no hay errores
        if(count($errors) === 0){

            //Leer email
            $userQuery = "SELECT * FROM usuarios WHERE email = '$user' LIMIT 1";
            $userResult = mysqli_query($db, $userQuery);
            
            //Verificar si el email esta registrado
            if(($userResult->num_rows) > 0){

                //Obtenemos fila del usuario
                $user2 = mysqli_fetch_assoc($userResult);

                //Si es admin
                if ($user2['tipo'] === '2') {

                    //Verificamos si la contraseña coincide
                    if(password_verify($password, $user2['password'])){
                        $_SESSION['admin_pedidos'] = $user2['email'];
    
                        //Reedireccionamos a menu
                        header('Location: /admin_pedidos/pedidos.php');
                        exit();
                        
                    }else{
                        $errors['password_fail'] = "Contraseña incorrecta";
                    }
                } else {
                    $errors['user_fail'] = "Usuario no permitido";
                }

            }else{
                $errors['user_fail'] = "Usuario incorrecto";
            }
        }
    }

    //Cerrar sesión de usuario admin
    if(isset($_GET['logout'])){
        session_destroy();
        unset($_SESSION['admin_pedidos']);
        header('Location: index.php');
        exit();
    }
?>