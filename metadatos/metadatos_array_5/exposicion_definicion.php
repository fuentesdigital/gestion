<?php
global $tabla;	 	
$this->array_data[$tabla.'_definicion']['id'.$tabla.'_tipo'] = 'primaria1_auto';
$this->array_data[$tabla.'_definicion'][$tabla.'_tipo'] = 'inputunico_ppal';
$this->array_data[$tabla.'_definicion']['expositor_tipo'] = 'input';
$this->array_data[$tabla.'_definicion']['fechainicio_tipo'] = 'fecha';
$this->array_data[$tabla.'_definicion']['fechafin_tipo'] = 'fecha';
$this->array_data[$tabla.'_definicion']['estado_tipo'] = 'sino';
$this->array_data[$tabla.'_definicion']['id'.$tabla.'_rotulo'] = 'C&oacute;digo de la Exposici&oacute;n';
$this->array_data[$tabla.'_definicion'][$tabla.'_rotulo'] = 'Nombre de la Exposici&oacute;n';
$this->array_data[$tabla.'_definicion']['expositor_rotulo'] = 'Expositor';
$this->array_data[$tabla.'_definicion']['fechainicio_rotulo'] = 'Fecha de Inicio';
$this->array_data[$tabla.'_definicion']['fechafin_rotulo'] = 'Fecha de Finalizaci&oacute;n';
$this->array_data[$tabla.'_definicion']['estado_rotulo'] = $tabla.' Finalizada?';
?>
