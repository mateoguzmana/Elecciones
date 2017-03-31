<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <script src="js/jquery-1.10.2.min.js"></script>
        <title>Cooperen rionegro</title>
        <link rel="shortcut icon" href="images/favicon.ico" />
        <link href="css/style.default.css" rel="stylesheet">
        <link href="css/jquery.datatables.css" rel="stylesheet">
        <link href="css/cooperen.css" rel="stylesheet">
        <link rel="stylesheet" href="css/jquery.tagsinput.css" />
        <link rel="stylesheet" href="css/colorpicker.css" />

        <!-- Latest compiled and minified CSS -->
        <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/bootstrap.min.css">
        <!-- DatePicker CSS -->
        <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/datepicker.css">

        <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!--[if lt IE 9]>
        <script src="js/html5shiv.js"></script>
        <script src="js/respond.min.js"></script>
        <![endif]-->
        <style>
            #alert1, #alert2 {
                display: none;
            }
        </style>
    </head>

    <body data-ruta='<?php echo Yii::app()->request->baseUrl; ?>'>
        <!-- Preloader -->
        <div id="preloader">
            <div id="status"><img alt="" src="images/loader.gif"></div>
        </div>
        <section>
            <div class="leftpanel">
                <div class="logopanel text-center">
                    <h1><img src="images/Logocootramed.png" style="width:200px; height: 50px;"/></h1>
                </div><!-- logopanel -->
                <div class="leftpanelinner">
                    <h5 class="sidebartitle">Menu</h5>
                    <ul class="nav nav-pills nav-stacked nav-bracket">
<!--                        <li class="">
                            <a href="index.php?r=Site/Inicio">
                                <i class="fa fa-home"></i>
                                <span>Inicio</span>
                            </a>
                        </li>
                        <li class="">
                            <a href="index.php?r=Elecciones/Index">
                                <i class="fa fa-book"></i>
                                <span>Elecciones</span>
                            </a>
                        </li>
                        <li class="">
                            <a href="index.php?r=Regiones/Index">
                                <i class="fa fa-book"></i>
                                <span>Regiones</span>
                            </a>
                        </li>-->
                        <?php if(!Yii::app()->user->isGuest): ?>
                            <?php if(!isset(Yii::app()->user->_idProfile)): ?>
                                <li class="">
                                    <a href="index.php?r=Candidatos/Index">
                                        <i class="fa fa-book"></i>
                                        <span>Candidatos</span>
                                    </a>
                                </li>
                            <?php else: ?>
                                <?php if(Yii::app()->user->_idProfile == 1): ?>
                                <li class="">
                                    <a href="index.php?r=Elecciones/Index">
                                        <i class="fa fa-book"></i>
                                        <span>Elecciones</span>
                                    </a>
                                </li>
                                <li class="">
                                    <a href="index.php?r=Regiones/Index">
                                        <i class="fa fa-book"></i>
                                        <span>Regiones</span>
                                    </a>
                                </li>
                                <li class="">
                                    <a href="index.php?r=votacion/reportegeneral">
                                        <i class="fa fa-book"></i>
                                        <span>Reporte Votación</span>
                                    </a>
                                </li>
                                <?php elseif(Yii::app()->user->_idProfile == 2): ?>
                                <li class="">
                                    <a href="index.php?r=votacion/reportegeneral">
                                        <i class="fa fa-book"></i>
                                        <span>Reporte Votación</span>
                                    </a>
                                </li>
                                <?php endif; ?>
                            <?php endif; ?>
                        <?php endif; ?>
                    </ul>
                </div><!-- leftpanelinner -->
            </div><!-- leftpanel -->
            <div class="mainpanel">
                <div class="headerbar">
                    <a class="menutoggle"><i class="fa fa-bars"></i></a>
                    <form class="searchform" action="http://themepixels.com/demo/webpage/bracket/index.html" method="post">
                        <input type="text" class="form-control" name="keyword" placeholder="Buscar" />
                    </form>
                    <div class="header-right">
                        <ul class="headermenu">
                            <li>
                                <div class="btn-group">
                                    <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown">
                                        <i class="glyphicon glyphicon-user"></i>
                                        <?php
                                        if(!Yii::app()->user->isGuest):
                                            print(Yii::app()->user->_name);
                                        endif;
                                        ?>
                                        <span class="caret"></span>
                                    </button>
                                    <ul class="dropdown-menu dropdown-menu-usermenu pull-right">
                                        <li><a href="index.php?r=site/logout"><i class="glyphicon glyphicon-log-out"></i> Salir</a></li>
                                    </ul>
                                </div>
                            </li>
                        </ul>
                    </div><!-- header-right -->
                </div><!-- headerbar -->
                <?php echo $content; ?>
            </div><!-- mainpanel -->
        </section>

        <script src="js/jquery-migrate-1.2.1.min.js"></script>
        <script src="js/jquery-ui-1.10.3.min.js"></script>
        <script src="js/bootstrap.min.js"></script>
        <script src="js/jquery.sparkline.min.js"></script>
        <script src="js/toggles.min.js"></script>
        <script src="js/jquery.cookies.js"></script>
        <script src="js/jquery.datatables.min.js"></script>
        <script src="js/chosen.jquery.min.js"></script>        
        <script src="js/bootstrap-wizard.min.js"></script>
        <script src="js/jquery.validate.min.js"></script>
        <script src="js/custom.js"></script>
        <script src="js/highcharts.js"></script>
        <script src="js/exporting.js"></script>
        <script src="js/highcharts-3d.js"></script>
        <script src="js/bootstrap-datepicker.js"></script>
        <script src="js/fusioncharts/fusioncharts.js"></script>
        <script src="js/fusioncharts/themes/fusioncharts.theme.fint.js"></script>
</body>
</html>
