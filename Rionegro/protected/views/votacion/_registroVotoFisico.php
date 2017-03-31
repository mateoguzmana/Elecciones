<?php

$quantity = count($candidatos);
$count = 0;

?>

<div class="pageheader">
    <h2>
        <a style="text-decoration: none;" class="salirCandidatos">
            <img src="images/home.png" class="cursorpointer" style="width:38px;margin-right:15px;margin-left:15px;" />
        </a>
        <?php echo strtoupper($eleccion['Descripcion']); ?><span></span></h2>      
</div>

<div class="contentpanel">
    <div class="panel-heading">
        <div class="widget widget-blue">
            <div class="widget-content">
                <form id="registerFisicVotes" method="POST" action="">
                    <input type="hidden" name="zone" id="zone">
                    <input type="hidden" name="candidates[]" id="candidates">
                    <input type="hidden" name="quantities[]" id="quantities">
                </form>
                <div class="row">
                    <div class="col-md-12 text-center">
                        <span style="font-size:1.5em;color:#CC0000;">
                            El registro de los votos f&iacute;sicos se debe realizar por zona electoral, 
                            una vez guardados los datos no se podr&aacute; realizar modificaciones.
                        </span>
                    </div>
                </div>
                <?php foreach ($nombreZona as $zona): ?>
                <div class="row">
                    <div class="col-md-12">
                        <h2 style="text-align:center;font-family:'Times New Roman';">
                            Zona Electoral: <?php echo ucfirst($zona['Nombre']); ?>
                        </h2>
                    </div>
                </div>
                <?php
                $cantidadCandidatos = count($candidatos[$count]);
                $modulo = $cantidadCandidatos%3;
                $diferencia = $cantidadCandidatos - $modulo;
                ?>
                <table id="tbCandidatosZona">
                    <?php for ($i=0; $i<$cantidadCandidatos; $i+=3): ?>
                    <?php if ($i == $diferencia): ?>
                    <tr>
                        <td class="col-md-2">
                            <img src="<?php echo Yii::app()->request->baseUrl; ?>/Archivos/Fotos/<?php echo $candidatos[$count][$i]['Foto']; ?>" height="200" width="80%" />
                        </td>
                        <?php if ($modulo == 2): ?>
                        <td class="col-md-1 separateColumn"></td>
                        <td class="col-md-2">
                            <img src="<?php echo Yii::app()->request->baseUrl; ?>/Archivos/Fotos/<?php echo $candidatos[$count][$i+1]['Foto']; ?>" height="200" width="80%" />
                        </td>
                        <?php endif; ?>
                    </tr>
                    <tr>
                        <td class="col-md-2">
                            <label>
                                <span style="font-size:1.2em;">
                                    <?php
                                    if ($candidatos[$count][$i]['IdCandidato'] == 80 || $candidatos[$count][$i]['IdCandidato'] == 0):
                                        echo $candidatos[$count][$i]['Nombres'];
                                    else:
                                        echo $candidatos[$count][$i]['IdCandidato'] . " - " . $candidatos[$count][$i]['Nombres'];
                                    endif;
                                    ?>
                                </span><br>
                                <span style="color:red;">VOTOS FISICOS</span>
                                <input type="text" onkeypress="return event.charCode >= 48 && event.charCode <= 57" id="<?php echo $candidatos[$count][$i]['IdCandidato']; ?>" name="cantidad_<?=$zona['IdRegion']?>">
                            </label>
                        </td>
                        <?php if ($modulo == 2): ?>
                        <td class="col-md-1 separateColumn"></td>
                        <td class="col-md-2">
                            <label>
                                <span style="font-size:1.2em;">
                                    <?php
                                    if ($candidatos[$count][$i+1]['IdCandidato'] == 80 || $candidatos[$count][$i+1]['IdCandidato'] == 0):
                                        echo $candidatos[$count][$i+1]['Nombres'];
                                    else:
                                        echo $candidatos[$count][$i+1]['IdCandidato'] . " - " . $candidatos[$count][$i+1]['Nombres'];
                                    endif;
                                    ?>
                                </span><br>
                                <span style="color:red;">VOTOS FISICOS</span>
                                <input type="text"  onkeypress="return event.charCode >= 48 && event.charCode <= 57" id="<?php echo $candidatos[$count][$i+1]['IdCandidato']; ?>" name="cantidad_<?=$zona['IdRegion']?>">
                            </label>
                        </td>
                        <?php endif; ?>
                    </tr>
                    <?php else: ?>
                    <tr>
                        <td class="col-md-2">
                            <img src="<?php echo Yii::app()->request->baseUrl; ?>/Archivos/Fotos/<?php echo $candidatos[$count][$i]['Foto']; ?>" height="200" width="80%" />
                        </td>
                        <td class="col-md-1 separateColumn"></td>
                        <td class="col-md-2">
                            <img src="<?php echo Yii::app()->request->baseUrl; ?>/Archivos/Fotos/<?php echo $candidatos[$count][$i+1]['Foto']; ?>" height="200" width="80%" />
                        </td>
                        <td class="col-md-1 separateColumn"></td>
                        <td class="col-md-2">
                            <img src="<?php echo Yii::app()->request->baseUrl; ?>/Archivos/Fotos/<?php echo $candidatos[$count][$i+2]['Foto']; ?>" height="200" width="80%" />
                        </td>
                    </tr>
                    <tr>
                        <td class="col-md-2">
                            <label>
                                <span style="font-size:1.2em;">
                                    <?php
                                    if ($candidatos[$count][$i]['IdCandidato'] == 80 || $candidatos[$count][$i]['IdCandidato'] == 0):
                                        echo $candidatos[$count][$i]['Nombres'];
                                    else:
                                        echo $candidatos[$count][$i]['IdCandidato'] . " - " . $candidatos[$count][$i]['Nombres'];
                                    endif;
                                    ?>
                                </span><br>
                                <span style="color:red;">VOTOS FISICOS</span>
                                <input type="text" onkeypress="return event.charCode >= 48 && event.charCode <= 57" id="<?php echo $candidatos[$count][$i]['IdCandidato']; ?>" name="cantidad_<?=$zona['IdRegion']?>">
                            </label>
                        </td>
                        <td class="col-md-1 separateColumn"></td>
                        <td class="col-md-2">
                            <label>
                                <span style="font-size:1.2em;">
                                    <?php
                                    if ($candidatos[$count][$i+1]['IdCandidato'] == 80 || $candidatos[$count][$i+1]['IdCandidato'] == 0):
                                        echo $candidatos[$count][$i+1]['Nombres'];
                                    else:
                                        echo $candidatos[$count][$i+1]['IdCandidato'] . " - " . $candidatos[$count][$i+1]['Nombres'];
                                    endif;
                                    ?>
                                </span><br>
                                <span style="color:red;">VOTOS FISICOS</span>
                                <input type="text" onkeypress="return event.charCode >= 48 && event.charCode <= 57" id="<?php echo $candidatos[$count][$i+1]['IdCandidato']; ?>" name="cantidad_<?=$zona['IdRegion']?>">
                            </label>
                        </td>
                        <td class="col-md-1 separateColumn"></td>
                        <td class="col-md-2">
                            <label>
                                <span style="font-size:1.2em;">
                                    <?php
                                    if ($candidatos[$count][$i+2]['IdCandidato'] == 80 || $candidatos[$count][$i+2]['IdCandidato'] == 0):
                                        echo $candidatos[$count][$i+2]['Nombres'];
                                    else:
                                        echo $candidatos[$count][$i+2]['IdCandidato'] . " - " . $candidatos[$count][$i+2]['Nombres'];
                                    endif;
                                    ?>
                                </span><br>
                                <span style="color:red;">VOTOS FISICOS</span>
                                <input type="text" onkeypress="return event.charCode >= 48 && event.charCode <= 57" id="<?php echo $candidatos[$count][$i+2]['IdCandidato']; ?>" name="cantidad_<?=$zona['IdRegion']?>">
                            </label>
                        </td>
                    </tr>
                    <tr>
                        <td class="separateRow"></td>
                    </tr>
                    <?php endif; ?>
                    <?php endfor; ?>
                </table>
                <div class="text-center" style="padding-bottom:20px;padding-top:20px;">
                    <button class="btn btn-danger" onclick="sendFisicVotes('<?=$zona['IdRegion']?>');">Guardar</button>
                </div>
                <?php $count++; ?>
                <?php endforeach; ?>
            </div>
        </div>
    </div>
    <?php $this->renderPartial('//mensajes/_alertConfirmation'); ?>
    <?php $this->renderPartial('//mensajes/_alertVerification'); ?>
</div>
