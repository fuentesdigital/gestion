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
$this->array_data[$tabladetalle .'_definicion']['Contenidomultimedia_tipo'] = 'input';
$this->array_data[$tabladetalle .'_definicion']['descripcionContenidomultimedia_tipo'] = 'input';
$this->array_data[$tabladetalle .'_definicion']['link_tipo'] = 'input';
$this->array_data[$tabladetalle .'_definicion']['fechaContenidomultimedia_tipo'] = 'fecha';
$this->array_data[$tabladetalle .'_definicion']['padre_rotulo'] = 'Padre';
$this->array_data[$tabladetalle .'_definicion']['correlativo_rotulo'] = 'No.';
$this->array_data[$tabladetalle .'_definicion']['Contenidomultimedia_rotulo'] = 'Nombre del Archivo';
$this->array_data[$tabladetalle .'_definicion']['descripcionContenidomultimedia_rotulo'] = 'Descripci&oacute;n Archivo.';
$this->array_data[$tabladetalle .'_definicion']['link_rotulo'] = 'Link &oacute; URL';
$this->array_data[$tabladetalle .'_definicion']['fechaContenidomultimedia_rotulo'] = 'fecha';
?>