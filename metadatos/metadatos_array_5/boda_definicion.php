<?php
global $tabla;
$this->array_data[$tabla.'_definicion']['id'.$tabla.'_tipo'] = 'primaria1_auto';
$this->array_data[$tabla.'_definicion'][$tabla.'_tipo'] = 'inputunico_ppal';
$this->array_data[$tabla.'_definicion']['fecha_tipo'] = 'fecha';
$this->array_data[$tabla.'_definicion']['descripcion_tipo'] = 'input_ppal';
$this->array_data[$tabla.'_definicion']['Seguimientobodadetalle_tipo'] = 'grid1';
$this->array_data[$tabla.'_definicion']['estado_tipo'] = 'sino';
$this->array_data[$tabla.'_definicion']['id'.$tabla.'_rotulo'] = 'C&oacute;digo de la Boda';
$this->array_data[$tabla.'_definicion'][$tabla.'_rotulo'] = 'Contrayentes';
$this->array_data[$tabla.'_definicion']['fecha_rotulo'] = 'Fecha de la Boda';
$this->array_data[$tabla.'_definicion']['descripcion_rotulo'] = 'Descripci&oacute;n';
$this->array_data[$tabla.'_definicion']['Seguimientobodadetalle_rotulo'] = 'Seguimiento';
$this->array_data[$tabla.'_definicion']['estado_rotulo'] = 'Ha Finalizado?';
?>