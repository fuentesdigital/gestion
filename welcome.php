<?php
include_once("software.php");

$tabla = '';

if($_SESSION['idSexo'] == '2') {
    $titulo_seccion='Bienvenida ';
}else {
    $titulo_seccion='Bienvenido ';
}

$titulo_seccion .= $_SESSION['admin_nombre']. " " . $_SESSION['admin_apellidos'];
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html>
    <head><?php include_once ("inc_head_adm.php");?><title><?php echo $titulo_seccion;?></title></head>
    <body onLoad="load_functions();" marginwidth="5px" marginheight="4px" leftmargin="0" topmargin="4px" bgcolor="#f0f0f0">
        <?php include_once ("inc_top_adm.php");
        $_body_welcome = '
<table width="98%" border="0" cellpadding="6" align="center" cellspacing="4" bgcolor="#E9EEF5" class="tabla">
<tr>
<td class="tr3" align="center"><br><br><br>'.$_SESSION['admin_nombre'] . ', ' . MENSAJE_PPAL.'<br><br><br><br></td>
</tr>
</table>';
        echo $_software->squeeze($_body_welcome);
        include_once ("inc_bottom_adm.php");
        ?></body></html>
