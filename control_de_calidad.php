<?php
include_once('software.php');

$tabla = '';
$titulo_seccion= 'Control de Calidad';
$data_title = $titulo_seccion;
$instrucciones = '';

$body_ctrl_calidad = '';

$_utiles = new utiles();

if (isset($_GET['reporte_seleccionado']) && $_GET['reporte_seleccionado'] != '') {
    $currentPage = 'control_de_calidad.php?reporte_seleccionado='.$_GET['reporte_seleccionado'];
}

$registros = 250;

if (isset($_GET['pagina']) && $_GET['pagina'] !='') {
    $pagina = $_GET['pagina'];
    $inicio = ($pagina - 1) * $registros;
}
else {
    $inicio = 0;
    $pagina = 1;
}

?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html>
    <head>
        <?php include_once ("inc_head_adm.php");
        ?>
        <title><?php echo $titulo_seccion;
        ?></title>
    </head>
<body onLoad="load_functions();" marginwidth="5px" marginheight="4px" leftmargin="0" topmargin="4px" bgcolor="#f0f0f0">
        <?php include_once ("inc_top_adm.php");

        $body_ctrl_calidad .= '
<form name="form1" method="get" action="control_de_calidad.php">
<table width="98%" align="center" bgcolor="#E9EEF5" class="tabla">
<tr class="tr2">
<td colspan="3" align="center">Reporte de Control de Calidad Detallado</td>
</tr>
<tr class="tr3">
<td colspan="3" align="left"><input name="t15_mktime" type="hidden" value="'.md5(microtime()).'" >
Seleccione el Reporte que Desea Consultar:</td>
</tr><tr class="tr3">
<td colspan="3" align="left">';

        include_once('reportes/reportes'.PREFIJO_FOLDERS.'/rep_includes/lista_control_de_calidad.php');

        $body_ctrl_calidad .= '&nbsp;&nbsp;&nbsp;&nbsp;<input name="Submit" type="submit" class="input_submit" value="      Ver Reporte      ">
</td>
</tr>
<tr class="tr3"><td colspan="3" align="right">
<br></td></tr>
</table></form>';
        if (isset($_GET['reporte_seleccionado']) && $_GET['reporte_seleccionado'] != '') {
            $body_ctrl_calidad .= '<table width="98%" align="center" bgcolor="#E9EEF5" class="tabla">
<tr align="center" class="tr2">
<td>';
            $body_ctrl_calidad .= $option_name_array[$codigo_seleccionado];
            $body_ctrl_calidad .= '</td>
</tr>
<tr>
<td>';
            $tbl_wdt = '100%';
            include_once('reportes/reportes'.PREFIJO_FOLDERS.'/rep_includes/consultas_control_de_calidad.php');

            if($total_registros>0) {
                $_body_page .='<tr class="tr3">';
                $_body_page .= '<td colspan="3">';

                if(($pagina - 1) > 0) {
                    $_body_page .="<a href='".$currentPage."&pagina=".($pagina-1)."'>< Anterior</a> ";
                }

                for ($i=1; $i<=$total_paginas; $i++) {
                    if ($pagina == $i)
                        $_body_page .="<b>".$pagina."</b> ";
                }

                if(($pagina + 1)<=$total_paginas) {
                    $_body_page .=" <a href='".$currentPage."&pagina=".($pagina+1)."'>Siguiente ></a>";
                }
                $_body_page .= '</td>';
                $_body_page .='</tr>';

            }
            $_body_page .='</table>';
            $body_ctrl_calidad .= $_body_page;
            $body_ctrl_calidad .= '</td></tr>
            </table>';
        }
        echo $_utiles->squeeze($body_ctrl_calidad);
        ?>
        <?php include_once ("inc_bottom_adm.php");
?>
    </body>
</html>
</html>
