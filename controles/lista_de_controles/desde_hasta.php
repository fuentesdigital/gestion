<?php
$this->control_str = '';
for ($k=0;$k<2;$k++) {
    $this->control_str .='<tr valign="baseline" class="'.$parametros_arr[$k]['class_line'].'">
<td width="35%" align="right" nowrap>'.$parametros_arr[$k]['rotulo'].':</td>
<td width="75%" align="left" nowrap>
<select name="sel_dia[]">';
    for($i=1;$i<=31;$i++) {
        if ($i<10) {
            $this->control_str  .= '<option ';
            if ($parametros_arr[$k]['sel_dia'] == "0".$i) {
                $this->control_str .= ' selected ';
            }
            $this->control_str .= ' value="0'.$i.'">0'.$i.'</option>';
        }
        else {
            $this->control_str .= '<option ';
            if ($parametros_arr[$k]['sel_dia']== $i) {
                $this->control_str .= ' selected ';
            }
            $this->control_str .= ' value="'.$i.'">'.$i.'</option>';

        }
    }
    $this->control_str .= '</select> de <select name="sel_mes[]" >';
    $this->control_str .= '<option ';
    if ($parametros_arr[$k]['sel_mes'] == "01") {
        $this->control_str .= ' selected ';
    }
    $this->control_str .= ' value="01">Enero</option>';
    $this->control_str .= '<option ';
    if ($parametros_arr[$k]['sel_mes'] == "02") {
        $this->control_str .= ' selected ';
    }
    $this->control_str .= ' value="02">Febrero</option>';
    $this->control_str .= '<option ';
    if ($parametros_arr[$k]['sel_mes'] == "03") {
        $this->control_str .= ' selected ';
    }
    $this->control_str .= ' value="03">Marzo</option>';
    $this->control_str .= '<option ';
    if ($parametros_arr[$k]['sel_mes'] == "04") {
        $this->control_str .= ' selected ';
    }
    $this->control_str .= ' value="04">Abril</option>';
    $this->control_str .= '<option ';
    if ($parametros_arr[$k]['sel_mes'] == "05") {
        $this->control_str .= ' selected ';
    }
    $this->control_str .= ' value="05">Mayo</option>';
    $this->control_str .= '<option ';
    if ($parametros_arr[$k]['sel_mes'] == "06") {
        $this->control_str .= ' selected ';
    }
    $this->control_str .= ' value="06">Junio</option>';
    $this->control_str .= '<option ';
    if ($parametros_arr[$k]['sel_mes'] == "07") {
        $this->control_str .= ' selected ';
    }
    $this->control_str .= ' value="07">Julio</option>';
    $this->control_str .= '<option ';
    if ($parametros_arr[$k]['sel_mes'] == "08") {
        $this->control_str .= ' selected ';
    }
    $this->control_str .= ' value="08">Agosto</option>';
    $this->control_str .= '<option ';
    if ($parametros_arr[$k]['sel_mes'] == "09") {
        $this->control_str .= ' selected ';
    }
    $this->control_str .= ' value="09">Septiembre</option>';
    $this->control_str .= '<option ';
    if ($parametros_arr[$k]['sel_mes'] == "10") {
        $this->control_str .= ' selected ';
    }
    $this->control_str .= ' value="10">Octubre</option>';
    $this->control_str .= '<option ';
    if ($parametros_arr[$k]['sel_mes'] == "11") {
        $this->control_str .= ' selected ';
    }
    $this->control_str .= ' value="11">Noviembre</option>';
    $this->control_str .= '<option ';
    if ($parametros_arr[$k]['sel_mes'] == "12") {
        $this->control_str .= ' selected ';
    }
    $this->control_str .= '  value="12">Diciembre</option>';
    if ($parametros_arr[$k]['sel_mes'] == 0) {
        $cheked_date = ' checked ';
    }
    else {
        $cheked_date = '';
    }
    $this->control_str .= '</select> de <input name="sel_anio[]" type="text" class="input_corto" value="'.$parametros_arr[$k]['sel_anio'].'" size="16"></td>
</tr>';
}
?>

