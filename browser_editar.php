<?php
include_once("software.php");
include_once("clases/browser_editar_kernel.php");
include_once("clases/browser_editar_post.php");

$_utiles = new utiles();
$nombre_seccion = $_GET['nombre_seccion'];
$titulo_seccion = $nombre_seccion;

if (isset($_GET['tabla'])) {
    $tabla = $_GET['tabla'];
}

if (isset($_GET['nombre_campo'])) {
    $nombre_campo = $_GET['nombre_campo'];
}


if (isset($_GET[$_utiles->codigo_tabla($tabla)])) {
    $codigo = $_GET[$_utiles->codigo_tabla($tabla)];
    $microtime_val = $codigo;
}


$where_str_nivel_2 = '';

if (isset($_GET['where_str_nivel_2'])) {
    $where_str_nivel_2 = $_GET['where_str_nivel_2'];
}
$script_salir = '';
if ((isset($_POST["MM_update"])) && ($_POST["MM_update"] == "form1")) {

    $script_salir = '<script language="javascript" src="js/funciones_post.js" type="text/javascript"></script>';

    $tabla = $_POST['tabla'];

    $nombre_campo = $_POST['nombre_campo'];
    $codigo = $_POST['codigo'];

    $campos_arr = array();
    $campos_arr = $_POST['campos'];

    $_browser_editar_post = new browser_editar_post();

    $tabla_g = $tabla . "grid";
    $padre_g = $codigo;
    ?><!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
    <html>
        <head>
            <?php echo $script_salir;?>
        </head>
        <body onload=refresh_opener();></body>
    </html>
    <?php
    die();
}
$_browser_editar_kernel = new browser_editar_kernel();
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html>
    <head>
<?php include_once ("inc_head_adm.php"); ?>
        <script language="javascript" type="text/javascript" src="js/actb.js"></script>
        <script language="javascript" type="text/javascript" src="js/common.js"></script>
        <title><?php echo $titulo_seccion;
?></title>
    </head>
            <?php $no_menu = $_GET["no_menu"];
            ?>
    <body onload=load_functions();>
    <?php
    if ($no_menu == '') {
        include_once ("inc_top_adm.php");
    }
    echo $_browser_editar_kernel->filas;

    if ($no_menu == '') {
        include_once ("inc_bottom_adm.php");
    }
    ?>
    </body>
</html>
