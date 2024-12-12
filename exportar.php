<?php
include_once("software.php");
$tabla = '';
$_utiles = new utiles();
$tabla = $_GET['tabla'];
$nombre_seccion = $_GET['nombre_seccion'];
$titulo_seccion = 'Exportar Tabla ' . $nombre_seccion;
$strOpcionGrid = '';
$codigoPadre = '';
if (isset($_GET['codigo']) && $_GET['codigo'] != '') {
    $strOpcionGrid = '<br><input type="radio" name="exportar" value="4" />Sólo Detalle Seleccionado';
    $codigoPadre = $_GET['codigo'];
}
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html>
    <head><?php include_once ("inc_head_adm.php"); ?><title><?php echo $titulo_seccion; ?></title>
        <script language="javascript">
            function getIFrameDocument(a) {
                var b = null;
                if (document.getElementById(a).contentDocument) {
                    b = document.getElementById(a).contentDocument
                } else {
                    b = document.frames[a].document
                }
                return b
            }
            

            function getRadioButtonSelectedValue(ctrl)
            {
                for(i=0;i<ctrl.length;i++)
                if(ctrl[i].checked) return ctrl[i].value;
            }

            function exportar_datos(tbl){
                var marcoexport = getIFrameDocument("iframeExport");
                var tipo_exportacion = getRadioButtonSelectedValue(document.form_exportar.exportar);
                var codigo_padre = document.form_exportar.codigo_padre.value;
                marcoexport.location = 'exportar_tabla.php?tabla='+tbl+'&texport='+tipo_exportacion+'&codigo_padre='+codigo_padre;               
            }
        </script>
    </head>
    <body onLoad="load_functions();" marginwidth="5px" marginheight="4px" leftmargin="0" topmargin="4px" bgcolor="#f0f0f0">
        <?php
//include_once ("inc_top_adm.php");
        include('inc_top_rotulos.php');
        $_body_export = '<table width="745" border="0" cellpadding="0" cellspacing="1" class="tabla"><tr align="center" ><td colspan="2"><form name="form_exportar" action="exportar.php" method="GET">
<table width="98%" border="0" cellpadding="6" align="center" cellspacing="4" bgcolor="#E9EEF5" class="tabla">
<tr>
<td class="tr3" align="center"><br><p class="titulo_menu">' . $titulo_seccion . ':</p><input type="radio" name="exportar"  checked="checked" value="1"/>Todos los Valores<br><input type="radio" name="exportar" value="2" />Valores ' . $rotulo_estado_activo . '<br><input type="radio" name="exportar" value="3" />Valores ' . $rotulo_estado_inactivo . $strOpcionGrid . '<br><input type="hidden" name="codigo_padre" value="' . $codigoPadre . '" />
<br><input type="button" value="  Regresar  " class="input_submit" onClick="history.go(-1);"/>&nbsp;<input onClick="exportar_datos(\'' . $tabla . '\')" type="button" value="  Ok, Exportar Tabla!  " class="input_submit" />    
<br><br><br></td>
</tr>
</table></form>
<iframe src="iframe.htm" id="iframeExport" name="iframeExport" style="width:0px; height:0px;" frameborder="0" scrolling="no"></iframe>';
        echo $_utiles->squeeze($_body_export);
        include_once ("inc_bottom_adm.php");
        ?></body></html>
