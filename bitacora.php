<?php
include_once('software.php');

$tabla = '';

$currentPage = $_SERVER['PHP_SELF'];

$titulo_seccion = 'Bitácora  ' . $_software->formato_fecha(date('Y-m-d'));
$maxRows_RsBitacora = 400;
$pageNum_RsBitacora = 0;
if (isset($HTTP_GET_VARS['pageNum_RsBitacora'])) {
    $pageNum_RsBitacora = $HTTP_GET_VARS['pageNum_RsBitacora'];
}
$startRow_RsBitacora = $pageNum_RsBitacora * $maxRows_RsBitacora;

mysqli_select_db($_software->db_connection, $_software->db_database);
$query_RsBitacora = 'SELECT * FROM Bitacora order by fechahora desc';
$query_limit_RsBitacora = sprintf('%s LIMIT %d, %d', $query_RsBitacora, $startRow_RsBitacora, $maxRows_RsBitacora);
$RsBitacora = mysqli_query($_software->db_connection, $query_limit_RsBitacora) or trigger_error(mysqli_error(), E_USER_ERROR);
$row_RsBitacora = mysqli_fetch_assoc($RsBitacora);

if (isset($HTTP_GET_VARS['totalRows_RsBitacora'])) {
    $totalRows_RsBitacora = $HTTP_GET_VARS['totalRows_RsBitacora'];
} else {
    $all_RsBitacora = mysqli_query($_software->db_connection,$query_RsBitacora) or trigger_error(mysqli_error(), E_USER_ERROR);
    $totalRows_RsBitacora = mysqli_num_rows($all_RsBitacora);
}
$totalPages_RsBitacora = ceil($totalRows_RsBitacora / $maxRows_RsBitacora) - 1;

$queryString_RsBitacora = '';
if (!empty($HTTP_SERVER_VARS['QUERY_STRING'])) {
    $params = explode('&', $HTTP_SERVER_VARS['QUERY_STRING']);
    $newParams = array();
    foreach ($params as $param) {
        if (stristr($param, 'pageNum_RsBitacora') == false &&
                stristr($param, 'totalRows_RsBitacora') == false) {
            array_push($newParams, $param);
        }
    }
    if (count($newParams) != 0) {
        $queryString_RsBitacora = '&' . implode('&', $newParams);
    }
}
$queryString_RsBitacora = sprintf('&totalRows_RsBitacora=%d%s', $totalRows_RsBitacora, $queryString_RsBitacora);
?> 
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html>
    <head>
        <?php include_once ("inc_head_adm.php"); ?>
        <title><?php echo $titulo_seccion; ?></title>
    </head>
    <body onLoad="load_functions();" marginwidth="5px" marginheight="4px" leftmargin="0" topmargin="4px" bgcolor="#f0f0f0">
        <?php include_once ("inc_top_adm.php"); ?>
        <table width="98%" align="center" class="tabla">
            <tr> 
                <td align="right" class="tr1">
                    <form name="form1" method="post" action="borrar_bitacora.php">
                        <input name="borrar_bitacora" type="hidden" id="borrar_bitacora" value="1">
                        <input name="Button" type="button" class="input_submit" value="   Borrar Bitacora   " onClick="confirmar_bitacora();">
                        <br>
                        Guarde Primero la Información de la Bitácora 
                    </form></td>
            </tr>
            <tr align="right"> 
                <td class="tr2" >&nbsp; <?php echo ($startRow_RsBitacora + 1) ?> a <?php echo min($startRow_RsBitacora + $maxRows_RsBitacora, $totalRows_RsBitacora) ?> de <?php echo $totalRows_RsBitacora ?> </td>
            </tr>
            <tr> 
                <td class="tr3">Usuario, Ip, fecha y hora, acción, tabla, registro</td>
            </tr>
            <?php do { ?>
                <tr> 
                    <td class="tr1"><?php echo $row_RsBitacora['usuario']; ?> <?php echo $row_RsBitacora['ip']; ?> <?php echo $row_RsBitacora['fechahora']; ?> <strong><?php echo $row_RsBitacora['accion']; ?> <?php echo $row_RsBitacora['tabla']; ?></strong> <strong><?php echo $row_RsBitacora['registro']; ?></strong> </td>
                </tr>
            <?php
            } while ($row_RsBitacora = mysqli_fetch_assoc($RsBitacora));
            mysqli_free_result($RsBitacora);
            ?>
            <?php if ($totalRows_RsBitacora == 0) { ?>
                <tr> 
                    <td class="tr1">No existe Información a mostrar </td>
                </tr>
            <?php } ?>
            <tr> 
                <td class="tr3"> 
                    <table border="0" width="100%" align="center">
                        <tr> 
                            <td width="23%" align="center"> <?php if ($pageNum_RsBitacora > 0) { // Show if not first page  ?>
                                    <a href="<?php printf("%s?pageNum_RsBitacora=%d%s", $currentPage, 0, $queryString_RsBitacora); ?>">&lt;&lt;</a> 
                                <?php } // Show if not first page ?> </td>
                            <td width="31%" align="center"> <?php if ($pageNum_RsBitacora > 0) { // Show if not first page  ?>
                                    <a href="<?php printf("%s?pageNum_RsBitacora=%d%s", $currentPage, max(0, $pageNum_RsBitacora - 1), $queryString_RsBitacora); ?>">&lt;</a> 
                                <?php } // Show if not first page ?> </td>
                            <td width="23%" align="center"> <?php if ($pageNum_RsBitacora < $totalPages_RsBitacora) { // Show if not last page  ?>
                                    <a href="<?php printf("%s?pageNum_RsBitacora=%d%s", $currentPage, min($totalPages_RsBitacora, $pageNum_RsBitacora + 1), $queryString_RsBitacora); ?>">&gt;</a> 
                                <?php } // Show if not last page ?> </td>
                            <td width="23%" align="center"> <?php if ($pageNum_RsBitacora < $totalPages_RsBitacora) { // Show if not last page  ?>
                                    <a href="<?php printf("%s?pageNum_RsBitacora=%d%s", $currentPage, $totalPages_RsBitacora, $queryString_RsBitacora); ?>">&gt;&gt;</a> 
                                <?php } // Show if not last page ?> </td>
                        </tr>
                    </table>
                </td>
            </tr>
        </table>
        <?php include_once ('inc_bottom_adm.php'); ?>
    </body>
</html>
