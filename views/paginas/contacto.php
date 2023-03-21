<main class="contenedor seccion">
    <h1>Contacto</h1>

    <picture>
        <source srcset="build/img/destacada3.webp" type="image/webp" alt="imagen contacto">
        <source srcset="build/img/destacada3.jpg" type="image/jpeg" alt="imagen contacto">
        <img loading="lazy" src="build/img/destacada3.jpg" alt="imagen contacto">
    </picture>

    <h2>Llene el formulario de contacto</h2>

    <form action="" class="formulario">
        <fieldset>
            <legend>Informacion Personal</legend>

            <label for="name">Nombre</label>
            <input type="text" placeholder="Tu nombre" id="name">

            <label for="email">Email</label>
            <input type="email" placeholder="Tu email" id="email">

            <label for="telefono">Telefono</label>
            <input type="tel" placeholder="Tu telefono" id="telefono">

            <label for="mensaje">Mensaje</label>
            <textarea id="mensaje" cols="30" rows="10" placeholder="Dejanos un Mensaje"></textarea>
        </fieldset>

        <fieldset>
            <legend>Informacion Sobre la Propiedad</legend>

            <label for="opciones">Vende o Compra:</label>
            <select name="" id="opciones">

                <option value="" disabled selected>-- Seleccione --</option>
                <option value="Compra">Compra</option>
                <option value="Vende">Vende</option>
            </select>


            <label for="presupuesto">Precio o Presupuesto</label>
            <input type="number" placeholder="Tu Precio o Presupuesto" id="presupuesto">
        </fieldset>

        <fieldset>
            <legend>Contacto</legend>

            <p>Como desea ser contactado</p>
            <div class="forma-contacto">
                <label for="contactar-telefono">Telefono</label>
                <input name="contacto" type="radio" id="contactar-telefono" value="telefono">

                <label for="contactar-email">Email</label>
                <input name="contacto" type="radio" id="contactar-email" value="email">
            </div>

            <p>Si eligio telefono, eliga la fecha y la hora</p>

            <label for="fecha">Fecha:</label>
            <input type="date" id="fecha">

            <label for="time">Hora:</label>
            <input type="time" id="time" min="9:00" max="20:00">

        </fieldset>

        <input type="submit" class="boton-verde" value="Enviar">
    </form>


</main>