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
    </div>

    <form class="modal" id="miModal">

        <input type="hidden" id="id" name="id" value="">

        <div class="modal-contenido">
            <div class="title">
                <h4>Nuevo cliente</h4>
                <span class="material-symbols-outlined cerrar-modal" id="cerrarModal">
                    close
                </span>
            </div>

            <div class="form-body">

                <div class="form-section1">
                    <label for="Nombre_Cliente">Nombre</label>
                    <input class="block" id="Nombre_Cliente" type="text">
                </div>
                <div class="form-section1">
                    <label for="RFC">RFC</label>
                    <input class="block" id="RFC" type="text">
                </div>
                <div class="form-section1">
                    <label for="Correo_Cliente">Correo</label>
                    <input class="block" id="Correo_Cliente" type="mail">
                </div>
            </div>

            <nav class="navModal">
                <a href="#" class="active" data-tab="fallecido">Datos</a>
            </nav>



            <div class="seccion-fallecido">

                <div class="form-body">


                    <div class="form-section1">
                        <label for="Forma_Pago">Forma de pago</label>
                        <select class="block" id="Forma_Pago">
                            <option class="textogris" value="" disabled hidden selected>Seleccionar..</option>
                            <option value="Efectivo">Efectivo</option>
                            <option value="Tarjeta de crédito">Tarjeta de crédito</option>
                            <option value="Transferencia bancaria">Transferencia bancaria</option>
                            <option value="Cheque">Cheque</option>
                        </select>
                    </div>
                    <div class="form-section1">
                        <label for="Regimen_Fiscal">Régimen Fiscal</label>
                        <select class="block" id="Regimen_Fiscal" name="Regimen_Fiscal">
                            <option class="textogris" value="" disabled hidden selected>Seleccionar..</option>
                            <option value="601 - General de Ley Personas Morales">601 - General de Ley Personas Morales</option>
                            <option value="603 - Personas Morales con Fines no Lucrativos">603 - Personas Morales con Fines no Lucrativos</option>
                            <option value="605 - Sueldos y Salarios e Ingresos Asimilados a Salarios">605 - Sueldos y Salarios e Ingresos Asimilados a Salarios</option>
                            <option value="606 - Arrendamiento">606 - Arrendamiento</option>
                            <option value="608 - Demás ingresos">608 - Demás ingresos</option>
                            <option value="609 - Consolidación">609 - Consolidación</option>
                            <option value="610 - Residentes en el Extranjero sin Establecimiento Permanente en México">610 - Residentes en el Extranjero sin Establecimiento Permanente en México</option>
                            <option value="611 - Ingresos por Dividendos (socios y accionistas)">611 - Ingresos por Dividendos (socios y accionistas)</option>
                            <option value="612 - Personas Físicas con Actividades Empresariales y Profesionales">612 - Personas Físicas con Actividades Empresariales y Profesionales</option>
                            <option value="614 - Ingresos por intereses">614 - Ingresos por intereses</option>
                            <option value="615 - Régimen de los ingresos por obtención de premios">615 - Régimen de los ingresos por obtención de premios</option>
                            <option value="616 - Sin obligaciones fiscales">616 - Sin obligaciones fiscales</option>
                            <option value="620 - Sociedades Cooperativas de Producción que optan por diferir sus ingresos">620 - Sociedades Cooperativas de Producción que optan por diferir sus ingresos</option>
                            <option value="621 - Incorporación Fiscal">621 - Incorporación Fiscal</option>
                            <option value="622 - Actividades Agrícolas, Ganaderas, Silvícolas y Pesqueras">622 - Actividades Agrícolas, Ganaderas, Silvícolas y Pesqueras</option>
                            <option value="623 - Opcional para Grupos de Sociedades">623 - Opcional para Grupos de Sociedades</option>
                            <option value="624 - Coordinados">624 - Coordinados</option>
                            <option value="625 - Régimen de las Actividades Empresariales con ingresos a través de Plataformas Tecnológicas">625 - Régimen de las Actividades Empresariales con ingresos a través de Plataformas Tecnológicas</option>
                            <option value="626 - Régimen Simplificado de Confianza">626 - Régimen Simplificado de Confianza</option>
                            <option value="628 - Hidrocarburos">628 - Hidrocarburos</option>
                            <option value="629 - De los Regímenes Fiscales Preferentes y de las Empresas Multinacionales">629 - De los Regímenes Fiscales Preferentes y de las Empresas Multinacionales</option>
                            <option value="630 - Enajenación de acciones en bolsa de valores">630 - Enajenación de acciones en bolsa de valores</option>
                        </select>
                    </div>
                    <div class="form-section1">
                        <label for="DomicilioC">Domicilio</label>
                        <input class="block" id="DomicilioC" type="text">
                    </div>
                    <div class="form-section1">
                        <label for="Uso_CFDI">Uso de CFDI</label>
                        <select class="block" id="Uso_CFDI" name="Uso_CFDI">
                            <option class="textogris" value="" disabled hidden selected>Seleccionar..</option>
                            <option value="G01 - Adquisición de mercancías.">G01 - Adquisición de mercancías</option>
                            <option value="G02 - Devoluciones, descuentos o bonificaciones.">G02 - Devoluciones, descuentos o bonificaciones</option>
                            <option value="G03 - Gastos en general.">G03 - Gastos en general</option>
                            <option value="I01 - Construcciones">I01 - Construcciones</option>
                            <option value="I02 - Mobiliario y equipo de oficina por inversiones">I02 - Mobiliario y equipo de oficina por inversiones</option>
                            <option value="I03 - Equipo de transporte">I03 - Equipo de transporte</option>
                            <option value="I04 - Equipo de computo y accesorios">I04 - Equipo de computo y accesorios</option>
                            <option value="I05 - Dados, troqueles, moldes, matrices y herramental">I05 - Dados, troqueles, moldes, matrices y herramental</option>
                            <option value="I06 - Comunicaciones telefónicas">I06 - Comunicaciones telefónicas</option>
                            <option value="I07 - Comunicaciones satelitales">I07 - Comunicaciones satelitales</option>
                            <option value="I08 - Otra maquinaria y equipo">I08 - Otra maquinaria y equipo</option>
                            <option value="D01 - Honorarios médicos, dentales y gastos hospitalarios">D01 - Honorarios médicos, dentales y gastos hospitalarios</option>
                            <option value="D02 - Gastos médicos por incapacidad o discapacidad">D02 - Gastos médicos por incapacidad o discapacidad</option>
                            <option value="D03 - Gastos funerales">D03 - Gastos funerales</option>
                            <option value="D04 - Donativos">D04 - Donativos</option>
                            <option value="D05 - Intereses reales efectivamente pagados por créditos hipotecarios (casa habitación)">D05 - Intereses reales efectivamente pagados por créditos hipotecarios (casa habitación)</option>
                            <option value="D06 - Aportaciones voluntarias al SAR">D06 - Aportaciones voluntarias al SAR</option>
                            <option value="D07 - Primas por seguros de gastos médicos">D07 - Primas por seguros de gastos médicos</option>
                            <option value="D08 - Gastos de transportación escolar obligatoria">D08 - Gastos de transportación escolar obligatoria</option>
                            <option value="D09 - Depósitos en cuentas para el ahorro, primas que tengan como base planes de pensiones">D09 - Depósitos en cuentas para el ahorro, primas que tengan como base planes de pensiones</option>
                            <option value="D10 - Pagos por servicios educativos (colegiaturas)">D10 - Pagos por servicios educativos (colegiaturas)</option>
                            <option value="S01 - Sin efectos fiscales">S01 - Sin efectos fiscales</option>
                            <option value="CP01 - Pagos">CP01 - Pagos</option>
                            <option value="CN01 - Nómina">CN01 - Nómina</option>
                        </select>
                    </div>

                </div>

            </div>

            <footer class="footer">
                <button class="boton2">Cancelar</button>
                <button class="boton2" id="botonReservarCliente">Guardar</button>
            </footer>

        </div>

    </form>

    <table class="tabla-principal">
        <thead>
            <tr>
                <th>Código</th>
                <th>Acciones</th>
                <th>Nombre</th>
                <th>RFC</th>
                <th>Correo</th>
                <th>Forma de pago</th>
                <th>Régimen fiscal</th>
                <th>CFDI</th>
                <th>Domicilio</th>




        </thead>
        <tbody>
            <?php

            foreach (array_reverse($clientes) as $cliente) {

            ?>
                <tr class="seleccionable lazy-load">
                    <td><strong><?php echo $cliente->id ?></strong></td>
                    <td class="acc clearfix"> <!-- Nueva celda para acciones -->
                        <div class="tabla-flex">
                            <a class="open-modal" href="/api/actualizar3?id=<?php echo $cliente->id; ?>&modal=true">
                                <i class="material-icons" style="font-size: 27px; color: black; float: left;">mode_edit</i>
                            </a>
                            <form action="/clientes/eliminar3" method="POST">
                                <input type="hidden" name="id" value="<?php echo $cliente->id; ?>">
                                <button class="icono-delete eliminarBoton" type="submit" style="float: right;">
                                    <i class="material-icons" style="font-size: 27px;">delete</i>
                                </button>
                            </form>
                        </div>

                    </td>
                    <td><?php echo $cliente->Nombre_Cliente; ?></td>
                    <td><?php echo $cliente->RFC; ?></td>
                    <td><?php echo $cliente->Correo_Cliente; ?></td>
                    <td><?php echo $cliente->Forma_Pago; ?></td>
                    <td><?php echo $cliente->Regimen_Fiscal; ?></td>
                    <td><?php echo $cliente->Uso_CFDI; ?></td>
                    <td><?php echo $cliente->DomicilioC; ?></td>
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
        <script src ='/build/js/clientes2.js'></script>
    ";
?>

// AGREGAR BOTON DE DESOCULTAR ✅
// TABLA DE CLIENTES IGUAL QUE DEFUNCIONES
// fecha de muerte de perro y nacimiento ✅
// voltear los numeros de las defunciones ✅
<!-- 
Datos: 
- Código de cliente 
- Nombree del cliente 
- RFC 
- Correo del cliente 
- Forma de pago 
- Régimen Fiscal 
- Uso de CFDI 
- Domicilio -->