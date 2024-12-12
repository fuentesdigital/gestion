<?php
include_once("software.php");
include_once("clases/browser_ficha_kernel.php");
include_once("clases/acceso_a_opcion.php");

$filas_view_detalle = '';

if (isset($_GET['nombre_seccion'])) {
    $nombre_seccion = str_replace("_", " ", $_GET['nombre_seccion']);
} else {
    $nombre_seccion = '';
}

$titulo_seccion = "&nbsp;" . NOMBRE_SISTEMA . ".<br>&nbsp;" . $nombre_seccion;

if (isset($_GET['tabla'])) {
    $tabla = $_GET['tabla'];
}

if (isset($_GET['nombre_campo'])) {
    $nombre_campo = $_GET['nombre_campo'];
}

if (isset($_GET[$nombre_campo])) {
    $codigo = $_GET[$nombre_campo];
}

if (isset($_GET["es_grid"])) {
    $es_grid = $_GET["es_grid"];
}


$microtime_val = $codigo;

if (isset($_GET["edit_table"])) {
    $edit_table = $_GET["edit_table"];
}

if (isset($_GET['id_op'])) {
    $id_op = $_GET['id_op'];
}

$_acceso_a_opcion = new acceso_a_opcion();
$_acceso_a_opcion->acceso_opcion($id_op);
$consultar_flag = $_acceso_a_opcion->opciones_validas['consultar'];
$insertar_flag = $_acceso_a_opcion->opciones_validas['insertar'];
$modificar_flag = $_acceso_a_opcion->opciones_validas['modificar'];

if ($modificar_flag == '1') {
    $insertar_flag = '1';
    $consultar_flag = '1';
}

if ($insertar_flag == '1') {
    $consultar_flag = '1';
}

$_browser_ficha_kernel = new browser_ficha_kernel();

$filas_view_detalle = $_browser_ficha_kernel->filas;
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html>
    <head>
        <META HTTP-EQUIV="Pragma" CONTENT="no-cache">
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title><?php echo $titulo_seccion;
?></title>
        <link href="css/print.css" rel="stylesheet" type="text/css">
    </head>
    <body>
        <h3><?php echo $titulo_seccion;
?></h3>
        <table border="0" cellpadding="0" cellspacing="0" class="tabla">
            <tr><td>
<?php
if ($edit_table == "1") {
    if ($insertar_flag == '1') {
        ?>
                            &nbsp;<a href="#" onClick="javascript:abrirlink('insertar', 'browser_insertar.php?tabla=<?php echo $tabla;
                    ?>grid&nombre_seccion=<?php echo $nombre_seccion;
        ?>&no_menu=1&padre=<?php echo $codigo;
        ?>','<?php echo str_replace(" ", '', md5(microtime())) ?>');"><strong>Insertar Nuevo</strong></a>
                                     <?php
                                 }
                             }
                             if (isset($_GET["es_grid"])) {
                                 ?>&nbsp;-&nbsp;<b><a href='exportar.php?tabla=<?php echo $tabla; ?>grid&nombre_seccion=<?php echo $nombre_seccion; ?>&titulo_sufix=Todos&no_menu=1&codigo=<?php echo $codigo; ?>'>Exportar</a>&nbsp;-&nbsp;<b><a href='javascript:location.reload();'>Recargar (F5)</a></b>
                    <?php } ?>
                </td></tr>
            <?php echo $filas_view_detalle;
            ?>
        </table>
        <script language="javascript" src="js/util.js" type="text/javascript"></script>
    </body>
</html>
