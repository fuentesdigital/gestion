<?php class buscador_proyecto {
	/* Buscador de Proyectos
	 *
	 */

	public $str_form_proy;
	 
	public function __construct() {
		global $pagina_destino;
		
		$this->str_form_proy = '<form name="form1" method="get" action="'.$pagina_destino.'">
<table width="95%" class="tabla" align="center" >
  <tr>
    <td colspan="2" class="tr2">Buscar Proyecto </td>
    </tr>
  <tr class="tr3">
    <td colspan="2"><a href="'.$pagina_destino.'">Ver Todos los proyectos (Reiniciar) </a></td>
    </tr>
  <tr class="tr1">
    <td width="21%">Código:</td>
    <td width="79%"><input name="codigo" type="text" class="input_corto" id="codigo" value="'.$_GET['codigo'].'"></td>
  </tr>
  <tr class="tr1">
    <td width="21%">Nombre del Proyecto:</td>
    <td width="79%"><input name="nombre_proyecto" type="text" class="input_text" id="codigo" value="'.$_GET['nombre_proyecto'].'"></td>
  </tr>
  <tr class="tr1">
    <td>Fecha Inicial: </td>
    <td><span class="tr3">';
		if ($_GET['fecha_inicial_anio'] == '' ) {
			$campo_valor_anio = date("Y");
		} else {
			$campo_valor_anio = $_GET['fecha_inicial_anio'];
		}
		if ($_GET['fecha_inicial_mes'] == '' ) {
			$campo_valor_mes = date("m");
		} else {
			$campo_valor_mes = $_GET['fecha_inicial_mes'];
		}
		if ($_GET['fecha_inicial_dia'] == '' ) {
			$campo_valor_dia = date("d");
		} else {
			$campo_valor_dia = $_GET['fecha_inicial_dia'];
		}
		$campo = "fecha_inicial";
		$this->str_form_proy .= '<select name="'. $campo.'_dia" >';
		for($i=1;$i<=31;$i++){
			if ($i<10){
				$this->str_form_proy .= '<option ';
				if ($campo_valor_dia == "0".$i) {
					$this->str_form_proy .=   ' selected ';
				}
				$this->str_form_proy .= ' value="0'.$i.'">0'.$i.'</option>';
			} else {
				$this->str_form_proy .= '<option ';
				if ($campo_valor_dia == $i) {
					$this->str_form_proy .=   ' selected ';
				}
				$this->str_form_proy .= ' value="'.$i.'">'.$i.'</option>';

			}
		}
		$this->str_form_proy .= '</select> de <select name="'. $campo.'_mes" >';
		$this->str_form_proy .=  '<option ';
		if ($campo_valor_mes == "01") {
			$this->str_form_proy .=  ' selected ';
		}
		$this->str_form_proy .=   ' value="01">Enero</option>';
		$this->str_form_proy .=   '<option ';
		if ($campo_valor_mes == "02") {
			$this->str_form_proy .=   ' selected ';
		}
		$this->str_form_proy .=   ' value="02">Febrero</option>';
		$this->str_form_proy .=   '<option ';
		if ($campo_valor_mes == "03") {
			$this->str_form_proy .=   ' selected ';
		}
		$this->str_form_proy .=   ' value="03">Marzo</option>';
		$this->str_form_proy .=   '<option ';
		if ($campo_valor_mes == "04") {
			$this->str_form_proy .=   ' selected ';
		}
		$this->str_form_proy .=   ' value="04">Abril</option>';
		$this->str_form_proy .=   '<option ';
		if ($campo_valor_mes == "05") {
			$this->str_form_proy .=   ' selected ';
		}
		$this->str_form_proy .=   ' value="05">Mayo</option>';
		$this->str_form_proy .=   '<option ';
		if ($campo_valor_mes == "06") {
			$this->str_form_proy .=   ' selected ';
		}
		$this->str_form_proy .=   ' value="06">Junio</option>';
		$this->str_form_proy .=   '<option ';
		if ($campo_valor_mes == "07") {
			$this->str_form_proy .=   ' selected ';
		}
		$this->str_form_proy .=   ' value="07">Julio</option>';
		$this->str_form_proy .=   '<option ';
		if ($campo_valor_mes == "08") {
			$this->str_form_proy .=   ' selected ';
		}
		$this->str_form_proy .=   ' value="08">Agosto</option>';
		$this->str_form_proy .=   '<option ';
		if ($campo_valor_mes == "09") {
			$this->str_form_proy .=   ' selected ';
		}
		$this->str_form_proy .=   ' value="09">Septiembre</option>';
		$this->str_form_proy .=   '<option ';
		if ($campo_valor_mes == "10") {
			$this->str_form_proy .=   ' selected ';
		}
		$this->str_form_proy .=   ' value="10">Octubre</option>';
		$this->str_form_proy .=   '<option ';
		if ($campo_valor_mes == "11") {
			$this->str_form_proy .=   ' selected ';
		}
		$this->str_form_proy .=   ' value="11">Noviembre</option>';
		$this->str_form_proy .=   '<option ';
		if ($campo_valor_mes == "12") {
			$this->str_form_proy .=   ' selected ';
		}
		$this->str_form_proy .=   '  value="12">Diciembre</option>';
		$this->str_form_proy .=   '</select> de
	<input name="'.$campo.'_anio" type="text" class="input_corto" value="'.$campo_valor_anio.'" size="16">
    </span></td>
  </tr>
  <tr class="tr3">
    <td>Fecha Final: </td>
    <td>';
		if ($_GET['fecha_final_anio'] == '' ) {
			$campo_valor_anio = date("Y");
		} else {
			$campo_valor_anio = $_GET['fecha_final_anio'];
		}
		if ($_GET['fecha_final_mes'] == '' ) {
			$campo_valor_mes = date("m");
		} else {
			$campo_valor_mes = $_GET['fecha_final_mes'];
		}
		if ($_GET['fecha_final_dia'] == '' ) {
			$campo_valor_dia = date("d");
		} else {
			$campo_valor_dia = $_GET['fecha_final_dia'];
		}
		$campo = "fecha_final";
		$this->str_form_proy .=   '<select name="'. $campo.'_dia" >';
		for($i=1;$i<=31;$i++){
			if ($i<10){
				$this->str_form_proy .=   '<option ';
				if ($campo_valor_dia == "0".$i) {
					$this->str_form_proy .=   ' selected ';
				}
				$this->str_form_proy .=   ' value="0'.$i.'">0'.$i.'</option>';
			} else {
				$this->str_form_proy .=   '<option ';
				if ($campo_valor_dia == $i) {
					$this->str_form_proy .=   ' selected ';
				}
				$this->str_form_proy .=   ' value="'.$i.'">'.$i.'</option>';

			}
		}
		$this->str_form_proy .=   '</select> de <select name="'. $campo.'_mes" >';
		$this->str_form_proy .=   '<option ';
		if ($campo_valor_mes == "01") {
			$this->str_form_proy .=   ' selected ';
		}
		$this->str_form_proy .=   ' value="01">Enero</option>';
		$this->str_form_proy .=   '<option ';
		if ($campo_valor_mes == "02") {
			$this->str_form_proy .=   ' selected ';
		}
		$this->str_form_proy .=   ' value="02">Febrero</option>';
		$this->str_form_proy .=   '<option ';
		if ($campo_valor_mes == "03") {
			$this->str_form_proy .=   ' selected ';
		}
		$this->str_form_proy .=   ' value="03">Marzo</option>';
		$this->str_form_proy .=   '<option ';
		if ($campo_valor_mes == "04") {
			$this->str_form_proy .=   ' selected ';
		}
		$this->str_form_proy .=   ' value="04">Abril</option>';
		$this->str_form_proy .=   '<option ';
		if ($campo_valor_mes == "05") {
			$this->str_form_proy .=   ' selected ';
		}
		$this->str_form_proy .=   ' value="05">Mayo</option>';
		$this->str_form_proy .=   '<option ';
		if ($campo_valor_mes == "06") {
			$this->str_form_proy .=   ' selected ';
		}
		$this->str_form_proy .=   ' value="06">Junio</option>';
		$this->str_form_proy .=   '<option ';
		if ($campo_valor_mes == "07") {
			$this->str_form_proy .=   ' selected ';
		}
		$this->str_form_proy .=   ' value="07">Julio</option>';
		$this->str_form_proy .=   '<option ';
		if ($campo_valor_mes == "08") {
			$this->str_form_proy .=   ' selected ';
		}
		$this->str_form_proy .=   ' value="08">Agosto</option>';
		$this->str_form_proy .=   '<option ';
		if ($campo_valor_mes == "09") {
			$this->str_form_proy .=   ' selected ';
		}
		$this->str_form_proy .=   ' value="09">Septiembre</option>';
		$this->str_form_proy .=   '<option ';
		if ($campo_valor_mes == "10") {
			$this->str_form_proy .=   ' selected ';
		}
		$this->str_form_proy .=   ' value="10">Octubre</option>';
		$this->str_form_proy .=   '<option ';
		if ($campo_valor_mes == "11") {
			$this->str_form_proy .=   ' selected ';
		}
		$this->str_form_proy .=   ' value="11">Noviembre</option>';
		$this->str_form_proy .=   '<option ';
		if ($campo_valor_mes == "12") {
			$this->str_form_proy .=   ' selected ';
		}
		$this->str_form_proy .=   '  value="12">Diciembre</option>';
		$this->str_form_proy .=   '</select> de
	<input name="'.$campo.'_anio" type="text" class="input_corto" value="'.$campo_valor_anio.'" size="16"></td>';
		$this->str_form_proy .= '  </tr>
  <tr class="tr1">
    <td>Fechas:</td>';
		$selected_1 = " ";
		$selected_2 = " ";
		if ($_GET['todas_fechas'] == "1"){
			$selected_1 = " selected ";
		}
		if ($_GET['todas_fechas'] == "2"){
			$selected_2 = " selected ";
		}
		$this->str_form_proy .= ' <td><select name="todas_fechas" id="todas_fechas" class="select_list_corto">
    <option '. $selected_1 . ' value="1">Todas las Fechas</option>
    <option '. $selected_2 . ' value="2">Rango de Fechas</option>
  </select></td>
  </tr>
  <tr class="tr3">
    <td>Letra:</td>';
		$this->str_form_proy .= '<td><select name="letra" class="select_list_corto">';
		$this->str_form_proy .= '      <option value="0" ';
		if (!(strcmp(0, $_GET['letra']))) {
			$this->str_form_proy .=  " SELECTED ";
		}  $this->str_form_proy .=  ' >Todas las Letras</option>';
		$this->str_form_proy .= '      <option value="A" ';
		if (!(strcmp("A", $_GET['letra']))) {
			$this->str_form_proy .=  " SELECTED ";
		}
		$this->str_form_proy .=  ' >A</option>';
		$this->str_form_proy .= '      <option value="B" ';
		if (!(strcmp("B", $_GET['letra']))) {
			$this->str_form_proy .=  " SELECTED ";
		}
		$this->str_form_proy .=  ' >B</option>';
		$this->str_form_proy .= '      <option value="C" ';
		if (!(strcmp("C", $_GET['letra']))) {
			$this->str_form_proy .=  " SELECTED ";
		}
		$this->str_form_proy .=  ' >C</option>';
		$this->str_form_proy .= '      <option value="D" ';
		if (!(strcmp("D", $_GET['letra']))) {
			$this->str_form_proy .=  " SELECTED ";
		}
		$this->str_form_proy .=  ' >D</option>';
		$this->str_form_proy .= '      <option value="E" ';
		if (!(strcmp("E", $_GET['letra']))) {
			$this->str_form_proy .=  " SELECTED ";
		}
		$this->str_form_proy .=  ' >E</option>';
		$this->str_form_proy .= '      <option value="F" ';
		if (!(strcmp("F", $_GET['letra']))) {
			$this->str_form_proy .=  " SELECTED ";
		}
		$this->str_form_proy .=  ' >F</option>';
		$this->str_form_proy .= '      <option value="G" ';
		if (!(strcmp("G", $_GET['letra']))) {
			$this->str_form_proy .=  " SELECTED ";
		}
		$this->str_form_proy .=  ' >G</option>';
		$this->str_form_proy .= '      <option value="H" ';
		if (!(strcmp("H", $_GET['letra']))) {
			$this->str_form_proy .=  " SELECTED ";
		}
		$this->str_form_proy .=  ' >H</option>';
		$this->str_form_proy .= '      <option value="I" ';
		if (!(strcmp("I", $_GET['letra']))) {
			$this->str_form_proy .=  " SELECTED ";
		}  $this->str_form_proy .=  ' >I</option>';
		$this->str_form_proy .= '      <option value="J" ';
		if (!(strcmp("J", $_GET['letra']))) {
			$this->str_form_proy .=  " SELECTED ";
		}
		$this->str_form_proy .=  ' >J</option>';
		$this->str_form_proy .= '      <option value="K" ';
		if (!(strcmp("K", $_GET['letra']))) {
			$this->str_form_proy .=  " SELECTED ";
		}
		$this->str_form_proy .=  ' >K</option>';
		$this->str_form_proy .= '      <option value="L" ';
		if (!(strcmp("L", $_GET['letra']))) {
			$this->str_form_proy .=  " SELECTED ";
		}
		$this->str_form_proy .=  ' >L</option>';
		$this->str_form_proy .= '      <option value="M" ';
		if (!(strcmp("M", $_GET['letra']))) {
			$this->str_form_proy .=  " SELECTED ";
		}  $this->str_form_proy .=  ' >M</option>';
		$this->str_form_proy .= '      <option value="N" ';
		if (!(strcmp("N", $_GET['letra']))) {
			$this->str_form_proy .=  " SELECTED ";
		}
		$this->str_form_proy .=  ' >N</option>';
		$this->str_form_proy .= '      <option value="�" '; 
		if (!(strcmp("�", $_GET['letra']))) { 
			$this->str_form_proy .=  " SELECTED ";
		}
		$this->str_form_proy .=  ' >ñ</option>';
		$this->str_form_proy .= '      <option value="O" ';
		if (!(strcmp("O", $_GET['letra']))) {
			$this->str_form_proy .=  " SELECTED ";
		}
		$this->str_form_proy .=  ' >O</option>';
		$this->str_form_proy .= '      <option value="P" ';
		if (!(strcmp("P", $_GET['letra']))) {
			$this->str_form_proy .=  " SELECTED ";
		}
		$this->str_form_proy .=  ' >P</option>';
		$this->str_form_proy .= '      <option value="Q" ';
		if (!(strcmp("Q", $_GET['letra']))) {
			$this->str_form_proy .=  " SELECTED ";
		}
		$this->str_form_proy .=  ' >Q</option>';
		$this->str_form_proy .= '      <option value="R" ';
		if (!(strcmp("R", $_GET['letra']))) {
			$this->str_form_proy .=  " SELECTED ";
		}
		$this->str_form_proy .=  ' >R</option>';
		$this->str_form_proy .= '      <option value="S" ';
		if (!(strcmp("S", $_GET['letra']))) {
			$this->str_form_proy .=  " SELECTED ";
		}
		$this->str_form_proy .=  ' >S</option>';
		$this->str_form_proy .= '      <option value="T" ';
		if (!(strcmp("T", $_GET['letra']))) {
			$this->str_form_proy .=  " SELECTED ";
		}  $this->str_form_proy .=  ' >T</option>';
		$this->str_form_proy .= '      <option value="U" ';
		if (!(strcmp("U", $_GET['letra']))) {
			$this->str_form_proy .=  " SELECTED ";
		}
		$this->str_form_proy .=  ' >U</option>';
		$this->str_form_proy .= '      <option value="V" ';
		if (!(strcmp("V", $_GET['letra']))) {
			$this->str_form_proy .=  " SELECTED ";
		}
		$this->str_form_proy .=  ' >V</option>';
		$this->str_form_proy .= '      <option value="X" ';
		if (!(strcmp("X", $_GET['letra']))) {
			$this->str_form_proy .=  " SELECTED ";
		}  $this->str_form_proy .=  ' >X</option>';
		$this->str_form_proy .= '      <option value="Y" ';
		if (!(strcmp("Y", $_GET['letra']))) {
			$this->str_form_proy .=  " SELECTED ";
		}
		$this->str_form_proy .=  ' >Y</option>';
		$this->str_form_proy .= '      <option value="Z" ';
		if (!(strcmp("Z", $_GET['letra']))) {
			$this->str_form_proy .=  " SELECTED ";
		}
		$this->str_form_proy .=  ' >Z</option>';
		$this->str_form_proy .= '    </select></td>
  </tr>
  <tr class="tr3">
    <td colspan="2" class="tr1">
      <div align="center">
        <input name="Submit" type="submit" class="input_submit" value="   Buscar Proyecto   ">
      </div></td>
    </tr>
</table>
</form>';
	}
	public function __destruct() {
		// destruye esta clase
	}
}

?>