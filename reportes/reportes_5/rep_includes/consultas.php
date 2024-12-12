<?php
if($codigo_seleccionado == '0') {
    if ($imprimir_grafico) {
        $query_vista_reporte = "SELECT codCatalogocuentasXAcreedor AS Estadistico, Fecha, SUM(montoAcreedor) AS Total_Reporte FROM contabilidad WHERE 1 " .$where_reporte_str." GROUP BY codCatalogocuentasXAcreedor";
        //echo $query_vista_reporte ;
    }
    if ($imprimir_reporte) {
        $colspan_val = 2;
        $body_rpt .= '<p></p>
<table width="'.$tbl_wdt.' " align="center" bgcolor="#E9EEF5" class="tabla">
<tr align="center" class="tr2">
<td colspan="'.$colspan_val.'">Reporte Detallado'.$fecha_reporte.'</td>
</tr>';
        $query_reporte = "SELECT codCatalogocuentasXAcreedor, montoAcreedor FROM contabilidad WHERE 1 " .$where_reporte_str. " ORDER BY codCatalogocuentasXAcreedor, montoAcreedor;";

        $rs_reporte = mysqli_query($query_reporte, CONEXION) or trigger_error(mysql_error(),E_USER_ERROR);
        $total_reg = mysqli_num_rows($rs_reporte);

        $rs_reporte = mysqli_query($query_reporte, CONEXION) or trigger_error(mysql_error(),E_USER_ERROR);

        $row_rs_reporte  = mysqli_fetch_assoc($rs_reporte);


        if ($total_reg > 0) {
            $body_rpt .= '<tr class="tr3">';
            $body_rpt .= '<td>';
            $body_rpt .= 'Cuenta';
            $body_rpt .= '</td>';
            $body_rpt .= '<td>';
            $body_rpt .= 'Monto';
            $body_rpt .= '</td>';
            $body_rpt .= '</tr>';
            do {
                $body_rpt .= '<tr class="tr7">';
                $body_rpt .= '<td nowrap>';
                $body_rpt .= $row_rs_reporte['codCatalogocuentasXAcreedor'];
                $body_rpt .= '</td>';
                $body_rpt .= '<td>';
                $body_rpt .= $row_rs_reporte['montoAcreedor'];
                $body_rpt .= '</td>';
                $body_rpt .= '</tr>';
            }
            while ($row_rs_reporte = mysqli_fetch_assoc($rs_reporte));
        }
        $body_rpt .= '</table>';
    }
} else if($codigo_seleccionado == '1') {
    if ($imprimir_grafico) {
        $query_vista_reporte = "SELECT codCatalogocuentasXDeudor AS Estadistico, Fecha, SUM(montoDeudor) AS Total_Reporte FROM contabilidad WHERE 1 " .$where_reporte_str." GROUP BY codCatalogocuentasXDeudor";
        //echo $query_vista_reporte ;
    }
    if ($imprimir_reporte) {
        $colspan_val = 2;
        $body_rpt .= '<p></p>
<table width="'.$tbl_wdt.' " align="center" bgcolor="#E9EEF5" class="tabla">
<tr align="center" class="tr2">
<td colspan="'.$colspan_val.'">Reporte Detallado'.$fecha_reporte.'</td>
</tr>';
        $query_reporte = "SELECT codCatalogocuentasXDeudor, montoDeudor FROM contabilidad WHERE 1 " .$where_reporte_str. " ORDER BY codCatalogocuentasXDeudor, montoDeudor;";

        $rs_reporte = mysqli_query($query_reporte, CONEXION) or trigger_error(mysql_error(),E_USER_ERROR);
        $total_reg = mysqli_num_rows($rs_reporte);

        $rs_reporte = mysqli_query($query_reporte, CONEXION) or trigger_error(mysql_error(),E_USER_ERROR);

        $row_rs_reporte  = mysqli_fetch_assoc($rs_reporte);


        if ($total_reg > 0) {
            $body_rpt .= '<tr class="tr3">';
            $body_rpt .= '<td>';
            $body_rpt .= 'Cuenta';
            $body_rpt .= '</td>';
            $body_rpt .= '<td>';
            $body_rpt .= 'Monto';
            $body_rpt .= '</td>';
            $body_rpt .= '</tr>';
            do {
                $body_rpt .= '<tr class="tr7">';
                $body_rpt .= '<td nowrap>';
                $body_rpt .= $row_rs_reporte['codCatalogocuentasXDeudor'];
                $body_rpt .= '</td>';
                $body_rpt .= '<td>';
                $body_rpt .= $row_rs_reporte['montoDeudor'];
                $body_rpt .= '</td>';
                $body_rpt .= '</tr>';
            }
            while ($row_rs_reporte = mysqli_fetch_assoc($rs_reporte));
        }
        $body_rpt .= '</table>';
    }
}
?>
