<?php
include_once("software.php");

$webpage_main_str = '';
$titulo_seccion = 'FD Fuentes Digital - CMS DEMO';

include_once 'web/parametros_web.php';
include_once 'web/pintar_webpage.php';
$_pintar_webpage = new pintar_webpage();
$_pintar_webpage->crear_parametros_web();

$svr_name = $_pintar_webpage->get_svr_info();

$webpage_main_str .= '<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html><head>';
include_once ("inc_head_web.php");
$webpage_main_str .= '<title>' . $titulo_seccion . '</title>
</head><body onLoad="document.formulario_google.q.focus();">';
$webpage_main_str .= '<table border="0" class="tabla1">
    <tr>
        <td width="131" height="133"></td>
        <td width="161"><br><br><a href="index.php"><img src="webimages/home.png" border="0"></a></td>
        <td width="418" class="fuentes_digital"><br>FD Fuentes Digital</td>
        <td width="296"><a id="displayText" href="javascript:toggle();">CMS - DEMO</a><br><img  vspace="4px" hspace="3px" src="webimages/sv.png"><img vspace="4px" hspace="3px" src="webimages/facebook.png"><img  vspace="4px" hspace="3px" src="webimages/twitter.png"><a href="login.php" target="_blank"><img vspace="4px" hspace="3px" src="webimages/login.png"></a><FORM method=GET action="http://www.google.com/search" name="formulario_google">
                <INPUT TYPE=text name=q size=10 maxlength=255 value="" class="input_corto" >&nbsp;&nbsp;<INPUT type="image" src="webimages/lupa.png" name=btnG VALUE="Búsqueda Google">
                <INPUT TYPE=hidden name=hl value=es></FORM>
        </td>
    </tr>
    <tr>
        <td valign="top">&nbsp;</td>
        <td><a id="displayText" href="javascript:toggle();">CMS - DEMO</a><div id="toggleText" style="display: none"><div id="LayerLicenciaWEB" style="position:absolute; left:1px; z-index:2">' . LICENCIA . '</div></div><br>
            <br><a href="index.php"><img src="webimages/cheque.png" border="0"><span class="titulo3">Inicio</span></a>';
            $_pintar_webpage->pintar_lista_multimedia();
            $webpage_main_str .= $_pintar_webpage->str_bloque_principal;
$webpage_main_str .= '<br><a href="index.php?tbl=Fotodiaria"><img src="webimages/cheque.png" border="0"><span class="titulo3">Foto del d&iacute;a</span></a>
            <br><a href="index.php?tbl=Galeria"><img src="webimages/cheque.png" border="0"><span class="titulo3">Galer&iacute;a de im&aacute;genes</span></a>
            <br><a href="index.php?idBiblioteca='.$_pintar_webpage->idBiblioteca.'"><img src="webimages/cheque.png" border="0"><span class="titulo3">Biblioteca</span></a>
            <br><a href="index.php?idEnlaceexterno='.$_pintar_webpage->idEnlaceexterno.'"><img src="webimages/cheque.png" border="0"><span class="titulo3">Enlaces</span></a>
            <br><a href="index.php?idProyecto='.$_pintar_webpage->idProyecto.'"><img src="webimages/cheque.png" border="0"><span class="titulo3">Proyectos</span></a>
            <br><a href="index.php?idExposicion='.$_pintar_webpage->idExposicion.'"><img src="webimages/cheque.png" border="0"><span class="titulo3">Exposiciones y Charlas</span></a>
            <br><a href="#" onClick="abrir_ventanita(\'webforms/contacto.php\');"><img src="webimages/cheque.png" border="0"><span class="titulo3">Contacto</span></a>
            <br><br><a href="#" onClick="abrir_ventanita(\'webforms/contacto.php\');"><img src="webimages/contacto.png" border="0"></a>
        </td>
        <td class="tdLinea"><div id="scroll">';

if ($_pintar_webpage->pintarMultimedia) {
    $_pintar_webpage->pintar_multimedia($_pintar_webpage->idSeccionmultimedia, $_pintar_webpage->idContenidomultimedia);
    $webpage_main_str .= $_pintar_webpage->str_bloque_principal;
    $webpage_main_str .= $_pintar_webpage->str_bloque_secundario;
} else if ($_pintar_webpage->pintarSimple) {
    $_pintar_webpage->pintar_simple($_pintar_webpage->idSeccionsimple, $_pintar_webpage->idContenidosimple);
    $webpage_main_str .= $_pintar_webpage->str_bloque_principal;
    $webpage_main_str .= $_pintar_webpage->str_bloque_secundario;
} else if ($_pintar_webpage->pintarBiblioteca) {
    $_pintar_webpage->pintar_biblioteca($_pintar_webpage->idBiblioteca);
    $webpage_main_str .= $_pintar_webpage->str_bloque_principal;
    $webpage_main_str .= $_pintar_webpage->str_bloque_secundario;
} else if ($_pintar_webpage->pintarEnlaceexterno) {
    $_pintar_webpage->pintar_enlace_externo($_pintar_webpage->idEnlaceexterno);
    $webpage_main_str .= $_pintar_webpage->str_bloque_principal;
    $webpage_main_str .= $_pintar_webpage->str_bloque_secundario;
} else if ($_pintar_webpage->pintarProyecto) {
    $_pintar_webpage->pintar_proyecto($_pintar_webpage->idProyecto);
    $webpage_main_str .= $_pintar_webpage->str_bloque_principal;
    $webpage_main_str .= $_pintar_webpage->str_bloque_secundario;
} else if ($_pintar_webpage->pintarExposicion) {
    $_pintar_webpage->pintar_exposicion($_pintar_webpage->idExposicion);
    $webpage_main_str .= $_pintar_webpage->str_bloque_principal;
    $webpage_main_str .= $_pintar_webpage->str_bloque_secundario;
} else {
    $_pintar_webpage->pintar_galerias($_pintar_webpage->tbl, $_pintar_webpage->idTabla);
    $webpage_main_str .= $_pintar_webpage->str_bloque_principal;
    $webpage_main_str .= $_pintar_webpage->str_bloque_secundario;
}
$webpage_main_str .= '</div></td>
        <td>
            <br>';
$_pintar_webpage->pintar_lista_simple();
$webpage_main_str .= $_pintar_webpage->str_bloque_principal;
$webpage_main_str .= '<br><a href="#" onClick="abrir_ventanita(\'webforms/suscripcion.php\');"><img src="webimages/cheque.png" border="0"><span class="titulo3">Suscripci&oacute;n</span></a>
            <br><br><a href="index.php?idSeccionsimple=5"><img src="webimages/boletin.png" border="0"></a>
            <br></td>
    </tr>
</table>';
$webpage_main_str .= '</body>
</html>';
echo $_pintar_webpage->squeeze($webpage_main_str);
include_once 'inc_bottom_web.php';
?>
