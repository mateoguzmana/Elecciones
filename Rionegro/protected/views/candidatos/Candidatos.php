<div class="pageheader">
    <h2>
        <a style="text-decoration: none;" class="salirCandidatos">
            <img src="images/home.png" class="cursorpointer" 
                 style="width: 38px; margin-right: 15px; margin-left: 15px;"/> 
        </a>
        Candidatos<span></span></h2>      
</div> 

<div class="contentpanel">
    <div class="panel-heading">
        <div class="widget widget-blue">
            <div class="widget-content">
                <div class="row">
                    <div class="col-md-offset-5 col-md-2">
                        <button class="btn btn-darkblue" style="width:180px;height:40px;" id="showExcel">
                            Exportar Excel
                        </button>
                    </div>
                </div>
<?php
$this->widget('zii.widgets.grid.CGridView', array(
    'id' => 'candidatos-grid',
    'dataProvider' => $model->search(),
    'filter' => $model,
    'enablePagination'=>true,
    'columns' => array(
        'IdCandidato',
        'Nombres',
	'Documento',
	'Direccion',
	'Telefono',
	array(
		'name'=>'t.Email',
		'header'=>'Email',
		'value'=>'$data->Email',
		'filter' => CHtml::activeTextField($model, 'Email'),
	),
	'NroRadicado',
	'FechaInscripcion',
	'Celular',
	array(
		'name'=>'codEleccion.Descripcion',
		'header'=>'Elección',
		'value'=>'$data->codEleccion->Descripcion',
	        'filter' => CHtml::activeTextField($model, 'Eleccion'),
	),
	array(
		'name'=>'codRegion.Nombre',
		'header'=>'Región',
		'value'=>'$data->codRegion->Nombre',
	        'filter' => CHtml::activeTextField($model, 'Region'),
	),
	array(
		'name'=>'codBarrio.NombreBarrio',
		'header'=>'Barrio o Municipio',
		'value'=>'$data->codBarrio->NombreBarrio',
	        'filter' => CHtml::activeTextField($model, 'Barrio'),
	),
        array(
            'header' => 'Foto',
            'class' => 'CButtonColumn',
            'template' => '{foto}',
            'buttons' => array
            (
                'foto' => array
                (
                    'label' => 'Foto',
                    'imageUrl' => Yii::app()->request->baseUrl . '/images/camera.png',
                    'url' => '$data->Foto',
                    'options' => array(
                        'onclick' => 'js:showPicture($(this).attr("href"));return false;',
                    ),
                ),
            ),
        ),
//        array(
//            'header' => 'Opciones',
//            'class' => 'CButtonColumn',
//            'template' => '{update}{delete}',
//            'buttons' => array
//                (
//                'update' => array
//                    (
//                    'label' => 'Actualizar',
//                    'imageUrl' => Yii::app()->request->baseUrl . '/images/icon_edit.png',
//                    'url' => 'Yii::app()->createUrl("candidatos/update", array("IdCandidato"=>$data->IdCandidato))',
//                ),
//                'delete' => array
//                    (
//                    'label' => 'Borrar',
//                    'imageUrl' => Yii::app()->request->baseUrl . '/images/icon_delete.png',
//                    'url' => 'Yii::app()->createUrl("candidatos/delete", array("IdCandidato"=>$data->IdCandidato))',
//                ),
//            ),
//        ),
    ),
));
?>
        </div>
    </div>

</div>

<?php $this->renderPartial('//mensajes/_alertSalirUsuarios'); ?>
<?php $this->renderPartial('//mensajes/_alertFotos'); ?>

</div>

