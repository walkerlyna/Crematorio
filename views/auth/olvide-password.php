<?php
include_once __DIR__ . "/../templates/alertas.php"
?>

<div class="centrar-menu-login">
    <main class="menu-login">

        <section class="menu-login-izquierdo">
            <div class="menu-login-izquierdo-imagen"></div>
        </section>

        <section class="menu-login-derecho">
            <h1 class="nombre-pagina">Olvidé password</h1>
            <p class="descripcion-pagina">Restablece tu password escribiendo tu email a continuación</p>

            <form action="/olvide" method="POST" class="formulario">
                <div class="campo">
                    <input type="email" id="email" name="email" placeholder="Email">
                </div>

                <input type="submit" class="boton" value="Enviar">
            </form>

            <div class="acciones">
                <a href="/">¿Ya tienes una cuenta? Inicia Sesión</a>
                <a href="/crear-cuenta">¿Aún no tienes una cuenta? Crear una</a>
            </div>
        </section>
    </main>
</div>