<?php
global $tabla;
$this->array_data[$tabla.'_definicion']['id'.$tabla.'_tipo'] = 'primaria1_auto';
$this->array_data[$tabla.'_definicion'][$tabla.'_tipo'] = 'input_ppal';
$this->array_data[$tabla.'_definicion']['fecha_tipo'] = 'fecha';
$this->array_data[$tabla.'_definicion']['idHorario_tipo'] = 'foranea1';
$this->array_data[$tabla.'_definicion']['idCuenta_tipo'] = 'foranea2';
$this->array_data[$tabla.'_definicion']['monto_tipo'] = 'inputcortodinero';
$this->array_data[$tabla.'_definicion']['detalle_tipo'] = 'textarea';
$this->array_data[$tabla.'_definicion']['estado_tipo'] = 'sino';
$this->array_data[$tabla.'_definicion']['id'.$tabla.'_rotulo'] = 'C&oacute;digo de la Ficha';
$this->array_data[$tabla.'_definicion'][$tabla.'_rotulo'] = 'Transacci&oacute;n';
$this->array_data[$tabla.'_definicion']['fecha_rotulo'] = 'Fecha';
$this->array_data[$tabla.'_definicion']['idHorario_rotulo'] = 'Horario';
$this->array_data[$tabla.'_definicion']['idCuenta_rotulo'] = 'Cuenta';
$this->array_data[$tabla.'_definicion']['monto_rotulo'] = 'Monto en $';
$this->array_data[$tabla.'_definicion']['detalle_rotulo'] = 'Detalle';
$this->array_data[$tabla.'_definicion']['estado_rotulo'] = 'Activo?';
?>