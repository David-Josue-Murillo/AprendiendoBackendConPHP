<?php require_once 'includes/helpers.php'; ?>

<!-- Barra Lateral -->
<aside id="sidebar">
    <div id="login" class="bloque">
        <h3>Identificate</h3>
        <form action="login.php" method="post">
            <label for="email">Email: </label>
            <input type="email" name="email">

            <label for="password">Contraseña:</label>
            <input type="password" name="password">

            <input type="submit" value="Entrar">
        </form>
    </div>

    <div id="register" class="bloque">
        <h3>Registrate</h3>

        <!-- Mostrar mensajes de error -->
        <?php if (isset($_SESSION['completado'])) : ?>
            <div class="alerta alerta-exito">
                <?= $_SESSION['completado']; ?>
            </div>
        <?php elseif (isset($_SESSION['errores']['general'])) :  ?>
            <div class="alerta alerta-error">
                <?= $_SESSION['errores']['general']; ?>
            </div>
        <?php endif; ?>

        <form action="registro.php" method="post">
            <label for="email">Email: </label>
            <input type="email" name="email">
            <div class="alerta">
                <?php echo isset($_SESSION['errores']) ? mostrarError($_SESSION['errores'], 'email') : ''; ?>
            </div>

            <label for="nombre">Nombre:</label>
            <input type="text" name="nombre">
            <div class="alerta">
                <?php echo isset($_SESSION['errores']) ? mostrarError($_SESSION['errores'], 'nombre') : ''; ?>
            </div>

            <label for="apellido">Apellido:</label>
            <input type="text" name="apellido">
            <div class="alerta">
                <?php echo isset($_SESSION['errores']) ? mostrarError($_SESSION['errores'], 'apellido') : ''; ?>
            </div>

            <label for="password">Contraseña:</label>
            <input type="password" name="password">
            <div class="alerta">
                <?php echo isset($_SESSION['errores']) ? mostrarError($_SESSION['errores'], 'password') : ''; ?>
            </div>

            <input type="submit" value="Registrar" name="submit">

        </form>
        <?php echo borrarError(); ?>
    </div>
</aside>