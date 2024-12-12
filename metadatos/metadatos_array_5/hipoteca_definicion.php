<?php
global $tabla;
$this->array_data[$tabla.'_definicion']['id'.$tabla.'_tipo'] = 'primaria1_auto';
$this->array_data[$tabla.'_definicion']['idBanco_tipo'] = 'foranea1';
$this->array_data[$tabla.'_definicion'][$tabla.'_tipo'] = 'inputunico_ppal';
$this->array_data[$tabla.'_definicion']['fechainicio_tipo'] = 'fecha';
$this->array_data[$tabla.'_definicion']['intereses_tipo'] = 'textarea';
$this->array_data[$tabla.'_definicion']['monto_tipo'] = 'inputcortodinero';
$this->array_data[$tabla.'_definicion']['estado_tipo'] = 'sino';
$this->array_data[$tabla.'_definicion']['Historicodetalle_tipo'] = 'grid1';
$this->array_data[$tabla.'_definicion']['id'.$tabla.'_rotulo'] = 'C&oacute;digo del Hipoteca';
$this->array_data[$tabla.'_definicion']['idBanco_rotulo'] = 'Banco';
$this->array_data[$tabla.'_definicion'][$tabla.'_rotulo'] = $tabla.'';
$this->array_data[$tabla.'_definicion']['fechainicio_rotulo'] = 'Fecha de Inicio';
$this->array_data[$tabla.'_definicion']['intereses_rotulo'] = 'Comportamiento de los Intereses';
$this->array_data[$tabla.'_definicion']['monto_rotulo'] = 'Monto Contratado';
$this->array_data[$tabla.'_definicion']['estado_rotulo'] = $tabla.' Cerrada?';
$this->array_data[$tabla.'_definicion']['Historicodetalle_rotulo'] = 'Historico';
?>
