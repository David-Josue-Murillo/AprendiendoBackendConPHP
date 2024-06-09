<?php

function mostrarError($errores, $campo) {
    $alerta = '';

    if (isset($errores[$campo]) && !empty($campo)) {
        $alerta = '<div class="alert alert__error">' . $errores[$campo] . '</div>';
    }

    return $alerta;
}

function borrarError() {
    $borrado = false;

    if (isset($_SESSION['errores'])) {
        $_SESSION['errores'] = null;
        $borrado = session_unset($_SESSION['errores']);
    }


    if (isset($_SESSION['completado'])) {
        $_SESSION['completado'] = null;
        session_unset($_SESSION['comepletado']);
    }

    return $borrado;
}
