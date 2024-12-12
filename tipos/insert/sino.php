<?php
$parametros_arr = array();
$parametros_arr['script_code'] = '';
$parametros_arr['class_line'] = 'tr1';
$parametros_arr['class_ctrl'] = 'check1';
$parametros_arr['size_ctrl'] = '32';
$parametros_arr['campo_valor'] = '';
$parametros_arr['rotulo'] = $rotulo;
$parametros_arr['campo'] = $campo;
$parametros_arr['evento_str'] = '';
$parametros_arr['chequear_flag'] = '';
$parametros_arr['read_only'] = false;
$parametros_arr['campo_valor_si'] = ' checked="true" ';
$parametros_arr['campo_valor_no'] = '  ';
$this->fila_de_datos_str .= $this->asignar_control('sino', $parametros_arr);
?>