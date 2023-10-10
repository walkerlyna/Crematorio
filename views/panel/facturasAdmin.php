<?php include_once __DIR__ . '/../templates/nav2.php'; ?>

<div class="nav2">
    <div class="contenedor flex">
        <div class="pg"></div>

        <span class="material-symbols-outlined">
            arrow_right
        </span>

        <p>Facturas</p>
    </div>
</div>

<form class="formPDF" action="/generar/pdf" target="_blank" method="post">

    <div class="sectionInput">
        <div class="sectionInput1">
            <label for="codigo_factura">Código de Factura:</label>
            <input type="text" name="codigo_factura" id="codigo_factura"><br>
        </div>

        <div class="sectionInput2">
            <label for="cliente">Cliente</label>
            <input autocomplete="off" class="block" name="cliente" id="cliente" type="text">
            <div id="suggestions" class="suggestions"></div> <!-- Agregamos un div para mostrar las sugerencias -->
        </div>

        <div class="sectionInput3">
            <label for="rfc">RFC</label>
            <input type="text" name="rfc" id="rfc">
        </div>

        <div class="sectionInput4">
            <label for="fecha">Fecha</label>
            <input class="block" name="fecha" id="fecha" type="date">
        </div>
    </div>

    <div>
        <label for="precio-normal">Precio Normal</label>
        <input type="radio" name="tipo-precio" id="precio-normal" value="normal" checked>

        <label for="precio-publico">Precio Público</label>
        <input type="radio" name="tipo-precio" id="precio-publico" value="publico">
    </div>


    <!-- // TABLA PESOS 1 -->
    <button type="button" id="toggleServicios">Mostrar/Ocultar Servicios</button>

    <!-- Tabla de Servicios -->
    <div class="productosGrid servicios">
        <?php foreach ($pesos as $peso) : ?>
            <div class="producto" data-precio="<?php echo $peso->precio; ?>" data-precioPublico="<?php echo $peso->precioPublico; ?>">
                <input type="checkbox" name="pesos_seleccionados[]" value="<?php echo $peso->id; ?>">
                <span><strong><?php echo $peso->nombre; ?></strong><br><span class="precio" data-tipo-precio="normal"><?php echo $peso->precio; ?></span></span>
                <span>Cantidad: <input type="number" name="cantidad_<?php echo $peso->id; ?>" value="1" min="1"></span>
            </div>
        <?php endforeach; ?>
    </div>

    <!-- // TABLA PESOS 2 -->
    <button type="button" id="toggleServicios2">Mostrar/Ocultar Servicios</button>

    <!-- Tabla de Servicios -->
    <div class="productosGrid servicios2 oculto">
        <?php foreach ($pesos2 as $peso2) : ?>
            <div class="producto" data-precio="<?php echo $peso2->precio; ?>" data-precioPublico="<?php echo $peso2->precioPublico; ?>">
                <input type="checkbox" name="pesos2_seleccionados[]" value="<?php echo $peso2->id; ?>">
                <span><strong><?php echo $peso2->nombre; ?></strong><br><span class="precio" data-tipo-precio="normal"><?php echo $peso2->precio; ?></span></span>
                <span>Cantidad: <input type="number" name="cantidad_<?php echo $peso2->id; ?>" value="1" min="1"></span>
            </div>
        <?php endforeach; ?>
    </div>


    <!-- // TABLA PRODUCTOS 1 -->
    <button type="button" id="toggleProductos">Mostrar/Ocultar Productos</button>

    <!-- Tabla de Productos -->
    <div class="productosGrid productos">
        <?php foreach ($productos as $producto) : ?>
            <div class="producto" data-precio="<?php echo $producto->precio; ?>" data-precioPublico="<?php echo $producto->precioPublico; ?>">
                <input type="checkbox" name="productos_seleccionados[]" value="<?php echo $producto->id; ?>">
                <span><strong><?php echo $producto->nombre; ?></strong><br><span class="precio" data-tipo-precio="normal"><?php echo $producto->precio; ?></span></span>
                <span>Cantidad: <input type="number" name="cantidad_<?php echo $producto->id; ?>" value="1" min="1"></span>
            </div>
        <?php endforeach; ?>
    </div>

    <!-- // TABLA PRODUCTOS 2 -->
    <button type="button" id="toggleProductos2">Mostrar/Ocultar Productos</button>

    <!-- Tabla de Productos -->
    <div class="productosGrid productos2 oculto">
        <?php foreach ($productos2 as $producto2) : ?>
            <div class="producto" data-precio="<?php echo $producto2->precio; ?>" data-precioPublico="<?php echo $producto2->precioPublico; ?>">
                <input type="checkbox" name="productos2_seleccionados[]" value="<?php echo $producto2->id; ?>">
                <span><strong><?php echo $producto2->nombre; ?></strong><br><span class="precio" data-tipo-precio="normal"><?php echo $producto2->precio; ?></span></span>
                <span>Cantidad: <input type="number" name="cantidad_<?php echo $producto2->id; ?>" value="1" min="1"></span>
            </div>
        <?php endforeach; ?>
    </div>

    <input type="submit" value="Generar Factura">

</form>

<?php
$script = "
        <script src ='/build/js/remision.js'></script>
    ";
?>