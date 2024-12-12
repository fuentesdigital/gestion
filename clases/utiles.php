<?php

/**
 * <b>utiles</b><br>.
 * Funciones de Utilidad Diversas.<br>
 * Utilizadas con complemento al desarrollo.
 */
class utiles extends power_tools {

    /**
     *  Almacena el valor limpio de la posible inyección de datos.
     */
    public $result_injection = '';

    /**
     *  Almacena el Rotulo de la Llave foranea utilizada.
     */
    public $rotulo_foranea = '';

    /**
     *  Almacena el valor limpio de la posible inyección de datos en base a un tipo.
     */
    public $theOuputValue = '';

    /**
     *  Almacena el Nombre del Codigo de la Tabla.
     */
    public $codigo_tabla = '';

    /**
     *  Almacena el Nombre del Codigo foraneo de la Tabla.
     */
    public $codigo_foraneo = '';

    /**
     *  Almacena los espacios necesitados
     */
    public $espacios = '';
    public $pendientes_str = '';
    public $rotulo_campo = '';

    public function __construct() {
        
    }

    function fila_de_datos_rotulo($tabla, $campo) {
        $style_tr3 = ' class="tr3" ';
        $entidad_Rs = $tabla . '_rotulo';
//$metadata_Rs  = new metadatos_array();
// print_r($this->recorrer_entidad($entidad_Rs));
        if (count($this->recorrer_entidad($entidad_Rs)) > 0) {
            $row_Rs = $this->recorrer_entidad($entidad_Rs);
            $parametros_arr = array();
            if (isset($row_Rs[$entidad_Rs][$campo . '_rotulo'])) {
                $rotulo = $row_Rs[$entidad_Rs][$campo . '_rotulo'];
                $parametros_arr['class_line'] = $style_tr3;
                $parametros_arr['rotulo'] = $rotulo;
                $this->fila_de_datos_str .= $this->asignar_control('seccion', $parametros_arr);
            }
        }
    }
    
    /**
     * <b>mysqli_field_name</b><br>
     * Reemplaza la funcion $this->mysqli_field_name.<br>
     * Ya que dicha funcion no se encuentra en el juego mysql_i.<br>
     */
    function mysqli_field_name($result, $field_offset) {
        $properties = mysqli_fetch_field_direct($result, $field_offset);
        return is_object($properties) ? $properties->name : null;
    }

    /**
     * <b>valor_foranea</b><br>
     * Devuelve el Rotulo de la Llave Foranea utilizada.<br>
     * <b>$tabla</b> es el nombre de la tabla de la llave.<br>
     * <b>$llave_foranea</b> es el nombre del campo de la llave foranea.<br>
     * <b>$valor_llave</b> es el codigo de la llave que se quiere recuperar.<br>
     */
    function valor_foranea($tabla, $llave_foranea, $valor_llave) {
        if ($valor_llave != '') {
            $this->rotulo_foranea = '';
            $entidad_RsBuscarForanea = $tabla . '_definicion';
//$metadata_RsBuscarForanea = new metadatos_array();
            $row_RsBuscarForanea = $this->recorrer_entidad($entidad_RsBuscarForanea);
            $totalRows_RsBuscarForanea = count($row_RsBuscarForanea[$entidad_RsBuscarForanea]);
            if (strstr($row_RsBuscarForanea[$entidad_RsBuscarForanea][$llave_foranea . '_tipo'], 'foranea') && $valor_llave != '') {
                $query_RsForanea = 'SELECT ' . $this->nombre_tabla_foranea($this->replace_general($llave_foranea)) . ' FROM ' . $this->nombre_tabla_foranea($this->replace_general($llave_foranea)) . ' WHERE ' . $this->replace_general($llave_foranea) . ' = ' . $valor_llave;
//   echo $query_RsForanea;
                $RsForanea = mysqli_query($this->db_connection, $query_RsForanea);
                $row_RsForanea = mysqli_fetch_assoc($RsForanea);
                $totalRows_RsForanea = mysqli_num_rows($RsForanea);
                mysqli_free_result($RsForanea);
                $this->rotulo_foranea = $row_RsForanea[$this->nombre_tabla_foranea($this->replace_general($llave_foranea))];
            }
            return $this->rotulo_foranea;
        }
    }

    /*
     * <b>codigo tabla</b><br>
     * Devuelve el Nombre del Codigo de la Tabla Utilizado.<br>
     * <b>$tabla</b> es el nombre de la tabla a utilizar.<br>
     */

