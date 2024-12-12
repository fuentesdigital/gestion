<?php
include_once '../claves_de_acceso.php';
include_once '../clases/conexion.php';
$str_campos = '';
$str_values = '';
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link href="../css/BLUE.css" rel="stylesheet" type="text/css">
        <title>Confirmación Contacto FD Fuentes Digital</title>
    </head>

    <body>
        <?php
        if (isset($_GET["process"]) && $_GET["process"] === "true") {

            $str_insert = 'INSERT INTO `Contactoweb` ';

            echo '<table width="98%" align="left" class="tabla"><tr><td colspan="2" class="tr2">Gracias!<br>Hemos recibido la siguiente información:';
            foreach ($_GET as $key => $val) {
                if ($key !== "process") {
                    if ($key !== "btnSubmit") {

                        $str_campos .= '`' . $key . '`,';
                        $str_values .= "'" . $val . "',";
                        echo '<tr><td class="tr1">';
                        echo "" . $key . ": " . $val . "";
                        echo '</td></tr>';
                    }
                }
            }
            echo '</td></tr></table>';
            $str_campos = '(' . substr($str_campos, 0, strlen($str_campos) - 1);
            $str_values = ' VALUES (' . substr($str_values, 0, strlen($str_values) - 1);
            $str_campos .= ')';
            $str_values .= ' );';
            $str_insert .= $str_campos . $str_values;

            mysqli_select_db($this->db_connection, $this->db_database);

            mysqli_query("SET NAMES utf8");

            $Result1 = mysqli_query($str_insert, CONEXION) or die(mysql_error());
        }
        ?>
    </body>
</html>
