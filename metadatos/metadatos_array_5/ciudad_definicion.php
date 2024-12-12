<?php
global $tabla;
$this->array_data[$tabla.'_definicion']['id'.$tabla.'_tipo'] = 'primaria1_auto';
$this->array_data[$tabla.'_definicion']['idPais_tipo'] = 'foranea1';
$this->array_data[$tabla.'_definicion'][$tabla.'_tipo'] = 'input_ppal';
$this->array_data[$tabla.'_definicion']['orden_tipo'] = 'inputcorto';
$this->array_data[$tabla.'_definicion']['estado_tipo'] = 'sino';
$this->array_data[$tabla.'_definicion']['id'.$tabla.'_rotulo'] = 'C&oacute;digo del Ciudad';
$this->array_data[$tabla.'_definicion']['idPais_rotulo'] = 'Pa&iacute;s';
$this->array_data[$tabla.'_definicion'][$tabla.'_rotulo'] = $tabla;
$this->array_data[$tabla.'_definicion']['orden_rotulo'] = 'Orden';
$this->array_data[$tabla.'_definicion']['estado_rotulo'] = 'Activo?';
?>
