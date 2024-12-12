<?php
global $tabla;
$this->array_data[$tabla.'_definicion']['id'.$tabla.'_tipo'] = 'primaria1_auto';
$this->array_data[$tabla.'_definicion'][$tabla.'_tipo'] = 'input_ppal';
$this->array_data[$tabla.'_definicion']['idSexo_tipo'] = 'foranea1';
$this->array_data[$tabla.'_definicion']['firmafile_tipo'] = 'input';
$this->array_data[$tabla.'_definicion']['idProfesion_tipo'] = 'foranea1';
$this->array_data[$tabla.'_definicion']['orden_tipo'] = 'inputcorto';
$this->array_data[$tabla.'_definicion']['estado_tipo'] = 'sino';
$this->array_data[$tabla.'_definicion']['id'.$tabla.'_rotulo'] = 'C&oacute;digo de la Firma';
$this->array_data[$tabla.'_definicion'][$tabla.'_rotulo'] = $tabla;
$this->array_data[$tabla.'_definicion']['idSexo_rotulo'] = 'Sexo';
$this->array_data[$tabla.'_definicion']['firmafile_rotulo'] = 'Archivo de Firma';
$this->array_data[$tabla.'_definicion']['idProfesion_rotulo'] = 'Profesi&oacute;n';
$this->array_data[$tabla.'_definicion']['orden_rotulo'] = 'Orden';
$this->array_data[$tabla.'_definicion']['estado_rotulo'] = 'Activo?';
?>