    function codigo_tabla($tabla) {
        if ($tabla != '') {
            $this->codigo_tabla = '';
            $entidad = $tabla . '_codigo';
//$metadata    = new metadatos_array();
            $arrayData = $this->recorrer_entidad($entidad);
            $this->codigo_tabla = $arrayData[$entidad][$entidad];
            return $this->codigo_tabla;
        }
    }

    /*
     * <b>nombre_tabla_foranea</b><br>
     * Devuelve el Nombre de la Tabla Foranea Utilizada.<br>
     * <b>$texto</b> es el nombre del codigo foraneo.<br>
     */

    function nombre_tabla_foranea($texto) {
        if ($texto != '') {
            $this->codigo_foraneo = '';
            $this->codigo_foraneo = substr($texto, 2, strlen($texto));
            return $this->codigo_foraneo;
        }
    }

    /**
     * <b>GetSQLValueString</b><br>
     * Limpiar posibles injecciones de codigo malicioso.<br>
     * en base al tipo de datos seleccionado.<br>
     * <b>$theValue</b> es el valor a limpiar.<br>
     * <b>$theDefinedValue</b> es el valor definido.<br>
     * <b>$theNotDefinedValue</b> es el valor no definido.<br>
     */
    public function GetSQLValueString($theValue, $theType, $theDefinedValue = '', $theNotDefinedValue = '') {
        $this->theOuputValue = '';
        $this->theOuputValue = $this->checkaddslashes($theValue);

        switch ($theType) {
            case 'text':
                $this->theOuputValue = ($this->theOuputValue != '') ? "'" . $this->theOuputValue . "'" : "NULL";
                break;
            case 'text_upper':
                $this->theOuputValue = ($this->theOuputValue != '') ? "'" . $this->theOuputValue . "'" : "NULL";
                $this->theOuputValue = strtoupper($this->theOuputValue);
                break;
            case 'nocomillas':
                $this->theOuputValue = ($this->theOuputValue != '') ? $this->theOuputValue : "NULL";
                break;
            case 'long':
            case 'int':
                $this->theOuputValue = ($this->theOuputValue != '') ? intval($this->theOuputValue) : "NULL";
                break;
            case 'double':
                $this->theOuputValue = ($this->theOuputValue != '') ? "'" . doubleval($this->theOuputValue) . "'" : "NULL";
                break;
            case 'date':
                $this->theOuputValue = ($this->theOuputValue != '') ? "'" . $this->theOuputValue . "'" : "NULL";
                break;
            case 'defined':
                $this->theOuputValue = ($this->theOuputValue != '') ? $theDefinedValue : $theNotDefinedValue;
                break;
        }
        return trim($this->theOuputValue);
    }

    function microtimestamp($id = '') {
        $stamp = gettimeofday();
        if ($id == 'id') {
            $divby = 100000;
        } else {
            $divby = 1000000;
        }
        $stamp = $stamp['sec'] + $stamp['usec'] / $divby;
        $stamp = str_replace('.', '', $stamp);
        $stamp = substr($stamp . '00000', 0, 10);
        return $stamp * -1;
    }

    function actualizar($tabla, $update_str, $where_str) {
        if ($tabla != '') {
            mysqli_select_db($this->db_connection, $this->db_database);
            $updateSQL = sprintf("UPDATE $tabla SET $update_str WHERE $where_str");
            $Result1 = mysqli_query($this->db_connection, $updateSQL) or trigger_error(mysql_error(), E_USER_ERROR);
        }
    }

    function bitacora($tabla, $registro, $accion) {
        if ($accion != '') {
            global $es_grid;
            mysqli_select_db($this->db_connection, $this->db_database);
            $insertSQL = sprintf('INSERT INTO Bitacora (usuario, ip, fechahora, tabla, registro, accion) VALUES (%s, %s, NOW(), %s, %s, %s)', $this->GetSQLValueString($_SESSION['usuario_sistema'], 'text'), $this->GetSQLValueString($_SERVER['REMOTE_ADDR'], 'text'), $this->GetSQLValueString($tabla, 'text'), $this->GetSQLValueString($registro, 'text'), $this->GetSQLValueString($accion, 'text'));
            $Result1 = mysqli_query($this->db_connection, $insertSQL) or trigger_error(mysql_error(), E_USER_ERROR);
            $control_info = 'Usuario: ' . $_SESSION['usuario_sistema'];
            $control_info .= '<br>Ip: ' . $_SERVER['REMOTE_ADDR'];
            $control_info .= '<br>Fecha y Hora: ' . date('d/m/Y h:m:s');
            $control_info .= '<br>Tabla: ' . $tabla;
            $control_info .= '<br>Registro: ' . $registro;
            $control_info .= '<br>Accion: ' . $accion;
        }
    }

