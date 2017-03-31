<?php
/* @var $this EleccionesController */
/* @var $model Elecciones */
/* @var $form CActiveForm */

if ($model->FechaFin == ""):
    $model->FechaFin = date("Y-m-d");
endif;
if ($model->FechaInicio == ""):
    $model->FechaInicio = date("Y-m-d");
endif;
if ($model->FechaInicioPostulaciones == ""):
    $model->FechaInicioPostulaciones = date("Y-m-d");
endif;
if ($model->FechaFinPostulaciones == ""):
    $model->FechaFinPostulaciones = date("Y-m-d");
endif;

?>

<script src="<?php echo Yii::app()->request->baseUrl; ?>/js/jquery-1.10.2.min.js"></script>

<script type="text/javascript">

    $(document).ready(function () {
        <?php $day = Date('d'); ?>
        <?php $month = Date('m') - 1; ?>
        <?php $year = Date('Y'); ?>
        var startDate = new Date(<?php echo $year . "," . $month . "," . $day; ?>);
        var endDate = new Date(<?php echo $year . "," . $month . "," . $day; ?>);
        $('#Elecciones_FechaInicio').datepicker({format: 'yyyy-mm-dd'}).on('changeDate', function (ev) {
            startDate = new Date(ev.date);
            if (ev.date.valueOf() > endDate.valueOf()) {
                $('#alert1').show().find('strong').text('La fecha de inicio no puede ser mayor que la fecha final');
            } else {
                $('#alert1').hide();
            }
            $('#Elecciones_FechaInicio').datepicker('hide');
        });
        $('#Elecciones_FechaFin').datepicker({format: 'yyyy-mm-dd'}).on('changeDate', function (ev) {
            endDate = new Date(ev.date);
            if (ev.date.valueOf() < startDate.valueOf()) {
                $('#alert1').show().find('strong').text('La fecha final no puede ser menor que la fecha de inicio');
            } else {
                $('#alert1').hide();
            }
            $('#Elecciones_FechaFin').datepicker('hide');
        });

        $('#Elecciones_FechaInicioPostulaciones').datepicker({format: 'yyyy-mm-dd'}).on('changeDate', function (ev) {
            startDate = new Date(ev.date);
            if (ev.date.valueOf() > endDate.valueOf()) {
                $('#alert2').show().find('strong').text('La fecha de inicio no puede ser mayor que la fecha final');
            } else {
                $('#alert2').hide();
            }
            $('#Elecciones_FechaInicioPostulaciones').datepicker('hide');
        });
        $('#Elecciones_FechaFinPostulaciones').datepicker({format: 'yyyy-mm-dd'}).on('changeDate', function (ev) {
            endDate = new Date(ev.date);
            if (ev.date.valueOf() < startDate.valueOf()) {
                $('#alert2').show().find('strong').text('La fecha final no puede ser menor que la fecha de inicio');
            } else {
                $('#alert2').hide();
            }
            $('#Elecciones_FechaFinPostulaciones').datepicker('hide');
        });
    });

</script>

