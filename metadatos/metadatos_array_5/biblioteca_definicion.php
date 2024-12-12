<?php
global $tabla;
$this->array_data[$tabla.'_definicion']['id'.$tabla.'_tipo'] = 'primaria1_auto';
$this->array_data[$tabla.'_definicion'][$tabla.'_tipo'] = 'inputunico_ppal';
$this->array_data[$tabla.'_definicion']['archivoDocumento_tipo'] = 'input';
$this->array_data[$tabla.'_definicion']['descripcion_tipo'] = 'input';
$this->array_data[$tabla.'_definicion']['link_tipo'] = 'input';
$this->array_data[$tabla.'_definicion']['fecha_tipo'] = 'fecha';
$this->array_data[$tabla.'_definicion']['estado_tipo'] = 'sino';
$this->array_data[$tabla.'_definicion']['id'.$tabla.'_rotulo'] = 'C&oacute;digo del Documento';
$this->array_data[$tabla.'_definicion'][$tabla.'_rotulo'] = 'Nombre del Documento';
$this->array_data[$tabla.'_definicion']['archivoDocumento_rotulo'] = 'Nombre del Archivo';
$this->array_data[$tabla.'_definicion']['descripcion_rotulo'] = 'Descripci&oacute;n';
$this->array_data[$tabla.'_definicion']['link_rotulo'] = 'link &oacute; URL';
$this->array_data[$tabla.'_definicion']['fecha_rotulo'] = 'Fecha';
$this->array_data[$tabla.'_definicion']['estado_rotulo'] = 'Activo?';
?>
