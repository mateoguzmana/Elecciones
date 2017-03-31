<?php
/* @var $this EleccionesController */
/* @var $model Elecciones */

$this->breadcrumbs=array(
	'Elecciones'=>array('index'),
	'Crear',
);

?>
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
                        <button class="btn btn-darkblue" style="width:180px;height:40px;" id="viewElecciones">
                            Listar Elecciones
                        </button>
                    </div>
                </div>
                <h2 style="text-align:center;">Crear Elecciones</h2>

                <?php $this->renderPartial('_form', array('model'=>$model)); ?>
                <?php $this->renderPartial('//mensajes/_alertSalirUsuarios'); ?>
            </div>
        </div>
    </div>
</div>