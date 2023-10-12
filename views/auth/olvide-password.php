<?php
include_once __DIR__ . "/../templates/alertas.php"
?>

<div class="centrar-menu-login">
    <main class="menu-login">

        <section class="menu-login-izquierdo">
            <div class="menu-login-izquierdo-imagen"></div>
        </section>

        <section class="menu-login-derecho">
            <h1 class="nombre-pagina">Recuperar cuenta</h1>
            <p>Ingresa tu correo electrónico para buscar tu cuenta</p>

            <form action="/olvide" method="POST" class="formulario">
                <div class="campo">
                    <input class="inputLogin" type="email" id="email" name="email" placeholder="Correo electrónico">
                </div>

                <input type="submit" class="boton" value="Enviar">
            </form>

            <div class="acciones">
                <a href="/">Iniciar Sesión</a>
                <a href="/crear-cuenta">Crear cuenta nueva</a>
            </div>
        </section>
    </main>
</div>