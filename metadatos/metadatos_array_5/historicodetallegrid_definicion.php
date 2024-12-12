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
$this->array_data[$tabladetalle .'_definicion']['FechaPago_tipo'] = 'fecha';
$this->array_data[$tabladetalle .'_definicion']['FechaAplicacion_tipo'] = 'fecha';
$this->array_data[$tabladetalle .'_definicion']['ValorPagado_tipo'] = 'inputcortodinero';
$this->array_data[$tabladetalle .'_definicion']['SaldoAnterior_tipo'] = 'inputcortodinero';
$this->array_data[$tabladetalle .'_definicion']['AbonoCapital_tipo'] = 'inputcortodinero';
$this->array_data[$tabladetalle .'_definicion']['AbonoIntereses_tipo'] = 'inputcortodinero';
$this->array_data[$tabladetalle .'_definicion']['AbonoIntMora_tipo'] = 'inputcortodinero';
$this->array_data[$tabladetalle .'_definicion']['SegurosyOtros_tipo'] = 'inputcortodinero';
$this->array_data[$tabladetalle .'_definicion']['SaldoActual_tipo'] = 'inputcortodinero';
$this->array_data[$tabladetalle .'_definicion']['TasaInteres_tipo'] = 'inputcortodinero';
$this->array_data[$tabladetalle .'_definicion']['padre_rotulo'] = 'Padre';
$this->array_data[$tabladetalle .'_definicion']['correlativo_rotulo'] = 'No.';
$this->array_data[$tabladetalle .'_definicion']['FechaPago_rotulo'] = 'Fecha de Pago';
$this->array_data[$tabladetalle .'_definicion']['FechaAplicacion_rotulo'] = 'Fecha de Aplicaci&oacute;n de Pago';
$this->array_data[$tabladetalle .'_definicion']['ValorPagado_rotulo'] = 'Valor Pagado';
$this->array_data[$tabladetalle .'_definicion']['SaldoAnterior_rotulo'] = 'Saldo Anterior';
$this->array_data[$tabladetalle .'_definicion']['AbonoCapital_rotulo'] = 'Abono a Capital';
$this->array_data[$tabladetalle .'_definicion']['AbonoIntereses_rotulo'] = 'Abono a Intereses';
$this->array_data[$tabladetalle .'_definicion']['AbonoIntMora_rotulo'] = 'Abono a Intereses Mora';
$this->array_data[$tabladetalle .'_definicion']['SegurosyOtros_rotulo'] = 'Seguro y Otros';
$this->array_data[$tabladetalle .'_definicion']['SaldoActual_rotulo'] = 'Saldo Actual';
$this->array_data[$tabladetalle .'_definicion']['TasaInteres_rotulo'] = 'Tasa de Intereses';
?>
