

<script type="text/javascript" charset="utf-8">
    $(document).ready(function () {
        // Parametros para el combo
//        $("#eleccion").change(function () {
//            $("#eleccion option:selected").each(function () {
//                elegido = $(this).val();
//                $.post("index.php?r=candidatos/AjaxRadicado", {elegido: elegido}, function (data) {
//
//                    var valoresdata = data.split("~");
//                    document.getElementById('radicado').value = elegido + '-' + valoresdata[0];
//                    document.getElementById('codigo_candidato').value = valoresdata[0];
//                    document.getElementById('texto1').innerHTML = valoresdata[1];
//                    document.getElementById('encabezado').value = valoresdata[1];
//                    document.getElementById('texto2').innerHTML = valoresdata[2];
//                    document.getElementById('texto3').innerHTML = valoresdata[3];
//
//
//                });
//            });
//        });
                var elegido = 1;
                $.post("index.php?r=candidatos/AjaxRadicado", {elegido: elegido}, function (data) {

                    var valoresdata = data.split("~");
                    document.getElementById('radicado').value = elegido + '-' + valoresdata[0];
                    document.getElementById('codigo_candidato').value = valoresdata[0];
                    document.getElementById('texto1').innerHTML = valoresdata[1];
                    document.getElementById('encabezado').value = valoresdata[1];
                    document.getElementById('texto2').innerHTML = valoresdata[2];
                    document.getElementById('texto3').innerHTML = valoresdata[3];


                });
    });

    $(document).ready(function () {
        // Parametros para el combo
        $("#barrio").change(function () {
            $("#barrio option:selected").each(function () {
                elegido = $(this).val();
                $.post("index.php?r=candidatos/AjaxConsultaRegion", {elegido: elegido}, function (data) {
                    regdiv = data.split("~");
                    $("#region").html(regdiv[0]);


                });


            });
        });
    });

</script>	



<div class="contentpanel">
    <div class="panel-heading">
        <div class="widget widget-blue">
            <div class="widget-content">
                <h4 class="panel-title" style="text-align:center;">DATOS DE ELECCI&Oacute;N</h4>
    <p id="texto1" style="font-size:80%;text-align:center;"></p>
    <?php
    $nombre = '';
    $direccion = '';
    $telefono = '';
    $celular = '';
    $cedula = '';

    foreach ($fila_usuarios as $filausu) {
        $nombre = $filausu["NombreIntegrado"];
        $direccion = $filausu["Direccion"];
        $telefono = $filausu["Telefono"];
        $celular = $filausu["Celular"];
        $cedula = $filausu["CedulaAsociado"];
    }
    ?>

    <form method="POST"  enctype="multipart/form-data" action="index.php?r=candidatos/guardar" id="form_candidato" class="form-horizontal form-bordered">
        <div class="form-group">
            <label class="col-sm-3 control-label">Fecha de Inscripci&oacute;n </label>
            <div class="col-sm-6">
                <input readonly  type="text" name="fechainscricion"    class="form-control fechareport" id="fechains" value = "<?php echo date('Y-m-d') ?>"/>
            </div>
        </div>
        <input type="hidden" id="encabezado" value=" " name="encabezado" style="font-size: 80%" >
        <div class="form-group">
            <label class="col-sm-3 control-label">Seleccione Elecci&oacute;n <span class="asterisk">*</span></label>
            <div class="col-sm-6">
                <select id="eleccion" name="eleccion" class="form-control" >
<!--                    <option value="">Seleccione Opci&oacute;n</option>-->
                    <?php foreach ($filaeleccion as $fila) { ?>
                        <option value="<?php echo $fila["IdEleccion"]; ?>"> <?php echo $fila["Descripcion"]; ?></option>
                    <?php } ?>
                </select>
                <p id="veleccion" style="font-size: 100%;color: red"></p>
            </div>
        </div>


        <!-- <div class="form-group">
           <label class="col-sm-3 control-label" for="disabledinput">Radicado</label> 
            <div class="col-sm-6"> -->
        <input type="hidden" name="radicado" value="" placeholder="" id="radicado" class="form-control"  />
        <!--  </div>
      </div>-->
        <div class="form-group">
            <h4 class="panel-title" style="text-align:center;padding-bottom:15px;">DATOS DE CANDIDATO</h4>
            <label class="col-sm-3 control-label">Nombres y Apellidos<span class="asterisk">*</span></label>
            <div class="col-sm-6">
                <input readonly type="text" name="nombres" id="nombres" value="<?php echo $nombre; ?>" placeholder="" class="form-control" required />
                <p id="vnombres" style="font-size: 100%;color: red"></p>
            </div>
        </div>
        <!--  <div class="form-group">
              <label class="col-sm-3 control-label">Apellidos <span class="asterisk">*</span></label>
              <div class="col-sm-6">        </div> -->

        <input type="hidden" name="apellidos" id="apellidos" placeholder="" class="form-control" required />
      <!--  <p id="vapellidos" style="font-size: 80%"></p>
    </div>
