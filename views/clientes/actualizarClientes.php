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

    <form class="modal" method="POST" id="miModal">

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
                    <input class="block" id="Nombre_Cliente" type="text" name="Nombre_Cliente" value="<?php echo $clientes->Nombre_Cliente; ?>">
                </div>
                <div class="form-section1">
                    <label for="RFC">RFC</label>
                    <input class="block" id="RFC" type="text" name="RFC" value="<?php echo $clientes->RFC; ?>">
                </div>
                <div class="form-section1">
                    <label for="Correo_Cliente">Correo</label>
                    <input class="block" id="Correo_Cliente" type="mail" name="Correo_Cliente" value="<?php echo $clientes->Correo_Cliente; ?>">
                </div>
            </div>

            <nav class="navModal">
                <a href="#" class="active" data-tab="fallecido">Datos</a>
            </nav>



            <div class="seccion-fallecido">

                <div class="form-body">


                    <div class="form-section1">
                        <label for="Forma_Pago">Forma de pago</label>
                        <select class="block" id="Forma_Pago" name="Forma_Pago">
                            <option class="textogris" value="" disabled hidden>Seleccionar..</option>
                            <option value="Efectivo" <?php if ($clientes->Forma_Pago == "Efectivo") echo "selected"; ?>>Efectivo</option>
                            <option value="Tarjeta de crédito" <?php if ($clientes->Forma_Pago == "Tarjeta de crédito") echo "selected"; ?>>Tarjeta de crédito</option>
                            <option value="Transferencia bancaria" <?php if ($clientes->Forma_Pago == "Transferencia bancaria") echo "selected"; ?>>Transferencia bancaria</option>
                            <option value="Cheque" <?php if ($clientes->Forma_Pago == "Cheque") echo "selected"; ?>>Cheque</option>
                        </select>
                    </div>
                    <div class="form-section1">
                        <label for="Regimen_Fiscal">Régimen Fiscal</label>
                        <select class="block" id="Regimen_Fiscal" name="Regimen_Fiscal">
                            <option class="textogris" value="" disabled hidden>Seleccionar..</option>
                            <option value="601 - General de Ley Personas Morales" <?php if ($clientes->Regimen_Fiscal == "601 - General de Ley Personas Morales") echo "selected"; ?>>601 - General de Ley Personas Morales</option>
                            <option value="603 - Personas Morales con Fines no Lucrativos" <?php if ($clientes->Regimen_Fiscal == "603 - Personas Morales con Fines no Lucrativos") echo "selected"; ?>>603 - Personas Morales con Fines no Lucrativos</option>
                            <option value="605 - Sueldos y Salarios e Ingresos Asimilados a Salarios" <?php if ($clientes->Regimen_Fiscal == "605 - Sueldos y Salarios e Ingresos Asimilados a Salarios") echo "selected"; ?>>605 - Sueldos y Salarios e Ingresos Asimilados a Salarios</option>
                            <option value="606 - Arrendamiento" <?php if ($clientes->Regimen_Fiscal == "606 - Arrendamiento") echo "selected"; ?>>606 - Arrendamiento</option>
                            <option value="608 - Demás ingresos" <?php if ($clientes->Regimen_Fiscal == "608 - Demás ingresos") echo "selected"; ?>>608 - Demás ingresos</option>
                            <option value="609 - Consolidación" <?php if ($clientes->Regimen_Fiscal == "609 - Consolidación") echo "selected"; ?>>609 - Consolidación</option>
                            <option value="610 - Residentes en el Extranjero sin Establecimiento Permanente en México" <?php if ($clientes->Regimen_Fiscal == "610 - Residentes en el Extranjero sin Establecimiento Permanente en México") echo "selected"; ?>>610 - Residentes en el Extranjero sin Establecimiento Permanente en México</option>
                            <option value="611 - Ingresos por Dividendos (socios y accionistas)" <?php if ($clientes->Regimen_Fiscal == "611 - Ingresos por Dividendos (socios y accionistas)") echo "selected"; ?>>611 - Ingresos por Dividendos (socios y accionistas)</option>
                            <option value="612 - Personas Físicas con Actividades Empresariales y Profesionales" <?php if ($clientes->Regimen_Fiscal == "612 - Personas Físicas con Actividades Empresariales y Profesionales") echo "selected"; ?>>612 - Personas Físicas con Actividades Empresariales y Profesionales</option>
                            <option value="614 - Ingresos por intereses" <?php if ($clientes->Regimen_Fiscal == "614 - Ingresos por intereses") echo "selected"; ?>>614 - Ingresos por intereses</option>
                            <option value="615 - Régimen de los ingresos por obtención de premios" <?php if ($clientes->Regimen_Fiscal == "615 - Régimen de los ingresos por obtención de premios") echo "selected"; ?>>615 - Régimen de los ingresos por obtención de premios</option>
                            <option value="616 - Sin obligaciones fiscales" <?php if ($clientes->Regimen_Fiscal == "616 - Sin obligaciones fiscales") echo "selected"; ?>>616 - Sin obligaciones fiscales</option>
                            <option value="620 - Sociedades Cooperativas de Producción que optan por diferir sus ingresos" <?php if ($clientes->Regimen_Fiscal == "620 - Sociedades Cooperativas de Producción que optan por diferir sus ingresos") echo "selected"; ?>>620 - Sociedades Cooperativas de Producción que optan por diferir sus ingresos</option>
                            <option value="621 - Incorporación Fiscal" <?php if ($clientes->Regimen_Fiscal == "621 - Incorporación Fiscal") echo "selected"; ?>>621 - Incorporación Fiscal</option>
                            <option value="622 - Actividades Agrícolas, Ganaderas, Silvícolas y Pesqueras" <?php if ($clientes->Regimen_Fiscal == "622 - Actividades Agrícolas, Ganaderas, Silvícolas y Pesqueras") echo "selected"; ?>>622 - Actividades Agrícolas, Ganaderas, Silvícolas y Pesqueras</option>
                            <option value="623 - Opcional para Grupos de Sociedades" <?php if ($clientes->Regimen_Fiscal == "623 - Opcional para Grupos de Sociedades") echo "selected"; ?>>623 - Opcional para Grupos de Sociedades</option>
                            <option value="624 - Coordinados" <?php if ($clientes->Regimen_Fiscal == "624 - Coordinados") echo "selected"; ?>>624 - Coordinados</option>
                            <option value="625 - Régimen de las Actividades Empresariales con ingresos a través de Plataformas Tecnológicas" <?php if ($clientes->Regimen_Fiscal == "625 - Régimen de las Actividades Empresariales con ingresos a través de Plataformas Tecnológicas") echo "selected"; ?>>625 - Régimen de las Actividades Empresariales con ingresos a través de Plataformas Tecnológicas</option>
                            <option value="626 - Régimen Simplificado de Confianza" <?php if ($clientes->Regimen_Fiscal == "626 - Régimen Simplificado de Confianza") echo "selected"; ?>>626 - Régimen Simplificado de Confianza</option>
                            <option value="628 - Hidrocarburos" <?php if ($clientes->Regimen_Fiscal == "628 - Hidrocarburos") echo "selected"; ?>>628 - Hidrocarburos</option>
                            <option value="629 - De los Regímenes Fiscales Preferentes y de las Empresas Multinacionales" <?php if ($clientes->Regimen_Fiscal == "629 - De los Regímenes Fiscales Preferentes y de las Empresas Multinacionales") echo "selected"; ?>>629 - De los Regímenes Fiscales Preferentes y de las Empresas Multinacionales</option>
                            <option value="630 - Enajenación de acciones en bolsa de valores" <?php if ($clientes->Regimen_Fiscal == "630 - Enajenación de acciones en bolsa de valores") echo "selected"; ?>>630 - Enajenación de acciones en bolsa de valores</option>
                        </select>
                    </div>
                    <div class="form-section1">
                        <label for="DomicilioC">Domicilio</label>
                        <input class="block" id="DomicilioC" type="text" name="DomicilioC" value="<?php echo $clientes->DomicilioC; ?>">
                    </div>
                    <div class="form-section1">
                        <label for="Uso_CFDI">Uso de CFDI</label>
                        <select class="block" id="Uso_CFDI" name="Uso_CFDI">
                            <option class="textogris" value="" disabled hidden>Seleccionar..</option>
                            <option value="G01 - Adquisición de mercancías." <?php if ($clientes->Uso_CFDI == "G01 - Adquisición de mercancías.") echo "selected"; ?>>G01 - Adquisición de mercancías</option>
                            <option value="G02 - Devoluciones, descuentos o bonificaciones." <?php if ($clientes->Uso_CFDI == "G02 - Devoluciones, descuentos o bonificaciones.") echo "selected"; ?>>G02 - Devoluciones, descuentos o bonificaciones</option>
                            <option value="G03 - Gastos en general." <?php if ($clientes->Uso_CFDI == "G03 - Gastos en general.") echo "selected"; ?>>G03 - Gastos en general</option>
                            <option value="I01 - Construcciones" <?php if ($clientes->Uso_CFDI == "I01 - Construcciones") echo "selected"; ?>>I01 - Construcciones</option>
                            <option value="I02 - Mobiliario y equipo de oficina por inversiones" <?php if ($clientes->Uso_CFDI == "I02 - Mobiliario y equipo de oficina por inversiones") echo "selected"; ?>>I02 - Mobiliario y equipo de oficina por inversiones</option>
                            <option value="I03 - Equipo de transporte" <?php if ($clientes->Uso_CFDI == "I03 - Equipo de transporte") echo "selected"; ?>>I03 - Equipo de transporte</option>
                            <option value="I04 - Equipo de computo y accesorios" <?php if ($clientes->Uso_CFDI == "I04 - Equipo de computo y accesorios") echo "selected"; ?>>I04 - Equipo de computo y accesorios</option>
                            <option value="I05 - Dados, troqueles, moldes, matrices y herramental" <?php if ($clientes->Uso_CFDI == "I05 - Dados, troqueles, moldes, matrices y herramental") echo "selected"; ?>>I05 - Dados, troqueles, moldes, matrices y herramental</option>
                            <option value="I06 - Comunicaciones telefónicas" <?php if ($clientes->Uso_CFDI == "I06 - Comunicaciones telefónicas") echo "selected"; ?>>I06 - Comunicaciones telefónicas</option>
                            <option value="I07 - Comunicaciones satelitales" <?php if ($clientes->Uso_CFDI == "I07 - Comunicaciones satelitales") echo "selected"; ?>>I07 - Comunicaciones satelitales</option>
                            <option value="I08 - Otra maquinaria y equipo" <?php if ($clientes->Uso_CFDI == "I08 - Otra maquinaria y equipo") echo "selected"; ?>>I08 - Otra maquinaria y equipo</option>
                            <option value="D01 - Honorarios médicos, dentales y gastos hospitalarios" <?php if ($clientes->Uso_CFDI == "D01 - Honorarios médicos, dentales y gastos hospitalarios") echo "selected"; ?>>D01 - Honorarios médicos, dentales y gastos hospitalarios</option>
                            <option value="D02 - Gastos médicos por incapacidad o discapacidad" <?php if ($clientes->Uso_CFDI == "D02 - Gastos médicos por incapacidad o discapacidad") echo "selected"; ?>>D02 - Gastos médicos por incapacidad o discapacidad</option>
                            <option value="D03 - Gastos funerales" <?php if ($clientes->Uso_CFDI == "D03 - Gastos funerales") echo "selected"; ?>>D03 - Gastos funerales</option>
                            <option value="D04 - Donativos" <?php if ($clientes->Uso_CFDI == "D04 - Donativos") echo "selected"; ?>>D04 - Donativos</option>
                            <option value="D05 - Intereses reales efectivamente pagados por créditos hipotecarios (casa habitación)" <?php if ($clientes->Uso_CFDI == "D05 - Intereses reales efectivamente pagados por créditos hipotecarios (casa habitación)") echo "selected"; ?>>D05 - Intereses reales efectivamente pagados por créditos hipotecarios (casa habitación)</option>
                            <option value="D06 - Aportaciones voluntarias al SAR" <?php if ($clientes->Uso_CFDI == "D06 - Aportaciones voluntarias al SAR") echo "selected"; ?>>D06 - Aportaciones voluntarias al SAR</option>
                            <option value="D07 - Primas por seguros de gastos médicos" <?php if ($clientes->Uso_CFDI == "D07 - Primas por seguros de gastos médicos") echo "selected"; ?>>D07 - Primas por seguros de gastos médicos</option>
                            <option value="D08 - Gastos de transportación escolar obligatoria" <?php if ($clientes->Uso_CFDI == "D08 - Gastos de transportación escolar obligatoria") echo "selected"; ?>>D08 - Gastos de transportación escolar obligatoria</option>
                            <option value="D09 - Depósitos en cuentas para el ahorro, primas que tengan como base planes de pensiones" <?php if ($clientes->Uso_CFDI == "D09 - Depósitos en cuentas para el ahorro, primas que tengan como base planes de pensiones") echo "selected"; ?>>D09 - Depósitos en cuentas para el ahorro, primas que tengan como base planes de pensiones</option>
                            <option value="D10 - Pagos por servicios educativos (colegiaturas)" <?php if ($clientes->Uso_CFDI == "D10 - Pagos por servicios educativos (colegiaturas)") echo "selected"; ?>>D10 - Pagos por servicios educativos (colegiaturas)</option>
                            <option value="S01 - Sin efectos fiscales" <?php if ($clientes->Uso_CFDI == "S01 - Sin efectos fiscales") echo "selected"; ?>>S01 - Sin efectos fiscales</option>
                            <option value="CP01 - Pagos" <?php if ($clientes->Uso_CFDI == "CP01 - Pagos") echo "selected"; ?>>CP01 - Pagos</option>
                            <option value="CN01 - Nómina" <?php if ($clientes->Uso_CFDI == "CN01 - Nómina") echo "selected"; ?>>CN01 - Nómina</option>
                        </select>
                    </div>

                </div>

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
        <script src ='/build/js/actualizarCliente.js'></script>
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