<div class="form">

    <?php
    $form = $this->beginWidget('CActiveForm', array(
        'id' => 'elecciones-form',
        // Please note: When you enable ajax validation, make sure the corresponding
        // controller action is handling ajax validation correctly.
        // There is a call to performAjaxValidation() commented in generated controller code.
        // See class documentation of CActiveForm for details on this.
        'enableAjaxValidation' => false,
        'htmlOptions' => array('enctype' => 'multipart/form-data'),
    ));
    ?>

    <div class="row" style="padding-bottom:15px;">
        <div class="col-md-offset-1">
            <p class="note">Campos con <span class="required">*</span> son obligatorios.</p>
        </div>
    </div>

    <div class="row" style="padding-bottom:15px;">
        <div class="col-md-offset-1 col-md-3">
            <?php echo $form->labelEx($model, 'Descripcion'); ?>
        </div>
        <div class="col-md-5">
            <?php echo $form->textField($model, 'Descripcion', array('size' => 45, 'maxlength' => 100)); ?>
        </div>
        <div class="col-md-3">
            <?php echo $form->error($model, 'Descripcion'); ?>
        </div>
    </div>

    <div class="alert alert-error" id="alert1">
        <strong style="color:red;">Oh snap!</strong>
    </div>
    
    <div class="row" style="padding-bottom:15px;">
        <div class="col-md-offset-1 col-md-3">
            <?php echo $form->labelEx($model, 'FechaInicio'); ?>
        </div>
        <div class="col-md-5">
            <?php echo $form->textField($model, 'FechaInicio'); ?>
        </div>
        <div class="col-md-3">
            <?php echo $form->error($model, 'FechaInicio'); ?>
        </div>
    </div>

    <div class="row" style="padding-bottom:15px;">
        <div class="col-md-offset-1 col-md-3">
            <?php echo $form->labelEx($model, 'FechaFin'); ?>
        </div>
        <div class="col-md-5">
            <?php echo $form->textField($model, 'FechaFin'); ?>
        </div>
        <div class="col-md-3">
            <?php echo $form->error($model, 'FechaFin'); ?>
        </div>
    </div>

    <div class="row" style="padding-bottom:15px;">
        <div class="col-md-offset-1 col-md-3">
        <?php echo $form->labelEx($model, 'AprobadoPor'); ?>
        </div>
        <div class="col-md-5">
        <?php echo $form->textField($model, 'AprobadoPor', array('size' => 45, 'maxlength' => 100)); ?>
        </div>
        <div class="col-md-3">
        <?php echo $form->error($model, 'AprobadoPor'); ?>
        </div>
    </div>

    <div class="row" style="padding-bottom:15px;">
        <div class="col-md-offset-1 col-md-3">
        <?php echo $form->labelEx($model, 'Texto1'); ?>
        </div>
        <div class="col-md-5">
        <?php echo $form->textArea($model, 'Texto1', array('size' => 45, 'maxlength' => 200, 'cols' => 50)); ?>
        </div>
        <div class="col-md-3">
        <?php echo $form->error($model, 'Texto1'); ?>
        </div>
    </div>

    <div class="row" style="padding-bottom:15px;">
        <div class="col-md-offset-1 col-md-3">
        <?php echo $form->labelEx($model, 'Texto2'); ?>
        </div>
        <div class="col-md-5">
        <?php echo $form->textArea($model, 'Texto2', array('size' => 45, 'maxlength' => 200, 'cols' => 50)); ?>
        </div>
        <div class="col-md-3">
        <?php echo $form->error($model, 'Texto2'); ?>
        </div>
    </div>

    <div class="row" style="padding-bottom:15px;">
        <div class="col-md-offset-1 col-md-3">
        <?php echo $form->labelEx($model, 'Texto3'); ?>
        </div>
        <div class="col-md-5">
        <?php echo $form->textArea($model, 'Texto3', array('size' => 45, 'maxlength' => 350, 'cols' => 50)); ?>
        </div>
        <div class="col-md-3">
        <?php echo $form->error($model, 'Texto3'); ?>
        </div>
    </div>

    <div class="alert alert-error" id="alert2">
        <strong style="color:red;">Oh snap!</strong>
    </div>
    
    <div class="row" style="padding-bottom:15px;">
        <div class="col-md-offset-1 col-md-3">
        <?php echo $form->labelEx($model, 'FechaInicioPostulaciones'); ?>
        </div>
        <div class="col-md-5">
        <?php echo $form->textField($model, 'FechaInicioPostulaciones'); ?>
        </div>
        <div class="col-md-3">
        <?php echo $form->error($model, 'FechaInicioPostulaciones'); ?>
        </div>
    </div>

    <div class="row" style="padding-bottom:15px;">
        <div class="col-md-offset-1 col-md-3">
        <?php echo $form->labelEx($model, 'FechaFinPostulaciones'); ?>
        </div>
        <div class="col-md-5">
        <?php echo $form->textField($model, 'FechaFinPostulaciones'); ?>
        </div>
        <div class="col-md-3">
        <?php echo $form->error($model, 'FechaFinPostulaciones'); ?>
        </div>
    </div>

    <div class="row" style="padding-bottom:15px;">
        <div class="col-md-offset-1 col-md-3">
        <?php echo $form->labelEx($model, 'Email'); ?>
        </div>
        <div class="col-md-5">
        <?php echo $form->textField($model, 'Email', array('size' => 45, 'maxlength' => 100)); ?>
        </div>
        <div class="col-md-3">
        <?php echo $form->error($model, 'Email'); ?>
        </div>
    </div>
    
    <div class="row" style="padding-bottom:15px;">
        <div class="col-md-offset-1 col-md-3">
        <?php echo $form->labelEx($model, 'Estado'); ?>
        </div>
        <div class="col-md-5">
        <?php echo $form->dropDownList($model, 'Estado', array(1 => 'Activo', 0 => 'Inactivo')); ?>
        </div>
        <div class="col-md-3">
        <?php echo $form->error($model, 'Estado'); ?>
        </div>
    </div>
    
    <div class="row" style="padding-bottom:15px;">
        <div class="col-md-offset-1 col-md-3">
        <?php echo $form->labelEx($model, 'Logotipo'); ?>
        </div>
        <div class="col-md-5">
        <?php echo $form->fileField($model, 'Logotipo', array('size' => 45, 'maxlength' => 50)); ?>
        </div>
        <div class="col-md-3">
        <?php echo $form->error($model, 'Logotipo'); ?>
        </div>
    </div>

    <div class="row" style="padding-bottom:15px;">
        <div class="col-md-offset-4">
            <div class="row buttons">
                <?php echo CHtml::submitButton($model->isNewRecord ? 'Crear' : 'Guardar'); ?>
            </div>
        </div>
    </div>
    

<?php $this->endWidget(); ?>

</div><!-- form -->