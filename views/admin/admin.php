<main class="contenedor">
    <h1>Administracion</h1>

    <?php
    if ($resultado) {
        $mensaje = mostrarNotificacion(intval($resultado));
        if ($mensaje) { ?>
            // <p class="alerta exito"><?php echo s($mensaje) ?></p>
    <?php }
    }
    ?>

    <section class="seccion contenedor">
        <h2>Editor de Bienes Raices</h2>
        <a href="propiedades/crear" class="boton boton-verde">Crear Propiedades</a>
        <a href="vendedores/crear" class="boton boton-amarillo">Nuevo(a) Vendedor(a)</a>

        <!--Bienes Raices -->
        <h3>Propiedades</h3>
        <table class="propiedades">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Titulo</th>
                    <th>Imagen</th>
                    <th>Precio</th>
                    <th>Acciones</th>
                </tr>
            </thead>

            <tbody> <!-- Mostrar los resultados -->
                <?php foreach ($propiedades as $propiedad) : ?>

                    <tr>
                        <td> <?php echo $propiedad->id ?> </td>
                        <td><?php echo $propiedad->titulo ?></td>
                        <td><img src='/imagenes/<?php echo $propiedad->imagen ?>' class="imagen-tabla"></td>
                        <td>$<?php echo $propiedad->precio ?></td>
                        <td>

                            <form method="POST" class="w-100" action="/propiedades/eliminar">
                                <input type="hidden" name='id' value="<?php echo $propiedad->id ?>">
                                <input type="hidden" name="tipo" value="propiedad">
                                <input type="submit" class="boton boton-rojo-block" value="Eliminar">
                            </form>

                            <a href="/propiedades/actualizar?id=<?php echo $propiedad->id ?>" class="boton boton-amarillo-block"> Actualizar </a>
                        </td>
                    </tr>

                <?php endforeach; ?>
            </tbody>
        </table>

        <!-- VENDEDORES -->

        <h3>Vendedores</h3>
        <table class="propiedades">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nombre</th>
                    <th>Telefono</th>
                    <th>Acciones</th>
                </tr>
            </thead>

            <tbody> <!-- Mostrar los resultados -->
                <?php foreach ($vendedores as $vendedor) : ?>

                    <tr>
                        <td> <?php echo $vendedor->id ?> </td>
                        <td><?php echo $vendedor->nombre . " " . $vendedor->apellido ?></td>
                        <td><?php echo $vendedor->telefono ?></td>
                        <td>
                            <form method="POST" class="w-100" action="/vendedores/eliminar">
                                <input type="hidden" name='id' value="<?php echo $vendedor->id ?>">
                                <input type="hidden" name="tipo" value="vendedor">
                                <input type="submit" class="boton boton-rojo-block" value="Eliminar">
                            </form>

                            <a href="../vendedores/actualizar?id=<?php echo $vendedor->id; ?>" class="boton boton-amarillo-block"> Actualizar </a>
                        </td>
                    </tr>

                <?php endforeach; ?>
            </tbody>
        </table>
    </section>

    <section class="seccion contenedor">
        <h2>Editor de Blogs</h2>

        <a href="blogs/crear" class="boton boton-verde">Crear Blog</a>
        <a href="users/crear" class="boton boton-amarillo">Nuevo(a) Usuario(a)</a>

        <h3>Blogs</h3>
        <table class="propiedades">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nombre</th>
                    <th>Telefono</th>
                    <th>Acciones</th>
                </tr>
            </thead>

            <tbody> <!-- Mostrar los resultados -->
                <?php foreach ($vendedores as $vendedor) : ?>

                    <tr>
                        <td> <?php echo $vendedor->id ?> </td>
                        <td><?php echo $vendedor->nombre . " " . $vendedor->apellido ?></td>
                        <td><?php echo $vendedor->telefono ?></td>
                        <td>
                            <form method="POST" class="w-100" action="/vendedores/eliminar">
                                <input type="hidden" name='id' value="<?php echo $vendedor->id ?>">
                                <input type="hidden" name="tipo" value="vendedor">
                                <input type="submit" class="boton boton-rojo-block" value="Eliminar">
                            </form>

                            <a href="../vendedores/actualizar?id=<?php echo $vendedor->id; ?>" class="boton boton-amarillo-block"> Actualizar </a>
                        </td>
                    </tr>

                <?php endforeach; ?>
            </tbody>
        </table>
    </section>

</main>