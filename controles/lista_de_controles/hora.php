<?php
$this->control_str = '';
if ($parametros_arr['read_only']) {
            $this->control_str = '<tr valign="baseline"  class="'.$parametros_arr['class_ctrl'].'">
      <td width="312" align="left" nowrap>'. $parametros_arr['rotulo'] .':</td>
	  <td width="312">';
            for($i=0;$i<23;$i++) {
                if ($i<10) {
                    if ($parametros_arr['campo_valor_hora']=="0".$i) {
                        $this->control_str .= '0'.$i;
                    }
                }
                else {
                    if ($parametros_arr['campo_valor_hora']==$i) {
                        $this->control_str .= $i;
                    }
                }
            }
            for($i=0;$i<59;$i++) {
                if ($i<10) {
                    if ($parametros_arr['campo_valor_minutos']=="0".$i) {
                        $this->control_str .= ':0'.$i;
                    }
                }
                else {
                    if ($parametros_arr['campo_valor_minutos']==$i) {
                        $this->control_str .= ':'.$i;
                    }
                }
            }
            $this->control_str .= '</td>
	    </tr>';
}
else {
    $this->control_str ='<tr valign="baseline" class="'.$parametros_arr['class_line'].'">
    <td width="312" align="right" nowrap>'. $parametros_arr['rotulo'].':</td>
    <td width="312"><select name="'. $parametros_arr['campo'].'_hora" >';
    for($i=1;$i<=12;$i++) {
        if ($i<10) {
            $this->control_str .= '<option ';
            if ($parametros_arr['campo_valor_hora']=="0".$i) {
                $this->control_str .= " selected ";
            }
            $this->control_str .= ' value="0'.$i.'">0'.$i.'</option>';
        }
        else {
            $this->control_str .= '<option ';
            if ($parametros_arr['campo_valor_hora']==$i) {
                $this->control_str .= " selected ";
            }
            $this->control_str .= ' value="'.$i.'">'.$i.'</option>';
        }
    }
    $this->control_str .= '</select>:<select name="'. $parametros_arr['campo'].'_minutos" >';
    for($i=0;$i<=59;$i++) {
        if ($i<10) {
            $this->control_str .= '<option ';
            if ($parametros_arr['campo_valor_minutos']=="0".$i) {
                $this->control_str .= " selected ";
            }
            $this->control_str .= ' value="0'.$i.'">0'.$i.'</option>';
        }
        else {
            $this->control_str .= '<option ';
            if ($parametros_arr['campo_valor_minutos']==$i) {
                $this->control_str .= " selected ";
            }
            $this->control_str .= ' value="'.$i.'">'.$i.'</option>';
        }
    }
    $this->control_str .= '</select>:<select name="'. $parametros_arr['campo'].'_ampm" >';
    $this->control_str .= '<option ';
    if ($parametros_arr['campo_valor_ampm']=="AM") {
        $this->control_str .= " selected ";
    }
    $this->control_str .= ' value="AM">AM</option>';
    $this->control_str .= '<option ';
    if ($parametros_arr['campo_valor_ampm']=="PM") {
        $this->control_str .= " selected ";
    }
    $this->control_str .= ' value="PM">PM</option>';
    $this->control_str .= '</select><input name="campos[]" type="hidden" value="'.$parametros_arr['campo'].'_hora"><input name="campos[]" type="hidden" value="'.$parametros_arr['campo'].'_minutos"><input name="campos[]" type="hidden" value="'.$parametros_arr['campo'].'_ampm"></td></tr>';
}
?>

