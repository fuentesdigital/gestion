<?php
global $tabla;
$this->array_data[$tabla.'_definicion']['id'.$tabla.'_tipo'] = 'primaria1_auto';
$this->array_data[$tabla.'_definicion'][$tabla.'_tipo'] = 'inputunico_ppal';
$this->array_data[$tabla.'_definicion']['id'.$tabla.'1_tipo'] = 'foranea1';
$this->array_data[$tabla.'_definicion']['asesor_tipo'] = 'sino';
$this->array_data[$tabla.'_definicion']['orden_tipo'] = 'inputcorto';
$this->array_data[$tabla.'_definicion']['estado_tipo'] = 'sino';
$this->array_data[$tabla.'_definicion']['id'.$tabla.'_rotulo'] = 'C&oacute;digo del pais';
$this->array_data[$tabla.'_definicion']['id'.$tabla.'1_rotulo'] = $tabla.' o Departamento Superior';
$this->array_data[$tabla.'_definicion'][$tabla.'_rotulo'] = $tabla.' o Departamento';
$this->array_data[$tabla.'_definicion']['asesor_rotulo'] = 'Es Asesor?';
$this->array_data[$tabla.'_definicion']['orden_rotulo'] = 'Orden';
$this->array_data[$tabla.'_definicion']['estado_rotulo'] = 'Activo?';
?>
