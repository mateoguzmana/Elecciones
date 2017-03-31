<?php
/* @var $this EleccionesController */
/* @var $model Elecciones */

$this->breadcrumbs=array(
	'Elecciones'=>array('index'),
	$model->IdEleccion,
);

$this->menu=array(
	array('label'=>'List Elecciones', 'url'=>array('index')),
	array('label'=>'Create Elecciones', 'url'=>array('create')),
	array('label'=>'Update Elecciones', 'url'=>array('update', 'id'=>$model->IdEleccion)),
	array('label'=>'Delete Elecciones', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->IdEleccion),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Elecciones', 'url'=>array('admin')),
);
?>

<h1>View Elecciones #<?php echo $model->IdEleccion; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'IdEleccion',
		'Descripcion',
		'FechaInicio',
		'FechaFin',
		'Logotipo',
		'AprobadoPor',
		'Estado',
		'Texto1',
		'Texto2',
		'Texto3',
		'FechaInicioPostulaciones',
		'FechaFinPostulaciones',
		'Email',
	),
)); ?>
