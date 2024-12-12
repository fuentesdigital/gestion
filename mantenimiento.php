<?php
include_once("software.php");

$_utiles = new utiles();

$titulo_seccion= 'Mantenimiento Semanal';
$data_title = $titulo_seccion;
$instrucciones = '';
$tabla='';
?>
<?php
if (isset($_GET['mysql']) && $_GET['mysql'] == "1") {

    mysqli_select_db(DB_NAME,CONEXION);

    $query_Rs= "ALTER DATABASE `".DB_NAME."` DEFAULT CHARACTER SET `".CHARSET_DB."` COLLATE `".COLLATION_DB."`;";
    $Rs= mysqli_query($query_Rs, CONEXION)  or trigger_error(mysql_error(),E_USER_ERROR);
    // $instrucciones .= $query_Rs."<br>";

    $query_RsTamanos= "SHOW TABLE STATUS FROM ".DB_NAME;
    $RsTamanos= mysqli_query($query_RsTamanos, CONEXION)  or trigger_error(mysql_error(),E_USER_ERROR);
    $row_RsTamanos= mysqli_fetch_assoc($RsTamanos);
    $totalRows_RsTamanos= mysqli_num_rows($RsTamanos);
    do {
        set_time_limit(0);
        $nombre_tabla = $row_RsTamanos['Name'];
        $nuevo_nombre_tabla = strtoupper(substr($nombre_tabla,0,1)). strtolower(substr($nombre_tabla,1,strlen($nombre_tabla)));
        //        if ($nombre_tabla !=$nuevo_nombre_tabla) {
        $query_rename_Rs= "RENAME TABLE `".$nombre_tabla."` TO `".$nuevo_nombre_tabla ."`;";
        $Rs_rename= mysqli_query($query_rename_Rs, CONEXION)  ;
    // $instrucciones .=$query_rename_Rs."<br>";
    //        }
    } while ($row_RsTamanos= mysqli_fetch_assoc($RsTamanos));
    mysqli_free_result($RsTamanos);

    $query_RsTamanos= "SHOW TABLE STATUS FROM ".DB_NAME;
    $RsTamanos= mysqli_query($query_RsTamanos, CONEXION)  or trigger_error(mysql_error(),E_USER_ERROR);
    $row_RsTamanos= mysqli_fetch_assoc($RsTamanos);
    $totalRows_RsTamanos= mysqli_num_rows($RsTamanos);
    do {
        set_time_limit(0);
        $nombre_tabla = $row_RsTamanos['Name'];
        $query_Rs= "ALTER TABLE `".$nombre_tabla."` CONVERT TO CHARACTER SET `".CHARSET_DB."` COLLATE `".COLLATION_DB."`;";
        $Rs= mysqli_query($query_Rs, CONEXION)  or trigger_error(mysql_error(),E_USER_ERROR);
        // $instrucciones .=$query_Rs."<br>";
        $nombre_tabla = $row_RsTamanos['Name'];
        $query_Rs= "ALTER TABLE `".$nombre_tabla."` ENGINE = ".ENGINE_DB.";";
        $Rs= mysqli_query($query_Rs, CONEXION)  or trigger_error(mysql_error(),E_USER_ERROR);
        // $instrucciones .=$query_Rs."<br>";
        $query_Rs= "FLUSH TABLE `".$nombre_tabla ."`;";
        // $instrucciones .= $query_Rs."<br>";
        $Rs= mysqli_query($query_Rs, CONEXION)  or trigger_error(mysql_error(),E_USER_ERROR);
    } while ($row_RsTamanos= mysqli_fetch_assoc($RsTamanos));
    mysqli_free_result($RsTamanos);
    $query_Rs= "FLUSH HOSTS";
    // $instrucciones .=$query_Rs."<br>";
    $Rs= mysqli_query($query_Rs, CONEXION)  or trigger_error(mysql_error(),E_USER_ERROR);


    $query_Rs= "FLUSH DES_KEY_FILE;";
    // $instrucciones .=$query_Rs."<br>";
    $Rs= mysqli_query($query_Rs, CONEXION)  or trigger_error(mysql_error(),E_USER_ERROR);


    $query_Rs= "FLUSH LOGS;";
    // $instrucciones .=$query_Rs."<br>";
    $Rs= mysqli_query($query_Rs, CONEXION)  or trigger_error(mysql_error(),E_USER_ERROR);


    $query_Rs= "FLUSH HOSTS;";
    // $instrucciones .=$query_Rs."<br>";
    $Rs= mysqli_query($query_Rs, CONEXION)  or trigger_error(mysql_error(),E_USER_ERROR);


    $query_Rs= "FLUSH PRIVILEGES;";
    // $instrucciones .=$query_Rs."<br>";
    $Rs= mysqli_query($query_Rs, CONEXION)  or trigger_error(mysql_error(),E_USER_ERROR);


    $query_Rs= "FLUSH QUERY CACHE;";
    // $instrucciones .=$query_Rs."<br>";
    $Rs= mysqli_query($query_Rs, CONEXION)  or trigger_error(mysql_error(),E_USER_ERROR);


    $query_Rs= "FLUSH STATUS;";
    // $instrucciones .=$query_Rs."<br>";
    $Rs= mysqli_query($query_Rs, CONEXION)  or trigger_error(mysql_error(),E_USER_ERROR);


    $query_Rs= "FLUSH USER_RESOURCES;";
    // $instrucciones .=$query_Rs."<br>";
    $Rs= mysqli_query($query_Rs, CONEXION)  or trigger_error(mysql_error(),E_USER_ERROR);


    $query_Rs= "FLUSH SLAVE;";
    // $instrucciones .=$query_Rs."<br>";
    $Rs= mysqli_query($query_Rs, CONEXION)  or trigger_error(mysql_error(),E_USER_ERROR);


    $query_Rs= "RESET QUERY CACHE;";
    // $instrucciones .=$query_Rs."<br>";
    $Rs= mysqli_query($query_Rs, CONEXION)  or trigger_error(mysql_error(),E_USER_ERROR);


    $query_Rs= "RESET SLAVE;";
    // $instrucciones .=$query_Rs."<br>";
    $Rs= mysqli_query($query_Rs, CONEXION)  or trigger_error(mysql_error(),E_USER_ERROR);


    ?>
<script language="javascript">
    alert("Base de Datos Optimizada!");
</script>
<?php
}
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html>
    <head>
        <?php include_once ("inc_head_adm.php"); ?>
        <title><?php echo $titulo_seccion;?></title>
    </head>
    <body onLoad="load_functions();" marginwidth="0" marginheight="4px" leftmargin="0" topmargin="4px" bgcolor="#f0f0f0">
        <?php include_once ("inc_top_adm.php");?>
        <table width="98%" align="center" bgcolor="#E9EEF5" class="tabla">
            <tr>
                <td colspan="3" class="tr2">
                    <div align="center">Optimizaci&oacute;n del Sistema</div>
                </td>
            </tr>
            <tr>
                <td colspan="3" class="tr3">1. Para dar Mantenimiento al Sistema,
                    Utilice las siguientes opciones:</td>
            </tr>
            <tr>
                <td colspan="3" class="tr1">
                    <form name="form1" method="get" action="mantenimiento.php">
                        <div align="center">
                            <p>&nbsp;</p>
                            <p><input name="mysql" type="hidden" id="mysql2" value="1"> <br>
                                <br><input name="Submit"
                                       type="submit" class="input_submit" value="Optimizar Base de Datos"></p>
                            <p>&nbsp;</p>
                        </div>
                    </form>
                </td>
            </tr>
        </table>
        <p>&nbsp;</p>
        <?php include_once ("inc_bottom_adm.php");?>
    </body>
</html>
</html>
