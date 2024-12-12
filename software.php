<?php
include_once('claves_de_acceso.php');
include_once('metadatos/metadatos_array.php');
include_once('clases/constantes.php');
include_once('controles/controles.php');
include_once('clases/power_tools.php');
include_once('clases/utiles.php');
include_once('clases/validar_ingreso.php');
include_once("clases/acceso_a_opcion.php");
include_once('clases/iptimemark.php');
include_once('clases/lista_de_reportes.php');
include_once('clases/menu.php');
include_once("clases/filtros_browser.php");
include_once("clases/browser_kernel.php");
include_once("clases/detalle_browser.php");
include_once("clases/reportes_browser.php");
include_once("clases/browser_ficha_kernel.php");
include_once("clases/rpt_ficha.php");
include_once('clases/principal.php');

$_software = new principal();

//$conn = $_software->_conexion;

define('FORM_ACTION', $_software->_form_action);
define('EDIT_FORM_ACTION', $_software->_editFormAction);
define('CURRENT_PAGE', $_software->_editFormAction);
if (isset($_SESSION['usuario_sistema'])) {
    define('USUARIO', $_SESSION['usuario_sistema']);
}
define('GERENTE', $_software->rotulo_constante('gerente'));
define('TELEFONO_GERENTE', $_software->rotulo_constante('telefonogerente'));
define('IVA', $_software->rotulo_constante('iva'));
define('ISSS', $_software->rotulo_constante('isss'));
define('AFP', $_software->rotulo_constante('afp'));
define('NIT_PATRONAL', $_software->rotulo_constante('nitpatronal'));
define('PAGE_BREAK', 'style="page-break-before:always;"');
define('MENSAJE_PPAL', $_software->rotulo_constante('mensajeppal'));
define('NOMBRE_SISTEMA', $_software->rotulo_constante('nombresistema'));
define('NOMBRE_CONTRATANTE', $_software->rotulo_constante('nombrecontratante'));
define('NACIMIENTO_CONTRATANTE', $_software->rotulo_constante('nacimientocontratante'));
//define('ENGINE_DB', 'InnoDB');
//define('CHARSET_DB', 'utf8');
//define('COLLATION_DB', 'utf8_bin');
define('ENGINE_DB', 'myISAM');
define('CHARSET_DB', 'latin1');
define('COLLATION_DB', 'latin1_general_ci');
define('TEMA', $_software->rotulo_constante('tema'));
define('USA_BOTON_PPAL', $_software->rotulo_constante('botonmain'));
define('LINEA_FIRMA', '<br>____________________________<br>');
define('CANTIDAD', $_software->rotulo_constante('espacios'));
define('BIENVENIDO_L1', $_software->rotulo_constante('bienvenido_l1'));
define('BIENVENIDO_L2', $_software->rotulo_constante('bienvenido_l2'));
define('TITULO_LOGIN', $_software->rotulo_constante('login'));
define('ARCHIVO_DE_AYUDA', $_software->rotulo_constante('ayuda'));
define('PRECISION_DECIMAL', $_software->rotulo_constante('precision'));
define('LICENCIA', $_software->rotulo_constante('licencia'));

$consultar_flag = '0';

$insertar_flag = '0';

$modificar_flag = '0';

$es_home_page = '0';

$es_multimedia = '1';

$es_proyecto_er = '1';

if ($_software->LogoutApp == true) {
    die('Session is Closed!');
}

?>
