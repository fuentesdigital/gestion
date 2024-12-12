<?php 
include_once("clases/validar_ingreso.php");
include_once("clases/conexion.php");
include_once("clases/constantes.php");

$titulo_seccion= "Usuarios del Sistema";
mysqli_select_db($this->db_connection, $this->db_database);
$query_RsUsuarios = "SELECT * FROM usuario";
$RsUsuarios = mysqli_query($query_RsUsuarios, CONEXION)  or trigger_error(mysql_error(),E_USER_ERROR);
$row_RsUsuarios = mysqli_fetch_assoc($RsUsuarios);
$totalRows_RsUsuarios = mysqli_num_rows($RsUsuarios);

?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html>
<head>
<?php include_once ("inc_head_adm.php"); ?>
<title><?php echo $titulo_seccion;?></title>
</head>
<body><?php include_once ("inc_top_adm.php");?>
      <table width="95%" align="center" class="tabla" >
        <tr class="tr3">
          <td>Nombre</td>
          <td>Usuario</td>
          <td>E-mail</td>
          <td>IP Fija</td>
        </tr>
        <?php do { ?>
        <tr class="tr1">
          <td><?php echo $row_RsUsuarios['nombre']; ?> <?php echo $row_RsUsuarios['apellidos']; ?> </td>
          <td><?php echo $row_RsUsuarios['usuario']; ?></td>
          <td><?php echo $row_RsUsuarios['email']; ?></td>
          <td><?php echo $row_RsUsuarios['ipfija']; ?></td>
        </tr>
        <?php } while ($row_RsUsuarios = mysqli_fetch_assoc($RsUsuarios)); ?>
      </table>
      <p>&nbsp;</p><?php include_once ("inc_bottom_adm.php");?>
<?php
mysqli_free_result($RsUsuarios);
?>
</body>
</html>
