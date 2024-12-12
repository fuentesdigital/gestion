<?php
if ($codigo_seleccionado == '0') {
    $_body_page= '
<table width="'.$tbl_wdt.' " border="0" align="center" cellpadding="0" cellspacing="0" bgcolor="#E9EEF5" class="tabla">
<tr>
<td class="tr3" align="center">';
    $query_vista_reporte = "SELECT Codigo, FechaHistorico FROM Fechahistorial ORDER BY Codigo DESC;";
    // echo $query_vista_reporte;
    $rs_vista_reporte = mysqli_query($query_vista_reporte, CONEXION) or trigger_error(mysql_error(),E_USER_ERROR);
    $total_registros = mysqli_num_rows($rs_vista_reporte);
    $total_paginas = ceil($total_registros / $registros);

    $query_vista_reporte = "SELECT Codigo, FechaHistorico FROM Fechahistorial ORDER BY Codigo DESC LIMIT ". $inicio .",". $registros;
    // echo $query_vista_reporte;
    $rs_vista_reporte = mysqli_query($query_vista_reporte, CONEXION) or trigger_error(mysql_error(),E_USER_ERROR);

    $row_rs_vista_reporte  = mysqli_fetch_assoc($rs_vista_reporte);


    if ($total_registros > 0) {
        $_body_page .= '<tr class="tr3">';
        $_body_page .= '<td>';
        $_body_page .= 'Código';
        $_body_page .= '</td>';
        $_body_page .= '<td>';
        $_body_page .= 'Fecha Historial';
        $_body_page .= '</td>';
        $_body_page .= '</tr>';
        do {
            $_body_page .= '<tr class="tr7">';
            $_body_page .= '<td>';
            $_body_page .= $row_rs_vista_reporte['Codigo'];
            $_body_page .= '</td>';
            $_body_page .= '<td>';
            $_body_page .= $row_rs_vista_reporte['FechaHistorico'];
            $_body_page .= '</td>';
            $_body_page .= '</tr>';
        }
        while ($row_rs_vista_reporte = mysqli_fetch_assoc($rs_vista_reporte));
    }

    $_body_page .= '</td>
</tr>';
  } elseif ($codigo_seleccionado == '1') {
    $_body_page= '
<table width="'.$tbl_wdt.' " border="0" align="center" cellpadding="0" cellspacing="0" bgcolor="#E9EEF5" class="tabla">
<tr>
<td class="tr3" align="center">';
    $query_vista_reporte = "SELECT usuario, ip, fechahora, tabla, registro, accion FROM bitacora ORDER BY fechahora DESC ;";
    // echo $query_vista_reporte;
    $rs_vista_reporte = mysqli_query($query_vista_reporte, CONEXION) or trigger_error(mysql_error(),E_USER_ERROR);
    $total_registros = mysqli_num_rows($rs_vista_reporte);
    $total_paginas = ceil($total_registros / $registros);

    $query_vista_reporte = "SELECT usuario, ip, fechahora, tabla, registro, accion FROM bitacora ORDER BY fechahora DESC LIMIT ". $inicio .",". $registros;
    // echo $query_vista_reporte;
    $rs_vista_reporte = mysqli_query($query_vista_reporte, CONEXION) or trigger_error(mysql_error(),E_USER_ERROR);

    $row_rs_vista_reporte  = mysqli_fetch_assoc($rs_vista_reporte);


    if ($total_registros > 0) {
        $_body_page .= '<tr class="tr3">';
        $_body_page .= '<td>';
        $_body_page .= 'USUARIO';
        $_body_page .= '</td>';
        $_body_page .= '<td>';
        $_body_page .= 'IP';
        $_body_page .= '</td>';
        $_body_page .= '<td>';
        $_body_page .= 'Fecha Historial';
        $_body_page .= '</td>';
        $_body_page .= '</tr>';
        do {
            $_body_page .= '<tr class="tr7">';
            $_body_page .= '<td>';
            $_body_page .= $row_rs_vista_reporte['usuario'];
            $_body_page .= '</td>';
            $_body_page .= '<td>';
            $_body_page .= $row_rs_vista_reporte['ip'];
            $_body_page .= '</td>';
            $_body_page .= '<td>';
            $_body_page .= $row_rs_vista_reporte['fechahora'];
            $_body_page .= '</td>';
            $_body_page .= '</tr>';
        }
        while ($row_rs_vista_reporte = mysqli_fetch_assoc($rs_vista_reporte));
    }

    $_body_page .= '</td>
</tr>';
  }
?>
