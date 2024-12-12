<?php
global $tabla;
global $es_grid;
if ($es_grid=='1'){
	$tabladetalle = $tabla.'grid';
} else {
	$tabladetalle = $tabla;
}
$this->array_data[$tabladetalle .'_definicion']['padre_tipo'] = 'padre';
$this->array_data[$tabladetalle .'_definicion']['correlativo_tipo'] = 'correlativo';
$this->array_data[$tabladetalle .'_definicion']['Contenidosimple_tipo'] = 'input';
$this->array_data[$tabladetalle .'_definicion']['descripcionContenidosimple_tipo'] = 'input';
$this->array_data[$tabladetalle .'_definicion']['link_tipo'] = 'input';
$this->array_data[$tabladetalle .'_definicion']['fechaContenidosimple_tipo'] = 'fecha';
$this->array_data[$tabladetalle .'_definicion']['estado_tipo'] = 'sino';
$this->array_data[$tabladetalle .'_definicion']['padre_rotulo'] = 'Padre';
$this->array_data[$tabladetalle .'_definicion']['correlativo_rotulo'] = 'No.';
$this->array_data[$tabladetalle .'_definicion']['Contenidosimple_rotulo'] = 'Nombre del Archivo';
$this->array_data[$tabladetalle .'_definicion']['descripcionContenidosimple_rotulo'] = 'Descripci&oacute;n del Archivo.';
$this->array_data[$tabladetalle .'_definicion']['link_rotulo'] = 'Link &oacute; URL';
$this->array_data[$tabladetalle .'_definicion']['fechaContenidosimple_rotulo'] = 'fecha';
$this->array_data[$tabladetalle .'_definicion']['estado_rotulo'] = 'Activo?';
?>