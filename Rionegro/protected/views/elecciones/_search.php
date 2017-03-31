<?php
/* @var $this EleccionesController */
/* @var $model Elecciones */
/* @var $form CActiveForm */
?>

<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<div class="row">
		<?php echo $form->label($model,'IdEleccion'); ?>
		<?php echo $form->textField($model,'IdEleccion'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'Descripcion'); ?>
		<?php echo $form->textField($model,'Descripcion',array('size'=>60,'maxlength'=>100)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'FechaInicio'); ?>
		<?php echo $form->textField($model,'FechaInicio'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'FechaFin'); ?>
		<?php echo $form->textField($model,'FechaFin'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'Logotipo'); ?>
		<?php echo $form->textField($model,'Logotipo',array('size'=>50,'maxlength'=>50)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'AprobadoPor'); ?>
		<?php echo $form->textField($model,'AprobadoPor',array('size'=>60,'maxlength'=>100)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'Estado'); ?>
		<?php echo $form->textField($model,'Estado'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'Texto1'); ?>
		<?php echo $form->textField($model,'Texto1',array('size'=>60,'maxlength'=>200)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'Texto2'); ?>
		<?php echo $form->textField($model,'Texto2',array('size'=>60,'maxlength'=>200)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'Texto3'); ?>
		<?php echo $form->textField($model,'Texto3',array('size'=>60,'maxlength'=>350)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'FechaInicioPostulaciones'); ?>
		<?php echo $form->textField($model,'FechaInicioPostulaciones'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'FechaFinPostulaciones'); ?>
		<?php echo $form->textField($model,'FechaFinPostulaciones'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'Email'); ?>
		<?php echo $form->textField($model,'Email',array('size'=>60,'maxlength'=>100)); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Search'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->