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
                <div class="row">
                    <div class="col-md-12">
                        <h2 style="text-align:center;">Control Voto F&iacute;sico</h2>
                    </div>
                </div>
                <div class="row" style="padding-top:1.2em;font-size:1.5em;">
                    <div class="col-md-offset-1 col-md-11" style="padding-bottom:10px;">
                        <span>Ingrese la c&eacute;dula o el n&uacute;mero de documento</span>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-offset-1 col-md-11">
                        <label>
                            <input type="text" id="document" name="document" size="60" />&nbsp;&nbsp;
                            <button class="btn btn-darkblue-alt" id="search">
                                Buscar
                            </button>
                        </label>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-offset-1 col-md-10">
                        <span class="dysplay_error" style="font-size:1.5em;color:red;display:none;">
                            Por favor, ingrese un n&uacute;mero de documento v&aacute;lido.
                        </span>
                    </div>
                </div>
                <div class="row" style="padding-top:1.5em;">
                    <div class="col-md-offset-1 col-md-10">
                        <div id="information"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
