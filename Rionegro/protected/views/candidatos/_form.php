<?php
/* @var $this CandidatosController */
/* @var $model Candidatos */
/* @var $form CActiveForm */

//$data = CHtml::listData(Category::model()->findAllBySql(
//                        'SELECT * from category where isnull(parent_id)'), 
//                        'id', 'name');

//http://stackoverflow.com/questions/11758189/yii-cgridview-filter-with-relations

?>

<script src="<?php echo Yii::app()->request->baseUrl; ?>/js/jquery-1.10.2.min.js"></script>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'candidatos-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>false,
	'htmlOptions' => array('enctype' => 'multipart/form-data'),
)); ?>

        <div class="row" style="padding-bottom:15px;">
        <div class="col-md-offset-1">
            <p class="note">Campos con <span class="required">*</span> son obligatorios.</p>
        </div>
	</div>

	<div class="row" style="padding-bottom:15px;">
		<div class="col-md-offset-1 col-md-3">
		<?php echo $form->labelEx($model,'Nombres'); ?>
		</div>
		<div class="col-md-5">
		<?php echo $form->textField($model,'Nombres',array('size'=>45,'maxlength'=>100)); ?>
		</div>
		<div class="col-md-3">
		<?php echo $form->error($model,'Nombres'); ?>
		</div>
	</div>

	<div class="row" style="padding-bottom:15px;">
		<div class="col-md-offset-1 col-md-3">
		<?php echo $form->labelEx($model,'Documento'); ?>
		</div>
		<div class="col-md-5">
		<?php echo $form->textField($model,'Documento',array('size'=>45,'maxlength'=>50)); ?>
		</div>
		<div class="col-md-3">
		<?php echo $form->error($model,'Documento'); ?>
		</div>
	</div>

	<div class="row" style="padding-bottom:15px;">
		<div class="col-md-offset-1 col-md-3">
		<?php echo $form->labelEx($model,'Direccion'); ?>
		</div>
		<div class="col-md-5">
		<?php echo $form->textField($model,'Direccion',array('size'=>45,'maxlength'=>50)); ?>
		</div>
		<div class="col-md-3">
		<?php echo $form->error($model,'Direccion'); ?>
		</div>
	</div>

	<div class="row" style="padding-bottom:15px;">
		<div class="col-md-offset-1 col-md-3">
		<?php echo $form->labelEx($model,'Telefono'); ?>
		</div>
		<div class="col-md-5">
		<?php echo $form->textField($model,'Telefono',array('size'=>45,'maxlength'=>50)); ?>
		</div>
		<div class="col-md-3">
		<?php echo $form->error($model,'Telefono'); ?>
		</div>
	</div>

	<div class="row" style="padding-bottom:15px;">
		<div class="col-md-offset-1 col-md-3">
		<?php echo $form->labelEx($model,'Email'); ?>
		</div>
		<div class="col-md-5">
		<?php echo $form->textField($model,'Email',array('size'=>45,'maxlength'=>100)); ?>
		</div>
		<div class="col-md-3">
		<?php echo $form->error($model,'Email'); ?>
		</div>
	</div>

	<div class="row" style="padding-bottom:15px;">
		<div class="col-md-offset-1 col-md-3">
		<?php echo $form->labelEx($model,'Celular'); ?>
		</div>
		<div class="col-md-5">
		<?php echo $form->textField($model,'Celular',array('size'=>45,'maxlength'=>20)); ?>
		</div>
		<div class="col-md-3">
		<?php echo $form->error($model,'Celular'); ?>
		</div>
	</div>

	<div class="row" style="padding-bottom:15px;">
		<div class="col-md-offset-1 col-md-3">
		<?php echo $form->labelEx($model,'CodEleccion'); ?>
		</div>
		<div class="col-md-5">
		<?php echo $form->dropDownList($model,'CodEleccion',CHtml::listData(Elecciones::model()->findAll(),'IdEleccion','Nombre')); ?>
		</div>
		<div class="col-md-3">
		<?php echo $form->error($model,'CodEleccion'); ?>
		</div>
	</div>

	<div class="row" style="padding-bottom:15px;">
		<div class="col-md-offset-1 col-md-3">
		<?php echo $form->labelEx($model,'CodRegion'); ?>
		</div>
		<div class="col-md-5">
		<?php echo $form->dropDownList($model,'CodRegion',CHtml::listData(Regiones::model()->findAll(),'IdRegion','Nombre')); ?>
		</div>
		<div class="col-md-3">
		<?php echo $form->error($model,'CodRegion'); ?>
		</div>
	</div>

	<div class="row" style="padding-bottom:15px;">
		<div class="col-md-offset-1 col-md-3">
		<?php echo $form->labelEx($model,'CodBarrio'); ?>
		</div>
		<div class="col-md-5">
		<?php echo $form->dropDownList($model,'CodBarrio',CHtml::listData(Barrios::model()->findAll(),'IdBarrio','NombreBarrio')); ?>
		</div>
		<div class="col-md-3">
		<?php echo $form->error($model,'CodBarrio'); ?>
		</div>
	</div>

	<div class="row" style="padding-bottom:15px;">
		<div class="col-md-offset-1 col-md-3">
		<?php echo $form->labelEx($model,'Foto'); ?>
		</div>
		<div class="col-md-5">
		<?php echo $form->fileField($model,'Foto',array('types'=>'jpg, gif, png')); ?>
		</div>
		<div class="col-md-3">
		<?php echo $form->error($model,'Foto'); ?>
		</div>
	</div>

	<div class="row buttons">
		<div class="col-md-offset-4 col-md-4">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Crear' : 'Guardar'); ?>
		</div>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->
