<?php
if ($campo_valor != '') {
    $parametros_arr['campo'] = $campo;
    $parametros_arr['campo_valor'] = $campo_valor;
    $parametros_arr['rotulo'] = $rotulo;
    $parametros_arr['insertar'] = '';
    $parametros_arr['class_ctrl'] = 'tr3';
    $parametros_arr['read_only'] = true;
    $this->fila_de_datos_str .= $this->asignar_control('select', $parametros_arr);
}
?>
