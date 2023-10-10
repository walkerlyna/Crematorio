<?php include_once __DIR__ . '/../templates/nav.php'; ?>

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
        <button class="boton">
            <span class="material-symbols-outlined">
                print
            </span>
        </button>
    </div>

    <form class="modal" method="POST" id="miModal" enctype="multipart/form-data">



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
                        <input class="block" id="nombre" name="nombre" type="text" value="<?php echo $servicio->nombre; ?>">
                    </div>
                    <div class="form-section1">
                        <label for="motivo">Motivo de muerte</label>
                        <input type="text" class="block" id="motivo" name="motivo" value="<?php echo $servicio->motivo; ?>">
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


                <label class="label-archivo imagen1" for="archivo"></label>
                <input type="file" name="archivo" id="archivo">


            </div>

            <div class="seccion-evidencia" style="display: none;">


                <label class="label-archivo imagen2" for="archivo2"></label>
                <input type="file" name="archivo2" id="archivo2">



            </div>

            <div class="seccion-certificado" style="display: none;">


                <label class="label-archivo imagen3" for="archivo3"></label>
                <input type="file" name="archivo3" id="archivo3">



            </div>

            <div class="seccion-video" style="display: none;">


                <label class="label-archivo imagen4" for="archivo4"></label>
                <input type="file" name="archivo4" id="archivo4">


            </div>

            <div class="seccion-remisiones" style="display: none;">


                <label class="label-archivo imagen5" for="archivo7"></label>
                <input type="file" name="archivo7" id="archivo7">



            </div>

            <div class="seccion-comprobante" style="display: none;">


                <label class="label-archivo imagen6" for="archivo5"></label>
                <input type="file" name="archivo5" id="archivo5">

            </div>

            <div class="seccion-observaciones" style="display: none;">

                <textarea name="observaciones" id="observaciones" cols="30" rows="10"></textarea>

            </div>

            <footer class="footer">
                <button>Cancelar</button>
                <input type="submit" value="Actualizar" class="boton">
            </footer>

        </div>
    </form>

</main>

<?php
$script = "
        <script src ='/build/js/actualizar.js'></script>
    ";
?>