<?php
include_once("software.php");
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html>
    <head>
        <link href="css/<?php echo TEMA; ?>.css" rel="stylesheet" type="text/css">
        <title>Borrar</title>
    </head>
    <body onLoad="window.opener.document.location.href = 'usuarios.php';" marginwidth="0" marginheight="4px"
          leftmargin="0" topmargin="4px" bgcolor="#f0f0f0">
        <div align="center">
            <table width="90%" border="0" align="center" cellpadding="0"
                   cellspacing="0" bgcolor="#E9EEF5">
                <tr>
                    <td colspan="3">&nbsp;</td>
                </tr>
                <tr>
                    <td colspan="3">
                        <div align="center">
                            <p><strong>BORRANDO REGISTRO...</strong></p>
                        </div>
                    </td>
                </tr>
            </table>
        </div>
        <?php if (isset($_GET['tabla']) && $_GET['tabla'] != '') {
            ?>
            <script language="javascript" src="js/funciones_post.js"
                    type="text/javascript">
            </script>
            <?php
            $tabla = $_GET['tabla'];
            $nombre_campo = $_GET['nombre_campo'];
            $codigo = $_GET[$_software->codigo_tabla($tabla)];
            $return_page = $_GET['return_page'];
            $where_str_nivel_2 = $_GET['where_str_nivel_2'];

            if ($where_str_nivel_2 == "1") {
                $deleteSQL = sprintf("DELETE FROM %s WHERE padre='%s' AND correlativo='%s'", $tabla, $_GET['padre'], $_GET['correlativo']);
                $codigo = $_GET['padre'];
            } else {
                $deleteSQL = sprintf("DELETE FROM %s WHERE %s=%s", $tabla, $nombre_campo, $_software->GetSQLValueString($codigo, "text"));
            }

            mysqli_select_db($_software->db_connection, $_software->db_database);
            $Result1 = mysqli_query($_software->db_connection, $deleteSQL) or trigger_error(mysqli_error(), E_USER_ERROR);
            $_software->bitacora($tabla, $codigo, 'borrar');
            ?>
            <script language="javascript">
                refresh_opener();
            </script>
        <?php } ?>
    </body>
</html>
