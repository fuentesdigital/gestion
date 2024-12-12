<?php
include_once("software.php");
$tabla = '';

$titulo_seccion= "Usuarios";

$id_op = 1;
$_software->acceso_opcion($id_op);


$maxRows_rs_usuarios_administrativos = 50;
$pageNum_rs_usuarios_administrativos = 0;
if (isset($_GET['pageNum_rs_usuarios_administrativos'])) {
  $pageNum_rs_usuarios_administrativos = $_GET['pageNum_rs_usuarios_administrativos'];
}
$startRow_rs_usuarios_administrativos = $pageNum_rs_usuarios_administrativos * $maxRows_rs_usuarios_administrativos;

mysqli_select_db($_software->db_connection, $_software->db_database);
$query_rs_usuarios_administrativos = "SELECT idUsuario, Usuario, nombre1, apellido1, nombre2, apellido2 FROM `Usuario`";
$query_limit_rs_usuarios_administrativos = sprintf("%s LIMIT %d, %d", $query_rs_usuarios_administrativos, $startRow_rs_usuarios_administrativos, $maxRows_rs_usuarios_administrativos);
$rs_usuarios_administrativos = mysqli_query($_software->db_connection, $query_limit_rs_usuarios_administrativos)  or trigger_error(mysql_error(),E_USER_ERROR);
$row_rs_usuarios_administrativos = mysqli_fetch_assoc($rs_usuarios_administrativos);

if (isset($_GET['totalRows_rs_usuarios_administrativos'])) {
  $totalRows_rs_usuarios_administrativos = $_GET['totalRows_rs_usuarios_administrativos'];
} else {
  $all_rs_usuarios_administrativos = mysqli_query($_software->db_connection,$query_rs_usuarios_administrativos)  or trigger_error(mysqli_error(),E_USER_ERROR);
  $totalRows_rs_usuarios_administrativos = mysqli_num_rows($all_rs_usuarios_administrativos);
}
$totalPages_rs_usuarios_administrativos = ceil($totalRows_rs_usuarios_administrativos/$maxRows_rs_usuarios_administrativos)-1;
$queryString_rs_usuarios_administrativos = '';
if (!empty($_SERVER['QUERY_STRING'])) {
  $params = explode("&", $_SERVER['QUERY_STRING']);
  $newParams = array();
  foreach ($params as $param) {
    if (stristr($param, "pageNum_rs_usuarios_administrativos") == false && 
        stristr($param, "totalRows_rs_usuarios_administrativos") == false) {
      array_push($newParams, $param);
    }
  }
  if (count($newParams) != 0) {
    $queryString_rs_usuarios_administrativos = "&" . htmlentities(implode("&", $newParams));
  }
}
$queryString_rs_usuarios_administrativos = sprintf("&totalRows_rs_usuarios_administrativos=%d%s", $totalRows_rs_usuarios_administrativos, $queryString_rs_usuarios_administrativos);
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html>
<head>
<?php include_once ("inc_head_adm.php"); ?>
<title><?php echo $titulo_seccion;?></title>
</head>
    <body onLoad="load_functions();" marginwidth="5px" marginheight="4px" leftmargin="0" topmargin="4px" bgcolor="#f0f0f0">
<?php include_once ("inc_top_adm.php");?>
<table width="98%" align="center" class="tabla">
  <tr>
    <td colspan="2" class="tr1"><a href="usuarios_insertar.php">Insertar</a></td>
  </tr>
  <tr align="right">
    <td colspan="2" class="tr2" >&nbsp;<?php echo ($startRow_rs_usuarios_administrativos + 1) ?> a <?php echo min($startRow_rs_usuarios_administrativos + $maxRows_rs_usuarios_administrativos, $totalRows_rs_usuarios_administrativos) ?> de <?php echo $totalRows_rs_usuarios_administrativos ?> </td>
  </tr>
  <tr>
    <td class="tr3">Usuario Administrativo </td>
    <td width="20%" class="tr3">Accion</td>
  </tr>
  
  <?php do { ?>
    <tr>
      <td class="tr1"><?php echo $row_rs_usuarios_administrativos['nombre1']; ?>&nbsp;<?php echo $row_rs_usuarios_administrativos['nombre2']; ?>&nbsp;<?php echo $row_rs_usuarios_administrativos['apellido1']; ?>&nbsp;<?php echo $row_rs_usuarios_administrativos['apellido2']; ?>&nbsp;(<?php echo $row_rs_usuarios_administrativos['Usuario']; ?>)</td>
      <td width="20%" class="tr1"><a href="usuarios_editar.php?idUsuario=<?php echo $row_rs_usuarios_administrativos['idUsuario']; ?>">Editar</a> -
          <a href="javascript:abrirlink('borrar','delete_main.php?tabla=Usuario&nombre_campo=idUsuario&idUsuario=<?php echo $row_rs_usuarios_administrativos['idUsuario']; ?>&return_page=usuarios.php&where_str_nivel_2=0','<?php echo str_replace(" ",'',md5(microtime()))?>');">Borrar</a></td>
    </tr>
    <?php } while ($row_rs_usuarios_administrativos = mysqli_fetch_assoc($rs_usuarios_administrativos)); 
    mysqli_free_result($rs_usuarios_administrativos);
    ?>
<?php  if ($totalRows_rs_usuarios_administrativos == 0) {?>
  <tr>
    <td colspan="2" class="tr1">No existe Información a mostrar </td>
  </tr>
<?php  } ?>
  <tr>
    <td colspan="2" class="tr3"><table border="0" width="100%" align="center">
        <tr class="tr3">
          <td width="23%" align="center"><?php if ($pageNum_rs_usuarios_administrativos > 0) { // Show if not first page ?>
                <a href="<?php printf("%s?pageNum_rs_usuarios_administrativos=%d%s", $currentPage, 0, $queryString_rs_usuarios_administrativos); ?>">&lt;&lt;&lt;</a>
                <?php } // Show if not first page ?>
          </td>
          <td width="31%" align="center"><?php if ($pageNum_rs_usuarios_administrativos > 0) { // Show if not first page ?>
                <a href="<?php printf("%s?pageNum_rs_usuarios_administrativos=%d%s", $currentPage, max(0, $pageNum_rs_usuarios_administrativos - 1), $queryString_rs_usuarios_administrativos); ?>">&lt;&lt;</a>
                <?php } // Show if not first page ?>
          </td>
          <td width="23%" align="center"><?php if ($pageNum_rs_usuarios_administrativos < $totalPages_rs_usuarios_administrativos) { // Show if not last page ?>
                <a href="<?php printf("%s?pageNum_rs_usuarios_administrativos=%d%s", $currentPage, min($totalPages_rs_usuarios_administrativos, $pageNum_rs_usuarios_administrativos + 1), $queryString_rs_usuarios_administrativos); ?>">&gt;&gt;</a>
                <?php } // Show if not last page ?>
          </td>
          <td width="23%" align="center"><?php if ($pageNum_rs_usuarios_administrativos < $totalPages_rs_usuarios_administrativos) { // Show if not last page ?>
                <a href="<?php printf("%s?pageNum_rs_usuarios_administrativos=%d%s", $currentPage, $totalPages_rs_usuarios_administrativos, $queryString_rs_usuarios_administrativos); ?>">&gt;&gt;&gt;</a>
                <?php } // Show if not last page ?>
          </td>
        </tr>
      </table></td>
  </tr>
</table>
<?php include_once ("inc_bottom_adm.php");?>
</body>
</html>
