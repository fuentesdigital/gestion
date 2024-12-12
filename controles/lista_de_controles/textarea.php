<?php
$this->control_str = '';
if ($parametros_arr['read_only']) {
                $this->control_str .= '<tr valign="top"  class="'.$parametros_arr['class_ctrl'].'">
      <td width="312" align="left" nowrap>'.$parametros_arr['rotulo'].':</td>
	  <td width="312">'.$parametros_arr['campo_valor'].'</td>
          </tr>';
} else {
$this->control_str = $parametros_arr['script_code'].'<tr valign="top" class="'.$parametros_arr['class_line'].'"><td width="312" colspan="2" align="left" nowrap>'.$parametros_arr['rotulo'].':<br>
	  <textarea name="'.$parametros_arr['campo'].'" wrap="VIRTUAL" class="'.$parametros_arr['class_ctrl'].'">'.$parametros_arr['campo_valor'].'</textarea><input name="campos[]" type="hidden" value="'.$parametros_arr['campo'].'"></td>
          </tr>';
}

?>