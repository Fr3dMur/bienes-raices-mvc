<main class="contenedor seccion">
    <h1>Crear Blog</h1>
    <?php foreach ($errores as $error) : ?>
        <div class="alerta error">
            <?php echo $error ?>
        </div>
    <?php endforeach; ?>

    <a href="/blog" class="boton boton-verde">Volver</a>

    <form class="formulario" method="POST" enctype="multipart/form-data" action="/blog/crear">
        <?php include __DIR__ . '/formulario_blog.php'; ?>

        <input type="submit" value="Crear Blog" class="boton boton-verde">
    </form>
</main>