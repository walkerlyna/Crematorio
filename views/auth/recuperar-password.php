<?php if ($error) return; ?>

<div class="centrar-menu-login">
    <main class="menu-login">


        <section class="menu-login-izquierdo">
            <div class="menu-login-izquierdo-imagen"></div>
        </section>

        <section class="menu-login-derecho">
            <h1>Recuperar contraseña</h1>
            <p>Coloca tu nueva contraseña a continuación</p>
            <form method="POST" class="formulario">
                <?php
                include_once __DIR__ . "/../templates/alertas.php"
                ?>
                <div class="campo">
                    <input class="inputLogin" type="password" id="password" name="password" placeholder="Nueva contraseña">
                </div>
                <input type="submit" class="boton" value="Guardar cambios">
            </form>

        </section>
    </main>
</div>