<?php require_once 'includes/helpers.php'; ?>
<?php require_once 'includes/conexion.php'; ?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./assets/css/style.css">
    <title>Blog de Videojuegos</title>
</head>

<body>
    <!-- Cabecera -->
    <header id="cabecera">
        <div id="logo">
            <a href="index.php">
                Blog de Videojuegos
            </a>
        </div>

        <!-- Menú -->
        <nav id="menu">
            <ul>
                <li>
                    <a href="#">Inicio</a>
                </li>

                <?php
                    $categorias = conseguirCategorias($db);
                    while($categoria = mysqli_fetch_assoc($categorias)) :
                ?>
                <li>
                    <a href="categoria.php?id=<?= $categoria['id'] ?>"><?= $categoria['nombre'] ?></a>
                </li>
                <?php endwhile; ?>

                <li>
                    <a href="#">Sobre mí</a>
                </li>
                <li>
                    <a href="#">Contacto</a>
                </li>
            </ul>
        </nav>

        <div class="clearfix"></div>
    </header>