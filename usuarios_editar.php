<?php
include_once("software.php");
include_once("clases/acceso_a_opcion.php");
$tabla = '';
$_utiles = new utiles();
$titulo_seccion = "Editar Usuario";


$id_op = 1;
$_software->acceso_opcion($id_op);

if ((isset($_POST["MM_update"])) && ($_POST["MM_update"] == "form1")) {

    if ($_POST['clave_flag'] == '1') {
        $updateSQL = sprintf("UPDATE Usuario SET Usuario=%s, nombre1=%s,nombre2=%s, apellido1=%s,apellido2=%s, Password='%s', email=%s, idNivel=%s, idSexo=%s  WHERE idUsuario=%s", $_utiles->GetSQLValueString($_POST['Usuario'], "text_upper"), $_utiles->GetSQLValueString($_POST['nombre1'], "text_upper"), $_utiles->GetSQLValueString($_POST['nombre2'], "text_upper"), $_utiles->GetSQLValueString($_POST['apellido1'], "text_upper"), $_utiles->GetSQLValueString($_POST['apellido2'], "text_upper"), md5($_utiles->GetSQLValueString($_POST['Password'], "text_upper")), $_utiles->GetSQLValueString($_POST['email'], "text"), $_utiles->GetSQLValueString($_POST['nivel'], "int"), $_utiles->GetSQLValueString($_POST['idSexo'], "int"), $_utiles->GetSQLValueString($_POST['idUsuario'], "int"));
    } else {
        $updateSQL = sprintf("UPDATE Usuario SET Usuario=%s, nombre1=%s,nombre2=%s, apellido1=%s, apellido2=%s,  email=%s, idNivel=%s, idSexo=%s WHERE idUsuario=%s", $_utiles->GetSQLValueString($_POST['Usuario'], "text_upper"), $_utiles->GetSQLValueString($_POST['nombre1'], "text_upper"), $_utiles->GetSQLValueString($_POST['nombre2'], "text_upper"), $_utiles->GetSQLValueString($_POST['apellido1'], "text_upper"), $_utiles->GetSQLValueString($_POST['apellido2'], "text_upper"), $_utiles->GetSQLValueString($_POST['email'], "text"), $_utiles->GetSQLValueString($_POST['nivel'], "int"), $_utiles->GetSQLValueString($_POST['idSexo'], "int"), $_utiles->GetSQLValueString($_POST['idUsuario'], "int"));
    }
    $_utiles->bitacora('Usuario', $_POST['idUsuario'], 'editar');
    mysqli_select_db($_software->db_connection, $_software->db_database);
//    echo $updateSQL;
    $Result1 = mysqli_query($_software->db_connection, $updateSQL) or trigger_error(mysqli_error(), E_USER_ERROR);
    $updateGoTo = "usuarios.php";
    if (isset($_SERVER['QUERY_STRING'])) {
        $updateGoTo .= (strpos($updateGoTo, '?')) ? "&" : "?";
        $updateGoTo .= $_SERVER['QUERY_STRING'];
    }
    header(sprintf("Location: %s", $updateGoTo));
}
$colname_RsEditar = "-1";
if (isset($_GET['idUsuario'])) {
    $colname_RsEditar = (get_magic_quotes_gpc()) ? $_GET['idUsuario'] : addslashes($_GET['idUsuario']);
}
mysqli_select_db($_software->db_connection, $_software->db_database);
$query_RsEditar = sprintf("SELECT * FROM `Usuario` WHERE idUsuario = '%s' ORDER BY nombre1, nombre2, apellido1, apellido2", $colname_RsEditar);
$RsEditar = mysqli_query($_software->db_connection, $query_RsEditar) or trigger_error(mysqli_error(), E_USER_ERROR);
$row_RsEditar = mysqli_fetch_assoc($RsEditar);
$totalRows_RsEditar = mysqli_num_rows($RsEditar);
mysqli_free_result($RsEditar);

mysqli_select_db($_software->db_connection, $_software->db_database);
$query_Rsdepartamento = "SELECT * FROM Nivel";
$Rsdepartamento = mysqli_query($_software->db_connection, $query_Rsdepartamento) or trigger_error(mysqli_error(), E_USER_ERROR);
$row_Rsdepartamento = mysqli_fetch_assoc($Rsdepartamento);
$totalRows_Rsdepartamento = mysqli_num_rows($Rsdepartamento);

