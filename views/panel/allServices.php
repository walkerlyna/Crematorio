<?php include_once __DIR__ . '/../templates/nav2.php'; ?>

<div class="nav2">
    <div class="contenedor flex">
        <div class="pg"></div>

        <span class="material-symbols-outlined">
            arrow_right
        </span>

        <p>Defunciones</p>
    </div>
</div>

<main class="tabla bienvenida">
<div class="nav-tabla">
        <div class="tabla-botones">
            <button class="boton" id="abrirModal">
                <span class="material-symbols-outlined">
                    add
                </span>
            </button>
            <button class="boton">
                <span class="material-symbols-outlined">
                    delete
                </span>
            </button>
            <button class="boton" id="imprimir">
                <span class="material-symbols-outlined">
                    print
                </span>
            </button>
        </div>
        <div>
            <a href="/allServices">Ver todos los servicios</a>
        </div>
    </div>

    <form class="modal" id="miModal">

        <input type="hidden" id="id" name="id" value="">

        <div class="modal-contenido">
            <div class="title">
                <h4>Nueva defunción</h4>
                <span class="material-symbols-outlined cerrar-modal" id="cerrarModal">
                    close
                </span>
            </div>

            <div class="form-body">

                <div class="form-section1">
                    <label for="cliente">Cliente</label>
                    <input autocomplete="off" class="block" id="cliente" type="text">
                    <div id="suggestions" class="suggestions"></div>
                </div>

                <div class="form-section1">
                    <label for="rfc">RFC</label>
                    <input class="block" id="rfc" type="text">
                </div>

                <div class="form-section1">
                    <label for="fecha">Fecha</label>
                    <input class="block" id="fecha" type="date">
                </div>

            </div>

            <nav class="navModal">
                <a href="#" class="active" data-tab="fallecido">Fallecido</a>
                <a href="#" data-tab="familia">Familia</a>
                <a href="#" data-tab="autorizacion">Autorización</a>
                <a href="#" data-tab="evidencia">Evidencia</a>
                <a href="#" data-tab="certificado">Certificado</a>
                <a href="#" data-tab="video">Video</a>
                <a href="#" data-tab="remisiones">Remisión</a>
                <a href="#" data-tab="comprobante">Comprobante</a>
                <a href="#" data-tab="observaciones">Observaciones</a>
            </nav>



            <div class="seccion-fallecido">

                <div class="form-body">

                    <div class="form-section1">
                        <label for="nombre">Nombre</label>
                        <input class="block" id="nombre" type="text">
                    </div>
                    <div class="form-section1">
                        <label for="motivo">Motivo de muerte</label>
                        <input class="block" id="motivo" type="text">
                    </div>
                    <div class="form-section1">
                        <label for="especie">Especie</label>
                        <input class="block" id="especie" type="text">
                    </div>
                    <div class="form-section1">
                        <label for="sexo">Sexo</label>
                        <select class="block" id="sexo" name="sexo">
                            <option class="textogris" value="" disabled hidden selected>Seleccionar..</option>
                            <option value="macho">Macho</option>
                            <option value="hembra">Hembra</option>
                        </select>
                    </div>
                    <div class="form-section1">
                        <label for="peso_kg">Peso(kg)</label>
                        <input class="block" id="peso_kg" type="text">
                    </div>
                </div>

            </div>

            <div class="seccion-familia" style="display: none;">

                <div class="form-body">
                    <div class="form-section1">
                        <label for="nombreDueño">Nombre del dueño</label>
                        <input class="block" id="nombreDueño" type="text">
                    </div>

                    <div class="form-section1">
                        <label for="numeroContacto">Número de contacto</label>
                        <input class="block" id="numeroContacto" type="tel">
                    </div>
                    <div class="form-section1">
                        <label for="domicilio">Domicilio</label>
                        <input class="block" id="domicilio" type="text">
                    </div>

                </div>
            </div>

            <div class="seccion-autorizacion" style="display: none;">

                <form action="/api/autorizacion" method="POST" enctype="multipart/form-data">
                    <label class="label-archivo imagen1" for="archivo"></label>
                    <input type="file" name="archivo" id="archivo">
                </form>

            </div>

            <div class="seccion-evidencia" style="display: none;">

                <form action="/api/evidencia" method="POST" enctype="multipart/form-data">
                    <label class="label-archivo imagen2" for="archivo2"></label>
                    <input type="file" name="archivo2" id="archivo2">
                </form>

            </div>

            <div class="seccion-certificado" style="display: none;">

                <form action="/api/certificado" method="POST" enctype="multipart/form-data">
                    <label class="label-archivo imagen3" for="archivo3"></label>
                    <input type="file" name="archivo3" id="archivo3">
                </form>

            </div>

            <div class="seccion-video" style="display: none;">

                <form action="/api/video" method="POST" enctype="multipart/form-data">
                    <label class="label-archivo imagen4" for="archivo4"></label>
                    <input type="file" name="archivo4" id="archivo4">
                </form>
            </div>

            <div class="seccion-remisiones" style="display: none;">

                <form action="/api/remisiones" method="POST" enctype="multipart/form-data">
                    <label class="label-archivo imagen5" for="archivo7"></label>
                    <input type="file" name="archivo7" id="archivo7">
                </form>

            </div>

            <div class="seccion-comprobante" style="display: none;">

                <form action="/api/comprobante" method="POST" enctype="multipart/form-data">
                    <label class="label-archivo imagen6" for="archivo5"></label>
                    <input type="file" name="archivo5" id="archivo5">
                </form>
            </div>

            <div class="seccion-observaciones" style="display: none;">

                <textarea name="observaciones" id="observaciones" cols="30" rows="10"></textarea>

            </div>





            <footer class="footer">
                <button class="boton2">Cancelar</button>
                <button class="boton2" id="botonReservar">Guardar</button>
            </footer>

        </div>

    </form>

    <table class="tabla-principal">
        <thead>
            <tr>
                <th>Nº</th>
                <th>Acciones</th>
                <th>Clínica</th>
                <th>En el cielo :< </th>
                <th>Fecha</th>
                <th>Hoja de autorización</th>
                <th>Evidencia</th>
                <th>Video</th>
                <th>Certificado</th>
                <th>Remisión</th>
                <th>Comprobante</th>



        </thead>
        <tbody>
            <?php

            foreach ($servicio as $servicio) {
            ?>
                <tr class="seleccionable lazy-load">
                    <td><strong><?php echo $servicio->id ?></strong></td>
                    <td class="acc clearfix"> <!-- Nueva celda para acciones -->
                        <div class="tabla-flex">
                            <a class="open-modal" href="/api/actualizarr?id=<?php echo $servicio->id; ?>&modal=true">
                                <i class="material-icons" style="font-size: 27px; color: black; float: left;">mode_edit</i>
                            </a>

                            <form action="/servicio/eliminarr" method="POST">
                                <input type="hidden" name="id" value="<?php echo $servicio->id; ?>">
                                <button class="icono-delete boton" type="submit" style="float: right;">
                                    <img class="img-ocultar" src="../build/img/hidden.png" alt="Ocultar">
                                </button>
                            </form>

                        </div>
                    </td>
                    <td><?php echo $servicio->cliente ?></td>
                    <td><?php echo $servicio->nombre ?></td>
                    <td><?php echo date('d/m/Y', strtotime($servicio->fecha)); ?></td>
                    <td>
                        <?php


                        // Construye la ruta completa para el certificado
                        $rutaautorizacion = 'autorizacion/' . $servicio->autorizacion;

                        // Verifica si el archivo completo existe
                        if (file_exists($rutaautorizacion) && is_file($rutaautorizacion)) {
                            // El archivo existe y es un archivo regular
                            echo '<a target="_blank" href="/' . $rutaautorizacion . '">Completado</a>';
                        } else {
                            echo 'Pendiente';
                        }
                        ?>
                    </td>
                    <td>
                        <?php


                        // Construye la ruta completa para el certificado
                        $rutaevidencia = 'evidencia/' . $servicio->evidencia;

                        // Verifica si el archivo completo existe
                        if (file_exists($rutaevidencia) && is_file($rutaevidencia)) {
                            // Si el archivo existe, muestra "Completado" con un enlace
                            echo '<a target="_blank" href="/' . $rutaevidencia . '">Completado</a>';
                        } else {
                            // Si el archivo no existe, muestra un espacio en blanco
                            echo 'Pendiente';
                        }
                        ?>
                    </td>

                    <td>
                        <?php


                        // Construye la ruta completa para el certificado
                        $rutavideo = 'video/' . $servicio->video;

                        // Verifica si el archivo completo existe
                        if (file_exists($rutavideo) && is_file($rutavideo)) {
                            // Si el archivo existe, muestra "Completado" con un enlace
                            echo '<a target="_blank" href="/' . $rutavideo . '">Completado</a>';
                        } else {
                            // Si el archivo no existe, muestra un espacio en blanco
                            echo 'Pendiente';
                        }
                        ?>
                    </td>
                    <td>
                        <?php


                        // Construye la ruta completa para el certificado
                        $rutacertificado = 'certificado/' . $servicio->certificado;

                        // Verifica si el archivo completo existe
                        if (file_exists($rutacertificado) && is_file($rutacertificado)) {
                            // Si el archivo existe, muestra "Completado" con un enlace
                            echo '<a target="_blank" href="/' . $rutacertificado . '">Completado</a>';
                        } else {
                            // Si el archivo no existe, muestra un espacio en blanco
                            echo 'Pendiente';
                        }
                        ?>
                    </td>
                    <td>
                        <?php


                        // Construye la ruta completa para el certificado
                        $rutaremisiones = 'remisiones/' . $servicio->remisiones;

                        // Verifica si el archivo completo existe
                        if (file_exists($rutaremisiones) && is_file($rutaremisiones)) {

                            // Si el archivo existe, muestra "Completado" con un enlace
                            echo '<a target="_blank" href="/' . $rutaremisiones . '">Completado</a>';
                        } else {
                            // Si el archivo no existe, muestra un espacio en blanco
                            echo 'Pendiente';
                        }
                        ?>
                    </td>
                    <td>
                        <?php


                        // Construye la ruta completa para el certificado
                        $rutacomprobante = 'comprobante/' . $servicio->comprobante;

                        // Verifica si el archivo completo existe
                        if (file_exists($rutacomprobante) && is_file($rutacomprobante)) {
                            // Si el archivo existe, muestra "Completado" con un enlace
                            echo '<a target="_blank" href="/' . $rutacomprobante . '">Completado</a>';
                        } else {
                            // Si el archivo no existe, muestra un espacio en blanco
                            echo 'Pendiente';
                        }
                        ?>
                    </td>

                </tr>
            <?php
            }

            ?>
        </tbody>
    </table>
</main>




<?php
$script = "
        <script src='https://cdn.jsdelivr.net/npm/sweetalert2@11'></script>
        <script src ='/build/js/app2.js'></script>
    ";
?>