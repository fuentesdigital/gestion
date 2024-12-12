<?php

include_once("software.php");
$tabla = '';
if (isset($_GET['tabla']) && $_GET['tabla'] != '') {
    $tabla = $_GET['tabla'];
} else {
    die('error!');
}
include('inc_top_rotulos.php');
$tipoExportacion = '';
$_utiles = new utiles();

$whereString = ' WHERE 1 ';
if (isset($_GET['texport']) && $_GET['texport'] != '') {
    if ($_GET['texport'] == '1') {
        $whereString .= ' ';
        $tipoExportacion = '_TODOS';
    } else if ($_GET['texport'] == '2') {
        $whereString .= ' AND estado=0 ';
        $tipoExportacion = '_' . $rotulo_estado_activo;
    } else if ($_GET['texport'] == '3') {
        $whereString .= ' AND estado=1 ';
        $tipoExportacion = '_' . $rotulo_estado_inactivo;
    } else if ($_GET['texport'] == '4') {
        $whereString .= ' AND padre = '.$_GET['codigo_padre'];
        $tipoExportacion = '_DETALLE_SELECCIONADO';
    }
    $tipoExportacion = str_replace(array(' ', '&aacute;', '&eacute;', '&iacute;', '&oacute;', '&uacute;', '&ntilde;'), array('', 'a', 'e', 'i', 'o', 'u', 'n'), $tipoExportacion);
} else {
    die('error!');
}

$sql = 'SELECT * FROM ' . $tabla . $whereString;

mysqli_select_db($this->db_connection, $this->db_database);
mysqli_query("SET NAMES utf8");

$r = mysqli_query($sql) or trigger_error(mysql_error(CONEXION), E_USER_ERROR);
$return = '';
if (mysqli_num_rows($r) > 0) {
    $return .= '<table border=0>';
    $cols = 0;
    while ($rs = mysql_fetch_row($r)) {
        $return .= '<tr>';
        if ($cols == 0) {
            $cols = sizeof($rs);
            $cols_names = array();
            for ($i = 0; $i < $cols; $i++) {
                $col_name = $this->mysqli_field_name($r, $i);
                $return .= '<th>' . $col_name . '</th>';
                $cols_names[$i] = $col_name;
            }
            $return .= '</tr><tr>';
        }
        for ($i = 0; $i < $cols; $i++) {
            $return .= "<td>" . trim(utf8_decode($rs[$i])) . "</td>";
        }
        $return .= '</tr>';
    }
    $return .= '</table>';
    mysqli_free_result($r);
}

header("Content-type: application/vnd-ms-excel; charset=charset=UTF-8");
$NombreArchivo = strtoupper($tabla . "_" . date('d-m-Y') . $tipoExportacion . ".xls");
header("Content-Disposition: attachment; filename=" . $NombreArchivo);
echo $return;
?>