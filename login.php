<?php

// Iniciar la sessión y la conexióna a la base de datos
require_once   'includes/conexion.php';

// Recoger los datos del formulario
if(isset($_POST)){

    // Borrar error antiguo
    if($_SESSION['error_login']){
        unset($_SESSION['error_login']);
    }

    $email = trim($_POST['email']);
    $password = $_POST['password'];

    // Consulta para comprobar las credenciales del usuario
    $query = "SELECT * FROM usuarios WHERE email = '$email'";
    $login = mysqli_query($db, $query);

    if($login && mysqli_num_rows($login) == 1){
        $usuario = mysqli_fetch_assoc($login);

        // Comprobar la contraseña
        //$password_segura = password_hash($password, PASSWORD_BCRYPT, ['cost' => 4]);
        $verify = password_verify($password, $usuario['password']);

        if($verify){
            // Utilizar una sessión para guardar los datos del usuario logueado
            $_SESSION['usuario'] = $usuario;

        } else {
            // Si algo falla enviar una sessión con el fallo
            $_SESSION['error_login'] = "Login incorrecto";

        }
    } else {
        // Mensaje de error
        $_SESSION['error_login'] = "Login incorrecto";

    }
}


// Redirigir al index.php
header('Location: index.php');
