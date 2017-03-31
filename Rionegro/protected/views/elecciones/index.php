<?php
/* @var $this EleccionesController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Elecciones',
);

$this->menu=array(
	array('label'=>'Create Elecciones', 'url'=>array('create')),
	array('label'=>'Manage Elecciones', 'url'=>array('admin')),
);
?>

<h1>Elecciones</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
