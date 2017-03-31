<?php
$sufragantes = $totalVotos;
$porcentajeGlobal = round($suffragettes * 100 / $totalUsuarios, 2);
$porcentajeElectronicos = round(($votosElectronicos - $votosBlanco) * 100 / $totalUsuarios, 2);
$porcentajeInactivos = round($votosInactivos * 100 / $totalUsuarios, 2);
$porcentajeBlanco = round($votosBlanco * 100 / $totalUsuarios, 2);
$porcentajeFisicos = round($votosFisicos * 100 / $totalUsuarios, 2);
$porcentajeNulos = round($votosNulos * 100 / $totalUsuarios, 2);
?>
<div class="pageheader">
    <h2>
        <a style="text-decoration:none;" class="salirvotacion">
            <img src="images/home.png" class="cursorpointer"
                 style="width:38px;margin-right:15px;margin-left:15px;"/>
        </a>
<?php echo strtoupper($eleccion['Descripcion']); ?><span></span></h2>
</div>

<?php

$labels = "";
$seriesOne = "";
$seriesTwo = "";
for ($i=0; $i<count($regiones); $i++):
    $labels .= '{"label": "' . $regiones[$i]['Nombre'] . '"},';
    //$seriesOne .= '{"value": "' . $detalleVotos[$i]['sufragantes'] . '","link": "index.php?r=votacion/reportegeneral&zone=' . $detalleNoVotos[$i]['CodZona'] . '"},';
    //$seriesTwo .= '{"value": "' . $detalleNoVotos[$i]['novoto'] . '","link": "index.php?r=votacion/reportegeneral&zone=' . $detalleNoVotos[$i]['CodZona'] . '"},';
    $seriesOne .= '{"value": "' . $suffragettes . '","link": "index.php?r=votacion/reportegeneral&zone=' . $detalleNoVotos[$i]['CodZona'] . '"},';
    $seriesTwo .= '{"value": "' . ($totalUsuarios-$suffragettes) . '","link": "index.php?r=votacion/reportegeneral&zone=' . $detalleNoVotos[$i]['CodZona'] . '"},';
endfor;

?>

