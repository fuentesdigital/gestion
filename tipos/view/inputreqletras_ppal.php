<?php
$parametros_arr = array();
$parametros_arr['script_code'] = '';
$parametros_arr['class_line'] = 'tr1';
$parametros_arr['class_ctrl'] = 'tr3';
$parametros_arr['size_ctrl'] = '32';
$parametros_arr['maxlength'] = '60';
$parametros_arr['campo_valor'] = $campo_valor;
$parametros_arr['rotulo'] = $rotulo;
$parametros_arr['campo'] = $campo;
$parametros_arr['evento_str'] = '';
$parametros_arr['evento_str'] .= '';
$parametros_arr['read_only'] = true;
$this->fila_de_datos_str .= $this->asignar_control('input', $parametros_arr);
?>
