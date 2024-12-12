<?php
$tabla='';
include_once('software.php');
require_once('clases/graficos.php');
$titulo_seccion= 'Lista de Reportes';
$data_title = $titulo_seccion;

$instrucciones = '';

$rpt_links  = '';

$_utiles = new utiles();

$body_lista_rpt = '';

$titulo_rpt = '';

$imprimir_grafico = true;
$imprimir_reporte = true;

if(isset($_GET['tipo_impresion']) && $_GET['tipo_impresion'] != '') {
    $tipo_impresion = $_GET['tipo_impresion'];
    if($_GET['tipo_impresion']== '0') {
        $imprimir_grafico = true;
        $imprimir_reporte = false;
    }
    else {
        $imprimir_grafico = false;
        $imprimir_reporte = true;
    }
}
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html>
    <head>
        <?php include_once ("inc_head_adm.php");
        if ($no_menu == '' ) {
            $bk_color = '#f0f0f0';
        }
        else {
            $bk_color = '#ffffff';
        }
        ?>
        <title><?php echo $titulo_seccion;
        ?></title>
    </head>
    <body onLoad="load_functions();" marginwidth="5px" marginheight="4px" leftmargin="0" topmargin="4px" bgcolor="<?php echo $bk_color;?>">
              <?php
              if ($no_menu == '' ) {
                  include_once ("inc_top_adm.php");
              }
              if ($no_menu == '' ) {
                  $body_rpt = '<p></p><div align="center"><div id="as_rpt" style="overflow: auto; width: 710px; height: 440px; padding:0px; margin: 0px">';
                  $recuadro_dinamico = " style='overflow: auto; width: 698px; height: 440px; padding:0px; margin: 0px' ";
              }
              else {
                  $body_rpt = '<p></p><div align="center"><div>';
              }
              if ($no_menu == '' ) {

                  $body_lista_rpt .= '
<form name="form1" method="get" action="lista_de_reportes.php">
<table width="98%" align="center" bgcolor="#E9EEF5" class="tabla">
<tr class="tr2">
<td colspan="3" align="center"><input name="t19_mktime" type="hidden" value="'.md5(microtime()).'" >
Lista de Reportes
</td>
</tr>
<tr class="tr3">
<td colspan="3" align="left">
Seleccione el Tipo de Reporte y el Rango de Fechas que Desea Consultar:
</td>
</tr>';
              }
              $parametros_arr = array();
              $_controles = new controles();

              if (isset($_GET['sel_mes']) && $_GET['sel_mes'] != '') {
                  for($z=0;$z<2;$z++) {
                      $parametros_arr[$z]['sel_anio'] = $_GET['sel_anio'][$z];
                      $parametros_arr[$z]['sel_mes']= $_GET['sel_mes'][$z];
                      $parametros_arr[$z]['sel_dia']= $_GET['sel_dia'][$z];
                      $fecha[$z]= $parametros_arr[$z]['sel_anio'].'-'.$parametros_arr[$z]['sel_mes'].'-'.$parametros_arr[$z]['sel_dia'];
                  }
              }
              else {
                  $parametros_arr[0]['sel_anio']= date('Y');
                  $parametros_arr[0]['sel_mes']= date('m');
                  $parametros_arr[0]['sel_dia']= date('d');

                  $parametros_arr[1]['sel_anio']= date('Y');
                  $parametros_arr[1]['sel_mes']= date('m');
                  $parametros_arr[1]['sel_dia']= date('d');

                  $fecha[0]= $parametros_arr[0]['sel_anio'].'-'.$parametros_arr[0]['sel_mes'].'-'.$parametros_arr[0]['sel_dia'];
                  $fecha[1]= $parametros_arr[1]['sel_anio'].'-'.$parametros_arr[1]['sel_mes'].'-'.$parametros_arr[1]['sel_dia'];

              }
              $parametros_arr[0]['script_code']='';
              $parametros_arr[1]['script_code']='';
              $parametros_arr[0]['class_line']='tr1';
              $parametros_arr[1]['class_line']='tr1';
              $parametros_arr[0]['class_ctrl']='input_corto';
              $parametros_arr[1]['class_ctrl']='input_corto';
              $parametros_arr[0]['size_ctrl']='32';
              $parametros_arr[1]['size_ctrl']='32';
              $parametros_arr[0]['campo_valor']='';
              $parametros_arr[1]['campo_valor']='';
              $parametros_arr[0]['rotulo']='Desde';
              $parametros_arr[1]['rotulo']='Hasta';
              $parametros_arr[0]['evento_str']= '';
              $parametros_arr[1]['evento_str']= '';
              if ($no_menu == '' ) {
                  $body_lista_rpt .= $_controles->asignar_control('desde_hasta', $parametros_arr);
              }
              $fecha_reporte = ' Desde el ';

              for ($f=0;$f<2;$f++) {
                  if ($f==1) {
                      $fecha_reporte .= ' Hasta el ';
                  }

                  $fecha_reporte .=  $_utiles->formato_fecha($parametros_arr[$f]['sel_anio'].'-'.$parametros_arr[$f]['sel_mes'].'-'.$parametros_arr[$f]['sel_dia']);
              }

              if ($no_menu == '' ) {
                  $body_lista_rpt .= '
<tr class="tr3">
<td colspan="3" align="left">';
              }

              $option_name_array = array();
              $select_reportes_str = '';

              include_once('reportes/reportes'.PREFIJO_FOLDERS.'/rep_includes/lista_de_reportes_main.php');



              $total_opciones = sizeof($option_name_array);

              $_lista_de_reportes = new lista_de_reportes();

              $_lista_de_reportes->lista_de_reportes_view();

              if ($no_menu == '' ) {
                  $body_lista_rpt .= $_utiles->squeeze($_lista_de_reportes->select_reportes_str);
              }

              if ($no_menu == '' ) {
                  $body_lista_rpt .= '&nbsp;&nbsp;&nbsp;&nbsp;<input name="Submit" type="submit" class="input_submit" value="      Ver Reporte      ">
</td>
</tr>
<tr class="tr3"><td colspan="3" align="right">
<br>
</td>
</tr>
</table>
</form>';
              }
              if (isset($_GET['reporte_seleccionado']) && $_GET['reporte_seleccionado'] != '') {
                  $titulo_rpt .= '<div align="center" class="titulo_seccion">'.$option_name_array[$codigo_seleccionado].'</div>';
                  if ($imprimir_grafico) {
                      $body_lista_rpt .= $titulo_rpt;
                      $body_lista_rpt .= '<p></p>';
                      $body_lista_rpt .= '
<table width="98%" align="center" bgcolor="#E9EEF5" class="tabla">
<tr align="center" class="tr2">
<td >Reporte Gráfico'.$fecha_reporte.'</td>
</tr>
<tr><td>';
                  }


                  $where_reporte_str = ' AND Fecha BETWEEN '.$_utiles->GetSQLValueString($fecha[0], 'date').' AND '.$_utiles->GetSQLValueString($fecha[1], 'date');

                  if ($no_menu=='') {
                      $rpt_links = '<div align="right"><br><a href="#" class="titulo_menu" onClick="javascript:abrirlink(\'ver\', \'lista_de_reportes.php?no_menu=1&amp;tipo_impresion=0&amp;'.$_SERVER['QUERY_STRING'].'\',\''.str_replace(" ",'',md5(microtime())).'\');">Imprimir Gráfica</a>&nbsp;-&nbsp;<a href="#" class="titulo_menu" onClick="javascript:abrirlink(\'ver\', \'lista_de_reportes.php?no_menu=1&amp;tipo_impresion=1&amp;'.$_SERVER['QUERY_STRING'].'\',\''.str_replace(" ",'',md5(microtime())).'\');">Imprimir Reporte</a>&nbsp;&nbsp;&nbsp;&nbsp;</div>';
                  }
                  else {
                      $rpt_links = '';
                  }
                  if ($imprimir_reporte) {
                      $body_rpt .= $titulo_rpt;
                  }


                  $numfields_vista_reporte = 0;
                  $tbl_wdt = '100%';

                  include_once('reportes/reportes'.PREFIJO_FOLDERS.'/rep_includes/consultas.php');

                  if ($imprimir_grafico) {
                      $rs_vista_reporte = mysqli_query($query_vista_reporte, CONEXION) or trigger_error(mysql_error(),E_USER_ERROR);
                      $row_rs_vista_reporte  = mysqli_fetch_assoc($rs_vista_reporte);
                      $numfields_vista_reporte = mysqli_num_rows($rs_vista_reporte);

                      $data = array();

                      $legend_x = array();

                      $legend_y = array();

                      array_push($legend_x,'CANTIDAD');

                      if ($numfields_vista_reporte > 0) {
                          do {
                              $legend_y[] = $row_rs_vista_reporte['Estadistico'];
                              $data[0][] = $row_rs_vista_reporte['Total_Reporte'];

                          }
                          while ($row_rs_vista_reporte = mysqli_fetch_assoc($rs_vista_reporte));
                      }
                  }

                  if ($imprimir_grafico) {
                      include_once('reportes/graficador.php');
                      $body_lista_rpt .= '
    </td>
</tr></table>';
                  }
              }
              echo $_utiles->squeeze($body_lista_rpt);
              echo $rpt_links;
              $body_rpt .= '</div></div>';
              echo $_utiles->squeeze($body_rpt);


              if ($no_menu == '' ) {
                  include_once ("inc_bottom_adm.php");
              }
              ?>
    </body>
</html>
