<?php 
include_once("clases/validar_ingreso.php");
include_once("clases/db_connection.php");
include_once("clases/constantes.php");
$titulo_seccion= "Backup del Sistema";
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html>
<head>
<? include_once ("inc_head_adm.php"); ?>
<title><?php echo $titulo_seccion;?></title>
</head>
<body><? include_once ("inc_top_adm.php");?>
      <table width="90%" border="0" align="center" cellpadding="0" cellspacing="0" bgcolor="#E9EEF5">
        <tr>
          <td colspan="3"><div align="center">
              <p>&nbsp;</p>
              <p>Por Favor, Descargue los siguientes archivos:</p>
              <p><a href="oymintranet.sql.zip">Base de Datos</a></p>
              <p><a href="oym_intranet.zip">Codigo Fuente</a></p><p>&nbsp;</p>
            </div></td>
        </tr>
      </table>
<p>&nbsp;</p><? include_once ("inc_bottom_adm.php");?>
</body>
</html>
