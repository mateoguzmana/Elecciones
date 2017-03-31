<div class="pageheader">
    <h2>
        <a style="text-decoration:none;" class="salirvotacion">
            <img src="images/home.png" class="cursorpointer" 
                 style="width:38px;margin-right:15px;margin-left:15px;"/> 
        </a>
        <?php echo strtoupper($eleccion['Descripcion']); ?><span></span></h2>      
</div> 

<div class="contentpanel">
    <div class="panel-body" style="min-height:1000px;">
        <div class="panel-heading">
            <div id="reportes">
                <div align="center">
                    <button class="btn btn-darkblue" onclick="generarGraficos()" style="height:50px;width:200px;">
                        <li class="glyphicon glyphicon-pencil"></li> Ver Estad&iacute;sticas
                    </button>
                </div>
                <br>
                <br>
                <div class="enunciado" style="background-color:#4863A0;width:100%;text-align:center;">
                    <p style="font-weight:bold;color:#FFFFFF;padding:10px 30px;font-size:medium;">Zonas</p>
                </div>
                <div class="table-responsive">
                    <table class="table table-bordered" id="tblZonas">
                        <thead>
                            <tr style="background-color:#4863A0;">
                                <th class="text-center">
                                    <font size="3" color="black">Zona</font>
                                </th>
                                <th class="text-center">
                                    <font size="3" color="black">Todo</font>
                                    <input type="checkbox" id="checkAll"> 
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($zonas as $zona): ?>
                                <tr>
                                    <td>
                                        <?php echo $zona['Nombre']; ?>
                                    </td>
                                    <td class="text-center">
                                        <input type="checkbox" value="<?php echo $zona['IdRegion']; ?>">
                                    </td> 
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <?php $this->renderPartial('//mensajes/_alertConfirmation'); ?>
</div>