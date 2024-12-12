<?php
global $tabla;
$this->array_data[$tabla.'_definicion']['id'.$tabla.'_tipo'] = 'primaria1_auto';
$this->array_data[$tabla.'_definicion'][$tabla.'_tipo'] = 'inputunico_ppal';
$this->array_data[$tabla.'_definicion']['fechaSuscripcion_tipo'] = 'fecha';
$this->array_data[$tabla.'_definicion']['documento_tipo'] = 'inputunico_ppal';
$this->array_data[$tabla.'_definicion']['profesion_tipo'] = 'input';
$this->array_data[$tabla.'_definicion']['empresa_tipo'] = 'input';
$this->array_data[$tabla.'_definicion']['telefonos_tipo'] = 'input';
$this->array_data[$tabla.'_definicion']['email_tipo'] = 'input';
$this->array_data[$tabla.'_definicion']['idPais_tipo'] = 'foranea1';
$this->array_data[$tabla.'_definicion']['estado_tipo'] = 'sino';
$this->array_data[$tabla.'_definicion']['id'.$tabla.'_rotulo'] = 'C&oacute;digo de la Suscripci&oacute;n';
$this->array_data[$tabla.'_definicion'][$tabla.'_rotulo'] = 'Nombre del Suscriptor (Apellidos, Nombres)';
$this->array_data[$tabla.'_definicion']['fechaSuscripcion_rotulo'] = 'Fecha de la Suscripci&oacute;n';
$this->array_data[$tabla.'_definicion']['documento_rotulo'] = 'Documento de Identidad';
$this->array_data[$tabla.'_definicion']['profesion_rotulo'] = 'Profesi&oacute;n u Oficio';
$this->array_data[$tabla.'_definicion']['empresa_rotulo'] = 'Empresa';
$this->array_data[$tabla.'_definicion']['telefonos_rotulo'] = 'Tel&eacute;fonos';
$this->array_data[$tabla.'_definicion']['email_rotulo'] = 'Email';
$this->array_data[$tabla.'_definicion']['idPais_rotulo'] = 'Pa&iacute;s';
$this->array_data[$tabla.'_definicion']['estado_rotulo'] = 'Suscripci&oacute;n Activa?';
?>