<div class="contentpanel">
    <div class="panel-body" style="min-height:1000px;">
        <div class="panel-heading">
            <div class="row">
                <div class="col-md-12">
                    <div style="text-align:right;padding-right:2.8em;">
                        <span style="font-size:1.2em;color:#000000;">
                            Fecha Generaci&oacute;n Reporte: <?=date('Y-m-d H:i:s');?>
                        </span>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <h2 style="text-align:center;color:#4863A0;">
                        <?=strtoupper($eleccion['Descripcion']);?>
                    </h2>
                </div>
            </div>
            <div class="row" style="padding-top:30px;">
                <div class="col-md-6">
                    <table class="table table-bordered">
                        <tr>
                            <td style="background-color:#BFBFBF;">
                                Potencial Sufragantes
                            </td>
                            <td class="text-center" style="background-color:#DBEEF4;">
                                <?=$totalUsuarios;?>
                            </td>
                            <td class="text-center" style="background-color:#B9CDE5;">

                            </td>
                        </tr>
                        <tr>
                            <td style="background-color:#BFBFBF;">
                                Total Votos
                            </td>
                            <td class="text-center" style="background-color:#DBEEF4;">
                                <?=$sufragantes;?>
                            </td>
                            <td class="text-center" style="background-color:#B9CDE5;">

                            </td>
                        </tr>
                        <tr>
                            <td style="background-color:#BFBFBF;">
                                Porcentaje Participaci&oacute;n
                            </td>
                            <td class="text-center" style="background-color:#DBEEF4;">

                            </td>
                            <td class="text-center" style="background-color:#B9CDE5;">
                                <?=$porcentajeGlobal . "%";?>
                            </td>
                        </tr>
                        <tr>
                            <td style="background-color:#BFBFBF;">
                               Total Participantes
                            </td>
                            <td class="text-center" style="background-color:#DBEEF4;">
                                <?=$suffragettes;?>
                            </td>
                            <td class="text-center" style="background-color:#B9CDE5;">

                            </td>
                        </tr>
                    </table>
                </div>
                <div class="col-md-6">
                    <table class="table table-bordered">
                        <tr>
                            <td style="background-color:#BFBFBF;width:45%;">
                                Votos Electr&oacute;nicos
                            </td>
                            <td class="text-center" style="background-color:#DBEEF4;">
                                <?=$votosElectronicos;?>
                            </td>
                            <!--<td class="text-center" style="background-color:#B9CDE5;">
                                <?=$porcentajeElectronicos . "%";?>
                            </td>-->
                        </tr>
                        <tr>
                            <td style="background-color:#BFBFBF;">
                                Usuarios Inactivos Por Voto F&iacute;sico
                            </td>
                            <td class="text-center" style="background-color:#DBEEF4;">
                                <?=$votosInactivos;?>
                            </td>
                            <!--<td class="text-center" style="background-color:#B9CDE5;">
                                <?=$porcentajeInactivos . "%";?>
                            </td>-->
                        </tr>
                        <tr>
                            <td style="background-color:#BFBFBF;">
                                Votos F&iacute;sicos
                            </td>
                            <td class="text-center" style="background-color:#DBEEF4;">
                                <?=$votosFisicos;?>
                            </td>
                            <!--<td class="text-center" style="background-color:#B9CDE5;">
                                <?=$porcentajeFisicos . "%";?>
                            </td>-->
                        </tr>
                        <tr>
                            <td style="background-color:#BFBFBF;">
                                Votos en Blanco
                            </td>
                            <td class="text-center" style="background-color:#DBEEF4;">
                                <?=$votosBlanco;?>
                            </td>
                            <!--<td class="text-center" style="background-color:#B9CDE5;">
                                <?=$porcentajeBlanco . "%";?>
                            </td>-->
                        </tr>
                        <tr>
                            <td style="background-color:#BFBFBF;">
                                Votos Nulos
                            </td>
                            <td class="text-center" style="background-color:#DBEEF4;">
                                <?=$votosNulos;?>
                            </td>
                            <!--<td class="text-center" style="background-color:#B9CDE5;">
                                <?=$porcentajeNulos . "%";?>
                            </td>-->
                        </tr>
                    </table>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6" id="3dBar"></div>
                <div class="col-md-6" id="3dPie"></div>
            </div>
            <div class="text-center" style="font-size:1.5em;">
                Para ver los detalles, por favor haga click sobre la barra de la zona que desea consultar.
            </div>
            <div class="row">
                <div class="col-md-12" id="chartContainer"></div>
            </div>
        </div>
    </div>
