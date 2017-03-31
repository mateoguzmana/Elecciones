<?php
/* @var $this CandidatosController */
/* @var $model Candidatos */

$this->breadcrumbs=array(
	'Candidatoses'=>array('index'),
	$model->IdCandidato,
);

$this->menu=array(
	array('label'=>'List Candidatos', 'url'=>array('index')),
	array('label'=>'Create Candidatos', 'url'=>array('create')),
	array('label'=>'Update Candidatos', 'url'=>array('update', 'id'=>$model->IdCandidato)),
	array('label'=>'Delete Candidatos', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->IdCandidato),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Candidatos', 'url'=>array('admin')),
);
?>

<h1>View Candidatos #<?php echo $model->IdCandidato; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'IdCandidato',
		'CodEleccion',
		'CodRegion',
		'FechaInscripcion',
		'NroRadicado',
		'Nombres',
		'Apellidos',
		'Documento',
		'Direccion',
		'Telefono',
		'Email',
		'Foto',
	),
)); ?>
