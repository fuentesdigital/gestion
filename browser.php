<?php

include_once("software.php");
//include_once("clases/acceso_a_opcion.php");
//$_utiles = new utiles();

$id_op = $_GET['id_op'];
//$_acceso_a_opcion = new acceso_a_opcion();
$_software->acceso_opcion($id_op);

$consultar_flag = $_software->opciones_validas['consultar'];

$insertar_flag = $_software->opciones_validas['insertar'];
$modificar_flag = $_software->opciones_validas['modificar'];

if ($modificar_flag == '1') {
    $insertar_flag = '1';
    $consultar_flag = '1';
}

if ($insertar_flag == '1') {
    $consultar_flag = '1';
}


if (isset($_GET['nombre_seccion'])) {
    $nombre_seccion = $_GET['nombre_seccion'];
}


if (isset($_GET['tabla'])) {
    $tabla = $_GET['tabla'];
}

if (isset($_GET["ned"])) {
    $ned = $_GET["ned"];
}


if (isset($_GET["flag"])) {
    $flag = $_GET['flag'];
} else {
    $flag = '1';
}
if (isset($_GET['estado']) && $_GET['estado'] != '') {
    $getEstado = $_GET['estado'];
} else {
    $getEstado = '';
}


if ($getEstado == '0') {
    $whereEstado = " AND estado = 0 ";
} elseif ($getEstado == '1') {
    $whereEstado = " AND estado = 1 ";
} else {
    $whereEstado = "  ";
}

$rotulo_mensaje = '1';

if (isset($_GET['ordenar_descendente'])) {
    $ord_desc = $_GET['ordenar_descendente'];
    if ($ord_desc == 0) {
        $rotulo_boton_ordenar = "Descendente";
        $ord_desc_val = 1;
    } else {
        $rotulo_boton_ordenar = "Ascendente";

        $ord_desc_val = 0;
    }
} else {
    $ord_desc = 0;
    $rotulo_boton_ordenar = "Ascendente   ";
    $ord_desc_val = 0;
}

//$browser = new reportes_browser();
//$_filtros_browser = new filtros_browser();
$where_str = $_software->where_str;

$url_reporte_arr = array();
$nombre_reporte_arr = array();

//$_software = new detalle_browser();
//$_detalle_browser->recorrer_detalle();
$_software->recorrer_detalle();
//$_reportes_browser = new reportes_browser();
$_software->recorrer_reportes();
$_software->browser_kernel();
$ordenar_str = $_software->ordenar_str;
$buscador_str = $_software->buscador_str;
$rs = $_software->rs;
$row_rs = $_software->row_rs;
$numfields = $_software->numfields;
$campo_llave = $_software->campo_llave;
$startRow_rs = $_software->startRow_rs;
$maxRows_rs = $_software->maxRows_rs;
$totalRows_rs = $_software->totalRows_rs;
$currentPage = $_software->currentPage;
$queryString_rs = $_software->queryString_rs;
$pageNum_rs = $_software->pageNum_rs;
$totalPages_rs = $_software->totalPages_rs;
$titulo_seccion = $nombre_seccion;

if (isset($_GET['titulo_sufix'])) {
    $titulo_seccion .= ' - ' . $_GET['titulo_sufix'];
}

$browser_main_str = '';

$browser_main_str = '<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html><head>';
echo $_software->squeeze($browser_main_str);
include_once ("inc_head_adm.php");
$browser_main_str = '<title>' . $titulo_seccion . '</title>
</head>
<body onLoad="load_functions();" marginwidth="5px" marginheight="4px" leftmargin="0" topmargin="4px" bgcolor="#f0f0f0">';
echo $_software->squeeze($browser_main_str);

$browser_main_str = '';

