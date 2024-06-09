<?php

if(isset($_POST['submit'])){
    // Conexión a la base de datos
    require_once 'includes/conexion.php';
    
    if(!$_SESSION){
        session_start();
    }

    // Validar formulario
    $nombre = $_POST['nombre']      ? mysqli_real_escape_string($db, $_POST['nombre'])      : false;
    $apellido = $_POST['apellido']  ? mysqli_real_escape_string($db, $_POST['apellido'])    : false;
    $email = $_POST['email']        ? mysqli_real_escape_string($db, $_POST['email'])       : false;
    $password = $_POST['password']  ? mysqli_real_escape_string($db, $_POST['password'])    : false;

    $errores = array();
    
    // Validar campo nombre
    if(!empty($nombre) && !is_numeric($nombre) && !preg_match("/[0-9]/", $nombre)){
        $nombreValidado = true;
    }else{
        $nombreValidado = false;
        $errores['nombre'] = "El nombre no es válido";
    }

    // Validar campo apellido
    if(!empty($apellido) && !is_numeric($apellido) && !preg_match("/[0-9]/", $apellido)){
        $apellidoValidado = true;
    }else{
        $apellidoValidado = false;
        $errores['apellido'] = "El apellido no es válido";
    }

    // Validar campo email
    if(!empty($email) && filter_var($email, FILTER_VALIDATE_EMAIL)){
        $emailValidado = true;
    }else{
        $emailValidado = false;
        $errores['email'] = "El email no es válido";
    }

    if(!empty($password) && strlen($password) >= 6){
        $passwordValidado = true;
    }else{
        $passwordValidado = false;
        $errores['password'] = "La contraseña no es válida";
    }

    $guardarUsuario = false;
    if(count($errores) === 0){
        $guardarUsuario = true;

        // Cifrar la contraseña
        $passwordSegura = password_hash($password, PASSWORD_BCRYPT, ['cost' => 4]);

        // Insertar usuario en la tabla usuarios la base de datos
        $sql = "INSERT INTO usuarios VALUES(null, '$nombre', '$apellido', '$email', '$passwordSegura', CURDATE());";
        $query = mysqli_query($db, $sql);

        if($query){
            $_SESSION['completado'] = "El registro se ha completado con éxito";
        }else{
            $_SESSION['errores']['general'] = "Fallo al guardar el usuario";
        }

    } else {
        $_SESSION['errores'] = $errores;        
    }
        
}

header('Location: index.php');

?>