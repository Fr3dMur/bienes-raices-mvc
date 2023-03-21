<main class="contenedor seccion contenido-centrado">
    <h1>Blogs</h1>

    <a href="blog/crear" class="boton boton-verde">Crear Blog</a>

    <section class="seccion contenedor">
        <?php foreach ($blogs as $blog) { ?>
            <article class="entrada-blog">
                <div class="imagen">
                    <picture>
                        <source srcset="build/img/blog1.webp" type="image/webp" alt="Texto Entrada Blog">
                        <source srcset="build/img/blog1.jpg" type="image/jpeg" alt="Texto Entrada Blog">
                        <img loading="lazy" src="build/img/blog1.jpg" alt="Texto Entrada Blog">
                    </picture>
                </div>


                <div class="texto-entrada">
                    <a href="/entrada">
                        <h4><?php echo $blog->titulo ?></h4>

                        <p>Escrito el: <span><?php echo $blog->creado ?></span>
                            por: <span><?php foreach ($users as $user) {
                                            if ($blog->usuarios_id === $user->id) {
                                                echo $user->username;
                                            }
                                        } ?></span>
                        </p>

                        <p>
                            <?php echo $blog->descripcion ?>
                        </p>
                    </a>
                </div> <!--Termina entrada-->
            </article> <!-- termina entrada blog-->
        <?php } ?>
    </section>
</main>