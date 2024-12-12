<?php

class browser_editar_post extends utiles {
    /* Recibe los Datos del Formulario y los clasifica e Inserta por tipo
     *
     */

    public function __construct() {
        global $tabla;
        global $nombre_campo;
        global $codigo;
        global $campos_arr;
        global $_POST;
        mysqli_select_db($this->db_connection, $this->db_database);

        $campos_nombres = '';
        $campos_valores = '';
        $campos_update = '';

        for ($i = 0; $i < count($campos_arr); $i++) {
            switch (true) {
                case strstr($campos_arr[$i], '_hora') || strstr($campos_arr[$i], '_minutos'):
                    if (strstr($campos_arr[$i], '_hora')) {
                        $campos_nombres = substr($campos_arr[$i], 0, strlen($campos_arr[$i]) - 5) . ' ';
                        $campos_valores = "'" . $_POST[$campos_arr[$i]];
                    }
                    if (strstr($campos_arr[$i], '_minutos')) {
                        $campos_valores .= ":" . $_POST[$campos_arr[$i]] . "' ";
                        $campos_update .= $campos_nombres . ' = ' . $campos_valores . ', ';
                    }
                    break;
                case strstr($campos_arr[$i], '_dia') || strstr($campos_arr[$i], '_mes') || strstr($campos_arr[$i], '_anio') || strstr($campos_arr[$i], '_fechanula'):
                    if (strstr($campos_arr[$i], "_dia")) {
                        $campos_nombres_var = substr($campos_arr[$i], 0, strlen($campos_arr[$i]) - 4);
                        $campos_valores_var = $_POST[$campos_arr[$i]];
                    }
                    if (strstr($campos_arr[$i], '_mes')) {
                        $campos_valores_var .= '-' . $_POST[$campos_arr[$i]];
                    }
                    if (strstr($campos_arr[$i], '_anio')) {
                        $campos_valores_var .= '-' . $_POST[$campos_arr[$i]];
                    }
                    if (strstr($campos_arr[$i], '_fechanula')) {
                        $campos_valores_tmp = array();
                        $campos_valores_tmp = explode('-', $campos_valores_var);
                        if ($campos_valores_tmp[2] != '') {
                            if (isset($_POST[$campos_arr[$i]]) && $_POST[$campos_arr[$i]] != '') {
                                $campos_valores = "'0000-00-00'";
                                $campos_nombres = $campos_nombres_var;
                                $campos_update .= $campos_nombres . ' = ' . $campos_valores . ', ';
                            } else {
                                $campos_valores = "'" . $campos_valores_tmp[2] . "-" . $campos_valores_tmp[1] . "-" . $campos_valores_tmp[0] . "'";
                                $campos_nombres = $campos_nombres_var;
                                $campos_update .= $campos_nombres . ' = ' . $campos_valores . ', ';
                            }
                        }
                    }
                    break;
                case strstr($campos_arr[$i], '_autocompletado'):
                    $campos_nombres = substr($campos_arr[$i], 0, strlen($campos_arr[$i]) - 15) . ' ';
                    
                    $campos_valores_autocompletado = "'" . $_POST[$campos_arr[$i]];

                    $cod_aut_array_01 = array();

                    $cod_aut_array_01 = explode('[', $campos_valores_autocompletado);

                    $cod_aut_array_02 = array();

                    $cod_aut_array_02 = explode("]", $cod_aut_array_01[1]);

                    if ($cod_aut_array_02[0] != '') {
                        $campos_valores_autocompletado = $this->GetSQLValueString($cod_aut_array_02[0], "text");
                    } else {
                        $campos_valores_autocompletado = '';
                    }
                    $campos_update .= $campos_nombres . ' = ' . $campos_valores_autocompletado . ', ';
                    break;
                default:
                    if (isset($_POST[$campos_arr[$i]])) {
                        $campos_update .= $campos_arr[$i] . ' = ' . $this->GetSQLValueString($_POST[$campos_arr[$i]], 'text') . ', ';
                    }
            }
        }
        $salir_popup = 0;
        if (substr($campos_update, 0, strlen($campos_update) - 2) != '') {
            $salir_popup = 1;
            if (isset($_GET['where_str_nivel_2']) && $_GET['where_str_nivel_2'] == '1') {
                $updateSQL = "UPDATE " . $tabla . " SET " . substr($campos_update, 0, strlen($campos_update) - 2) . " WHERE padre  = " . $_GET['padre'] . " AND correlativo = '" . $_GET['correlativo'] . "'";
                //echo $updateSQL;
                //die();
                $Result1 = mysqli_query($updateSQL, CONEXION) or trigger_error(mysql_error(), E_USER_ERROR);
                $this->bitacora($tabla, $_GET['padre'], 'editar');
            } else {
                $updateSQL = "UPDATE " . $tabla . " SET " . substr($campos_update, 0, strlen($campos_update) - 2) . " WHERE " . $nombre_campo . " = " . $codigo;
                //echo $updateSQL;
                //die();
                $Result1 = mysqli_query($updateSQL, CONEXION) or trigger_error(mysql_error(), E_USER_ERROR);
                $this->bitacora($tabla, $codigo, 'editar');
            }
        }
    }

    public function __destruct() {
        // destruye esta clase
    }

}

?>