<?php $this->renderPartial('//mensajes/_alertConfirmation'); ?>
</div>
<script type="text/javascript">
    $(document).ready(function () {
        FusionCharts.ready(function (FusionCharts) {
            var mychart = new FusionCharts({
                type: 'msbar3d',
                renderAt: "chartContainer",
                width: '1000',
                height: '300',
                dataFormat: 'json',
                dataSource: {
                    "chart": {
                        "caption": "Detallado Votación",
                        "yAxisname": "Cantidad Votos",
                        "paletteColors": "#0000FF,#1AAF5D",
                        "bgColor": "#FFFFFF",
                        "legendBorderAlpha": "0",
                        "legendBgAlpha": "0",
                        "legendShadow": "0",
                        "placevaluesInside": "1",
                        "valueFontColor": "#000000",
                        "alignCaptionWithCanvas": "1",
                        "showHoverEffect": "1",
                        "canvasBgColor": "#FFFFFF",
                        "canvasbgAlpha": "100",
                        "showCanvasBase": "1",
                        "canvasBaseColor": "AAAAAA",
                        "canvasBaseDepth": "10",
                        "showcanvasbg": "0",
                        "captionFontSize": "14",
                        "subcaptionFontSize": "14",
                        "subcaptionFontBold": "0",
                        "divlineColor": "#CFC7C7",
                        "divLineDashed": "1",
                        "divLineDashLen": "1",
                        "divLineGapLen": "1",
                        "showAlternateHGridColor": "0",
                        "toolTipColor": "#000000",
                        "toolTipBorderThickness": "0",
                        "toolTipBgColor": "#FFFFFF",
                        "toolTipBgAlpha": "100",
                        "toolTipBorderRadius": "2",
                        "toolTipPadding": "5",
                        "formatNumberScale":'0',
                        "formatNumber":'0',
                        "yAxisMaxValue": 2100,
                    },
                    "categories": [
                        {
                            "category": [<?php echo $labels; ?>]
                        }
                    ],
                    "dataset": [
                        {
                            "seriesname": "Sufragantes",
                            "data": [<?php echo $seriesOne; ?>]
                        },
                        {
                            "seriesname": "Sin Votar",
                            "data": [<?php echo $seriesTwo; ?>]
                        }
                    ],
                    "styles": {
                        "definition": [
                            {
                                "name": "myCaptionAnim",
                                "type": "animation",
                                "param": "_y",
                                "easing": "Bounce",
                                "start": "0",
                                "duration": "10"
                            }
                        ],
                        "application": [
                            {
                                "toobject": "Caption",
                                "styles": "myCaptionAnim"
                            }
                        ]
                    }
                }
            });
            mychart.render();
        });

        FusionCharts.ready(function (FusionCharts) {
            var mychart = new FusionCharts({
                type: 'column3d',
                renderAt: "3dBar",
                width: '400',
                height: '400',
                dataFormat: 'json',
                dataSource: {
                    "chart": {
                        "caption": "Votación General",
                        "yaxisname": "Votos",
                        "bgcolor": "#FFFFFF",
                        "showalternatehgridcolor": "0",
                        "showvalues": "1",
                        "labeldisplay": "WRAP",
                        "divlinecolor": "#CCCCCC",
                        "divlinealpha": "70",
                        "useroundedges": "1",
                        "canvasbgcolor": "#F2F2F2,#FFFFFF",
                        "canvasbasecolor": "#CCCCCC",
                        "showcanvasbg": "0",
                        "animation": "0",
                        "palettecolors": "#0000FF,#FF0000,#f8bd19,#e44a00,#33bdda",
                        "showborder": "0",
                        "formatNumberScale":'0',
                        "formatNumber":'0',
                        "numbersuffix":"%"
                    },
                    "data": [
                        {
                            "label": "Sin Votar",
                            "value": "<?php echo 100 - $porcentajeGlobal; ?>",
                        },
                        {
                            "label": "Sufragantes",
                            "value": "<?php echo $porcentajeGlobal; ?>"
                        }
                    ]
                }
            });
            mychart.render();
        });

        FusionCharts.ready(function () {
            var demographicsChart = new FusionCharts({
                type: 'pie3d',
                renderAt: '3dPie',
                width: '450',
                height: '300',
                dataFormat: 'json',
                dataSource: {
                    "chart": {
                        "caption": "Estadística",
                        "startingAngle": "0",
                        "showLabels": "0",
                        "showLegend": "1",
                        "enableMultiSlicing": "0",
                        "slicingDistance": "5",
                        "showPercentValues": "1",
                        "showPercentInTooltip": "0",
                        "plotTooltext": "$label<br>Total : $datavalue",
                        "theme": "fint",
                        "formatNumberScale":'0',
                        "formatNumber":'0',
                    },
                    "data": [{
                        "label": "Votos Electrónicos",
                        "value": "<?=$suffragettes-$votosBlanco;?>",
                        "color": "B4045F"
                    }, {
                        "label": "Usuarios Inactivos Por Voto Físico",
                        "value": "<?=$votosInactivos;?>",
                        "color": "04B404"
                    }, {
                        "label": "Votos Físicos",
                        "value": "<?=$votosFisicos;?>",
                        "color": "FF0000"
                    }, {
                        "label": "Votos en Blanco",
                        "value": "<?=$votosBlanco;?>",
                        "color": "FF8000"
                    }, {
                        "label": "Votos Nulos",
                        "value": "<?=$votosNulos;?>",
                        "color": "6E6E6E"
                    }, {
                        "label": "Sin Votar",
                        "value": "<?=$totalUsuarios-$suffragettes-$votosInactivos;?>",
                        "color": "0000FF"
                    }]
                }
            });
            demographicsChart.render();
        });
    });
</script>
