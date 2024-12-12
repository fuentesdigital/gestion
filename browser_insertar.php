<?php
include_once("software.php");
include_once("clases/browser_insertar_kernel.php");
include_once("clases/browser_insertar_post.php");

$_utiles = new utiles();

$titulo_seccion = $_GET['nombre_seccion'];

$tabla = $_GET['tabla'];

$_browser_insertar_kernel = new browser_insertar_kernel();
$filas = $_browser_insertar_kernel->filas;

$script_salir = '';

if ((isset($_POST["MM_insert"])) && ($_POST["MM_insert"] == "form1")) {

    $tabla = $_POST['tabla'];

    $campos_arr = array();
    $campos_arr = $_POST['campos'];

    $_browser_insertar_post = new browser_insertar_post();
    
    $codigo_insertado_id = $_browser_insertar_post->codigo_insertado; 

    if ((isset($_GET["repintartabla"])) && $_GET["repintartabla"] == "1") {
        $query_RsForanea = "SELECT * FROM " . $tabla . " WHERE estado = 1";
        $RsForanea = mysqli_query($query_RsForanea, CONEXION) or trigger_error(mysql_error(), E_USER_ERROR);
        $row_RsForanea = mysqli_fetch_assoc($RsForanea);
        $totalRows_RsForanea = mysqli_num_rows($RsForanea);
        $campoForaneoTabla = 'id' . $tabla;
        $script_salir .= "<script language='javascript'>";
        $script_salir .= "parent.borrar_lista_" . $campoForaneoTabla . "();";
        $contadorLabel = 0;
        do {
            $tblOption = $row_RsForanea[$tabla];
            $tblLabel = $row_RsForanea['id' . $tabla];
            $script_salir .= "parent.llenar_foranea2_" . $campoForaneoTabla . "('" . $campoForaneoTabla . "','" . $tblLabel  . "','" . $tblOption. "','" . $contadorLabel . "');";
            $contadorLabel++;
        } while ($row_RsForanea = mysqli_fetch_assoc($RsForanea));
        $script_salir .= "parent.foranea2_seleccionado_" . $campoForaneoTabla . "('" . $codigo_insertado_id. "');";
        $script_salir .= "</script>";
    } else {
        $body_onload_function = "onload=refresh_opener();";
        $script_salir .= '<script language="javascript" src="js/funciones_post.js" type="text/javascript"></script>';
        if ((isset($_POST["salir_al_insertar"])) && $_POST["salir_al_insertar"] == "1") {
            $script_salir .= '<script language="javascript">window.close();</script>';
        }
        $script_salir .= '<script language="javascript">window.opener.location.reload(true);</script>';
    }
    ?><!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
    <html>
        <head>
            <?php echo $script_salir; ?>
        </head>
        <body></body>
    </html>
    <?php
} else {
    ?>

    <!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
    <html>
        <head>
            <?php include_once ("inc_head_adm.php"); ?>
            <title><?php echo $titulo_seccion; ?></title>
            <script language="javascript" type="text/javascript" src="js/actb.js"></script>
            <script language="javascript" type="text/javascript" src="js/common.js"></script>
        </head>
        <body onload=load_functions();>
            <?php
            if ($no_menu == '') {
                include_once ("inc_top_adm.php");
            }
            echo $filas;
            if ($no_menu == '') {
                include_once ("inc_bottom_adm.php");
            }
            ?>

        </body>
    </html>
    <?php
}
?>