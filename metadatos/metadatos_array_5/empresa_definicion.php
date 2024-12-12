<?php
global $tabla;
$this->array_data[$tabla.'_definicion']['id'.$tabla.'_tipo'] = 'primaria1_auto';
$this->array_data[$tabla.'_definicion'][$tabla.'_tipo'] = 'inputunico_ppal';
$this->array_data[$tabla.'_definicion']['telefonos_tipo'] = 'input';
$this->array_data[$tabla.'_definicion']['emails_tipo'] = 'input';
$this->array_data[$tabla.'_definicion']['paginasweb_tipo'] = 'input';
$this->array_data[$tabla.'_definicion']['direccion_tipo'] = 'input';
$this->array_data[$tabla.'_definicion']['idPais_tipo'] = 'foranea3';
$this->array_data[$tabla.'_definicion']['idCiudad_tipo'] = 'foranea2';
$this->array_data[$tabla.'_definicion']['otraCiudad_tipo'] = 'input';
$this->array_data[$tabla.'_definicion']['orden_tipo'] = 'inputcorto';
$this->array_data[$tabla.'_definicion']['estado_tipo'] = 'sino';
$this->array_data[$tabla.'_definicion']['id'.$tabla.'_rotulo'] = 'C&oacute;digo de la '.$tabla;
$this->array_data[$tabla.'_definicion'][$tabla.'_rotulo'] = $tabla;
$this->array_data[$tabla.'_definicion']['telefonos_rotulo'] = 'Tel&eacute;fono';
$this->array_data[$tabla.'_definicion']['emails_rotulo'] = 'Email';
$this->array_data[$tabla.'_definicion']['paginasweb_rotulo'] = 'P&aacute;gina Web';
$this->array_data[$tabla.'_definicion']['direccion_rotulo'] = 'Direcci&oacute;n';
$this->array_data[$tabla.'_definicion']['idPais_rotulo'] = 'Pa&iacute;s';
$this->array_data[$tabla.'_definicion']['idCiudad_rotulo'] = 'Ciudad';
$this->array_data[$tabla.'_definicion']['otraCiudad_rotulo'] = 'Otra Ciudad del Pa&iacute;s (Ciudad Sugerida)';
$this->array_data[$tabla.'_definicion']['orden_rotulo'] = 'Orden';
$this->array_data[$tabla.'_definicion']['estado_rotulo'] = 'Activo?';
?>
