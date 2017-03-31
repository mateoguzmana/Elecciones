<div class="pageheader">
    <h2>
        <a style="text-decoration: none;" class="salirRegiones">
            <img src="images/home.png" class="cursorpointer" 
                 style="width: 38px; margin-right: 15px; margin-left: 15px;"/> 
        </a>
        Regiones<span></span></h2>      
</div> 

<div class="contentpanel">
    <div class="panel-heading">
        <div class="widget widget-blue">
            <div class="widget-content">
                <div class="row">
                    <div class="col-md-offset-5 col-md-2">
                        <button class="btn btn-darkblue" style="width:180px;height:40px;">
                            Agregar Regiones
                        </button>
                    </div>
                </div>
<?php
$this->widget('zii.widgets.grid.CGridView', array(
    'id' => 'regiones-grid',
    'dataProvider' => $model->search(),
    'filter'=>$model,
    'columns' => array(
        'Nombre',
        array(
            'name' => 'codEleccion.Descripcion',
            'header' => 'Nombre Elección',
            'value' => '$data->codEleccion->Descripcion',
            'filter' => CHtml::activeTextField($model, 'Eleccion'),
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
                    'url' => 'Yii::app()->createUrl("regiones/update", array("IdRegion"=>$data->primaryKey))',
                ),
                'delete' => array
                    (
                    'label' => 'Borrar',
                    'imageUrl' => Yii::app()->request->baseUrl . '/images/icon_delete.png',
                    'url' => 'Yii::app()->createUrl("regiones/delete", array("IdRegion"=>$data->primaryKey))',
                ),
            ),
        ),
    ),
));
?>
        </div>
    </div>

</div>

<div class="modal fade" id="_alertSalirUsuarios" tabindex="-2" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" data-backdrop="static" data-keyboard="false"> 
    <div class="modal-dialog modal-dialog-message">
        <div class="modal-content">
            <div class="modal-header">

                <h5 class="modal-title" id=""></h5>
            </div>
            <div class="modal-body">
                  <div class="row">
                    <div class="col-sm-2">      			
                        <span class="fa fa-exclamation-triangle" style="font-size: 40px; color: orange;"></span>
                    </div>
                    <div class="col-sm-10">
                        <p class="text-modal-body"></p>
                    </div>
                </div>

            </div>
            <div class="modal-footer">                 
                <a href="index.php?r=Site/Inicio" class="btn btn-danger">Si</a>    
                <button data-dismiss="modal" class="btn btn-danger" type="button">No</button>    
            </div>
        </div><!-- modal-content -->
    </div><!-- modal-dialog -->
</div><!-- modal -->


</div>
