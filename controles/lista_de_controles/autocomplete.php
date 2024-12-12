<?php

$NombreCampoAutoComplete = $parametros_arr['campo'];

$NombreCodigoArray = explode('X', $parametros_arr['campo']);

$NombreCodigo = $NombreCodigoArray[0];

$PrefijoCampo = $NombreCodigoArray[1];

$NombreMostrado = substr($NombreCodigo, 3, strlen($NombreCodigo));

$this->control_str = '';
if ($parametros_arr['read_only']) {
    $this->control_str = '<tr valign="baseline"  class="' . $parametros_arr['class_ctrl'] . '">
      <td width="312" align="left" nowrap>' . $parametros_arr['rotulo'] . ':</td>
	  <td width="312">' . $this->rotulo_llave($NombreMostrado, $NombreMostrado, $NombreCodigo, $parametros_arr['campo_valor']) . ' [' . $parametros_arr['campo_valor'] . ']' . '</td>
	    </tr>';
} else {

    $query_autocomplete = "SELECT `$NombreCodigo`, `$NombreMostrado` FROM `$NombreMostrado` WHERE esdetalle=1 AND estado=1;";

    //echo $query_autocomplete;
    //die();
    $RsAutoComplete = mysqli_query($query_autocomplete, CONEXION) or die(mysql_error());
    $row_RsAutoComplete = mysqli_fetch_assoc($RsAutoComplete);
    $totalRows_RsAutoComplete = mysqli_num_rows($RsAutoComplete);
    $array_autocomplete_js = '';
    do {
        $array_autocomplete_js .= "'" . $row_RsAutoComplete[$NombreMostrado] . " [" . $row_RsAutoComplete[$NombreCodigo] . "]',";
    } while ($row_RsAutoComplete = mysqli_fetch_assoc($RsAutoComplete));

    $array_autocomplete_js = substr($array_autocomplete_js, 0, -1);

    $this->control_str = '<script>
            var ' . $PrefijoCampo . '=new Array(' . $array_autocomplete_js . ');
        </script>';

    /* $this->control_str = $parametros_arr['script_code'] . '<tr valign="baseline" class="' . $parametros_arr['class_line'] . '">
      <td width="312" align="right" nowrap>' . $parametros_arr['rotulo'] . ':</td>
      <td width="312"><input ' . $parametros_arr['evento_str'] . ' name="' . $parametros_arr['campo'] . '" type="text" maxlength="' . $parametros_arr['maxlength'] . '" class="' . $parametros_arr['class_ctrl'] . '" value="' . $parametros_arr['campo_valor'] . '" size="' . $parametros_arr['size_ctrl'] . '">
      <input name="campos[]" type="hidden" value="' . $parametros_arr['campo'] . '"></td>
      </tr>'; */
    if ($parametros_arr['campo_valor'] != '') {
        $valor_CampoActual = $this->rotulo_llave($NombreMostrado, $NombreMostrado, $NombreCodigo, $parametros_arr['campo_valor']) . ' [' . $parametros_arr['campo_valor'] . ']';
    } else {
        $valor_CampoActual = '';
    }
    $this->control_str .= '<tr valign="baseline" class="' . $parametros_arr['class_line'] . '">
        <td align="center" colspan="4">' . $parametros_arr['rotulo'] . ':<br>
            <input  ' . $parametros_arr['evento_str'] . ' name=\'' . $NombreCampoAutoComplete . '_autocompletado\' type=\'text\' AUTOCOMPLETE=\'off\' style=\'font-family:verdana;width:690px;font-size:12px\' id=\'' . $NombreCampoAutoComplete . '\' value=\'' . $valor_CampoActual . '\'/> 
        <script>
            var obj = actb(document.getElementById(\'' . $NombreCampoAutoComplete . '\'),' . $PrefijoCampo . ');
        </script>
        <br><input name="campos[]" type="hidden" value="' . $NombreCampoAutoComplete . '_autocompletado"></td></tr>';
}
?>