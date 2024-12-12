<?php
if (isset($_GET['full_detail']) && $_GET['full_detail'] == '1') {
    $query_Rs_rotulo = 'SELECT id' . $tabla . ', ' . $tabla . ' FROM ' . $tabla . ' WHERE id' . $tabla . '= ' . $codigo;
    //echo $query_Rs_rotulo;
    $Rs_rotulo = mysqli_query($query_Rs_rotulo, CONEXION) or trigger_error(mysql_error(), E_USER_ERROR);
    $row_Rs_rotulo = mysqli_fetch_assoc($Rs_rotulo);
    if (isset($_GET['nombre_seccion'])) {
        $rotulo_str = str_replace(" ", "_", $_GET['nombre_seccion']);
    } else {
        $rotulo_str = '';
    }
    mysqli_free_result($Rs_rotulo);
    mysqli_select_db($this->db_connection, $this->db_database);

    if (strstr($campo, 'detalle') != '') {
        $campo = str_replace('detalle', '', $campo);
    }
    $query_rs = 'SELECT * FROM `' . $campo . 'detallegrid` WHERE `padre` = ' . $codigo;
    //echo $query_rs;

    $rs = mysqli_query($query_rs, CONEXION) or trigger_error(mysql_error(), E_USER_ERROR);
    $row_rs = mysqli_fetch_assoc($rs);
    //print_r($row_rs);
    $total_rows_det = mysqli_num_rows($rs);
    //echo $total_rows_det;
    $numfields = mysqli_num_fields($rs);
    //echo $numfields;
    do {
        for ($i = 0; $i < $numfields; $i++) {
            $tbl = $campo . 'detallegrid';
            $this->fila_de_datos_rotulo($tbl, $this->mysqli_field_name($rs, $i));
            $this->fila_de_datos_view($tbl, $this->mysqli_field_name($rs, $i), $row_rs[$this->mysqli_field_name($rs, $i)]);
        }
    } while ($row_rs = mysqli_fetch_assoc($rs));
} else {
    $query_Rs_rotulo = 'SELECT id' . $tabla . ', ' . $tabla . ' FROM ' . $tabla . ' WHERE id' . $tabla . '= ' . $codigo;
    //echo $query_Rs_rotulo;
    $Rs_rotulo = mysqli_query($query_Rs_rotulo, CONEXION) or trigger_error(mysql_error(), E_USER_ERROR);
    $row_Rs_rotulo = mysqli_fetch_assoc($Rs_rotulo);
    //$rotulo_str = $this->jsspecialchars($row_Rs_rotulo[$tabla]);
    $rotulo_str = str_replace(" ", "_", $_GET['nombre_seccion']);
    mysqli_free_result($Rs_rotulo);
    $this->fila_de_datos_str .= '<tr valign="baseline" >
      <td width="312" align="right" nowrap>' . $rotulo . ':</td>
	  <td width="312"><a href = javascript:detalle_grid_view("' . $campo . '","' . $codigo . '","' . $_GET["id_op"] . '","' . $rotulo_str . '","' . str_replace(" ", '', md5(microtime())) . '");>Ver Detalle</a></td></tr>';
}
?>
