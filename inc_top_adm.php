<?php
include('inc_top_rotulos.php');
$inc_top_str = '';
if (ARCHIVO_DE_AYUDA != '') {
    //$help_file_link = 'reportes/reportes' . PREFIJO_FOLDERS . '/ayuda/' . ARCHIVO_DE_AYUDA;
    $help_file_link = 'javascript:location.reload();';
    //$inc_top_str .= '<div style="position: absolute; top: 96px; left: 698px; width: 2in"><a target ="_blank"; href="' . $help_file_link . '" onmouseover="image1.src=loadImage1.src;" onmouseout="image1.src=staticImage1.src;"><img name="image1" src="f1.png" border=0></a></div>';
    $inc_top_str .= '<div style="position: absolute; top: 96px; left: 698px; width: 2in"><a href="' . $help_file_link . '" onmouseover="image1.src=loadImage1.src;image1.alt=\'RELOAD (F5)\';" onmouseout="image1.src=staticImage1.src;image1.alt=\'RELOAD (F5)\';"><img name="image1" src="f1.png" border=0></a></div>';
}
$inc_top_str .= '<center><img src="pix.gif" height="35px"></center>
<table width="745" border="0" cellpadding="0" cellspacing="1" class="tabla">
<tr><td height="35" align="center" class="tr6">' . NOMBRE_SISTEMA . '</td>
</tr><tr align="center" ><td colspan="2"> <table width="100%" border="0">
<tr><td colspan="2" align="left" class="tr7"><img src="imagenes' . PREFIJO_FOLDERS . '/banner_' . TEMA . '.png"  border="0"></td>
</tr><tr ><td colspan="2" align="left" ></td></tr></table></td>
</tr><tr><td valign="top" bgcolor="#FFFFFF"><br>';
$inc_top_str .= '<table width="97%" align="center"><tr>';
$inc_top_str .= '<td align="left"><div class="titulo_seccion"><u>' . $titulo_seccion . '</u></div></td></tr>';
$inc_top_str .= '<tr><td align="right"><form action="" method="get" name="form_cerrar" id="form_cerrar">';
if ($es_multimedia == '1') {
    $inc_top_str .= '<input name="Submit_Multimedia" type="button" class="input_submit" value="      Multimedia      "  onClick="abrirlink(\'ver\', \'multimedia.php\',\'' . str_replace(" ", '', md5(microtime())) . '\');"><input name="Submit_Multimedia" type="button" class="input_submit" value="      Docs      "  onClick="abrirlink(\'ver\', \'documentos.php\',\'' . str_replace(" ", '', md5(microtime())) . '\');"><input name="Submit_Multimedia" type="button" class="input_submit" value="      Portadas      "  onClick="abrirlink(\'ver\', \'portadas.php\',\'' . str_replace(" ", '', md5(microtime())) . '\');">';
}
if ($es_proyecto_er == '1') {
    $inc_top_str .= '<input name="Submit_ER" type="button" class="input_submit" value="      ERs      "  onClick="abrirlink(\'ver\', \'er.php\',\'' . str_replace(" ", '', md5(microtime())) . '\');">';
}
$inc_top_str .= '<input name="Submit_Cerrar" type="button" class="input_submit" value="      Salir      "  onClick="open_window(\'cerrar_sesion.php\');"></form></td>';
$inc_top_str .= '</tr></table>';
$inc_top_str .= '<div class="hovermenu"><ul>';
if ($consultar_flag == '1') {
    $titSufix = $_GET['titulo_sufix'];
    $inc_top_str .= '<li><a href="browser.php?tabla=' . $tabla . '&amp;nombre_seccion=' . $nombre_seccion . '&amp;flag=1&amp;id_op=' . $id_op . '&estado=2&titulo_sufix=Todos">Todos</a></li>';
    $inc_top_str .= '<li><a href="browser.php?tabla=' . $tabla . '&amp;nombre_seccion=' . $nombre_seccion . '&amp;flag=1&amp;id_op=' . $id_op . '&estado=1&titulo_sufix=' . $rotulo_estado_activo . '">' . $rotulo_estado_activo . '</a></li>';
    $inc_top_str .= '<li><a href="browser.php?tabla=' . $tabla . '&amp;nombre_seccion=' . $nombre_seccion . '&amp;flag=1&amp;id_op=' . $id_op . '&estado=0&titulo_sufix=' . $rotulo_estado_inactivo . '">' . $rotulo_estado_inactivo . '</a></li>';
    $inc_top_str .= '<li><a href="exportar.php?tabla=' . $tabla . '&amp;nombre_seccion=' . $nombre_seccion . '&amp;flag=0&amp;id_op=' . $id_op . '&titulo_sufix='.$titSufix.'">Exportar</a></li>';    
    $inc_top_str .= '<li><a href="browser.php?tabla=' . $tabla . '&amp;nombre_seccion=' . $nombre_seccion . '&amp;flag=0&amp;id_op=' . $id_op . '&titulo_sufix=B&uacute;squeda">B&uacute;squeda</a></li>';
}
if ($insertar_flag == '1') {
    $inc_top_str .= '<li><a href="#" onClick="javascript:abrirlink(\'insertar\', \'browser_insertar.php?tabla=' . $tabla . '&amp;nombre_seccion=' . $nombre_seccion . '&amp;no_menu=1\');">Insertar</a></li>';
}
$inc_top_str .= '</ul></div>';
echo $_software->squeeze($inc_body_str);
echo $_software->squeeze($inc_top_str);
?>