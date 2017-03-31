<?php
header("Refresh:10; url=http://www.example.com/page2.php", true, 303);
?>
<div class="pageheader">
    <h2>
        <a style="text-decoration: none;" class="salirCandidatos">
            <img src="images/home.png" class="cursorpointer" 
                 style="width: 38px; margin-right: 15px; margin-left: 15px;"/> 
        </a>
        Votos No Registrados<span></span></h2>      
</div> 

<div class="contentpanel">
    <div class="panel-heading">
        <div class="widget widget-blue">
            <div class="widget-content">
                <div class="row">
                    <div class="col-md-12">
                        <h2 style="text-align:center;">Sus votos no fueron registrados</h2>
                        <h3 style="text-align:center;color:#0088CC;">
                            Esto se debe a que el usuario <?=Yii::app()->user->_name;?> ya cuenta registr&oacute; votos 
                            para la zona <?=$nombreZona;?> en el sistema de votaci&oacute;n.
                        </h3>
                        <h4 class="text-center">Por favor aguarde, ser&aacute; redireccionado en 10 segundos...</h4>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
$(document).ready(function (){
    setTimeout(function () {
        window.location.href = "index.php?r=votacion/registrarvotacionfisica";
    }, 10000);
});
</script>
