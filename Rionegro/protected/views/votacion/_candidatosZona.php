<?php

session_start();
$_SESSION['zona'] = Yii::app()->user->_idZone;
$quantity = count($candidatos);
$count = 0;

?>

<div class="pageheader">
    <h2>
        <a style="text-decoration: none;" class="salirCandidatos">
            <img src="images/home.png" class="cursorpointer" style="width: 38px; margin-right: 15px; margin-left: 15px;"/> 
        </a>
        <?php echo strtoupper($eleccion['Descripcion']); ?><span></span></h2>      
</div>

<div class="contentpanel">
    <div class="panel-heading">
        <div class="widget widget-blue">
            <div class="widget-content">
                <form id="candidateToVote" method="POST" action="">
                    <input type="hidden" name="zone" id="zone" value="<?php echo Yii::app()->user->_idZone; ?>">
                    <input type="hidden" name="candidate" id="candidate">
                </form>
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
                $modulo = $cantidadCandidatos%4;
                $diferencia = $cantidadCandidatos - $modulo;
                ?>
                <table id="tbCandidatosZona">
                    <?php for ($i=0; $i<$cantidadCandidatos; $i+=4): ?>
                    <?php if ($i == $diferencia): ?>
                    <tr>
                        <td class="col-md-2">
                            <img src="<?php echo Yii::app()->request->baseUrl; ?>/Archivos/Fotos/<?php echo $candidatos[$count][$i]['Foto']; ?>" height="200" width="100%" />
                        </td>
                        <?php if ($modulo == 2): ?>
                        <td class="col-md-1 separateColumn"></td>
                        <td class="col-md-2">
                            <img src="<?php echo Yii::app()->request->baseUrl; ?>/Archivos/Fotos/<?php echo $candidatos[$count][$i+1]['Foto']; ?>" height="200" width="100%" />
                        </td>
                        <?php elseif ($modulo == 3): ?>
                        <td class="col-md-1 separateColumn"></td>
                        <td class="col-md-2">
                            <img src="<?php echo Yii::app()->request->baseUrl; ?>/Archivos/Fotos/<?php echo $candidatos[$count][$i+1]['Foto']; ?>" height="200" width="100%" />
                            </label>
                        </td>
                        <td class="col-md-1 separateColumn"></td>
                        <td class="col-md-2">
                            <img src="<?php echo Yii::app()->request->baseUrl; ?>/Archivos/Fotos/<?php echo $candidatos[$count][$i+2]['Foto']; ?>" height="200" width="100%" />
                        </td>
                        <?php endif; ?>
                    </tr>
                    <tr>
                        <td class="col-md-2">
                            <label>
                                <span style="font-size:1.2em;">
                                    <?php
                                    if ($candidatos[$count][$i]['IdCandidato'] == 89):
                                        echo $candidatos[$count][$i]['Nombres'];
                                    else:
                                        echo $candidatos[$count][$i]['IdCandidato'] . " - " . $candidatos[$count][$i]['Nombres'];
                                    endif;
                                    ?>
                                </span><br>
                                <input type="radio" value="<?php echo $candidatos[$count][$i]['IdCandidato']; ?>" name="candidato">
                            </label>
                        </td>
                        <?php if ($modulo == 2): ?>
                        <td class="col-md-1 separateColumn"></td>
                        <td class="col-md-2">
                            <label>
                                <span style="font-size:1.2em;">
                                    <?php
                                    if ($candidatos[$count][$i+1]['IdCandidato'] == 89):
                                        echo $candidatos[$count][$i+1]['Nombres'];
                                    else:
                                        echo $candidatos[$count][$i+1]['IdCandidato'] . " - " . $candidatos[$count][$i+1]['Nombres'];
                                    endif;
                                    ?>
                                </span><br>
                                <input type="radio" value="<?php echo $candidatos[$count][$i+1]['IdCandidato']; ?>" name="candidato">
                            </label>
                        </td>
                        <?php elseif ($modulo == 3): ?>
                        <td class="col-md-1 separateColumn"></td>
                        <td class="col-md-2">
                            <label>
                                <span style="font-size:1.2em;">
                                    <?php echo $candidatos[$count][$i+1]['IdCandidato'] . " - " . $candidatos[$count][$i+1]['Nombres']; ?>
                                </span><br>
                                <input type="radio" value="<?php echo $candidatos[$count][$i+1]['IdCandidato']; ?>" name="candidato">
                            </label>
                        </td>
                        <td class="col-md-1 separateColumn"></td>
                        <td class="col-md-2">
                            <label>
                                <span style="font-size:1.2em;">
                                    <?php
                                    if ($candidatos[$count][$i+2]['IdCandidato'] == 89):
                                        echo $candidatos[$count][$i+2]['Nombres'];
                                    else:
                                        echo $candidatos[$count][$i+2]['IdCandidato'] . " - " . $candidatos[$count][$i+2]['Nombres'];
                                    endif;
                                    ?>
                                </span><br>
                                <input type="radio" value="<?php echo $candidatos[$count][$i+2]['IdCandidato']; ?>" name="candidato">
                            </label>
                        </td>
                        <?php endif; ?>
                    </tr>
                    <?php else: ?>
                    <tr>
                        <td class="col-md-2">
                            <img src="<?php echo Yii::app()->request->baseUrl; ?>/Archivos/Fotos/<?php echo $candidatos[$count][$i]['Foto']; ?>" height="200" width="100%" />
                        </td>
                        <td class="col-md-1 separateColumn"></td>
                        <td class="col-md-2">
                            <img src="<?php echo Yii::app()->request->baseUrl; ?>/Archivos/Fotos/<?php echo $candidatos[$count][$i+1]['Foto']; ?>" height="200" width="100%" />
                        </td>
                        <td class="col-md-1 separateColumn"></td>
                        <td class="col-md-2">
                            <img src="<?php echo Yii::app()->request->baseUrl; ?>/Archivos/Fotos/<?php echo $candidatos[$count][$i+2]['Foto']; ?>" height="200" width="100%" />
                        </td>
                        <td class="col-md-1 separateColumn"></td>
                        <td class="col-md-2">
                            <img src="<?php echo Yii::app()->request->baseUrl; ?>/Archivos/Fotos/<?php echo $candidatos[$count][$i+3]['Foto']; ?>" height="200" width="100%" />
                        </td>
                    </tr>
                    <tr>
                        <td class="col-md-2">
                            <label>
                                <span style="font-size:1.2em;">
                                    <?php echo $candidatos[$count][$i]['IdCandidato'] . " - " . $candidatos[$count][$i]['Nombres']; ?>
                                </span><br>
                                <input type="radio" value="<?php echo $candidatos[$count][$i]['IdCandidato']; ?>" name="candidato">
                            </label>
                        </td>
                        <td class="col-md-1 separateColumn"></td>
                        <td class="col-md-2">
                            <label>
                                <span style="font-size:1.2em;">
                                    <?php echo $candidatos[$count][$i+1]['IdCandidato'] . " - " . $candidatos[$count][$i+1]['Nombres']; ?>
                                </span><br>
                                <input type="radio" value="<?php echo $candidatos[$count][$i+1]['IdCandidato']; ?>" name="candidato">
                            </label>
                        </td>
                        <td class="col-md-1 separateColumn"></td>
                        <td class="col-md-2">
                            <label>
                                <span style="font-size:1.2em;">
                                    <?php echo $candidatos[$count][$i+2]['IdCandidato'] . " - " . $candidatos[$count][$i+2]['Nombres']; ?>
                                </span><br>
                                <input type="radio" value="<?php echo $candidatos[$count][$i+2]['IdCandidato']; ?>" name="candidato">
                            </label>
                        </td>
                        <td class="col-md-1 separateColumn"></td>
                        <td class="col-md-2">
                            <label>
                                <span style="font-size:1.2em;">
                                    <?php echo $candidatos[$count][$i+3]['IdCandidato'] . " - " . $candidatos[$count][$i+3]['Nombres']; ?>
                                </span><br>
                                <input type="radio" value="<?php echo $candidatos[$count][$i+3]['IdCandidato']; ?>" name="candidato">
                            </label>
                        </td>
                    </tr>
                    <tr>
                        <td class="separateRow"></td>
                    </tr>
                    <?php endif; ?>
                    <?php endfor; ?>
                </table>
                <?php $count++; ?>
                <?php endforeach; ?>
                <div style="text-align:center;padding-top:15px;">
                    <button id="vote" class="btn-default-alt">
                        <img src="<?php echo Yii::app()->request->baseUrl; ?>/images/votar.png" />
                    </button>
                </div>
            </div>
        </div>
    </div>
    <?php $this->renderPartial('//mensajes/_alertConfirmation'); ?>
    <?php $this->renderPartial('//mensajes/_alertVerification'); ?>
    <?php $this->renderPartial('//mensajes/_alertNumVotes'); ?>
</div>
