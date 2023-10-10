<?php
include_once __DIR__ . "/../templates/alertas.php"
?>

<div class="centrar-menu-login">
    <main class="menu-login">

        <section class="menu-login-izquierdo">
            <div class="menu-login-izquierdo-imagen"></div>
        </section>

        <section class="menu-login-derecho">
            <h1 class="nombre-pagina">Login</h1>


            <form class="formulario" method="POST" action="/">

                <div class="campo-input">
                    <div class="campo">
                        <div class="campo-imagen"></div>
                        
                        <input class="inputLogin" type="email" id="email" placeholder="Correo electrónico" name="email" value="<?php echo s($auth->email); ?>">
                    </div>

                    <div class="campo">
                        
                        <input class="inputLogin" type="password" id="password" placeholder="Contraseña" name="password">
                    </div>
                </div>
                <input type="submit" class="boton" value="Iniciar Sesión">
            </form>

            <div class="acciones">
                <a href="/crear-cuenta">Crear cuenta nueva</a>
                <a href="/olvide">¿Olvidaste tu contraseña?</a>
            </div>
        </section>

    </main>

</div>