    function formato_fecha($fecha) {
        $fecha_formateada = '';
        $mes = '';
        if ($fecha != '') {
            $fecha_arr = array();
            $fecha_arr = explode('-', $fecha);
            if ($fecha_arr[1] == '01') {
                $mes = 'Enero';
            } elseif ($fecha_arr[1] == '02') {
                $mes = 'Febrero';
            } elseif ($fecha_arr[1] == '03') {
                $mes = 'Marzo';
            } elseif ($fecha_arr[1] == '04') {
                $mes = 'Abril';
            } elseif ($fecha_arr[1] == '05') {
                $mes = 'Mayo';
            } elseif ($fecha_arr[1] == '06') {
                $mes = 'Junio';
            } elseif ($fecha_arr[1] == '07') {
                $mes = 'Julio';
            } elseif ($fecha_arr[1] == '08') {
                $mes = 'Agosto';
            } elseif ($fecha_arr[1] == '09') {
                $mes = 'Septiembre';
            } elseif ($fecha_arr[1] == '10') {
                $mes = 'Octubre';
            } elseif ($fecha_arr[1] == '11') {
                $mes = 'Noviembre';
            } elseif ($fecha_arr[1] == '12') {
                $mes = 'Diciembre';
            }
            if ($fecha_arr[0] != '') {
                $fecha_formateada = $fecha_arr[2] . ' de ' . $mes . ' de ' . $fecha_arr[0];
            }
            return $fecha_formateada;
        }
    }

    function nombre_mes($numero_mes) {
        if ($numero_mes != '') {
            switch ($numero_mes) {
                case '01':
                    $mes = 'Enero';
                    break;
                case '02':
                    $mes = 'Febrero';
                    break;
                case '03':
                    $mes = 'Marzo';
                    break;
                case '04':
                    $mes = 'Abril';
                    break;
                case '05':
                    $mes = 'Mayo';
                    break;
                case '06':
                    $mes = 'Junio';
                    break;
                case '07':
                    $mes = 'Julio';
                    break;
                case '08':
                    $mes = 'Agosto';
                    break;
                case '09':
                    $mes = 'Septiembre';
                    break;
                case '10':
                    $mes = 'Octubre';
                    break;
                case '11':
                    $mes = 'Noviembre';
                    break;
                case '12':
                    $mes = 'Diciembre';
                    break;
            }
            return $mes;
        }
    }

    function existe_tabla($tabla_grid) {
        if ($tabla_grid != '') {
            mysqli_select_db($this->db_connection, $this->db_database);
            $query_rs = 'show tables';
            $rs = mysqli_query($this->db_connection, $query_rs) or trigger_error(mysql_error(), E_USER_ERROR);
            $row_rs = mysqli_fetch_assoc($rs);
            $keys = array_keys($row_rs);
            foreach ($keys as $key) {
                $query_rs_existe = 'show tables WHERE ' . $keys[0] . ' LIKE ' . $this->GetSQLValueString($tabla_grid, 'text');
//echo $query_rs_existe;
                $rs_existe = mysqli_query($this->db_connection, $query_rs_existe) or trigger_error(mysql_error(), E_USER_ERROR);
                $row_rs_existe = mysqli_fetch_assoc($rs_existe);
                $nombre_tabla = $row_rs_existe[$keys[0]];
            }
            mysqli_free_result($rs);
            mysqli_free_result($rs_existe);
            return $nombre_tabla;
        }
    }

    function codigo_valor_foranea($tabla, $llave_foranea, $valor_llave) {
        if ($valor_llave != '') {
            mysqli_select_db($this->db_connection, $this->db_database);
            if ($valor_llave != '') {
                $query_RsForanea = 'SELECT ' . $llave_foranea . ' FROM ' . $tabla . ' WHERE id' . $tabla . ' = ' . $valor_llave;
// echo $query_RsForanea;
                $RsForanea = mysqli_query($this->db_connection, $query_RsForanea);
                $row_RsForanea = mysqli_fetch_assoc($RsForanea);
                $totalRows_RsForanea = mysqli_num_rows($RsForanea);
                mysqli_free_result($RsForanea);
                return $row_RsForanea[$llave_foranea];
            }
        }
    }

