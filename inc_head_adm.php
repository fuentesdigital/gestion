<?php
$expires = 2 * 2 * 3 * 4;
header("Pragma: public");
header("Cache-Control: maxage=" . $expires);
header('Expires: ' . gmdate('D, d M Y H:i:s', time() + $expires) . ' GMT');
header('Content-Encoding: gzip');
$inc_head_str = '';
$inc_body_str = '';
$inc_head_str = '<META HTTP-EQUIV="Pragma" CONTENT="cache">
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<meta name="description" content="Sitio en php mysql de Intranet de Empresa de Servicios en El Salvador">
<meta name="keywords" content="php, mysql, intranet, servicios, sistema, el salvador">
<meta name="copyright" content="Fuentes Digital http://mvf.brinkster.net/">
<meta name="author" content="Mauricio Vladimir Fuentes Salguero">
<meta name="email" content="mvfuentes@gmail.com">';

if (isset($_GET['no_menu']) && $_GET['no_menu'] == '1') {
    $no_menu = 1;
} else {
    $no_menu = 0;
}

if ($no_menu == 1) {
    $inc_head_str = '';
} else {
    if (isset($_SESSION['Nivel_de_Usuario'])) {
        $idNivel = $_SESSION['Nivel_de_Usuario'];
        //include_once("clases/menu.php");
        //$menu = new menu();
        $_software->print_menu($idNivel);
        $inc_body_str = $_software->menu_str;
    } else {
        echo $_software->go_home();
    }
}
$inc_head_str .= '<link href="css/' . TEMA . '.css" rel="stylesheet" type="text/css">';
//$inc_head_str .= '<link rel="stylesheet" href="css/menu_style.css" type="text/css">';
$inc_head_str .= '<link rel="stylesheet" type="text/css" href="ddlevelsfiles/ddlevelsmenu-base.css" />
<link rel="stylesheet" type="text/css" href="ddlevelsfiles/ddlevelsmenu-topbar.css" />
<link rel="stylesheet" type="text/css" href="ddlevelsfiles/ddlevelsmenu-sidebar.css" />
<script type="text/javascript" src="ddlevelsfiles/ddlevelsmenu.js">
</script>';
if (ARCHIVO_DE_AYUDA != '') {
    $inc_head_str .= '<script type="text/javascript" src="help_img.js"></script>';
}
//<script language="'javascript" src="'js/menu_script.js" type="text/javascript"></script>
$inc_head_str .= '<script language="javascript" src="js/util.js" type="text/javascript"></script>
<meta http-equiv="X-UA-Compatible" content="IE = edge" />';
if ($es_multimedia == '1') { 
    $inc_head_str .= "<script src='jscripts/tiny_mce/tinymce.min.js'></script>
			<script>
    			tinymce.init({selector:'textarea'});
    		</script>";
} 
echo $_software->squeeze($inc_head_str);
?>