</div> -->
        <!--
        <div class="form-group">
            <label class="col-sm-3 control-label" for="disabledinput">C&oacute;digo Candidato <span class="asterisk">*</span></label>
            <div class="col-sm-6"> -->
        <input type="hidden" placeholder="" name="codigo_candidato" id="codigo_candidato" class="form-control" />

        <!--  </div>
  </div>
        -->
        <div class="form-group">
            <label class="col-sm-3 control-label">Nro. De Documento <span class="asterisk">*</span></label>
            <div class="col-sm-6">
                <input readonly type="text" placeholder="" value="<?php echo $cedula; ?>" name="nro_documento" id="nro_documento" onkeypress="return FilterInput(event);" class="form-control" required />
                <p id="vnro_documento" style="font-size: 100%;color: red"></p>
            </div>
        </div>
        <div class="form-group">
            <label class="col-sm-3 control-label">Direcci&oacute;n <span class="asterisk">*</span></label>
            <div class="col-sm-6">
                <input type="text" placeholder="" name="direccion" value="<?php echo $direccion; ?>" id="direccion" class="form-control" required/>
                <p id="vdireccion" style="font-size: 100%;color: red"></p>
            </div>
        </div>

        <div class="form-group">
            <label class="col-sm-3 control-label">Barrio o Municipio <span class="asterisk">*</span></label>
            <div class="col-sm-6">
                <select id="barrio" name="barrio" class="form-control" required>
                    <option value="">Seleccione Opci&oacute;n</option>
                    <?php foreach ($barrio as $fila) { ?>
                        <option value="<?php echo $fila["CodigoBarrio"]; ?>"> <?php echo $fila["NombreBarrio"] . ' - ' . $fila["NombreZona"]; ?></option>
                    <?php } ?>
                </select>
                <p id="vbarrio" style="font-size: 100%;color: red"></p>
            </div>
        </div>
        
                <div class="form-group">
            <label class="col-sm-3 control-label">Zona <span class="asterisk">*</span></label>

            <div class="col-sm-6">
                <p id="texto2" style="font-size: 100%"></p>

                <select id="region" name="region" class="form-control" required>

                    <!--    <option value="apple">Apple</option>
                        <option value="orange">Orange</option>
                        <option value="grapes">Grapes</option>
                        <option value="strawberry">Strawberry</option> -->
                </select>
                <p id="vregion" style="font-size: 100% ;color: red"></p>
            </div>
        </div>
        

        <div class="form-group">
            <label class="col-sm-3 control-label">Tel&eacute;fono <span class="asterisk">*</span></label>
            <div class="col-sm-6">
                <input type="text" placeholder="" id="telefono" value="<?php echo $telefono; ?>" onkeypress="return FilterInput(event);" name="telefono" class="form-control" required/>
                <p id="vtelefono" style="font-size: 100%;color: red"></p>
            </div>
        </div>
        <div class="form-group">
            <label class="col-sm-3 control-label">Celular <span class="asterisk">*</span></label>
            <div class="col-sm-6">
                <input type="text" placeholder="" id="celular" value="<?php echo $celular; ?>" onkeypress="return FilterInput(event);" name="celular" class="form-control" required/>
                <p id="vcelular" style="font-size: 100%;;color: red"></p>
            </div>
        </div>

        <div class="form-group">
            <label class="col-sm-3 control-label">Correo Electr&oacute;nico <span class="asterisk">*</span></label>
            <div class="col-sm-6">
                <input type="text" placeholder="" name="email" id="email" class="form-control" required/>
                <p id="vemail" style="font-size: 100%;color: red"></p>
            </div>
        </div>
        <div class="form-group">
            <label class="col-sm-3 control-label">Foto<span class="asterisk">*</span></label>
            <div class="col-sm-6">
                <div class="fileupload fileupload-new" data-provides="fileupload">
                    <div class="input-append">
                        <div class="uneditable-input">
                            <i class="glyphicon glyphicon-file fileupload-exists"></i>
                            <span class="fileupload-preview"></span>
                        </div>
                        <span class="btn btn-default btn-file">
                        <!--    <span class="fileupload-new">Select file</span>
                            <span class="fileupload-exists">Change</span> -->
                            <input type="file" name="foto" id="foto" required/>
                            <p id="vfoto" style="font-size: 100%;color: red"></p>

                        </span>

                    </div>
                </div>
            </div>
        </div>
        <p id="texto3" style="font-size: 80%"></p>
        <div class="col-md-3 text-center">
            <div class="form-group">
                <label></label>
                <div>
                    <a class="btnbuscar btn btn-primary" href="javascript:eleccion();" > Enviar Datos </a>
                   <!-- <input type="button" onclick="eleccion()" class="btnbuscar btn btn-primary" style="height: 25px; width: 100px;"  value="Guardar" /> -->
                </div>
            </div>
        </div>
    </form>
    <?php $this->renderPartial('//mensajes/_alertConfirmation'); ?>
</div>
</div>
</div>
</div>
