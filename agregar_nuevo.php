<?php
mysqli_select_db($this->db_connection, $this->db_database);
switch ($tabla_g) {
    case 'Historialmigratoriodetallegrid':
        session_start();
        $id_resolutor = $_SESSION['idResolutor'];
        if ($id_resolutor =='') {
            echo "Debe asociar el resolutor con el Login de Usuario";
            die();
        }
        break;
}

if ($_GET['campo2'] != '') {
    $campo2 = $_GET['campo2'];
    $valor_campo2 = $_GET['valor_campo2'];
}
$maximo_correlativo = $_utiles->maximo_correlativo($tabla_g,"padre",$padre_g,$campo2,$valor_campo2);
if ($_GET['campo2'] != '') {
    $query_RsInsert= "INSERT INTO ". $tabla_g." (padre,correlativo,".$campo2.") VALUES ('".$padre_g."','".$maximo_correlativo."','".$valor_campo2."')";
} else {
    switch ($tabla_g) {
        case 'Historialmigratoriodetallegrid':
            $query_RsInsert= "INSERT INTO ". $tabla_g." (padre,correlativo,idResolutor, fechadocvence,  fechaHistorial, fechaDeResolucion, fechaDeProrrogas, fechaQueVence, movimientoMigraEntrada, movimientoMigraSalida, idTipodocumento, idTipoderesidencia, idUnidadinstitucion, idTipodetramite) VALUES ('".$padre_g."','".$maximo_correlativo."','".$id_resolutor."', NOW(), NOW(), NOW(), NOW(), NOW(), NOW(), NOW(), 1, 1, 1, 1)";
            break;
        default:
            $query_RsInsert= "INSERT INTO ". $tabla_g." (padre,correlativo) VALUES ('".$padre_g."','".$maximo_correlativo."')";
            break;
    }
}
//echo $query_RsInsert;
$RsInsert= mysqli_query($query_RsInsert, CONEXION)  or trigger_error(mysql_error(),E_USER_ERROR);
?>

