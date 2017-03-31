<?php
require_once ('jpgraph/jpgraph.php');
require_once ('jpgraph/jpgraph_bar.php');

$porcentajeVotos = round($totalVotos*100/$totalUsuarios, 2);
$porcentajeAbstinencia = 100 - $porcentajeVotos;

$datay=array($porcentajeAbstinencia,$porcentajeVotos);

//SIZE OF GRAPH
$width=500;
$height=400;

//SET THE BASIC PARAMETERS OF THE GRAPH
$graph = new Graph($width,$height);
$graph->SetScale('textlin');
$graph->graph_theme = null;
$graph->SetFrame(false);

$top = 60;
$bottom = 30;
$left = 40;
$right = 50;
$graph->Set90AndMargin($left,$right,$top,$bottom);

//NICE SHADOW
$graph->SetShadow();

//SETUPT LABELS
$lbl = array("Sin\nVotar","Sufragantes");
$graph->xaxis->SetTickLabels($lbl);

//LABEL ALIGN FOR X-AXIS
$graph->xaxis->SetLabelAlign('right','center','right');
$graph->xaxis->SetLabelAngle(90);

//LABEL ALIGN FOR Y-AXIS
$graph->yaxis->SetLabelAlign('center','bottom');

//TITLES
$graph->title->Set('Votación General');
$graph->title->SetMargin(12);

//CREATE A BAR POT
$bplot = new BarPlot($datay);
$bplot->value->Show();
$bplot->value->SetAlign('center');
$bplot->value->SetColor("black","darkred");
$bplot->value->SetFormat('%01.2f%%');
//$graph->value->SetFont(FF_FONT2,FS_BOLD);
$bplot->SetFillColor(array('red','blue'));
$bplot->SetWidth(0.5);
$bplot->SetYMin(0);
$graph->Add($bplot);
$graph->Stroke();
