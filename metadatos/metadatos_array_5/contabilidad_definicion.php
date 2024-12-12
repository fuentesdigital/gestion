<?php
global $tabla;
$this->array_data[$tabla.'_definicion']['id'.$tabla.'_tipo'] = 'primaria1_auto';
$this->array_data[$tabla.'_definicion'][$tabla.'_tipo'] = 'inputreq_ppal';
$this->array_data[$tabla.'_definicion']['fecha_tipo'] = 'fecha';
$this->array_data[$tabla.'_definicion']['idOrigencuenta_tipo'] = 'foranea1';
$this->array_data[$tabla.'_definicion']['codCatalogocuentasXAcreedor_tipo'] = 'inputautocomplete';
$this->array_data[$tabla.'_definicion']['montoAcreedor_tipo'] = 'inputcortodinero';
$this->array_data[$tabla.'_definicion']['codCatalogocuentasXDeudor_tipo'] = 'inputautocomplete';
$this->array_data[$tabla.'_definicion']['montoDeudor_tipo'] = 'inputcortodinero';
$this->array_data[$tabla.'_definicion']['detalle_tipo'] = 'textarea';
$this->array_data[$tabla.'_definicion']['estado_tipo'] = 'sino';
$this->array_data[$tabla.'_definicion']['id'.$tabla.'_rotulo'] = 'C&oacute;digo de la Ficha';
$this->array_data[$tabla.'_definicion'][$tabla.'_rotulo'] = 'Transacci&oacute;n';
$this->array_data[$tabla.'_definicion']['fecha_rotulo'] = 'Fecha';
$this->array_data[$tabla.'_definicion']['idOrigencuenta_rotulo'] = 'Origen de la Cuenta';
$this->array_data[$tabla.'_definicion']['codCatalogocuentasXAcreedor_rotulo'] = 'Cuenta Acreedora';
$this->array_data[$tabla.'_definicion']['montoAcreedor_rotulo'] = 'Monto Acreedor en $';
$this->array_data[$tabla.'_definicion']['codCatalogocuentasXDeudor_rotulo'] = 'Cuenta Deudora';
$this->array_data[$tabla.'_definicion']['montoDeudor_rotulo'] = 'Monto Deudor en $';
$this->array_data[$tabla.'_definicion']['detalle_rotulo'] = 'Detalle';
$this->array_data[$tabla.'_definicion']['estado_rotulo'] = 'Activo?';
?>