<?php
global $tabla;
$this->array_data[$tabla.'_definicion']['id'.$tabla.'_tipo'] = 'primaria1_auto';
$this->array_data[$tabla.'_definicion'][$tabla.'_tipo'] = 'inputunico_ppal';
$this->array_data[$tabla.'_definicion']['diagramaEr_tipo'] = 'inputunico_ppal';
$this->array_data[$tabla.'_definicion']['vistaprevia_tipo'] = 'textarea';
$this->array_data[$tabla.'_definicion']['estado_tipo'] = 'sino';
$this->array_data[$tabla.'_definicion']['id'.$tabla.'_rotulo'] = 'C&oacute;digo del Er';
$this->array_data[$tabla.'_definicion'][$tabla.'_rotulo'] = 'Nombre del Diagrama ER';
$this->array_data[$tabla.'_definicion']['diagramaEr_rotulo'] = 'Imagen del Diagrama ER';
$this->array_data[$tabla.'_definicion']['vistaprevia_rotulo'] = 'Vista Previa';
$this->array_data[$tabla.'_definicion']['estado_rotulo'] = 'V&aacute;lido?';
?>