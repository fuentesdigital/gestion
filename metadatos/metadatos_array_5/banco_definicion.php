<?php
global $tabla;
$this->array_data[$tabla.'_definicion']['idBanco_tipo'] = 'primaria1_auto';
$this->array_data[$tabla.'_definicion'][$tabla.'_tipo'] = 'inputunico_ppal';
$this->array_data[$tabla.'_definicion']['orden_tipo'] = 'inputcorto';
$this->array_data[$tabla.'_definicion']['estado_tipo'] = 'sino';
$this->array_data[$tabla.'_definicion']['idBanco_rotulo'] = 'C&oacute;digo del Banco';
$this->array_data[$tabla.'_definicion'][$tabla.'_rotulo'] = $tabla;
$this->array_data[$tabla.'_definicion']['orden_rotulo'] = 'Orden';
$this->array_data[$tabla.'_definicion']['estado_rotulo'] = 'Activo?';
?>
