<?php
$this->control_str = '';
$this->control_str = '<tr valign="baseline" class="tr1">
    <td width="312" align="right" nowrap>'. $parametros_arr['rotulo'] .':</td>
    <td width="312" class="tr9"><a href="#"  onClick=javascript:detalle_grid_edit("'.$parametros_arr['campo'].'","'.$parametros_arr['codigo'].'","'.$_GET['id_op'].'","'.$parametros_arr['rotulo_str'].'","'.str_replace(" ",'',md5(microtime())).'");>Detalle '.$parametros_arr['rotulo'].'</a></td></tr>';
?>