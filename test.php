<?php
die("locked");
include_once ("software.php");

$_utiles = new utiles ();

?>
<?php

mysqli_select_db ( DB_NAME, CONEXION );

$query_Rs = "SELECT * FROM pais order by Pais";
$Rs = mysqli_query ( $query_Rs, CONEXION ) or trigger_error ( mysql_error (), E_USER_ERROR );
$row_Rs = mysqli_fetch_assoc ( $Rs );
$totalRows_Rs = mysqli_num_rows ( $Rs );
// echo $totalRows_Rs;
$orden = 0;
do {
	$orden++;
	echo '<br>';
	$query_Update = "UPDATE `gestion`.`pais`
SET   `orden` = '".$orden."'  WHERE `idPais` = '".$row_Rs ['idPais']."';";
	
	mysqli_query ( $query_Update, CONEXION ) or trigger_error ( mysql_error (), E_USER_ERROR );
} while ( $row_Rs = mysqli_fetch_assoc ( $Rs ) );
die ();
?>

abrirlink(\'ver\', \'multimedia.php\',\''.str_replace(" ",'',md5(microtime())).'\');

open_window(\'cambiar_clave.php?rndVal='.str_replace(" ",'',md5(microtime())).'\');

javascript:abrirlink(\'insertar\', \'browser_insertar.php?tabla='.$tabla.'&amp;nombre_seccion='.$nombre_seccion.'&amp;no_menu=1\',\''.str_replace(" ",'',md5(microtime())).'\');"