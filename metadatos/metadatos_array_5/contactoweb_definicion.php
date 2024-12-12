<?php
global $tabla;
$this->array_data[$tabla.'_definicion']['id'.$tabla.'_tipo'] = 'primaria1_auto';
$this->array_data[$tabla.'_definicion'][$tabla.'_tipo'] = 'inputunico_ppal';
$this->array_data[$tabla.'_definicion']['asunto_tipo'] = 'input';
$this->array_data[$tabla.'_definicion']['mensaje_tipo'] = 'textarea';
$this->array_data[$tabla.'_definicion']['email_tipo'] = 'input';
$this->array_data[$tabla.'_definicion']['estado_tipo'] = 'sino';
$this->array_data[$tabla.'_definicion']['id'.$tabla.'_rotulo'] = 'C&oacute;digo del Contacto';
$this->array_data[$tabla.'_definicion'][$tabla.'_rotulo'] = 'Contacto';
$this->array_data[$tabla.'_definicion']['asunto_rotulo'] = 'Asunto';
$this->array_data[$tabla.'_definicion']['mensaje_rotulo'] = 'Mensaje';
$this->array_data[$tabla.'_definicion']['email_rotulo'] = 'E-mail';
$this->array_data[$tabla.'_definicion']['estado_rotulo'] = 'Activo?';
?>