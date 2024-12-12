<?php
include_once("../software.php");
//include_once("../clases/browser_ficha_kernel.php");
//include_once("../clases/acceso_a_opcion.php");
//include_once("../clases/rpt_ficha.php");
?><base href="../" /><?php
$filas_view_detalle = '';

if (isset($_GET['nombre_seccion'])) {
    $nombre_seccion = str_replace("_"," ",$_GET['nombre_seccion']);
}
else {
    $nombre_seccion = '';
}

$titulo_seccion= "&nbsp;".NOMBRE_SISTEMA.".<br>&nbsp;".$nombre_seccion;

if (isset($_GET['tabla'])) {
    $tabla = $_GET['tabla'];
}

if (isset($_GET['nombre_campo'])) {
    $nombre_campo=$_GET['nombre_campo'];
}

if (isset($_GET[$nombre_campo])) {
    $codigo=$_GET[$nombre_campo];
}

if (isset($_GET["es_grid"])) {
    $es_grid = $_GET["es_grid"];
}


//$_rpt_ficha = new rpt_ficha();

$_browser_ficha_kernel = new browser_ficha_kernel();

echo $_browser_ficha_kernel->filas;

//$_software->rpt_ficha();
?>