    function nombre_empleado($nombre) {
        if ($nombre != '') {
            $tmpnombre = array();
            $tmpnombre = explode(',', $nombre);
            $nuevo_nombre = trim($tmpnombre[1]) . ' ' . trim($tmpnombre[0]);
            return $nuevo_nombre;
        }
    }

    function edad($fecha) {
        if ($fecha != '') {
            mysqli_select_db($this->db_connection, $this->db_database);
            $date1 = "'" . date("Ymd") . "'";
            $date2 = "'" . $fecha . "'";
            $query_Rs = "SELECT CONCAT(@years := TIMESTAMPDIFF(YEAR, $date1, $date2), IF (@years = 1, ' year, ', ' years, '),@months := TIMESTAMPDIFF(MONTH, DATE_ADD($date1, INTERVAL @years YEAR), $date2),IF (@months = 1, ' month, ', ' months, '),@days := TIMESTAMPDIFF(DAY, DATE_ADD($date1, INTERVAL @years * 12 + @months MONTH), $date2),IF (@days = 1, ' day', ' days'))	AS edad";
            $Rs = mysqli_query($this->db_connection, $query_Rs);
            $row_Rs = mysqli_fetch_assoc($Rs);
            $total = mysqli_num_rows($Rs);
            mysqli_free_result($Rs);
            $edad = str_replace('-', '', $row_Rs['edad']);
            return $edad;
        }
    }

    function fechas_anios($fecha1, $fecha2) {
        if ($fecha1 != '' && $fecha2 != '') {
            mysqli_select_db($this->db_connection, $this->db_database);
            $query_Rs = "SELECT truncate(DATEDIFF('$fecha2','$fecha1')/360,0) AS Diferencia";
//	echo $query_Rs;
            $Rs = mysqli_query($this->db_connection, $query_Rs);
            $row_Rs = mysqli_fetch_assoc($Rs);
            mysqli_free_result($Rs);
            return $row_Rs['Diferencia'];
        }
    }

    function combo_fecha($campo_valor_anio, $campo_valor_mes, $campo_valor_dia, $campo) {
        if ($campo != '') {
            $str_combo_fecha = '';
            $str_combo_fecha .= '<select name="' . $campo . '_dia" >';
            for ($i = 1; $i <= 31; $i++) {
                if ($i < 10) {
                    $str_combo_fecha .= '<option ';
                    if ($campo_valor_dia == "0" . $i) {
                        $str_combo_fecha .= ' selected ';
                    }
                    $str_combo_fecha .= ' value="0' . $i . '">0' . $i . '</option>';
                } else {
                    $str_combo_fecha .= '<option ';
                    if ($campo_valor_dia == $i) {
                        $str_combo_fecha .= ' selected ';
                    }
                    $str_combo_fecha .= ' value="' . $i . '">' . $i . '</option>';
                }
            }
            $str_combo_fecha .= '</select> de <select name="' . $campo . '_mes" >';
            $str_combo_fecha .= '<option ';
            if ($campo_valor_mes == "01") {
                $str_combo_fecha .= ' selected ';
            }
            $str_combo_fecha .= ' value="01">Enero</option>';
            $str_combo_fecha .= '<option ';
            if ($campo_valor_mes == "02") {
                $str_combo_fecha .= ' selected ';
            }
            $str_combo_fecha .= ' value="02">Febrero</option>';
            $str_combo_fecha .= '<option ';
            if ($campo_valor_mes == "03") {
                $str_combo_fecha .= ' selected ';
            }
            $str_combo_fecha .= ' value="03">Marzo</option>';
            $str_combo_fecha .= '<option ';
            if ($campo_valor_mes == "04") {
                $str_combo_fecha .= ' selected ';
            }
            $str_combo_fecha .= ' value="04">Abril</option>';
            $str_combo_fecha .= '<option ';
            if ($campo_valor_mes == "05") {
                $str_combo_fecha .= ' selected ';
            }
            $str_combo_fecha .= ' value="05">Mayo</option>';
            $str_combo_fecha .= '<option ';
            if ($campo_valor_mes == "06") {
                $str_combo_fecha .= ' selected ';
            }
            $str_combo_fecha .= ' value="06">Junio</option>';
            $str_combo_fecha .= '<option ';
            if ($campo_valor_mes == "07") {
                $str_combo_fecha .= ' selected ';
            }
            $str_combo_fecha .= ' value="07">Julio</option>';
            $str_combo_fecha .= '<option ';
            if ($campo_valor_mes == "08") {
                $str_combo_fecha .= ' selected ';
            }
            $str_combo_fecha .= ' value="08">Agosto</option>';
            $str_combo_fecha .= '<option ';
            if ($campo_valor_mes == "09") {
                $str_combo_fecha .= ' selected ';
            }
            $str_combo_fecha .= ' value="09">Septiembre</option>';
            $str_combo_fecha .= '<option ';
            if ($campo_valor_mes == "10") {
                $str_combo_fecha .= ' selected ';
            }
            $str_combo_fecha .= ' value="10">Octubre</option>';
            $str_combo_fecha .= '<option ';
            if ($campo_valor_mes == "11") {
                $str_combo_fecha .= ' selected ';
            }
            $str_combo_fecha .= ' value="11">Noviembre</option>';
            $str_combo_fecha .= '<option ';
            if ($campo_valor_mes == "12") {
                $str_combo_fecha .= ' selected ';
            }
            $str_combo_fecha .= '  value="12">Diciembre</option>';
            $str_combo_fecha .= '</select> de
    <input name="' . $campo . '_anio" type="text" class="input_corto" value="' . $campo_valor_anio . '" size="16">';
            return $str_combo_fecha;
        }
    }

