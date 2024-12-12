<?php
$this->control_str = '';
if ($parametros_arr['read_only']) {
    $query_RsForanea = "SELECT * FROM " . $this->nombre_tabla_foranea($this->replace_general($parametros_arr['campo'])) . " WHERE " . $this->replace_general($parametros_arr['campo']) . " = " . $parametros_arr['campo_valor'];
    // echo $query_RsForanea;
    $RsForanea = mysqli_query($this->db_connection,$query_RsForanea) or trigger_error(mysql_error(), E_USER_ERROR);
    $row_RsForanea = mysqli_fetch_assoc($RsForanea);
    $totalRows_RsForanea = mysqli_num_rows($RsForanea);
    $this->control_str = '	<tr valign="baseline"  class="' . $parametros_arr['class_ctrl'] . '">
      <td width="312" align="left" nowrap>' . $parametros_arr['rotulo'] . ':</td>
	  <td width="312">';
    do {
        $this->control_str .= $row_RsForanea[$this->nombre_tabla_foranea($this->replace_general($parametros_arr['campo']))];
    } while ($row_RsForanea = mysqli_fetch_assoc($RsForanea));
    $rows = mysqli_num_rows($RsForanea);
    if ($rows > 0) {
        mysqli_data_seek($RsForanea, 0);
        $row_RsForanea = mysqli_fetch_assoc($RsForanea);
        mysqli_free_result($RsForanea);
    }
    $this->control_str .= '</td>
	    </tr>';
} else {
    $query_RsForanea = "SELECT * FROM " . $this->nombre_tabla_foranea($this->replace_general($parametros_arr['campo']))." ORDER BY orden " ;
    //echo $query_RsForanea;
    $RsForanea = mysqli_query($this->db_connection,$query_RsForanea) or trigger_error(mysql_error(), E_USER_ERROR);
    $row_RsForanea = mysqli_fetch_assoc($RsForanea);
    $totalRows_RsForanea = mysqli_num_rows($RsForanea);
    $this->control_str = $parametros_arr['script_code'].'	<tr valign="baseline" class="tr1">
      <td width="312" align="right" align="right" nowrap>' . $parametros_arr['rotulo'] . ':</td>
	  <td width="312" >' . $parametros_arr['boton_agregar'] . '<select '.$parametros_arr['evento_str'].' class = "select_list" name="' . $parametros_arr['campo'] . '">';
    do {
        $this->control_str .= '<option ';
        if ($parametros_arr['insertar'] == "1") {
            if ($row_RsForanea[$this->replace_general($parametros_arr['campo'])] == $parametros_arr['campo_valor']) {
                $this->control_str .= ' selected ';
            }
            $this->control_str .= ' value="' . $row_RsForanea[$this->replace_general($parametros_arr['campo'])] . '">' . $row_RsForanea[$this->nombre_tabla_foranea($this->replace_general($parametros_arr['campo']))] . '</option>';
        }
    } while ($row_RsForanea = mysqli_fetch_assoc($RsForanea));
    $rows = mysqli_num_rows($RsForanea);
    if ($rows > 0) {
        mysqli_data_seek($RsForanea, 0);
        $row_RsForanea = mysqli_fetch_assoc($RsForanea);
        mysqli_free_result($RsForanea);
    }
    $this->control_str .= '</select><br>';
    $this->control_str .= $parametros_arr['ubicacionInferior'];
    $this->control_str .= '<input name="campos[]" type="hidden" value="' . $parametros_arr['campo'] . '"></td></tr>';
}
?>