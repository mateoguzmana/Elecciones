<?php
/* @var $this RegionesController */
/* @var $data Regiones */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('IdRegion')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->IdRegion), array('view', 'id'=>$data->IdRegion)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('Nombre')); ?>:</b>
	<?php echo CHtml::encode($data->Nombre); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('CodEleccion')); ?>:</b>
	<?php echo CHtml::encode($data->CodEleccion); ?>
	<br />


</div>