    function jsspecialchars($s) {
        return ereg_replace("[^[:alnum:]+]", "_", $s);
    }

    function maximo_correlativo($tabla, $campo1, $valor_campo1, $campo2, $valor_campo2) {
        if ($tabla != '') {
            if ($campo2 != '') {
                $maxSQL = "SELECT ifnull(max(correlativo),0)+1 as maximo FROM " . $tabla . " WHERE " . $campo1 . " =  '" . $valor_campo1 . "' AND " . $campo2 . " = '" . $valor_campo2 . "'";
            } else {
                $maxSQL = "SELECT ifnull(max(correlativo),0)+1 as maximo FROM " . $tabla . " WHERE " . $campo1 . " =  '" . $valor_campo1 . "'";
            }
            mysqli_select_db($this->db_connection, $this->db_database);
            $Result_max = mysqli_query($this->db_connection, $maxSQL) or trigger_error(mysql_error(), E_USER_ERROR);
            $rowmax_rs = mysqli_fetch_assoc($Result_max);
            $totalmax_rs = mysqli_num_rows($Result_max);
            $maximo = $rowmax_rs['maximo'];

            $maximo = $this->zerofill($maximo, 30);
            mysqli_free_result($Result_max);
            return $maximo;
        }
    }

    function zerofill($mStretch, $iLength) {
        $sPrintfString = '%0' . (int) $iLength . 's';
        return sprintf($sPrintfString, $mStretch);
    }

    function es_fecha_campo($campo) {
        if ($campo != '') {
            mysqli_select_db($this->db_connection, $this->db_database);
            $SQL = 'SELECT ' . $campo . '_tipo FROM ' . $campo . '_definicion ';
            $Result = mysqli_query($this->db_connection, $SQL) or trigger_error(mysql_error(), E_USER_ERROR);
            $row_rs = mysqli_fetch_assoc($Result);
            $total_rs = mysqli_num_rows($Result);
            mysqli_free_result($Result);
            return ($row_rs[$campo . '_tipo'] );
        }
    }

