<?php
$campo_valor_anio = date('Y');
$campo_valor_mes = date('m');
$campo_valor_dia = date('d');
$parametros_arr = array();
$parametros_arr['script_code'] = '';
$parametros_arr['class_line'] = 'tr1';
$parametros_arr['class_ctrl'] = 'input_corto';
$parametros_arr['size_ctrl'] = '32';
$parametros_arr['campo_valor'] = '';
$parametros_arr['rotulo'] = $rotulo;
$parametros_arr['campo'] = $campo;
$parametros_arr['evento_str'] = '';
$parametros_arr['campo_valor_anio'] = $campo_valor_anio;
$parametros_arr['campo_valor_mes'] = $campo_valor_mes;
$parametros_arr['campo_valor_dia'] = $campo_valor_dia;
$parametros_arr['read_only'] = false;
$this->fila_de_datos_str .= $this->asignar_control('fecha', $parametros_arr);
?>