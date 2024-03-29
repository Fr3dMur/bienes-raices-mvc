<?php
if (!isset($_SESSION)) {
    session_start();
}

$auth = $_SESSION['login'] ?? false;

if (!isset($inicio)) {
    $inicio = false;
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bienes Raices</title>
    <link rel="stylesheet" href="/build/css/app.css">

</head>

<body>
    <header class="header <?php echo $inicio ? 'inicio' : ''; ?>">
        <div class="contenedor contenido-header">
            <div class="barra">
                <a href="/">
                    <img src="/build/img/logo.svg" alt="Logotipo de Bienes Raices">
                </a>

                <div class="mobile-menu">
                    <img src="/build/img/barras.svg" alt="icono menu responsive">
                </div>

                <div class="derecha">

                    <div class="dark-mode-boton ">
                        <img src="build/img/dark-mode.svg" alt="boton para dark-mode" class="dark-mode-boton luna">
                        <img src="build/img/Sun_mode.svg" alt="boton para dark mode" class="dark-mode-boton sun">
                    </div>


                    <nav class="navegacion">
                        <a href="/">Inicio</a>
                        <a href="/nosotros">Nosotros</a>
                        <a href="/propiedades">Anuncios</a>
                        <a href="/blog">Blog</a>
                        <a href="/contacto">Contacto</a>
                        <?php if ($auth) : ?>
                            <a href="admin/index.php">Administrador</a>
                            <a href="/cerrarSesion.php">Cerrar Sesion</a>
                        <?php else : ?>
                            <a href="/login">Iniciar Sesion</a>
                        <?php endif ?>
                    </nav>
                </div>
            </div> <!-- CIERRE DE LA BARRA -->

            <?php
            echo $inicio ? "<h1>Venta de Casas y Departamentos Exclusivos de lujo </h1>" : '';
            ?>

        </div>
    </header>

    <?php echo $contenido ?>

    <footer class="footer seccion">

        <div class="contenedor contenedor-footor">

            <nav class="navegacion">
                <a href="/nosotros">Nosotros</a>
                <a href="/anuncios">Anuncios</a>
                <a href="/blog">Blog</a>
                <a href="/contacto">Contacto</a>
            </nav>

        </div>

        <p class="copyright">Todos los derechos reservados <?php echo date('Y') ?>. ©</p>

    </footer>

    <script src="build/js/bundle.min.js"></script>
</body>

</html>