    function num2letras($num, $fem = true, $dec = true) {
        if ($num != '') {
            $matuni[2] = 'dos';
            $matuni[3] = 'tres';
            $matuni[4] = 'cuatro';
            $matuni[5] = 'cinco';
            $matuni[6] = 'seis';
            $matuni[7] = 'siete';
            $matuni[8] = 'ocho';
            $matuni[9] = 'nueve';
            $matuni[10] = 'diez';
            $matuni[11] = 'once';
            $matuni[12] = 'doce';
            $matuni[13] = 'trece';
            $matuni[14] = 'catorce';
            $matuni[15] = 'quince';
            $matuni[16] = 'dieciseis';
            $matuni[17] = 'diecisiete';
            $matuni[18] = 'dieciocho';
            $matuni[19] = 'diecinueve';
            $matuni[20] = 'veinte';
            $matunisub[2] = 'dos';
            $matunisub[3] = 'tres';
            $matunisub[4] = 'cuatro';
            $matunisub[5] = 'quin';
            $matunisub[6] = 'seis';
            $matunisub[7] = 'sete';
            $matunisub[8] = 'ocho';
            $matunisub[9] = 'nove';

            $matdec[2] = 'veint';
            $matdec[3] = 'treinta';
            $matdec[4] = 'cuarenta';
            $matdec[5] = 'cincuenta';
            $matdec[6] = 'sesenta';
            $matdec[7] = 'setenta';
            $matdec[8] = 'ochenta';
            $matdec[9] = 'noventa';
            $matsub[3] = 'mill';
            $matsub[5] = 'bill';
            $matsub[7] = 'mill';
            $matsub[9] = 'trill';
            $matsub[11] = 'mill';
            $matsub[13] = 'bill';
            $matsub[15] = 'mill';
            $matmil[4] = 'millones';
            $matmil[6] = 'billones';
            $matmil[7] = 'de billones';
            $matmil[8] = 'millones de billones';
            $matmil[10] = 'trillones';
            $matmil[11] = 'de trillones';
            $matmil[12] = 'millones de trillones';
            $matmil[13] = 'de trillones';
            $matmil[14] = 'billones de trillones';
            $matmil[15] = 'de billones de trillones';
            $matmil[16] = 'millones de billones de trillones';

            $num = trim((string) @$num);
            if ($num[0] == '-') {
                $neg = 'menos ';
                $num = substr($num, 1);
            } else
                $neg = '';
            while ($num[0] == '0')
                $num = substr($num, 1);
            if ($num[0] < '1' or $num[0] > 9)
                $num = '0' . $num;
            $zeros = true;
            $punt = false;
            $ent = '';
            $fra = '';
            for ($c = 0; $c < strlen($num); $c++) {
                $n = $num[$c];
                if (!(strpos(".,'''", $n) === false)) {
                    if ($punt)
                        break;
                    else {
                        $punt = true;
                        break;
                    }
                } elseif (!(strpos('0123456789', $n) === false)) {
                    if ($punt) {
                        if ($n != '0')
                            $zeros = false;
                        $fra .= $n;
                    } else
                        $ent .= $n;
                } else
                    break;
            }
            $ent = '    ' . $ent;
            if ($dec and $fra and ! $zeros) {
                $fin = ' punto';
                for ($n = 0; $n < strlen($fra); $n++) {
                    if (($s = $fra[$n]) == '0')
                        $fin .= ' cero';
                    elseif ($s == '1')
                        $fin .= $fem ? ' uno' : ' un';
                    else
                        $fin .= ' ' . $matuni[$s];
                }
            } else
                $fin = '';
            if ((int) $ent === 0)
                return 'Cero ' . $fin;
            $tex = '';
            $sub = 0;
            $mils = 0;
            $neutro = false;
            while (($num = substr($ent, -3)) != '   ') {
                $ent = substr($ent, 0, -3);
                if (++$sub < 3 and $fem) {
                    $matuni[1] = 'uno';
                    $subcent = 'os';
                } else {
                    $matuni[1] = $neutro ? 'un' : 'uno';
                    $subcent = 'os';
                }
                $t = '';
                $n2 = substr($num, 1);
                if ($n2 == '00') {
                    
                } elseif ($n2 < 21)
                    $t = ' ' . $matuni[(int) $n2];
                elseif ($n2 < 30) {
                    $n3 = $num[2];
                    if ($n3 != 0)
                        $t = 'i' . $matuni[$n3];
                    $n2 = $num[1];
                    $t = ' ' . $matdec[$n2] . $t;
                }
                else {
                    $n3 = $num[2];
                    if ($n3 != 0)
                        $t = ' y ' . $matuni[$n3];
                    $n2 = $num[1];
                    $t = ' ' . $matdec[$n2] . $t;
                }
                $n = $num[0];
                if ($n == 1) {
                    $t = ' ciento' . $t;
                } elseif ($n == 5) {
                    $t = ' ' . $matunisub[$n] . 'ient' . $subcent . $t;
                } elseif ($n != 0) {
                    $t = ' ' . $matunisub[$n] . 'cient' . $subcent . $t;
                }
                if ($sub == 1) {
                    
                } elseif (!isset($matsub[$sub])) {
                    if ($num == 1) {
                        $t = ' mil';
                    } elseif ($num > 1) {
                        $t .= ' mil';
                    }
                } elseif ($num == 1) {
                    $t .= ' ' . $matsub[$sub] . '?n';
                } elseif ($num > 1) {
                    $t .= ' ' . $matsub[$sub] . 'ones';
                }
                if ($num == '000')
                    $mils++;
                elseif ($mils != 0) {
                    if (isset($matmil[$sub]))
                        $t .= ' ' . $matmil[$sub];
                    $mils = 0;
                }
                $neutro = true;
                $tex = $t . $tex;
            }
            $tex = $neg . substr($tex, 1) . $fin;
            return strtoupper(ucfirst($tex));
        }
    }

