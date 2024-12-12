<?php
global $tabla;
$this->array_data[$tabla.'_definicion']['id'.$tabla.'_tipo'] = 'primaria1_auto';
$this->array_data[$tabla.'_definicion']['idTipodemovimiento_tipo'] = 'foranea1';
$this->array_data[$tabla.'_definicion'][$tabla.'_tipo'] = 'inputunico_ppal';
$this->array_data[$tabla.'_definicion']['orden_tipo'] = 'inputcorto';
$this->array_data[$tabla.'_definicion']['estado_tipo'] = 'sino';
$this->array_data[$tabla.'_definicion']['id'.$tabla.'_rotulo'] = 'C&oacute;digo de la '.$tabla;
$this->array_data[$tabla.'_definicion']['idTipodemovimiento_rotulo'] = 'Tipo de '.$tabla;
$this->array_data[$tabla.'_definicion'][$tabla.'_rotulo'] = $tabla;
$this->array_data[$tabla.'_definicion']['orden_rotulo'] = 'Orden';
$this->array_data[$tabla.'_definicion']['estado_rotulo'] = 'Activo?';
?>
