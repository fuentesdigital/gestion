<?php
global $tabla;	 	
$this->array_data[$tabla.'_definicion']['id'.$tabla.'_tipo'] = 'primaria1_auto';
$this->array_data[$tabla.'_definicion'][$tabla.'_tipo'] = 'inputunico_ppal';
$this->array_data[$tabla.'_definicion']['proyectista_tipo'] = 'input';
$this->array_data[$tabla.'_definicion']['fechaficha_tipo'] = 'fecha';
$this->array_data[$tabla.'_definicion']['fechainicio_tipo'] = 'fecha';
$this->array_data[$tabla.'_definicion']['fechafin_tipo'] = 'fecha';
$this->array_data[$tabla.'_definicion']['monto_tipo'] = 'inputcortodinero';
$this->array_data[$tabla.'_definicion']['materiales_tipo'] = 'cheque';
$this->array_data[$tabla.'_definicion']['transporte_tipo'] = 'cheque';
$this->array_data[$tabla.'_definicion']['detalle_tipo'] = 'textarea';
$this->array_data[$tabla.'_definicion']['estado_tipo'] = 'sino';
$this->array_data[$tabla.'_definicion']['Histoproyectodetalle_tipo'] = 'grid1';
$this->array_data[$tabla.'_definicion']['id'.$tabla.'_rotulo'] = 'C&oacute;digo del Proyecto';
$this->array_data[$tabla.'_definicion'][$tabla.'_rotulo'] = 'Nombre del Proyecto';
$this->array_data[$tabla.'_definicion']['proyectista_rotulo'] = 'Ejecuta Proyecto';
$this->array_data[$tabla.'_definicion']['fechaficha_rotulo'] = 'Fecha de Contrataci&oacute;n';
$this->array_data[$tabla.'_definicion']['fechainicio_rotulo'] = 'Fecha de Inicio';
$this->array_data[$tabla.'_definicion']['fechafin_rotulo'] = 'Fecha de Finalizaci&oacute;n';
$this->array_data[$tabla.'_definicion']['monto_rotulo'] = 'Monto Estimado';
$this->array_data[$tabla.'_definicion']['materiales_rotulo'] = 'Incluye Materiales?';
$this->array_data[$tabla.'_definicion']['transporte_rotulo'] = 'Incluye Transporte?';
$this->array_data[$tabla.'_definicion']['detalle_rotulo'] = 'Detalle del Proyecto';
$this->array_data[$tabla.'_definicion']['estado_rotulo'] = $tabla.' Finalizado?';
$this->array_data[$tabla.'_definicion']['Histoproyectodetalle_rotulo'] = 'Hist&oacute;rico del Proyecto';
?>
