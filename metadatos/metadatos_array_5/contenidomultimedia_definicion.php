<?php
global $tabla;
$this->array_data[$tabla.'_definicion']['id'.$tabla.'_tipo'] = 'primaria1_auto';
$this->array_data[$tabla.'_definicion'][$tabla.'_tipo'] = 'inputunico_ppal';
$this->array_data[$tabla.'_definicion']['idSeccionmultimedia_tipo'] = 'foranea1';
$this->array_data[$tabla.'_definicion']['contenidohtml_tipo'] = 'textarea';
$this->array_data[$tabla.'_definicion']['estado_tipo'] = 'sino';
$this->array_data[$tabla.'_definicion'][$tabla.'detalle_tipo'] = 'grid1';
$this->array_data[$tabla.'_definicion']['id'.$tabla.'_rotulo'] = 'C&oacute;digo del Contenido';
$this->array_data[$tabla.'_definicion'][$tabla.'_rotulo'] = 'T&iacute;tulo del Contenido';
$this->array_data[$tabla.'_definicion']['idSeccionmultimedia_rotulo'] = 'Secci&oacute;n Multimedia';
$this->array_data[$tabla.'_definicion']['contenidohtml_rotulo'] = 'Contenido';
$this->array_data[$tabla.'_definicion']['estado_rotulo'] = 'Activo?';
$this->array_data[$tabla.'_definicion'][$tabla.'detalle_rotulo'] = 'Archivos Adicionales';
?>
