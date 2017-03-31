<?php
/* @var $this RegionesController */
/* @var $model Regiones */
/* @var $form CActiveForm */
?>

<script src="<?php echo Yii::app()->request->baseUrl; ?>/js/jquery-1.10.2.min.js"></script>

<div class="form">

    <?php
    $form = $this->beginWidget('CActiveForm', array(
        'id' => 'regiones-form',
        // Please note: When you enable ajax validation, make sure the corresponding
        // controller action is handling ajax validation correctly.
        // There is a call to performAjaxValidation() commented in generated controller code.
        // See class documentation of CActiveForm for details on this.
        'enableAjaxValidation' => false,
    ));
    ?>

    <div class="row" style="padding-bottom:15px;">
        <div class="col-md-offset-1">
            <p class="note">Campos con <span class="required">*</span> son obligatorios.</p>
        </div>
    </div>

    <div class="row">
        <div class="col-md-offset-1 col-md-3">
            <?php echo $form->labelEx($model, 'Nombre'); ?>
        </div>
        <div class="col-md-5">
            <?php echo $form->textField($model, 'Nombre', array('size' => 60, 'maxlength' => 100)); ?>
        </div>
        <div class="col-md-3">
            <?php echo $form->error($model, 'Nombre'); ?>
        </div>
    </div>

    <div class="row">
        <div class="col-md-offset-1 col-md-3">
            <?php echo $form->labelEx($model, 'CodEleccion'); ?>
        </div>
        <div class="col-md-5">
            <?php echo $form->textField($model, 'CodEleccion'); ?>
        </div>
        <div class="col-md-3">
            <?php echo $form->error($model, 'CodEleccion'); ?>
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