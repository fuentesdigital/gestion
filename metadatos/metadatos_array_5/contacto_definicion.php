<?php
global $tabla;
$this->array_data[$tabla.'_definicion']['id'.$tabla.'_tipo'] = 'primaria1_auto';
$this->array_data[$tabla.'_definicion'][$tabla.'_tipo'] = 'inputunico_ppal';
$this->array_data[$tabla.'_definicion']['idEmpresa_tipo'] = 'foranea2';
$this->array_data[$tabla.'_definicion']['idUnidad_tipo'] = 'foranea2';
$this->array_data[$tabla.'_definicion']['telefono_tipo'] = 'input';
$this->array_data[$tabla.'_definicion']['celular_tipo'] = 'input';
$this->array_data[$tabla.'_definicion']['fax_tipo'] = 'input';
$this->array_data[$tabla.'_definicion']['emailempresa_tipo'] = 'input';
$this->array_data[$tabla.'_definicion']['emailparticular_tipo'] = 'input';
$this->array_data[$tabla.'_definicion']['orden_tipo'] = 'inputcorto';
$this->array_data[$tabla.'_definicion']['estado_tipo'] = 'sino';
$this->array_data[$tabla.'_definicion']['id'.$tabla.'_rotulo'] = 'C&oacute;digo del Contacto';
$this->array_data[$tabla.'_definicion'][$tabla.'_rotulo'] = $tabla;
$this->array_data[$tabla.'_definicion']['idEmpresa_rotulo'] = 'Empresa';
$this->array_data[$tabla.'_definicion']['idUnidad_rotulo'] = 'Unidad o Departamento';
$this->array_data[$tabla.'_definicion']['telefono_rotulo'] = 'Tel&eacute;fono';
$this->array_data[$tabla.'_definicion']['celular_rotulo'] = 'Celular';
$this->array_data[$tabla.'_definicion']['fax_rotulo'] = 'FAX &oacute; PBX';
$this->array_data[$tabla.'_definicion']['emailparticular_rotulo'] = 'E-mail Particular';
$this->array_data[$tabla.'_definicion']['emailempresa_rotulo'] = 'E-mail Empresa';
$this->array_data[$tabla.'_definicion']['orden_rotulo'] = 'Orden';
$this->array_data[$tabla.'_definicion']['estado_rotulo'] = 'Activo?';
?>