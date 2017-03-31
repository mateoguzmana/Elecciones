<?php
/* @var $this CandidatosController */
/* @var $data Candidatos */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('IdCandidato')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->IdCandidato), array('view', 'id'=>$data->IdCandidato)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('CodEleccion')); ?>:</b>
	<?php echo CHtml::encode($data->CodEleccion); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('CodRegion')); ?>:</b>
	<?php echo CHtml::encode($data->CodRegion); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('FechaInscripcion')); ?>:</b>
	<?php echo CHtml::encode($data->FechaInscripcion); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('NroRadicado')); ?>:</b>
	<?php echo CHtml::encode($data->NroRadicado); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('Nombres')); ?>:</b>
	<?php echo CHtml::encode($data->Nombres); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('Apellidos')); ?>:</b>
	<?php echo CHtml::encode($data->Apellidos); ?>
	<br />

	<?php /*
	<b><?php echo CHtml::encode($data->getAttributeLabel('Documento')); ?>:</b>
	<?php echo CHtml::encode($data->Documento); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('Direccion')); ?>:</b>
	<?php echo CHtml::encode($data->Direccion); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('Telefono')); ?>:</b>
	<?php echo CHtml::encode($data->Telefono); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('Email')); ?>:</b>
	<?php echo CHtml::encode($data->Email); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('Foto')); ?>:</b>
	<?php echo CHtml::encode($data->Foto); ?>
	<br />

	*/ ?>

</div>