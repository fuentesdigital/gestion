<?php if ($tabla=='Boda') {
    $rotulo_estado_activo = 'Terminados';
    $rotulo_estado_inactivo = 'Pendientes';
}elseif ($tabla=='Contabilidad') {
    $rotulo_estado_activo = 'Pendientes';
    $rotulo_estado_inactivo = 'Cerrados';
}elseif ($tabla=='Proyecto') {
    $rotulo_estado_activo = 'En Ejecuci&oacute;n';
    $rotulo_estado_inactivo = 'Terminados';
}elseif ($tabla=='Hipoteca') {
    $rotulo_estado_activo = 'Abiertas';
    $rotulo_estado_inactivo = 'Cerradas';
}elseif ($tabla=='Tratamiento') {
    $rotulo_estado_activo = 'Activos';
    $rotulo_estado_inactivo = 'Terminados';
}elseif ($tabla=='Contenido') {
    $rotulo_estado_activo = 'Publicados';
    $rotulo_estado_inactivo = 'No Publicados';
}elseif ($tabla=='Seccion') {
    $rotulo_estado_activo = 'Activas';
    $rotulo_estado_inactivo = 'Inactivas';
}elseif ($tabla=='Er') {
    $rotulo_estado_activo = 'Válido';
    $rotulo_estado_inactivo = 'Deprecado';
}else {
    $rotulo_estado_activo = 'Activos';
    $rotulo_estado_inactivo = 'Inactivos';
}
?>
