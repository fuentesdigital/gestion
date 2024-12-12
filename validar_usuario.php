<?php
include_once("software.php");

$colname_rs_validar_usuario = "-1";
$nombre_campo= $_GET['nombre_campo'];
if (isset($_GET['Usuario'])) {
  $colname_rs_validar_usuario = (get_magic_quotes_gpc()) ? $_GET['Usuario'] : addslashes($_GET['Usuario']);
}
mysqli_select_db($this->db_connection, $this->db_database);
$query_rs_validar_usuario = sprintf("SELECT Usuario FROM `Usuario` WHERE Usuario = upper('%s')", $colname_rs_validar_usuario);
$rs_validar_usuario = mysqli_query($query_rs_validar_usuario, CONEXION)  or trigger_error(mysql_error(),E_USER_ERROR);
$row_rs_validar_usuario = mysqli_fetch_assoc($rs_validar_usuario);
$totalRows_rs_validar_usuario = mysqli_num_rows($rs_validar_usuario);
if ($totalRows_rs_validar_usuario > 0){ ?>
<script language="javascript" type="text/javascript">
	alert("Nombre de Usuario Duplicado!")
	window.parent.document.form1.<?php echo $nombre_campo; ?>.value = '';
	window.parent.document.form1.<?php echo $nombre_campo; ?>.focus();
	</script>
<?php }
mysqli_free_result($rs_validar_usuario);
?>