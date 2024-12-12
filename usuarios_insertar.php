<?php
include_once("software.php");
$tabla = '';

$titulo_seccion = "Insertar Usuario";

$id_op = 1;
$_software->acceso_opcion($id_op);


if ((isset($_POST["MM_insert"])) && ($_POST["MM_insert"] == "form1")) {
//validar si existe usuario nuevo

    mysqli_select_db($_software->db_connection, $_software->db_database);
    $query_ValidarUsuario = sprintf("SELECT Usuario FROM `Usuario` WHERE Usuario = %s", $_software->GetSQLValueString($_POST['Usuario'], "text_upper"));
    //echo $query_ValidarUsuario;
    $ValidarUsuario = mysqli_query($_software->db_connection, $query_ValidarUsuario) or trigger_error(mysqli_error(), E_USER_ERROR);
    $row_ValidarUsuario = mysqli_fetch_assoc($ValidarUsuario);
    $totalRows_ValidarUsuario = mysqli_num_rows($ValidarUsuario);
    mysqli_free_result($ValidarUsuario);
    if ($totalRows_ValidarUsuario > 0) {
        ?>
        <script language="javascript">
            alert("Ya existe un usuario con ese nombre!");
        </script>
        <?php
    } else {
        $insertSQL = sprintf("INSERT INTO Usuario (Usuario, contrasena, nombre1, nombre2, apellido1, apellido2, email, idSexo, idNivel, estado) VALUES (%s, '%s', %s, %s, %s, %s, %s, %s, %s, %s)", $_software->GetSQLValueString($_POST['Usuario'], "text_upper"), md5($_software->GetSQLValueString($_POST['Password'], "text_upper")), $_software->GetSQLValueString($_POST['nombre1'], "text_upper"), $_software->GetSQLValueString($_POST['nombre2'], "text_upper"), $_software->GetSQLValueString($_POST['apellido1'], "text_upper"), $_software->GetSQLValueString($_POST['apellido2'], "text_upper"), $_software->GetSQLValueString($_POST['email'], "text"), $_software->GetSQLValueString($_POST['idSexo'], "text"), $_software->GetSQLValueString($_POST['nivel'], "int"), '1');
        mysqli_select_db($_software->db_connection, $_software->db_database);
        $Result1 = mysqli_query($_software->db_connection, $insertSQL) or trigger_error(mysqli_error(), E_USER_ERROR);
        $_software->bitacora('idUsuario', mysqli_insert_id($_software->db_connection), 'insertar');
        $insertGoTo = "usuarios.php";
        if (isset($_SERVER['QUERY_STRING'])) {
            $insertGoTo .= (strpos($insertGoTo, '?')) ? "&" : "?";
            $insertGoTo .= $_SERVER['QUERY_STRING'];
        }
        header(sprintf("Location: %s", $insertGoTo));
    }
}

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
        <?php include_once ("inc_head_adm.php");
        ?>
        <title><?php echo $titulo_seccion;
        ?></title>
    </head>
    <body onLoad="load_functions();" marginwidth="5px" marginheight="4px" leftmargin="0" topmargin="4px" bgcolor="#f0f0f0">
        <?php include_once ("inc_top_adm.php");
        ?>
        <iframe src="iframe.htm" id="iframeOculto" name="iframeOculto"
                style="width:0px; height:0px; border: 0px"></iframe>
        <form action="<?php echo EDIT_FORM_ACTION;
        ?>" method="post" name="form1"
              onSubmit="MM_validateForm('Usuario', '', 'R', 'nombre1', '', 'R', 'apellido1', '', 'R', 'email', '', 'RisEmail', 'Password', '', 'R', 'Repetir_Password', '', 'R');return document.MM_returnValue">
            <table width="98%" align="center" class="tabla">
                <tr valign="baseline" class="tr2">
                    <td colspan="2" align="left" nowrap>Datos del Usuario</td>
                </tr>
                <tr valign="baseline" class="tr1">
                    <td width="50%" align="left" nowrap>Usuario:</td>
                    <td width="50%"><input name="Usuario" type="text" class="input_login"
                                           value='' size="32" id="Usurio"
                                           onBlur="validar_username(this.value, 'Usuario');"></td>
                </tr>
                <tr valign="baseline" class="tr1">
                    <td width="50%" align="left" nowrap>Primer Nombre:</td>
                    <td width="50%"><input name="nombre1" type="text" class="input_text"
                                           value='' size="32"></td>
                </tr>
                <tr valign="baseline" class="tr1">
                    <td width="50%" align="left" nowrap>Segundo Nombre:</td>
                    <td width="50%"><input name="nombre2" type="text" class="input_text"
                                           value='' size="32"></td>
                </tr>
                <tr valign="baseline" class="tr1">
                    <td width="50%" align="left" nowrap>Primer Apellido:</td>
                    <td width="50%"><input name="apellido1" type="text" class="input_text"
                                           value='' size="32"></td>
                </tr>
                <tr valign="baseline" class="tr1">
                    <td width="50%" align="left" nowrap>Segundo Apellido:</td>
                    <td width="50%"><input name="apellido2" type="text" class="input_text"
                                           value='' size="32"></td>
                </tr>
                <tr valign="baseline" class="tr1">
                    <td width="50%" align="left" nowrap>Contraseña:</td>
                    <td width="50%"><input name="Password" type="password"
                                           class="input_login" value='' size="32"></td>
                </tr>
                <tr valign="baseline" class="tr1">
                    <td width="50%" align="left" nowrap>Repetir Contraseña:</td>
                    <td width="50%"><input name="Repetir_Password" type="password"
                                           class="input_login" id="Repetir_Password" value='' size="32"></td>
                </tr>
                <tr valign="baseline" class="tr1">
                    <td width="50%" align="left" nowrap>Email:</td>
                    <td width="50%"><input name="email" type="text" class="input_text"
                                           value='' size="32"></td>
                </tr>
                <tr align="left" valign="baseline" class="tr2">
                    <td colspan="2" nowrap class="tr2">Sexo de la Persona:</td>
                </tr>
                <tr align="left" valign="baseline" class="tr1">
                    <td colspan="2" nowrap class="tr1"><select
                            name="idSexo" id="idSexo">
                                <?php
                                do {
                                    ?>
                                <option value="<?php echo $row_RsSexo['idSexo'] ?>"><?php echo $row_RsSexo['Sexo'] ?></option>
                                <?php
                            } while ($row_RsSexo = mysqli_fetch_assoc($RsSexo));
                            $rows = mysqli_num_rows($RsSexo);
                            if ($rows > 0) {
                                mysqli_data_seek($RsSexo, 0);
                                $row_RsSexo = mysqli_fetch_assoc($RsSexo);
                            }
                            mysqli_free_result($RsSexo);
                            ?>
                        </select></td></tr>
                <tr align="left" valign="baseline" class="tr2">
                    <td colspan="2" nowrap class="tr2">Nivel de Acceso</td>
                </tr>
                <tr align="left" valign="baseline" class="tr1">
                    <td colspan="2" nowrap class="tr1"><select
                            name="nivel" id="nivel">
                                <?php
                                do {
                                    ?>
                                <option value="<?php echo $row_Rsdepartamento['idNivel'] ?>"><?php echo $row_Rsdepartamento['Nivel'] ?></option>
                                <?php
                            } while ($row_Rsdepartamento = mysqli_fetch_assoc($Rsdepartamento));
                            $rows = mysqli_num_rows($Rsdepartamento);
                            if ($rows > 0) {
                                mysqli_data_seek($Rsdepartamento, 0);
                                $row_Rsdepartamento = mysqli_fetch_assoc($Rsdepartamento);
                            }
                            mysqli_free_result($Rsdepartamento);
                            ?>
                        </select></td></tr>
                <tr valign="baseline" class="tr3">
                    <td colspan="2" align="right" nowrap>&nbsp;</td>
                </tr>
                <tr valign="baseline" class="tr3">
                    <td width="50%" align="right" nowrap>&nbsp;</td>
                    <td width="50%"><input type="submit" class="input_submit"
                                           value="Insertar Registro"></td>
                </tr>
            </table>
            <input type="hidden" name="MM_insert" value="form1"></form>
        <p>&nbsp;</p>
        <?php include_once ("inc_bottom_adm.php");
        ?>

    </body>
</html>
