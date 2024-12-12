<?php
$this->control_str = '';
if ($parametros_arr['read_only']) {
    $this->control_str = '<tr valign="baseline"  class="'.$parametros_arr['class_ctrl'].'">
      <td width="312" align="left" nowrap>'. $parametros_arr['rotulo'] .':</td>
	  <td width="312">';
    if ($parametros_arr['campo_valor_anio'] > 0 ) {
        for($i=1;$i<=31;$i++) {
            if ($i<10) {
                if ($parametros_arr['campo_valor_dia'] == "0".$i) {
                    $this->control_str .= $i;
                }
            }
            else {
                if ($parametros_arr['campo_valor_dia'] == $i) {
                    $this->control_str .= $i;
                }
            }
        }
        $this->control_str .= ' de ';
        if ($parametros_arr['campo_valor_mes'] == "01") {
            $this->control_str .= ' Enero ';
        }
        if ($parametros_arr['campo_valor_mes'] == "02") {
            $this->control_str .= ' Febrero ';
        }
        if ($parametros_arr['campo_valor_mes'] == "03") {
            $this->control_str .= ' Marzo ';
        }
        if ($parametros_arr['campo_valor_mes'] == "04") {
            $this->control_str .= ' Abril ';
        }
        if ($parametros_arr['campo_valor_mes'] == "05") {
            $this->control_str .= ' Mayo ';
        }
        if ($parametros_arr['campo_valor_mes'] == "06") {
            $this->control_str .= ' Junio ';
        }
        if ($parametros_arr['campo_valor_mes'] == "07") {
            $this->control_str .= ' Julio ';
        }
        if ($parametros_arr['campo_valor_mes'] == "08") {
            $this->control_str .= ' Agosto ';
        }
        if ($parametros_arr['campo_valor_mes'] == "9") {
            $this->control_str .= ' Septiembre ';
        }
        if ($parametros_arr['campo_valor_mes'] == "10") {
            $this->control_str .= ' Octubre ';
        }
        if ($parametros_arr['campo_valor_mes'] == "11") {
            $this->control_str .= ' Noviembre ';
        }
        if ($parametros_arr['campo_valor_mes'] == "12") {
            $this->control_str .= ' Diciembre ';
        }
        $this->control_str .= ' de '.$parametros_arr['campo_valor_anio'];
    }
    $this->control_str .= '</td>
	    </tr>';
}
else {
    $this->control_str ='<tr valign="baseline" class="'.$parametros_arr['class_line'].'">
<td width="40%" align="right" nowrap>'. $parametros_arr['rotulo'].':</td>
<td width="60%" align="left" nowrap>
<select name="'. $parametros_arr['campo'].'_dia" >';
    for($i=1;$i<=31;$i++) {
        if ($i<10) {
            $this->control_str  .= '<option ';
            if ($parametros_arr['campo_valor_dia'] == "0".$i) {
                $this->control_str .= ' selected ';
            }
            $this->control_str .= ' value="0'.$i.'">0'.$i.'</option>';
        }
        else {
            $this->control_str .= '<option ';
            if ($parametros_arr['campo_valor_dia']== $i) {
                $this->control_str .= ' selected ';
            }
            $this->control_str .= ' value="'.$i.'">'.$i.'</option>';

        }
    }
    $this->control_str .= '</select> de <select name="'. $parametros_arr['campo'].'_mes" >';
    $this->control_str .= '<option ';
    if ($parametros_arr['campo_valor_mes'] == "01") {
        $this->control_str .= ' selected ';
    }
    $this->control_str .= ' value="01">Enero</option>';
    $this->control_str .= '<option ';
    if ($parametros_arr['campo_valor_mes'] == "02") {
        $this->control_str .= ' selected ';
    }
    $this->control_str .= ' value="02">Febrero</option>';
    $this->control_str .= '<option ';
    if ($parametros_arr['campo_valor_mes'] == "03") {
        $this->control_str .= ' selected ';
    }
    $this->control_str .= ' value="03">Marzo</option>';
    $this->control_str .= '<option ';
    if ($parametros_arr['campo_valor_mes'] == "04") {
        $this->control_str .= ' selected ';
    }
    $this->control_str .= ' value="04">Abril</option>';
    $this->control_str .= '<option ';
    if ($parametros_arr['campo_valor_mes'] == "05") {
        $this->control_str .= ' selected ';
    }
    $this->control_str .= ' value="05">Mayo</option>';
    $this->control_str .= '<option ';
    if ($parametros_arr['campo_valor_mes'] == "06") {
        $this->control_str .= ' selected ';
    }
    $this->control_str .= ' value="06">Junio</option>';
    $this->control_str .= '<option ';
    if ($parametros_arr['campo_valor_mes'] == "07") {
        $this->control_str .= ' selected ';
    }
    $this->control_str .= ' value="07">Julio</option>';
    $this->control_str .= '<option ';
    if ($parametros_arr['campo_valor_mes'] == "08") {
        $this->control_str .= ' selected ';
    }
    $this->control_str .= ' value="08">Agosto</option>';
    $this->control_str .= '<option ';
    if ($parametros_arr['campo_valor_mes'] == "09") {
        $this->control_str .= ' selected ';
    }
    $this->control_str .= ' value="09">Septiembre</option>';
    $this->control_str .= '<option ';
    if ($parametros_arr['campo_valor_mes'] == "10") {
        $this->control_str .= ' selected ';
    }
    $this->control_str .= ' value="10">Octubre</option>';
    $this->control_str .= '<option ';
    if ($parametros_arr['campo_valor_mes'] == "11") {
        $this->control_str .= ' selected ';
    }
    $this->control_str .= ' value="11">Noviembre</option>';
    $this->control_str .= '<option ';
    if ($parametros_arr['campo_valor_mes'] == "12") {
        $this->control_str .= ' selected ';
    }
    $this->control_str .= '  value="12">Diciembre</option>';
    if ($parametros_arr['campo_valor_anio'] == 0) {
        $cheked_date = ' checked ';
    }
    else {
        $cheked_date = '';
    }
    $this->control_str .= '</select> de <input name="'.$parametros_arr['campo'].'_anio" type="text" class="input_corto" value="'.$parametros_arr['campo_valor_anio'].'" size="16"><input name="'.$parametros_arr['campo'].'_fechanula" '.$cheked_date.'type="checkbox" class="cheque" value="1" size="'.$parametros_arr['size_ctrl'].'">Fecha Nula<input name="campos[]" type="hidden" value="'.$parametros_arr['campo'].'_dia"><input name="campos[]" type="hidden" value="'.$parametros_arr['campo'].'_mes"><input name="campos[]" type="hidden" value="'.$parametros_arr['campo'].'_anio"><input name="campos[]" type="hidden" value="'.$parametros_arr['campo'].'_fechanula"></td>
</tr>';
}
?>

