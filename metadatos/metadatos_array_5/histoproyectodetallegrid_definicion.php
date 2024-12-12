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
$this->array_data[$tabladetalle.'_definicion']['FechaPago_tipo'] = 'fecha';
$this->array_data[$tabladetalle.'_definicion']['ValorPagado_tipo'] = 'inputcortodinero';
$this->array_data[$tabladetalle.'_definicion']['SaldoAnterior_tipo'] = 'inputcortodinero';
$this->array_data[$tabladetalle.'_definicion']['SaldoActual_tipo'] = 'inputcortodinero';
$this->array_data[$tabladetalle.'_definicion']['padre_rotulo'] = 'Padre';
$this->array_data[$tabladetalle.'_definicion']['correlativo_rotulo'] = 'No.';
$this->array_data[$tabladetalle.'_definicion']['FechaPago_rotulo'] = 'Fecha de Pago';
$this->array_data[$tabladetalle.'_definicion']['ValorPagado_rotulo'] = 'Valor Pagado';
$this->array_data[$tabladetalle.'_definicion']['SaldoAnterior_rotulo'] = 'Saldo Anterior';
$this->array_data[$tabladetalle.'_definicion']['SaldoActual_rotulo'] = 'Saldo Actual';
?>
