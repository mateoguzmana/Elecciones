<?php

session_start();
if(isset($_SESSION['zona'])) {
    header('Location: index.php?r=votacion/elejirCandidato');
    exit();
}
else
{
?>

<div class="pageheader">
    <h2>
        <a style="text-decoration: none;" class="salirCandidatos">
            <img src="images/home.png" class="cursorpointer"
                 style="width: 38px; margin-right: 15px; margin-left: 15px;"/>
        </a>
        <?php echo strtoupper($eleccion['Descripcion']); ?><span></span></h2>      
</div>

<div class="contentpanel">
    <div class="panel-heading">
        <div class="widget widget-blue">
            <div class="widget-content">
                <form id="selectedZone" method="POST" action="">
                    <input type="hidden" name="zone" id="zone">
                </form>
                <div class="row">
                    <div class="col-md-12">
                        <h2 style="text-align:center;"><?php echo strtoupper($eleccion['Descripcion']); ?></h2>
                        <h3 style="text-align:center;color:#0088CC;">BIENVENIDO <?php echo Yii::app()->user->_name; ?></h3>
                    </div>
                </div>
                <div class="row" style="padding-top:30px;position:relative;">
                    <div class="col-md-offset-1 col-md-7">
                        <span style="font-size:20px;">
                            1. Seleccione la Zona Electoral en cual desea registrar su voto
                        </span>
                        <?php foreach ($regiones as $region): ?>
                        <div class="radio">
                            <label>
                                <input type="radio" value="<?php echo $region['IdRegion']; ?>" name="zona">
                                <span style="font-size:20px;"><?php echo $region['Nombre']; ?></span>
                            </label>
                        </div>
                        <?php endforeach; ?>
                    </div>
                    <div class="col-md-4" style="position:absolute;bottom:0;right:0;">
                        <button id="selectVotingArea" class="btn-default-alt">
                            <img src="<?php echo Yii::app()->request->baseUrl; ?>/images/seleccionZona.png" alt="Seleccionar Zona" />
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php $this->renderPartial('//mensajes/_alertConfirmation'); ?>
    <?php $this->renderPartial('//mensajes/_alertVerification'); ?>
</div>
<?php
}
