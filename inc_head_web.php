<?php
$expires = 2 * 2 * 3 * 4;
header("Pragma: public");
header("Cache-Control: maxage=" . $expires);
header('Expires: ' . gmdate('D, d M Y H:i:s', time() + $expires) . ' GMT');
header('Content-Encoding: gzip');
$webpage_main_str .= '<META HTTP-EQUIV="Pragma" CONTENT="cache">
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<meta name="description" content="Sitio en php mysql de Intranet de Empresa de Servicios en El Salvador">
<meta name="keywords" content="php, mysql, intranet, servicios, sistema, el salvador">
<meta name="copyright" content="Fuentes Digital http://mvf.brinkster.net/">
<meta name="author" content="Mauricio Vladimir Fuentes Salguero">
<meta name="email" content="mvfuentes@gmail.com">';

$webpage_main_str .= '<link href="webcss/webestilos.css" rel="stylesheet" type="text/css">';
$webpage_main_str .= '<script language="javascript" src="webjs/utiles.js" type="text/javascript"></script>';

?>

