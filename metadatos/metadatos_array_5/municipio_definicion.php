<?php
global $tabla;
$this->array_data[$tabla.'_definicion']['id'.$tabla.'_tipo'] = 'primaria1_auto';
$this->array_data[$tabla.'_definicion']['idDepartamento_tipo'] = 'foranea1';
$this->array_data[$tabla.'_definicion'][$tabla.'_tipo'] = 'input_ppal';
$this->array_data[$tabla.'_definicion']['orden_tipo'] = 'input';
$this->array_data[$tabla.'_definicion']['estado_tipo'] = 'sino';
$this->array_data[$tabla.'_definicion']['id'.$tabla.'_rotulo'] = 'C&oacute;digo del '.$tabla;
$this->array_data[$tabla.'_definicion']['idDepartamento_rotulo'] = 'Departamento';
$this->array_data[$tabla.'_definicion'][$tabla.'_rotulo'] = $tabla;
$this->array_data[$tabla.'_definicion']['orden_rotulo'] = 'Orden';
$this->array_data[$tabla.'_definicion']['estado_rotulo'] = 'Activo?';
?>
