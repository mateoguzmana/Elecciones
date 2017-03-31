<?php
/* @var $this RegionesController */
/* @var $model Regiones */

$this->breadcrumbs=array(
	'Regiones'=>array('index'),
	$model->IdRegion,
);

$this->menu=array(
	array('label'=>'List Regiones', 'url'=>array('index')),
	array('label'=>'Create Regiones', 'url'=>array('create')),
	array('label'=>'Update Regiones', 'url'=>array('update', 'id'=>$model->IdRegion)),
	array('label'=>'Delete Regiones', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->IdRegion),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Regiones', 'url'=>array('admin')),
);
?>

<h1>View Regiones #<?php echo $model->IdRegion; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'IdRegion',
		'Nombre',
		'CodEleccion',
	),
)); ?>
