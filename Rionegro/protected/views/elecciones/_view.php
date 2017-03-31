<?php
/* @var $this EleccionesController */
/* @var $data Elecciones */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('IdEleccion')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->IdEleccion), array('view', 'id'=>$data->IdEleccion)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('Descripcion')); ?>:</b>
	<?php echo CHtml::encode($data->Descripcion); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('FechaInicio')); ?>:</b>
	<?php echo CHtml::encode($data->FechaInicio); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('FechaFin')); ?>:</b>
	<?php echo CHtml::encode($data->FechaFin); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('Logotipo')); ?>:</b>
	<?php echo CHtml::encode($data->Logotipo); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('AprobadoPor')); ?>:</b>
	<?php echo CHtml::encode($data->AprobadoPor); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('Estado')); ?>:</b>
	<?php echo CHtml::encode($data->Estado); ?>
	<br />

	<?php /*
	<b><?php echo CHtml::encode($data->getAttributeLabel('Texto1')); ?>:</b>
	<?php echo CHtml::encode($data->Texto1); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('Texto2')); ?>:</b>
	<?php echo CHtml::encode($data->Texto2); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('Texto3')); ?>:</b>
	<?php echo CHtml::encode($data->Texto3); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('FechaInicioPostulaciones')); ?>:</b>
	<?php echo CHtml::encode($data->FechaInicioPostulaciones); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('FechaFinPostulaciones')); ?>:</b>
	<?php echo CHtml::encode($data->FechaFinPostulaciones); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('Email')); ?>:</b>
	<?php echo CHtml::encode($data->Email); ?>
	<br />

	*/ ?>

</div>