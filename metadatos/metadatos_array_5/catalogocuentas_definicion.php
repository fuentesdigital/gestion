<?php
global $tabla;
$this->array_data[$tabla.'_definicion']['id'.$tabla.'_tipo'] = 'primaria1_auto';
$this->array_data[$tabla.'_definicion'][$tabla.'_tipo'] = 'input_ppal';
$this->array_data[$tabla.'_definicion']['cod'.$tabla.'_tipo'] = 'inputunico_ppal';
$this->array_data[$tabla.'_definicion']['esdetalle_tipo'] = 'sino';
$this->array_data[$tabla.'_definicion']['estado_tipo'] = 'sino';
$this->array_data[$tabla.'_definicion']['id'.$tabla.'_rotulo'] = 'C&oacute;digo del Cat&aacute;logo de Cuentas';
$this->array_data[$tabla.'_definicion'][$tabla.'_rotulo'] = 'Cuenta';
$this->array_data[$tabla.'_definicion']['cod'.$tabla.'_rotulo'] = 'N&uacute;mero de la Cuenta';
$this->array_data[$tabla.'_definicion']['esdetalle_rotulo'] = 'Es Cuenta de Detalle?';
$this->array_data[$tabla.'_definicion']['estado_rotulo'] = 'Activo?';
?>

