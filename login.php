<?php
header('Content-Type: text/html; charset=utf-8');
session_start();
session_destroy();
$session_array = array_keys($_SESSION);
foreach ($session_array as $session_key) {
    unset($_SESSION[$session_key]);
}
include_once('software.php');
$es_home_page = '1';
if (isset($_POST['form1'])) {
    if ($_POST['form1'] == 'doLogin') {
        $_software->doLogin();
    }
}
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html>
    <head>
        <title><?php echo NOMBRE_SISTEMA; ?></title>
        <?php include_once ("inc_head_adm.php"); ?>
        <script>
            function cambiar_cookie(cualCookie) {
                document.cookie = 'ColorSistemaCookie=' + cualCookie;
                document.location.reload();
            }
        </script>
    </head>
    <body onLoad="load_functions();" marginwidth="5px" marginheight="4px" leftmargin="0" topmargin="4px" bgcolor="#f0f0f0">
        <?php
        $submit_str = "MM_validateForm('Usuario','','R','Contrasena','','R');document.form1.Usuario.focus();return document.MM_returnValue";

        if (isset($_COOKIE["ColorSistemaCookie"]) && $_COOKIE["ColorSistemaCookie"] != '') {
            $cualCookie = $_COOKIE["ColorSistemaCookie"];
        } else {
            $cualCookie = "1";
        }
        $chequeadoAzul = '';
        $chequeadoLila = '';
        $chequeadoGreen = '';
        $chequeadoBlack = '';

        if ($cualCookie == "1") {
            $chequeadoAzul = 'checked="checked"';
        } else if ($cualCookie == "2") {
            $chequeadoLila = 'checked="checked"';
        } else if ($cualCookie == "3") {
            $chequeadoGreen = 'checked="checked"';
        } else if ($cualCookie == "4") {
            $chequeadoBlack = 'checked="checked"';
        }
        $strColorSistema = '<input type="radio" onClick=cambiar_cookie(this.value); name="temaSistema" value="1" ' . $chequeadoAzul . ' />Azul<input type="radio" onClick=cambiar_cookie(this.value); name="temaSistema" value="2" ' . $chequeadoLila . '/>Morado<input onClick=cambiar_cookie(this.value); type="radio" name="temaSistema" value="3" ' . $chequeadoGreen . '/>Verde<input type="radio" onClick=cambiar_cookie(this.value); name="temaSistema" value="4" ' . $chequeadoBlack . '/>Negro';
        $_body_index = '<table width="745" border="0" cellpadding="0" cellspacing="1" class="tabla">
<tr><td>
<table width="745" border="0" align="center" cellpadding="0" cellspacing="1"><tr>
<td height="35" align="center" class="tr6">' . NOMBRE_SISTEMA . '</td>
</tr>
<tr align="center" >
<td colspan="2">
<table width="100%" border="0"><tr>
<td colspan="2" align="left">
<img src="imagenes' . PREFIJO_FOLDERS . '/banner_' . TEMA . '.png"  border="0" alt="' . NOMBRE_SISTEMA . '">
</td>
</tr>
<tr>
<td colspan="2" align="left"></td>
</tr></table>
</table>
<tr>
<td align="center" class="titulo_seccion">
<br><br><br><br>' . BIENVENIDO_L1 . '<br>' . BIENVENIDO_L2 . '<br><br></td></tr>
<tr><td>
<form action="login.php" method="POST" enctype="application/x-www-form-urlencoded" name="form1" onKeyUp="highlight(event)" onClick="highlight(event)" onSubmit="' . $submit_str . '">
<table align="center" cellpadding="1" cellspacing="1" class="tabla">
<tr class="tr6"><td align="center" colspan="2"><b>' . TITULO_LOGIN . '</b></td></tr><tr><td>
<table width="250" align="center" cellpadding="2" cellspacing="1">
<tr class="tr0"><td align="right"><strong>Usuario:</strong></td>
<td width="50%"><input name="Usuario" type="text" class="input_login" id="Usuario" size="15"></td></tr>
<tr class="tr0"><td align="right"><strong>Clave:</strong></td>
<td width="50%"><input name="Contrasena" type="password" class="input_login" id="Contrasena" size="15"></td></tr>
<tr><td colspan="2" align="right">
<input name="formSubmit" type="submit" class="input_submit" id="formSubmit" value=" Ingresar al Sistema ">
<input name="form1" type="hidden" id="form1" value="doLogin"></td></tr></table>
</td></tr><tr class="tr7"><td colspan="2" align="right">' . $strColorSistema . '</td></tr>
</table></form></td></tr><tr><td><br><br><br>';
        echo $_software->squeeze($_body_index);
        include_once("inc_iptimemark.php");
        $_body_index = '<br>' . LICENCIA . '</td></tr></table>';
        echo $_software->squeeze($_body_index);
        ?>
    </body>
</html>