include_once ("inc_top_adm.php");
if ($consultar_flag == '1') {
    if ($flag == '0') {
        $browser_main_str .= $buscador_str;
    }
    if ($flag == '1') {
        $browser_main_str .= $ordenar_str;
        $browser_main_str .= '<table width="98%" align="center" class="tabla">';
        if ($totalRows_rs > 0) {
            $header_str = '<tr align="left"><td colspan="3" class="tr2">' . $titulo_seccion . '    ( ' . ($startRow_rs + 1) . '  a  ' . min($startRow_rs + $maxRows_rs, $totalRows_rs) . '  de  ' . $totalRows_rs . ' )</td>
</tr>
<tr>
<td colspan="2" class="tr3">' . substr($rotulo_mensaje, 0, strlen($rotulo_mensaje) - 1) . '</td>
<td width="26%" class="tr3">Acciones</td>
</tr>';
            $browser_main_str .= $header_str;
            $row_rs = mysqli_fetch_array($rs);
            do {
                $browser_main_str .= '<tr><td width="71%" class="tr1" colspan="2">';
                for ($i = 0; $i < $numfields; $i++) {
                    if ($campo_llave == $_software->mysqli_field_name($rs, $i)) {
                        $valor_campo_llave = $row_rs[$i];
                    }
                    switch (true) {
                        default:
                            $rotulo_foranea = $_software->valor_foranea($tabla, $_software->mysqli_field_name($rs, $i), $row_rs[$i]);
                    }
                    if ($rotulo_foranea == '') {
                        $browser_main_str .= trim($row_rs[$i]) . " ";
                    } else {
                        $browser_main_str .= trim($rotulo_foranea) . " ";
                    }
                }
                $browser_main_str .= '</td>
                <td width="26%" class="tr8" nowrap>';
                if ($modificar_flag == '1') {
                    $browser_main_str .= '<strong><a href="#" onClick="javascript:abrirlink(\'editar\',\'browser_editar.php?tabla=' . $tabla . '&amp;id_op=' . $_GET['id_op'] . '&amp;nombre_campo=' . $campo_llave . '&amp;' . $campo_llave . '=' . $valor_campo_llave . '&amp;nombre_seccion=' . $nombre_seccion . '&amp;no_menu=1\');">Modificar</a></strong>';
                }
                if ($consultar_flag == '1') {
                    $browser_main_str .= ' - <strong><a href="#" onClick="javascript:abrirlink(\'ver\', \'browser_ficha.php?tabla=' . $tabla . '&amp;id_op=' . $_GET['id_op'] . '&amp;nombre_campo=' . $campo_llave . '&amp;' . $campo_llave . '=' . $valor_campo_llave . '&amp;nombre_seccion=' . $nombre_seccion . '\');">Ver Ficha</a></strong>';
                    if ($consultar_flag == '1') {
                        if ($insertar_flag == '1') {
                            $detalle_str = '';
                            $total_detalle = $_software->size_detalle;
                            for ($contador_detalle = 0; $contador_detalle < $total_detalle; $contador_detalle++) {
                                $rotulo_str_det = str_replace(' ', '_', $_software->rotulo_detalle[$contador_detalle]);
                                $detalle_str .= '<br><strong> - <a  href="#"  onClick="javascript:detalle_grid_edit(\'' . $_software->opcion_detalle[$contador_detalle] . '\',\'' . $valor_campo_llave . '\',\'' . $_GET["id_op"] . '\',\'' . $rotulo_str_det . '\',\'' . str_replace(" ", '', md5(microtime())) . '\');">' . $_software->rotulo_detalle[$contador_detalle] . '</a></strong>';
                            }
                            if ($detalle_str != '') {
                                $browser_main_str .='<br><strong>Detalle:</strong>';
                                $browser_main_str .=$detalle_str;
                            }
                        }
                        $reportes_str = '';
                        $total_reportes = $_software->size_reportes;
                        for ($contador_reportes = 0; $contador_reportes < $total_reportes; $contador_reportes++) {
                            $reportes_str .= '<br><strong> - <a href="#" onClick="javascript:abrirlink(\'ver\', \'' . $_software->url_reportes[$contador_reportes] . 'tabla=' . $tabla . '&amp;id_op=' . $_GET['id_op'] . '&amp;nombre_campo=' . $campo_llave . '&amp;' . $campo_llave . '=' . $valor_campo_llave . '&amp;nombre_seccion=' . $nombre_seccion . '\',\'' . str_replace(" ", '', md5(microtime())) . '\')">' . $_software->nombre_reporte[$contador_reportes] . '</a></strong>';
                        }
                        if ($reportes_str != '') {
                            $browser_main_str .= '<br><strong>Reportes:</strong>';
                            $browser_main_str .=$reportes_str;
                        }
                    }
                }
                $browser_main_str .='</td>
</tr>';
            } while ($row_rs = mysqli_fetch_array($rs));
        }
        if ($totalRows_rs == 0) {
            $browser_main_str .= '<tr><td colspan="3" class="tr2">No existe Información a mostrar</td></tr>';
        }
        $nav_toolbar_str = '<tr>
<td colspan="3" class="tr3">
<table border="0" width="100%" align="center">
<tr class="tr3">
<td width="23%" align="center">';
        if ($pageNum_rs > 0) {
            $nav_toolbar_str .= '<a href="' . $currentPage . '?pageNum_rs=0' . $queryString_rs . '">&lt;&lt;&lt;</a>';
        }
        $nav_toolbar_str .= '</td>
<td width="31%" align="center">';
        if ($pageNum_rs > 0) {
            $nav_toolbar_str .= '<a href="' . $currentPage . '?pageNum_rs=' . max(0, $pageNum_rs - 1) . $queryString_rs . '">&lt;&lt;</a>';
        }
        $nav_toolbar_str .= '</td>
<td width="23%" align="center">';
        if ($pageNum_rs < $totalPages_rs) {
            $nav_toolbar_str .= '<a href="' . $currentPage . '?pageNum_rs=' . min($totalPages_rs, $pageNum_rs + 1) . $queryString_rs . '">&gt;&gt;</a>';
        }
        $nav_toolbar_str .= '</td>
<td width="23%" align="center">';
        if ($pageNum_rs < $totalPages_rs) {
            $nav_toolbar_str .= '<a href="' . $currentPage . '?pageNum_rs=' . $totalPages_rs . $queryString_rs . '">&gt;&gt;&gt;</a>';
        }
        $nav_toolbar_str .= '</td>';
        $nav_toolbar_str .= '</tr></table>';
        $nav_toolbar_str .= '</td></tr>';
        $browser_main_str .= $_software->squeeze($nav_toolbar_str);
        $browser_main_str .= '</table>';
    }
}
echo $_software->squeeze($browser_main_str);
include_once ("inc_bottom_adm.php");
$browser_main_str = '</body>
</html>';
echo $_software->squeeze($browser_main_str);
if ($flag == '1') {
    mysqli_free_result($rs);
}
?>
