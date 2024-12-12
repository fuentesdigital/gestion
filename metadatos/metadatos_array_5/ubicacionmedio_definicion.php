<?php
global $tabla;
$this->array_data[$tabla.'_definicion']['id'.$tabla.'_tipo'] = 'primaria1_auto';
$this->array_data[$tabla.'_definicion'][$tabla.'_tipo'] = 'inputunico_ppal';
$this->array_data[$tabla.'_definicion']['estante_tipo'] = 'inputcorto';
$this->array_data[$tabla.'_definicion']['nivel_tipo'] = 'inputcorto';
$this->array_data[$tabla.'_definicion']['orden_tipo'] = 'inputcorto';
$this->array_data[$tabla.'_definicion']['estado_tipo'] = 'sino';
$this->array_data[$tabla.'_definicion']['id'.$tabla.'_rotulo'] = 'C&oacute;digo de la Ubicaci&oacute;n del Medio';
$this->array_data[$tabla.'_definicion'][$tabla.'_rotulo'] = 'Ubicaci&oacute;n del Medio';
$this->array_data[$tabla.'_definicion']['estante_rotulo'] = 'Estante';
$this->array_data[$tabla.'_definicion']['nivel_rotulo'] = 'Nivel';
$this->array_data[$tabla.'_definicion']['orden_rotulo'] = 'Orden';
$this->array_data[$tabla.'_definicion']['estado_rotulo'] = 'Activo?';
?>