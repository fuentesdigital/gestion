<?php

class browser_insertar_post extends utiles {
    /* Recibe los Datos del Formulario y los clasifica e Inserta por tipo
     *
     */

    public $filas;
    public $fila_de_datos_str;
    public $codigo_insertado;

    public function __construct() {

        global $tabla;
        global $campos_arr;
        global $_POST;

        $campos_nombres = '';
        $campos_valores = '';
        $campos_valores_str = '';

        mysqli_select_db($this->db_connection, $this->db_database);

        for ($i = 0; $i < count($campos_arr); $i++) {
            switch (true) {
                case strstr($campos_arr[$i], '_hora') || strstr($campos_arr[$i], '_minutos'):
                    if (strstr($campos_arr[$i], '_hora')) {
                        $campos_nombres_var = substr($campos_arr[$i], 0, strlen($campos_arr[$i]) - 5);
                        $campos_valores_var = "'" . $_POST[$campos_arr[$i]];
                    }
                    if (strstr($campos_arr[$i], '_minutos')) {
                        $campos_valores_var .= ":" . $_POST[$campos_arr[$i]] . "'";
                        $campos_nombres .= $campos_nombres_var . ', ';
                        $campos_valores .= $campos_valores_var . ', ';
                        $campos_valores_str .= $campos_valores_var . '| ';
                    }
                    break;
                case strstr($campos_arr[$i], '_dia') || strstr($campos_arr[$i], '_mes') || strstr($campos_arr[$i], '_anio') || strstr($campos_arr[$i], '_fechanula'):
                    if (strstr($campos_arr[$i], '_dia')) {
                        $campos_nombres_var = substr($campos_arr[$i], 0, strlen($campos_arr[$i]) - 4);
                        $campos_valores_var = $_POST[$campos_arr[$i]];
                    }
                    if (strstr($campos_arr[$i], '_mes')) {
                        $campos_valores_var.= '-' . $_POST[$campos_arr[$i]];
                    }
                    if (strstr($campos_arr[$i], '_anio')) {
                        $campos_valores_var.= '-' . $_POST[$campos_arr[$i]];
                    }
                    if (strstr($campos_arr[$i], '_fechanula')) {
                        $campos_valores_tmp = array();
                        $campos_valores_tmp = explode('-', $campos_valores_var);
                        if ($campos_valores_tmp[2] != '') {
                            if (isset($_POST[$campos_arr[$i]]) && $_POST[$campos_arr[$i]] != '') {
                                $campos_valores .= "'0000-00-00', ";
                                $campos_valores_str .= "'" . $campos_valores_tmp[2] . "-" . $campos_valores_tmp[1] . "-" . $campos_valores_tmp[0] . "'| ";
                                $campos_nombres .= $campos_nombres_var . ", ";
                            } else {
                                $campos_valores .= "'" . $campos_valores_tmp[2] . "-" . $campos_valores_tmp[1] . "-" . $campos_valores_tmp[0] . "', ";
                                $campos_valores_str .= "'" . $campos_valores_tmp[2] . "-" . $campos_valores_tmp[1] . "-" . $campos_valores_tmp[0] . "'| ";
                                $campos_nombres .= $campos_nombres_var . ', ';
                            }
                        }
                    }
                    break;
                case strstr($campos_arr[$i], '_autocompletado'):
                    
                    $campos_nombres .= substr($campos_arr[$i], 0, strlen($campos_arr[$i]) - 15) . ', ';
                    
                    $campos_valores_autocompletado = "'" . $_POST[$campos_arr[$i]];
                    
                    $cod_aut_array_01 = array();

                    $cod_aut_array_01 = explode('[', $campos_valores_autocompletado);

                    $cod_aut_array_02 = array();
                    
                    $cod_aut_array_02 = explode("]", $cod_aut_array_01[1]);
                    
                    if ($cod_aut_array_02[0] != '') {
                        $campos_valores_autocompletado = $cod_aut_array_02[0];
                    } else {
                        $campos_valores_autocompletado = '';
                    }
                    $campos_valores .= $this->GetSQLValueString($campos_valores_autocompletado, 'text') . ', ';
                    break;
                default:
                    $campos_nombres .= $campos_arr[$i] . ', ';
                    if (isset($_POST[$campos_arr[$i]])) {
                        $valor_formulario = $_POST[$campos_arr[$i]];
                    } else {
                        $valor_formulario = '';
                    }
                    $campos_valores.= $this->GetSQLValueString($valor_formulario, 'text') . ', ';
                    $campos_valores_str.= $this->GetSQLValueString($valor_formulario, 'text') . '| ';
            }
        }
        //echo $insertSQL ;
        $append1 = '';
        $append2 = '';
        if (isset($_GET['padre']) && $_GET['padre'] != '') {
            $campo2 = '';
            $valor_campo2 = '';
            $maximo_correlativo = $this->maximo_correlativo($tabla, "padre", $_GET['padre'], $campo2, $valor_campo2);
            $append1 = ",padre,correlativo";
            $append2 = "," . $this->GetSQLValueString($_GET['padre'], "int") . "," . $this->GetSQLValueString($maximo_correlativo, "text");
        }
        $insertSQL = "INSERT INTO " . $tabla . " (" . substr($campos_nombres, 0, strlen($campos_nombres) - 2) . $append1 . ") VALUES (" . rtrim($campos_valores, ', ') . $append2 . ")";
        //echo $insertSQL;
        //die();
        $Result1 = mysqli_query($insertSQL, CONEXION) or trigger_error(mysql_error(), E_USER_ERROR);
        if (isset($_GET['padre']) && $_GET['padre'] != '') {
            $codigo = $_GET['padre'];
        } else {
            $codigo = mysql_insert_id();
        }
        $this->codigo_insertado = $codigo;
        $this->bitacora($tabla, $codigo, 'insertar');
    }

    public function __destruct() {
        // destruye esta clase
        unset($this->filas);
        unset($this->fila_de_datos_str);
        unset($this->codigo_insertado );
    }

}

?>