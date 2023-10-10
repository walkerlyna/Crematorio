<?php
include_once __DIR__ . "/../templates/alertas.php"
?>

<div class="centrar-menu-login">
    <main class="menu-login">


        <section class="menu-login-izquierdo">
            <div class="menu-login-izquierdo-imagen"></div>
        </section>

        <section class="menu-login-derecho">
            <h1 class="nombre-pagina">Crear cuenta</h1>
            <p class="descripcion-pagina">Llena el siguiente formulario para crear una cuenta</p>

            <form action="/crear-cuenta" method="POST" class="formulario">

                <div class="campo-input">
                    <div class="campo">
                        <input type="text" id="nombre" name="nombre" placeholder="Nombre" value="<?php echo s($usuario->nombre) ?>">
                    </div>


                    <div class="campo">
                        <input type="text" id="apellido" name="apellido" placeholder="Apellido" value="<?php echo s($usuario->apellido) ?>">
                    </div>

                    <div class="campo">
                        <input type="tel" id="telefono" name="telefono" placeholder="Teléfono" value="<?php echo s($usuario->telefono) ?>">
                    </div>

                    <div class="campo">
                        <input type="email" id="email" name="email" placeholder="Email" value="<?php echo s($usuario->email) ?>">
                    </div>

                    <div class="campo">
                        <input type="password" id="password" name="password" placeholder="Contraseña">
                    </div>
                </div>
                <input type="submit" value="Crear cuenta" class="boton">
            </form>

            <div class="acciones">
                <a href="/">¿Ya tienes una cuenta? Inicia Sesión</a>
                <a href="/olvide">¿Olvidaste tu password?</a>
            </div>
        </section>
    </main>
</div>