    function estado_tabla($codigo, $estado) {
        if ($codigo != '') {
            mysqli_select_db($this->db_connection, $this->db_database);
            $query_Rs = 'SELECT ' . $estado . 'FROM planillaencabezado WHERE padre = ' . $codigo;
            $Rs = mysqli_query($this->db_connection, $query_Rs) or trigger_error(mysql_error(), E_USER_ERROR);
            $row_Rs = mysqli_fetch_assoc($Rs);
            mysqli_free_result($Rs);
            return $row_Rs[$estado];
        }
    }

    function rotulo_llave($tabla, $descripcion, $campo_llave, $valor_llave) {
        if ($valor_llave != '') {
            if ($this->existe_tabla($tabla)) {
                mysqli_select_db($this->db_connection, $this->db_database);
                $query_RsRotulo = "SELECT " . $descripcion . " FROM " . $tabla . " WHERE " . $campo_llave . " = '" . $valor_llave . "'";
                //echo $query_RsRotulo;
                $RsRotulo = mysqli_query($this->db_connection, $query_RsRotulo);
                $row_RsRotulo = mysqli_fetch_assoc($RsRotulo);
                $totalRows_RsRotulo = mysqli_num_rows($RsRotulo);
                mysqli_free_result($RsRotulo);
                return $row_RsRotulo[$descripcion];
            }
        }
    }

    function rotulo_llave_array($tabla, $descripcion, $campo_llave, $valor_llave) {
        if ($tabla != '') {
            $entidad_RsRotulo = $tabla;
//$metadata_RsRotulo= new metadatos_array();
            $row_RsRotulo = $this->recorrer_entidad($entidad_RsRotulo);


            $key = array_keys($row_RsRotulo[$entidad_RsRotulo]);
            $size_arr = sizeOf($key);
            for ($i = 0; $i < $size_arr; $i++) {
                $this->rotulo_campo = $row_RsRotulo[$entidad_RsRotulo][$campo_llave . '_rotulo'];
            }
            return $this->rotulo_campo;
        }
    }

    function fechas_dias($fecha1, $fecha2) {
        if ($fecha1 != '' && $fecha2 != '') {
            mysqli_select_db($this->db_connection, $this->db_database);
            $query_Rs = "SELECT truncate(DATEDIFF('$fecha2','$fecha1'),0) AS Diferencia";
//	echo $query_Rs;
            $Rs = mysqli_query($this->db_connection, $query_Rs);
            $row_Rs = mysqli_fetch_assoc($Rs);
            mysqli_free_result($Rs);
            return $row_Rs["Diferencia"];
        }
    }

    /*
     * <b>espacios</b><br>
     * Devuelve la cantidad de espacios necesitada.<br>
     * <b>$cantidad</b> es la cantidad de espacios necesitados.<br>
     */

    function espacios($cantidad) {
        $this->espacios .= '<img src="pix.gif" height="1px" width="' . $cantidad . 'px" alt="DGME">';
        return $this->espacios;
    }

    function pendientes($tabla, $rotulo, $where_str) {
        mysqli_select_db($this->db_connection, $this->db_database);

        $this->pendientes_str = '';
        $query = 'SELECT COUNT(*) AS "' . $rotulo . '" FROM Historialmigratoriodetallegrid WHERE 1 ' . $where_str;
        // echo $query;
        $rs = mysqli_query($this->db_connection, $query) or trigger_error(mysql_error(), E_USER_ERROR);
        $row_rs = mysqli_fetch_assoc($rs);
        if ($row_rs[$rotulo] == 0) {
            $this->pendientes_str = $rotulo;
        } else {
            $this->pendientes_str = '';
        }
        mysqli_free_result($rs);
        return $this->pendientes_str;
    }

    function checkaddslashes($str) {
        if (strpos(str_replace("\'", '', " $str"), "'") != false)
            return addslashes($str);
        else
            return $str;
    }

