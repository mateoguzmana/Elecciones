<div class="pageheader">
    <h2>
        <a style="text-decoration: none;" class="salirCandidatos">
            <img src="images/home.png" class="cursorpointer" 
                 style="width: 38px; margin-right: 15px; margin-left: 15px;"/> 
        </a>
        Voto Registrado<span></span></h2>      
</div> 

<div class="contentpanel">
    <div class="panel-heading">
        <div class="widget widget-blue">
            <div class="widget-content">
                <div class="row">
                    <div class="col-md-12">
                        <h2 style="text-align:center;">Voto registrado con &eacute;xito al candidato <?php print_r($candidatoVotado)?></h2>
                    </div>
                    <?php 
                        if($NumVotes!=0):
                    ?>
                    <div class="col-md-12">
                        <h2 style="text-align:center;">Señor usuario, recuerde que le quedan <?php print_r($NumVotes)?> votos disponibles.</h2>
                    </div>
                    <div class="col-md-12 text-center">
                        <a class="btn btn-primary" href="index.php?r=votacion/elejirCandidato">Votar ahora</a>
                        <a class="btn btn-danger" href="index.php?r=site/votacion">En otro momento</a>
                    </div>
                    <?php
                        endif;
                    ?>
                </div>
            </div>
        </div>
    </div>
</div>
