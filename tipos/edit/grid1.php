<?php
$query_Rs_rotulo = "SELECT id" . $tabla . ", " . $tabla . " FROM " . $tabla . " WHERE id" . $tabla . "= " . $codigo;
$Rs_rotulo = mysqli_query($query_Rs_rotulo, CONEXION) or trigger_error(mysql_error(), E_USER_ERROR);
$row_Rs_rotulo = mysqli_fetch_assoc($Rs_rotulo);
$rotulo_str = str_replace(" ", "_", $_GET['nombre_seccion']);
mysqli_free_result($Rs_rotulo);
$parametros_arr['codigo'] = $codigo;
$parametros_arr['campo'] = $campo;
$parametros_arr['campo_valor'] = $campo_valor;
$parametros_arr['rotulo'] = $rotulo;
$parametros_arr['rotulo_str'] = $rotulo_str;
$parametros_arr['read_only'] = false;
$this->fila_de_datos_str .= $this->asignar_control('grid_launcher', $parametros_arr);
?>