mysqli_select_db($_software->db_connection, $_software->db_database);
$query_RsSexo = "SELECT * FROM Sexo";
$RsSexo = mysqli_query($_software->db_connection, $query_RsSexo) or trigger_error(mysqli_error(), E_USER_ERROR);
$row_RsSexo = mysqli_fetch_assoc($RsSexo);
$totalRows_RsSexo = mysqli_num_rows($RsSexo);
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html>
    <head>
        <?php include_once ("inc_head_adm.php"); ?>
        <title><?php echo $titulo_seccion; ?></title>
    </head>
    <body onLoad="load_functions();" marginwidth="5px" marginheight="4px" leftmargin="0" topmargin="4px" bgcolor="#f0f0f0">
        <?php include_once ("inc_top_adm.php"); ?>
        <form action="<?php echo EDIT_FORM_ACTION; ?>" method="post" name="form1"
              onSubmit="MM_validateForm('nombre1', '', 'R', 'apellido1', '', 'R', 'email', '', 'RisEmail', 'Password', '', 'R', 'Repetir_Password', '', 'R');return document.MM_returnValue">
            <table width="98%" align="center" class="tabla">
                <tr valign="baseline" class="tr1">
                    <td align="right" nowrap class="tr1">Usuario:</td>
                    <td class="tr1"><?php echo $row_RsEditar['Usuario']; ?>
                        <input name="Usuario" type="hidden"
                               value="<?php echo $row_RsEditar['Usuario']; ?>">
                        <input name="idUsuario" type="hidden"
                               value="<?php echo $row_RsEditar['idUsuario']; ?>">
                    </td>
                </tr>
                <tr valign="baseline" class="tr1">
                    <td align="right" nowrap class="tr1">Primer Nombre:</td>
                    <td class="tr1"><input name="nombre1" type="text" class="input_text"
                                           value="<?php echo $row_RsEditar['nombre1']; ?>" size="32"></td>
                </tr>
                <tr valign="baseline" class="tr1">
                    <td align="right" nowrap class="tr1">Segundo Nombre:</td>
                    <td class="tr1"><input name="nombre2" type="text" class="input_text"
                                           value="<?php echo $row_RsEditar['nombre2']; ?>" size="32"></td>
                </tr>
                <tr valign="baseline" class="tr1">
                    <td align="right" nowrap class="tr1">Primer Apellido:</td>
                    <td class="tr1"><input name="apellido1" type="text" class="input_text"
                                           value="<?php echo $row_RsEditar['apellido1']; ?>" size="32"></td>
                </tr>
                <tr valign="baseline" class="tr1">
                    <td align="right" nowrap class="tr1">Segundo Apellido:</td>
                    <td class="tr1"><input name="apellido2" type="text" class="input_text"
                                           value="<?php echo $row_RsEditar['apellido2']; ?>" size="32"></td>
                </tr>
                <tr valign="baseline" class="tr1">
                    <td align="right" nowrap class="tr1">Contraseña:</td>
                    <td class="tr1"><input name="Password" type="password"
                                           class="input_login"
                                           value="<?php echo $row_RsEditar['Password']; ?>" size="32"><input
                                           type="checkbox" name="clave_flag" value="1"
                                           onClick="document.form1.Password.value = '';document.form1.Repetir_Password.value = ''" />
                        Deseo Cambiar la Clave</td>
                </tr>
                <tr valign="baseline" class="tr1">
                    <td align="right" nowrap class="tr1">Repetir Contraseña:</td>
                    <td class="tr1"><input name="Repetir_Password" type="password"
                                           class="input_login" id="Repetir_Password"
                                           value="<?php echo $row_RsEditar['Password']; ?>" size="32"></td>
                </tr>
                <tr valign="baseline" class="tr1">
                    <td align="right" nowrap class="tr1">Email:</td>
                    <td class="tr1"><input name="email" type="text" class="input_text"
                                           value="<?php echo $row_RsEditar['email']; ?>" size="32"></td>
                </tr>
                <tr align="left" valign="baseline" class="tr2">
                    <td colspan="2" nowrap class="tr2">Sexo de la Persona</td>
                </tr>
                <tr align="left" valign="baseline" class="tr1">
                    <td colspan="2" nowrap class="tr1"><select
                            name="idSexo" id="idSexo">
                                <?php
                                do {
                                    ?>
                                <option value="<?php echo $row_RsSexo['idSexo'] ?>"
                                <?php
                                if (!(strcmp($row_RsSexo['idSexo'], $row_RsEditar['idSexo']))) {
                                    echo "SELECTED";
                                }
                                ?>><?php echo $row_RsSexo['Sexo'] ?></option>
                                        <?php
                                    } while ($row_RsSexo = mysqli_fetch_assoc($RsSexo));
                                    $rows = mysqli_num_rows($RsSexo);
                                    if ($rows > 0) {
                                        mysqli_data_seek($RsSexo, 0);
                                        $row_RsSexo = mysqli_fetch_assoc($RsSexo);
                                    }
                                    mysqli_free_result($RsSexo);
                                    ?>
                        </select>
                    </td>
                </tr>
                <tr align="left" valign="baseline" class="tr2">
                    <td colspan="2" nowrap class="tr2">Nivel de Acceso</td>
                </tr>
                <tr align="left" valign="baseline" class="tr1">
                    <td colspan="2" nowrap class="tr1"><select
                            name="nivel" id="nivel">
                                <?php
                                do {
                                    ?>
                                <option value="<?php echo $row_Rsdepartamento['idNivel'] ?>"
                                <?php
                                if (!(strcmp($row_Rsdepartamento['idNivel'], $row_RsEditar['idNivel']))) {
                                    echo "SELECTED";
                                }
                                ?>><?php echo $row_Rsdepartamento['Nivel'] ?></option>
                                        <?php
                                    } while ($row_Rsdepartamento = mysqli_fetch_assoc($Rsdepartamento));
                                    $rows = mysqli_num_rows($Rsdepartamento);
                                    if ($rows > 0) {
                                        mysqli_data_seek($Rsdepartamento, 0);
                                        $row_Rsdepartamento = mysqli_fetch_assoc($Rsdepartamento);
                                    }
                                    mysqli_free_result($Rsdepartamento);
                                    ?>
                        </select>
                    </td>
                </tr>
                <tr valign="baseline" class="tr3">
                    <td colspan="2" align="right" nowrap>&nbsp;</td>
                </tr>
                <tr valign="baseline" class="tr3">
                    <td nowrap align="right">&nbsp;</td>
                    <td><input type="submit" class="input_submit" value="Actualizar"></td>
                </tr>
            </table>
            <input type="hidden" name="MM_update" value="form1"> <input
                type="hidden" name="Usuario"
                value="<?php echo $row_RsEditar['Usuario']; ?>"></form>
            <?php include_once ("inc_bottom_adm.php"); ?>
    </body>
</html>
