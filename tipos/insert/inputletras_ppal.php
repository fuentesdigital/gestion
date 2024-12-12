<?php
$parametros_arr = array();
$campo_val = "'" . $campo . "'";
$tabla_val = "'" . $tabla . "'";
$parametros_arr['script_code'] = '';
$parametros_arr['class_line'] = 'tr1';
$parametros_arr['class_ctrl'] = 'input_text';
$parametros_arr['size_ctrl'] = '32';
$parametros_arr['maxlength'] = '';
$parametros_arr['campo_valor'] = '';
$parametros_arr['rotulo'] = $rotulo;
$parametros_arr['campo'] = $campo;
$parametros_arr['evento_str'] = '  onkeypress="return es_letras(event,0);" ';
$parametros_arr['read_only'] = false;
$this->fila_de_datos_str .= $this->asignar_control('input', $parametros_arr);
?>