<?php
/* @var $this CandidatosController */
/* @var $model Candidatos */
/* @var $form CActiveForm */
?>

<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<div class="row">
		<?php echo $form->label($model,'IdCandidato'); ?>
		<?php echo $form->textField($model,'IdCandidato'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'CodEleccion'); ?>
		<?php echo $form->textField($model,'CodEleccion'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'CodRegion'); ?>
		<?php echo $form->textField($model,'CodRegion'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'FechaInscripcion'); ?>
		<?php echo $form->textField($model,'FechaInscripcion'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'NroRadicado'); ?>
		<?php echo $form->textField($model,'NroRadicado',array('size'=>20,'maxlength'=>20)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'Nombres'); ?>
		<?php echo $form->textField($model,'Nombres',array('size'=>60,'maxlength'=>100)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'Apellidos'); ?>
		<?php echo $form->textField($model,'Apellidos',array('size'=>60,'maxlength'=>100)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'Documento'); ?>
		<?php echo $form->textField($model,'Documento',array('size'=>50,'maxlength'=>50)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'Direccion'); ?>
		<?php echo $form->textField($model,'Direccion',array('size'=>50,'maxlength'=>50)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'Telefono'); ?>
		<?php echo $form->textField($model,'Telefono'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'Email'); ?>
		<?php echo $form->textField($model,'Email',array('size'=>60,'maxlength'=>100)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'Foto'); ?>
		<?php echo $form->textField($model,'Foto',array('size'=>50,'maxlength'=>50)); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Search'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->