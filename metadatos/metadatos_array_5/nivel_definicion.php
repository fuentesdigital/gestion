<?php
global $tabla;
$this->array_data[$tabla.'_definicion']['id'.$tabla.'_tipo'] = 'primaria1_auto';
$this->array_data[$tabla.'_definicion'][$tabla.'_tipo'] = 'inputunico_ppal';
$this->array_data[$tabla.'_definicion']['Descripcion_tipo'] = 'input_ppal';
$this->array_data[$tabla.'_definicion']['estado_tipo'] = 'sino';
$this->array_data[$tabla.'_definicion'][$tabla.'detalle_tipo'] = 'grid1';
$this->array_data[$tabla.'_definicion']['id'.$tabla.'_rotulo'] = 'C&oacute;digo del '.$tabla;
$this->array_data[$tabla.'_definicion'][$tabla.'_rotulo'] = 'Nombre del '.$tabla;
$this->array_data[$tabla.'_definicion']['Descripcion_rotulo'] = 'Tipo del '.$tabla;
$this->array_data[$tabla.'_definicion']['estado_rotulo'] = 'Activo?';
$this->array_data[$tabla.'_definicion'][$tabla.'detalle_rotulo'] = 'Permisos por '.$tabla;
?>
