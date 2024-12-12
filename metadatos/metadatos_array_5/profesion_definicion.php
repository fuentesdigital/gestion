<?php
global $tabla;
$this->array_data[$tabla.'_definicion']['id'.$tabla.'_tipo'] = 'primaria1_auto';
$this->array_data[$tabla.'_definicion'][$tabla.'_tipo'] = 'inputunico_ppal';
$this->array_data[$tabla.'_definicion']['idTipoocupacion_tipo'] = 'foranea1';
$this->array_data[$tabla.'_definicion']['orden_tipo'] = 'inputcorto';
$this->array_data[$tabla.'_definicion']['estado_tipo'] = 'sino';
$this->array_data[$tabla.'_definicion']['id'.$tabla.'_rotulo'] = 'C&oacute;digo de la Profesi&oacute;n u Oficio';
$this->array_data[$tabla.'_definicion'][$tabla.'_rotulo'] = 'Profesi&oacute;n u Oficio';
$this->array_data[$tabla.'_definicion']['idTipoocupacion_rotulo'] = 'Tipo de Profesi&oacute;n u Oficio';
$this->array_data[$tabla.'_definicion']['orden_rotulo'] = 'Orden';
$this->array_data[$tabla.'_definicion']['estado_rotulo'] = 'Activo?';
?>
