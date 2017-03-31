<div class="pageheader">
    <h2>
        <a style="text-decoration: none;" class="salirElecciones">
            <img src="images/home.png" class="cursorpointer" 
                 style="width: 38px; margin-right: 15px; margin-left: 15px;"/> 
        </a>
        Elecciones<span></span></h2>      
</div> 

<div class="contentpanel">
    <div class="panel-heading">
        <div class="widget widget-blue">
            <div class="widget-content">
                <div class="row">
                    <div class="col-md-offset-5 col-md-2">
                        <button class="btn btn-darkblue" style="width:180px;height:40px;" id="addElecciones">
                            Agregar Elecciones
                        </button>
                    </div>
                </div>
<?php
$this->widget('zii.widgets.grid.CGridView', array(
    'id' => 'entregadores-grid',
    'dataProvider' => $model->search(),
    'filter' => $model,
    'columns' => array(
        'Descripcion',
        'FechaInicio',
        'FechaFin',
        'Texto1',
        'Texto2',
        'Texto3',
        array(
            'name' => 'Estado',
            'header' => 'Estado',
            'value' => 'Elecciones::getListState($data->Estado)',
            'filter' => Elecciones::getListState(),
        ),
        array(
            'header' => 'Opciones',
            'class' => 'CButtonColumn',
            'template' => '{update}{delete}',
            'buttons' => array
                (
                'update' => array
                    (
                    'label' => 'Actualizar',
                    'imageUrl' => Yii::app()->request->baseUrl . '/images/icon_edit.png',
                    'url' => 'Yii::app()->createUrl("elecciones/update", array("IdEleccion"=>$data->IdEleccion))',
                ),
                'delete' => array
                    (
                    'label' => 'Borrar',
                    'imageUrl' => Yii::app()->request->baseUrl . '/images/icon_delete.png',
                    'url' => 'Yii::app()->createUrl("elecciones/delete", array("IdEleccion"=>$data->IdEleccion))',
                ),
            ),
        ),
    ),
));
?>
        </div>
    </div>

</div>

<?php $this->renderPartial('//mensajes/_alertSalirUsuarios'); ?>

</div>


<?php
/*
$this->widget('zii.widgets.grid.CGridView', array(
        'id'=>'entregadores-grid',
	'dataProvider'=>$dataProvider,
        'filter'=>$model,
	'columns'=>array(
		'Descripcion',
		'FechaInicio',
		'FechaFin',
                'Texto1',
                'Texto2',
                'Texto3',
                array(
                    'class'=>'CButtonColumn',
                    'template'=>'{update} {delete}',
                    'buttons'=>array(
                        'update' => array(
                            'url'=>'$this->grid->controller->createUrl("/elecciones/ajaxUpdate", array("IdEleccion"=>$data->primaryKey))',
                            'options'=>array('class'=>'for-update')
                        ),
                        'delete' => array(
                            'url'=>'$this->grid->controller->createUrl("/elecciones/ajaxDelete", array("IdEleccion"=>$data->primaryKey))',
                            'options'=>array('class'=>'for-delete')
                        ),
                    ),
                ),
	),
));
*/