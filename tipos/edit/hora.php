<?php
$campo_valor_arr = array();
$campo_valor_arr = explode(':', $campo_valor);
$campo_valor_hora = $campo_valor_arr[0];
$campo_valor_minutos = $campo_valor_arr[1];
$campo_valor_ampm = date('A');
$parametros_arr['script_code'] = '';
$parametros_arr['class_line'] = 'tr1';
$parametros_arr['class_ctrl'] = 'input_corto';
$parametros_arr['size_ctrl'] = '32';
$parametros_arr['campo_valor'] = '';
$parametros_arr['rotulo'] = $rotulo;
$parametros_arr['campo'] = $campo;
$parametros_arr['evento_str'] = '';
$parametros_arr['campo_valor_hora'] = $campo_valor_hora;
$parametros_arr['campo_valor_minutos'] = $campo_valor_minutos;
$parametros_arr['campo_valor_ampm'] = $campo_valor_ampm;
$parametros_arr['read_only'] = false;
$this->fila_de_datos_str .= $this->asignar_control('hora', $parametros_arr);
?>
