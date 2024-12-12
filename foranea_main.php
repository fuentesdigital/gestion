<?
include_once("clases/validar_ingreso.php");
include_once("clases/conexion.php");
include_once("clases/constantes.php");
include_once("clases/utiles.php");

$_utiles = new utiles();

mysqli_select_db($this->db_connection, $this->db_database);
$titulo_seccion="SELECCIONE";
$campo = $_GET['campo'];
$campo_valor = $_GET['campo_valor'];
$codigo_campo_id = $_GET['codigo_campo_id'];
$campo_id = $_GET['campo_id'];
$campo_detalle = $_GET['campo_detalle'];
$where_str = $_GET['where_str'];
$which_page = $_GET['which_page'];

if (isset($where_str)){
	$where_str= "AND padre = ".$campo_valor ;
}
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html>
<head>
<?php include_once ("inc_head_adm.php"); ?>
<title><?php echo $titulo_seccion;?></title>
</head>
<body onload=load_functions();>
<link href="css/admin.css" rel="stylesheet" type="text/css" />
<div align="center">
<table width="90%" border="0" align="center" cellpadding="0"
	cellspacing="0" bgcolor="#E9EEF5">
	<tr>
		<td colspan="3">
		<div align="center">
		<p><strong>SELECCIONE DE LA LISTA</strong></p>
		<?php $query_RsForanea = "SELECT * FROM ". $this->replace_general($campo)." WHERE 1 ".$where_str." ORDER BY ". $this->replace_general($campo);
		$RsForanea = mysqli_query($query_RsForanea, CONEXION)  or trigger_error(mysql_error(),E_USER_ERROR);
		$row_RsForanea = mysqli_fetch_assoc($RsForanea);
		$totalRows_RsForanea = mysqli_num_rows($RsForanea);
		$fila_de_datos_str .= '<form name= "form1">';
		$fila_de_datos_str .= '<select class = "select_list" name="'.$campo.'">';
		do {
			if (isset($where_str)){
				$codigo_lista = $row_RsForanea['correlativo'];
			} else {
				$codigo_lista = $row_RsForanea['codigo'];
			}


			$fila_de_datos_str .= '<option ';
			if ($codigo_lista == $campo_valor){
				$fila_de_datos_str .= ' selected ';
			}
			if ($_utiles->es_fecha_campo($campo)=='fecha'){
				$fila_de_datos_str .= ' value="'.$codigo_lista.'">'.$_utiles->formato_fecha($row_RsForanea[$this->replace_general($campo)]).'</option>';
			} else {
				$fila_de_datos_str .= ' value="'.$codigo_lista.'">'.$row_RsForanea[$this->replace_general($campo)].'</option>';
			}
		} while ($row_RsForanea = mysqli_fetch_assoc($RsForanea));
		$rows = mysqli_num_rows($RsForanea);
		if($rows > 0) {
			mysqli_data_seek($RsForanea, 0);
			$row_RsForanea = mysqli_fetch_assoc($RsForanea);
			mysqli_free_result($RsForanea);
		}
		$fila_de_datos_str .= '</select>';
		$fila_de_datos_str .= '<input name="campos_grid[]" type="hidden" value="'.$campo.'_grid">';
		if (isset($where_str)){
			if (isset($which_page)){
				$fila_de_datos_str .= '<input name="Ok" type="button" class="input_submit" onClick = "javascript:abrirlink(\'editar\',\''.$which_page.'?codigo='.$campo_valor.'&campo_detalle='.$campo.'&valor_campo_detalle=\'+document.form1.'.$campo.'.value+\'&nombre_seccion=Detalle&no_menu=1\',\''.str_replace(" ",'',md5(microtime())).'\');" value="Ok">';
			} else {
				$fila_de_datos_str .= '<input name="Ok" type="button" class="input_submit" onClick = "javascript:abrirlink(\'editar\',\'browser_editar.php?tabla='.$campo_detalle.'&nombre_campo=codigo&codigo='.$campo_valor.'&campo_detalle='.$campo.'&valor_campo_detalle=\'+document.form1.'.$campo.'.value+\'&nombre_seccion=Detalle&no_menu=1\',\''.str_replace(" ",'',md5(microtime())).'\');" value="Ok">';
			}
		} else {
			$fila_de_datos_str .= '<input name="Ok" type="button" class="input_submit" onClick = "cerrar_bulk(\''.$codigo_campo_id.'\',\''.$campo_id.'\',document.form1.'.$campo.'.value,document.form1.'.$campo.'.options[document.form1.'.$campo.'.selectedIndex].text);" value="Ok">';

		}
		$fila_de_datos_str .= '</form>';
		echo $fila_de_datos_str ;

		if (isset($_GET["correlativoamericacentral"])){
			$correlativoamericacentral = $_GET["correlativoamericacentral"];
			$tabla = "configurarbancos";
			$update_str ="correlativoamericacentral=".$_utiles->GetSQLValueString($correlativoamericacentral,'text');
			$where_str =" codigo = 1";
			$_utiles->actualizar($tabla,$update_str,$where_str);
		}

		if (isset($_GET["correlativosegurosocial"])){
			$correlativosegurosocial = $_GET["correlativosegurosocial"];
			$tabla = "configurarbancos";
			$update_str ="correlativosegurosocial =".$_utiles->GetSQLValueString($correlativosegurosocial,'text');
			$where_str =" codigo = 1";
			$_utiles->actualizar($tabla,$update_str,$where_str);
		}
		
		?></div>
		</td>
	</tr>
</table>
</div>
</body>