    public function validar_campos() {
        global $tabla;
        if ($tabla != '') {
            $entidad_validar = $tabla . '_definicion';
//$metadata_validar = new metadatos_array();
            $row_rs_validar = $this->recorrer_entidad($entidad_validar);
            if (count($row_rs_validar[$entidad_validar]) > 0) {
                $key = array_keys($row_rs_validar[$entidad_validar]);
                $size_arr = sizeOf($key);
                $validar_campos_str = '';
                for ($i = 0; $i < $size_arr; $i++) {
                    if ($row_rs_validar[$entidad_validar][$key[$i]] == 'inputunico_ppal') {
                        $campos_requeridos = str_replace('_tipo', '', $key[$i]);
                        $validar_campos_str .= "'" . $campos_requeridos . "','','R',";
                    }
                    if ($row_rs_validar[$entidad_validar][$key[$i]] == 'inputreq_ppal') {
                        $campos_requeridos = str_replace('_tipo', '', $key[$i]);
                        $validar_campos_str .= "'" . $campos_requeridos . "','','R',";
                    }
                    if ($row_rs_validar[$entidad_validar][$key[$i]] == 'inputcortodinero') {
                        $campos_requeridos = str_replace('_tipo', '', $key[$i]);
                        $validar_campos_str .= "'" . $campos_requeridos . "','','isDinero',";
                    }
                    if ($row_rs_validar[$entidad_validar][$key[$i]] == 'inputuniconumero_ppal') {
                        $campos_requeridos = str_replace('_tipo', '', $key[$i]);
                        $validar_campos_str .= "'" . $campos_requeridos . "','','RisNumero',";
                    }
                    if ($row_rs_validar[$entidad_validar][$key[$i]] == 'inputreqletras_ppal') {
                        $campos_requeridos = str_replace('_tipo', '', $key[$i]);
                        $validar_campos_str .= "'" . $campos_requeridos . "','','RisLetras',";
                    }
                }
            }
            $validar_campos_str = substr($validar_campos_str, 0, strlen($validar_campos_str) - 1);
            return $validar_campos_str;
        }
    }

    function maximo_id($tbl) {
        mysqli_select_db($this->db_connection, $this->db_database);
        mysqli_query($this->db_connection, "SET NAMES 'utf8'");
        $maximoId = 0;
        $qry = 'SELECT MAX(id' . $tbl . ') AS id FROM ' . $tbl;
        $rs = mysqli_query($this->db_connection, $qry);
        if ($rs) {
            $totalRows = mysqli_num_rows($rs);
            if ($totalRows > 0) {
                if ($row = mysql_fetch_row($rs)) {
                    $maximoId = trim($row[0]);
                }
            }
        }

        return $maximoId;
    }

    function maximo_id_compuesto($tbl, $rotulo, $id) {

        mysqli_select_db($this->db_connection, $this->db_database);

        mysqli_query($this->db_connection, "SET NAMES 'utf8'");
        $qry = "SELECT MAX(id" . $tbl . ") AS id FROM " . $tbl . " WHERE " . $rotulo . "='" . $id . "'";
        //echo $qry ;
        $rs = mysqli_query($this->db_connection, $qry);
        if ($row = mysql_fetch_row($rs)) {
            $maximoId = trim($row[0]);
        }

        return $maximoId;
    }

    function get_svr_info() {
        return $_SERVER['SERVER_NAME'];
    }

    /**
     * <b>__destruct</b><br>
     * Destruye esta clase, explicitamente funciones y variables
     */
    public function __destruct() {
        unset($this->result_injection);
        unset($this->rotulo_foranea);
        unset($this->theOuputValue);
        unset($this->codigo_tabla);
        unset($this->codigo_foraneo);
        unset($this->valor_foranea);
        unset($this->codigo_tabla);
        unset($this->nombre_tabla_foranea);
        unset($this->GetSQLValueString);
        unset($this->microtimestamp);
        unset($this->actualizar);
        unset($this->bitacora);
        unset($this->formato_fecha);
        unset($this->contar_repetidos);
        unset($this->existe_tabla);
        unset($this->codigo_valor_foranea);
        unset($this->nombre_empleado);
        unset($this->edad);
        unset($this->fechas_anios);
        unset($this->combo_fecha);
        unset($this->jsspecialchars);
        unset($this->maximo_correlativo);
        unset($this->zerofill);
        unset($this->es_fecha_campo);
        unset($this->recibo_vacaciones);
        unset($this->num2letras);
        unset($this->calculo_vacaciones);
        unset($this->num2letras);
        unset($this->estado_tabla);
        unset($this->rotulo_llave);
        unset($this->no_de_dias);
        unset($this->no_de_dias_diarios);
        unset($this->fechas_dias);
        unset($this->espacios);
        unset($this->pendientes);
        unset($this->pendientes_str);
        unset($this->rotulo_campo);
        unset($this->validar_campos);
        unset($this->nombre_mes);
        unset($this->maximo_id);
        unset($this->maximo_id_compuesto);
        unset($this->get_svr_info);
    }

}

?>