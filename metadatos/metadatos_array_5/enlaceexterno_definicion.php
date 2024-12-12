<?php
global $tabla;	 	
$this->array_data[$tabla.'_definicion']['id'.$tabla.'_tipo'] = 'primaria1_auto';
$this->array_data[$tabla.'_definicion'][$tabla.'_tipo'] = 'inputunico_ppal';
$this->array_data[$tabla.'_definicion']['descripcionEnlace_tipo'] = 'input';
$this->array_data[$tabla.'_definicion']['link_tipo'] = 'input';
$this->array_data[$tabla.'_definicion']['estado_tipo'] = 'sino';
$this->array_data[$tabla.'_definicion']['id'.$tabla.'_rotulo'] = 'C&oacute;digo del Enlace';
$this->array_data[$tabla.'_definicion'][$tabla.'_rotulo'] = 'T&iacute;tulo del Enlace';
$this->array_data[$tabla.'_definicion']['descripcionEnlace_rotulo'] = 'Contenido';
$this->array_data[$tabla.'_definicion']['link_rotulo'] = 'Link &oacute; URL';
$this->array_data[$tabla.'_definicion']['estado_rotulo'] = 'Activo?';
?>
