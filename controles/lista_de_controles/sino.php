<?php
$this->control_str = '';
if ($parametros_arr['read_only']) {
    $this->control_str = '<tr valign="baseline"  class="'.$parametros_arr['class_ctrl'].'">
      <td width="312" align="left" nowrap>'.$parametros_arr['rotulo'].':</td>
	  <td width="312">';
    if ($parametros_arr['campo_valor'] == "1") {
        $this->control_str .= '1';
    }
    else {
        $this->control_str .= '0';
    }
    $this->control_str .= '</td>
	    </tr>';
}
else {
    $this->control_str  = $parametros_arr['script_code'].'<tr valign="baseline" class="'.$parametros_arr['class_line'].'">
<td width="312" align="right" nowrap>'. $parametros_arr['rotulo'] .':</td>
<td width="312">S&iacute;<input name="'.$parametros_arr['campo'].'" type="radio" '. $parametros_arr['campo_valor_si'] .'  class="cheque" value="1" size="'.$parametros_arr['size_ctrl'].'"> No<input name="'.$parametros_arr['campo'].'" type="radio" '. $parametros_arr['campo_valor_no'] .'  class="cheque" value="0" size="'.$parametros_arr['size_ctrl'].'"><input name="campos[]" type="hidden" value="'.$parametros_arr['campo'].'"></td>
</tr>';
}
?>