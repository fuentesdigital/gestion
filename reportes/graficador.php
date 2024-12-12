<?php

//$data_title = $option_name_array[$codigo_seleccionado];
$data_title = '';

$graph = new graficos;
$graph->bwidth = 22;
$graph->bt_total = 'TOTAL'; 
$graph->showtotals = 0;
$graph->precision = PRECISION_DECIMAL;


$graph->DiagramBar($legend_x, $legend_y, $data, $data_title);

$body_lista_rpt .= $graph->grafica_out;

?>
