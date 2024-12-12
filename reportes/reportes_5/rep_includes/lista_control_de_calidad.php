<?php

$option_name_array = array();
$select_reportes_str = '';

$option_name_array[] = 'Fechas Ingresadas en el Historial';
$option_name_array[] = 'Bitácora de Uso por Empleado';

$total_opciones = sizeof($option_name_array);
$total_opciones = sizeof($option_name_array);

$_lista_de_reportes = new lista_de_reportes();

$_lista_de_reportes->lista_de_reportes_view();

$body_ctrl_calidad .= $_utiles->squeeze($_lista_de_reportes->select_reportes_str);

?>

