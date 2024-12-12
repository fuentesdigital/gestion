<?php
global $tabla;
global $es_grid;
if ($es_grid=='1'){
	$tabladetalle = $tabla.'grid';
} else {
	$tabladetalle = $tabla;
}
$this->array_data[$tabladetalle.'_definicion']['padre_tipo'] = 'padre';
$this->array_data[$tabladetalle.'_definicion']['correlativo_tipo'] = 'correlativo';
$this->array_data[$tabladetalle.'_definicion']['idOpcion_tipo'] = 'foranea1';
$this->array_data[$tabladetalle.'_definicion']['consultar_tipo'] = 'cheque';
$this->array_data[$tabladetalle.'_definicion']['insertar_tipo'] = 'cheque';
$this->array_data[$tabladetalle.'_definicion']['modificar_tipo'] = 'cheque';
$this->array_data[$tabladetalle.'_definicion']['padre_rotulo'] = 'Padre';
$this->array_data[$tabladetalle.'_definicion']['correlativo_rotulo'] = 'No.';
$this->array_data[$tabladetalle.'_definicion']['idOpcion_rotulo'] = 'Opci&oacute;n';
$this->array_data[$tabladetalle.'_definicion']['consultar_rotulo'] = 'Consultar';
$this->array_data[$tabladetalle.'_definicion']['insertar_rotulo'] = 'Insertar';
$this->array_data[$tabladetalle.'_definicion']['modificar_rotulo'] = 'Modificar';
?>
