<?php
$this->control_str = '';
if ($parametros_arr['read_only']) {
    $this->control_str = '<tr valign="baseline"  class="'.$parametros_arr['class_ctrl'].'">
      <td width="312" align="left" nowrap>'.$parametros_arr['rotulo'].':</td>
	  <td width="312">'.$parametros_arr['campo_valor'].'</td>
	    </tr>';
}
else {
    $this->control_str = $parametros_arr['script_code'].'<tr valign="baseline" class="'.$parametros_arr['class_line'].'">
<td width="312" align="right" nowrap>'. $parametros_arr['rotulo'].':</td>
<td width="312"><input '.$parametros_arr['evento_str'].' name="'.$parametros_arr['campo'].'" type="text" maxlength="'.$parametros_arr['maxlength'].'" class="'.$parametros_arr['class_ctrl'].'" value="'.$parametros_arr['campo_valor'].'" size="'.$parametros_arr['size_ctrl'].'">
<input name="campos[]" type="hidden" value="'.$parametros_arr['campo'].'"></td>
</tr>';
}
?>