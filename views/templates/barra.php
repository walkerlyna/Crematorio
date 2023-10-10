<div class="barra">
    <p>Hola: <?php echo $nombre ?? ''; ?></p>

    <a class="boton" href="/logout">Cerrar Sesión</a>
</div>

<?php if(isset($_SESSION['admin'])) { ?>
    <div class="barra-productos">
        <a class="boton" href="/admin">Ver Citas</a>
        <a class="boton" href="/productos">Ver Productos</a>
        <a class="boton" href="/productos/crear">Nuevo Producto</a>
        <a class="boton" href="/usuarios">Ver Usuarios</a>
    </div>  

<?php } ?>