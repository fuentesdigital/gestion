<?php
$parametros_arr['campo'] = $campo;
$parametros_arr['campo_valor'] = '';
$parametros_arr['rotulo'] = $rotulo;
$parametros_arr['insertar'] = '1';
$parametros_arr['read_only'] = false;
$parametros_arr['script_code'] = '';
$parametros_arr['boton_agregar'] = '';
$parametros_arr['evento_str'] = '';
$parametros_arr['ubicacionInferior'] = '';
$this->fila_de_datos_str .= $this->asignar_control('select', $parametros_arr);
?>