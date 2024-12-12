<?php

/* Nucleo para Editar Datos en la Base
 *
 */

class browser_ficha_kernel extends reportes_browser {

    public $filas;
    public $fila_de_datos_str;

    public function __construct() {
        $this->browser_ficha_kernel();
    }

    public function browser_ficha_kernel() {

        global $tabla;
        global $codigo;
        global $nombre_campo;
        global $microtime_val;
        global $es_grid;

        $style_tr3 = ' class="tr3" ';


        $this->filas = '';
        if ($es_grid == '1') {
            mysqli_select_db($this->db_connection, $this->db_database);
            $this->filas = $this->grid_view_detail($tabla);
        } else {
            mysqli_select_db($this->db_connection, $this->db_database);

            $query_rs = 'SELECT * FROM `' . $tabla . '` WHERE `' . $nombre_campo . '` = ' . $codigo;

            // echo $query_rs;
            $rs = mysqli_query($this->db_connection, $query_rs) or trigger_error(mysqli_error(), E_USER_ERROR);
            $row_rs = mysqli_fetch_assoc($rs);
            $numfields = mysqli_num_fields($rs);

            $this->filas = '';
            for ($i = 0; $i < $numfields; $i++) {
                $this->fila_de_datos_str = '';
                $this->fila_de_datos_rotulo($tabla, $this->mysqli_field_name($rs, $i));
                $this->fila_de_datos_view($tabla, $this->mysqli_field_name($rs, $i), $row_rs[$this->mysqli_field_name($rs, $i)]);
                $this->filas .= $this->fila_de_datos_str;
            }
            $this->filas = $this->squeeze($this->filas);
            mysqli_free_result($rs);
        }
    }

    function fila_de_datos_view($tabla, $campo, $campo_valor) {

        global $codigo;

        global $style_tr3;

        global $edit_table;

        $entidad_rs = $tabla . '_definicion';

        // echo $entidad_rs;
        //$metadata    = new metadatos_array();

        $row_Rs = $this->recorrer_entidad($entidad_rs);

        $rotulo = $row_Rs[$entidad_rs][$campo . '_rotulo'];

        $tipo = $row_Rs[$entidad_rs][$campo . '_tipo'];

        $folder_base_tipos = FOLDER_BASE_NAME . '/tipos/view/';

        if ($tipo == 'grid1') {
            include($folder_base_tipos . "grid1.php");
        } elseif ($tipo == 'textarea_ppal') {
            include($folder_base_tipos . "textarea_ppal.php");
        } elseif ($tipo == 'textarea') {
            include($folder_base_tipos . "textarea.php");
        } elseif ($tipo == 'input') {
            include($folder_base_tipos . "input.php");
        } elseif ($tipo == 'inputreqletras_ppal') {
            include($folder_base_tipos . "inputreqletras_ppal.php");
        } elseif ($tipo == 'inputletras_ppal') {
            include($folder_base_tipos . "inputletras_ppal.php");
        } elseif ($tipo == 'inputfree') {
            include($folder_base_tipos . "inputfree.php");
        } elseif ($tipo == 'inputunico_ppal') {
            include($folder_base_tipos . "inputunico_ppal.php");
        } elseif ($tipo == 'inputreq_ppal') {
            include($folder_base_tipos . "inputreq_ppal.php");
        } elseif ($tipo == 'inputcorto') {
            include($folder_base_tipos . "inputcorto.php");
        } elseif ($tipo == 'inputcortodinero') {
            include($folder_base_tipos . "inputcortodinero.php");
        } elseif ($tipo == 'inputuniconumero_ppal') {
            include($folder_base_tipos . "inputuniconumero_ppal.php");
        } elseif ($tipo == 'input_ppal') {
            include($folder_base_tipos . "input_ppal.php");
        } elseif ($tipo == 'inputfree_ppal') {
            include($folder_base_tipos . "inputfree_ppal.php");
        } elseif ($tipo == 'inputcorto_ppal') {
            include($folder_base_tipos . "inputcorto_ppal.php");
        } elseif ($tipo == 'foranea1') {
            include($folder_base_tipos . "foranea1.php");
        } elseif ($tipo == 'foranea2') {
            include($folder_base_tipos . "foranea2.php");
        } elseif ($tipo == 'foranea3') {
            include($folder_base_tipos . "foranea3.php");
        } elseif ($tipo == 'hora') {
            include($folder_base_tipos . "hora.php");
        } elseif ($tipo == 'fecha') {
            include($folder_base_tipos . "fecha.php");
        } elseif ($tipo == 'cheque') {
            include($folder_base_tipos . "cheque.php");
        } elseif ($tipo == 'inputautocomplete') {
            include($folder_base_tipos . "inputautocomplete.php");
        }
    }

    function grid_view_detail($tabla) {
        global $modificar_flag;
        global $edit_table;
        global $nombre_seccion;

        $tabla = $tabla . 'grid';

        $entidad_rs_def = $tabla . '_definicion';

        //$metadata_rs_def= new metadatos_array();
        $row_rs_def = $this->recorrer_entidad($entidad_rs_def);
        $numfields_def = count($row_rs_def[$entidad_rs_def]);

        $fila_de_datos_str = '';
        $rotulo_campos = '';
        $detallegrid = '';
        $detallegrid_view_detail = '';
        $detallegrid .='<tr>';
        $detallegrid_view_detail_array = array();
        $p = 0;
        $i = 0;
        //echo $entidad_rs_def;
        // for ($i=0; $i < $numfields_def; $i++) {
        //echo $entidad_rs_def;
        $keys_rs_def = array_keys($row_rs_def[$entidad_rs_def]);
        foreach ($keys_rs_def as $key_rs_def) {
            if (strstr($key_rs_def, '_rotulo')) {
                $rotulo_arr = explode('_', $key_rs_def);
                if ($rotulo_arr[0] != 'padre' && $rotulo_arr[0] != 'codigo') {
                    $rotulo_campos .= $rotulo_arr[0] . '_rotulo, ';
                    $detallegrid .='<td nowrap valign="top">';
                    if (isset($_GET['campo_detalle'])) {
                        $where_str = " WHERE padre =" . $_GET['codigo'] . " AND " . $_GET['campo_detalle'] . "='" . $_GET['valor_campo_detalle'] . "'";
                    } else {
                        $where_str = " WHERE padre =" . $_GET['codigo'];
                    }
                    $query_RsEditGrid = "SELECT " . $rotulo_arr[0] . " FROM " . $tabla . $where_str;
                    //echo $query_RsEditGrid;
                    $RsEditGrid = mysqli_query($query_RsEditGrid, CONEXION) or trigger_error(mysql_error(), E_USER_ERROR);
                    $row_RsEditGrid = mysqli_fetch_assoc($RsEditGrid);
                    $totalRows_RsEditGrid = mysqli_num_rows($RsEditGrid);
                    $q = 0;
                    do {
                        $detallegrid_view_detail_array[$p][$q] = $this->fila_de_datos_grid_view($tabla, $rotulo_arr[0], $row_RsEditGrid[$rotulo_arr[0]]);
                        $q++;
                    } while ($row_RsEditGrid = mysqli_fetch_assoc($RsEditGrid));
                    $p++;
                    $detallegrid .= '</td>';
                }
            }
            $i++;
        }
        $detallegrid .='</tr>';
        for ($x = 0; $x < $q; $x++) {
            $detallegrid_view_detail .='<tr>';
            for ($y = 0; $y < $p; $y++) {
                $detallegrid_view_detail .='<td class="tr2" nowrap valign="top">';
                $detallegrid_view_detail .=$detallegrid_view_detail_array[$y][$x];
                $detallegrid_view_detail .='</td>';
            }
            $detallegrid_view_detail .='</tr>';
        }

        $entidad_rs_rot = $tabla . '_definicion';
        //$metadata_rs_rot = new metadatos_array();
        $row_rs_rot = $this->recorrer_entidad($entidad_rs_rot);
        $numfields_rot = count($row_rs_rot[$entidad_rs_rot]);

        $columnas = $numfields_rot + 2;
        $fila_de_datos_str .= '<tr valign="baseline" >
        <td width="100%" colspan="2">';
        $fila_de_datos_str .='<table class="tabla" cellpadding="0" cellspacing="0" >';
        $fila_de_datos_str .='<tr ><td colspan="' . $columnas . '">';
        $fila_de_datos_str .='&nbsp;&nbsp;&nbsp;';
        $fila_de_datos_str .='<td></tr><tr>';

        $keys_rs_rot = array_keys($row_rs_rot[$entidad_rs_rot]);
        $i = 0;
        $contador_accion = 0;
        foreach ($keys_rs_rot as $key_rs_rot) {
            if (strstr($key_rs_rot, '_rotulo')) {
                // for ($i=0; $i < $numfields_rot; $i++) {
                if ($row_rs_rot[$entidad_rs_rot][$key_rs_rot] != "No." && $row_rs_rot[$entidad_rs_rot][$key_rs_rot] != "Padre") {
                    $fila_de_datos_str .='<td class="tr1" nowrap valign="top" >';
                    $fila_de_datos_str .= $row_rs_rot[$entidad_rs_rot][$key_rs_rot];
                    $fila_de_datos_str .='</td>';
                } else {
                    $contador_accion++;
                    if ($contador_accion == 1) {
                        if ($modificar_flag == '1' && $edit_table == '1') {
                            $fila_de_datos_str .='<td class="tr1" nowrap valign="top" >';
                            $fila_de_datos_str .= 'Acciones';
                            $fila_de_datos_str .='</td>';
                        } else {
                            $fila_de_datos_str .='<td class="tr1" nowrap valign="top" >';
                            $fila_de_datos_str .= '';
                            $fila_de_datos_str .='</td>';
                        }
                    }
                }
                $i++;
            }
        }
        $fila_de_datos_str .='<tr>';
        $fila_de_datos_str .='<td class="tr2"  nowrap valign="top" colspan=' . $columnas . '>' . $detallegrid_view_detail . '</td>';
        $fila_de_datos_str .='</tr>';
        mysqli_free_result($RsEditGrid);
        return $fila_de_datos_str;
    }

    function fila_de_datos_grid_view($tabla, $campo, $campo_valor) {

        global $modificar_flag;
        global $edit_table;
        global $nombre_seccion;

        $fila_de_datos_str = '';

        $entidad_Rs = $tabla . '_definicion';
        // $metadata_Rs = new metadatos_array();
        $row_Rs = $this->recorrer_entidad($entidad_Rs);
        $numfields_Rs = count($row_Rs[$entidad_Rs]);
        // echo $numfields_Rs;

        $rotulo = $row_Rs[$entidad_Rs][$campo . '_rotulo'];

        $tipo = $row_Rs[$entidad_Rs][$campo . '_tipo'];

        if ($campo_valor != '') {
            if ($tipo == 'pendiente') {
                // dummy line
            } elseif ($tipo == 'textarea_ppal') {
                $fila_de_datos_str .= $campo_valor;
            } elseif ($tipo == 'textarea') {
                $fila_de_datos_str .= $campo_valor;
            } elseif ($tipo == 'input') {
                $fila_de_datos_str .= $campo_valor;
            } elseif ($tipo == 'firma') {
                $fila_de_datos_str .= $campo_valor;
            } elseif ($tipo == 'correlativo') {
                $where_str_nivel_2 = '1';
                if (isset($_GET['codigo'])) {
                    $padre_nivel2 = $_GET['codigo'];
                } else {
                    $padre_nivel2 = '';
                }
                if ($modificar_flag == '1' && $edit_table == '1') {
                    $fila_de_datos_str .= '<a href="#" onClick="javascript:abrirlink(\'editar\', \'browser_editar.php?tabla=' . $tabla . '&where_str_nivel_2=' . $where_str_nivel_2 . '&correlativo=' . $campo_valor . '&padre=' . $padre_nivel2 . '&nombre_seccion=' . $nombre_seccion . '&no_menu=1\',\'' . str_replace(" ", '', md5(microtime())) . '\');">Modificar</a> - <a href="javascript:abrirlink(\'borrar\',\'delete_main.php?tabla=' . $tabla . '&where_str_nivel_2=' . $where_str_nivel_2 . '&correlativo=' . $campo_valor . '&padre=' . $padre_nivel2 . '\',\'' . str_replace(" ", '', md5(microtime())) . '\');">Borrar</a>';
                } else {
                    $fila_de_datos_str .= '';
                }
            } elseif ($tipo == 'inputletras_ppal') {
                $fila_de_datos_str .= $campo_valor;
            } elseif ($tipo == 'inputreqletras_ppal') {
                $fila_de_datos_str .= $campo_valor;
            } elseif ($tipo == 'inputcorto') {
                $fila_de_datos_str .= $campo_valor;
            } elseif ($tipo == 'inputcortodinero') {
                $fila_de_datos_str .= '$ ' . $campo_valor;
            } elseif ($tipo == 'inputuniconumero_ppal') {
                $fila_de_datos_str .= $campo_valor;
            } elseif ($tipo == 'inputreq_ppal') {
                $fila_de_datos_str .= $campo_valor;
            } elseif ($tipo == 'input_ppal') {
                $fila_de_datos_str .= $campo_valor;
            } elseif ($tipo == 'campodetalle') {
                $fila_de_datos_str .= '';
            } elseif ($tipo == 'inputcorto_ppal') {
                $fila_de_datos_str .= $campo_valor;
            } elseif ($tipo == 'foraneabulk') {
                $where_str = ' WHERE codigo = ' . $campo_valor;
                $query_RsForanea = "SELECT * FROM " . $this->replace_general($campo) . $where_str . " ORDER BY " . $this->replace_general($campo);
                $RsForanea = mysqli_query($query_RsForanea, CONEXION) or trigger_error(mysql_error(), E_USER_ERROR);
                $row_RsForanea = mysqli_fetch_assoc($RsForanea);
                $totalRows_RsForanea = mysqli_num_rows($RsForanea);
                do {

                    if ($row_RsForanea['codigo'] == $campo_valor) {
                        $fila_de_datos_str .= $row_RsForanea[$this->replace_general($campo)];
                    }
                } while ($row_RsForanea = mysqli_fetch_assoc($RsForanea));
                $rows = mysqli_num_rows($RsForanea);
                if ($rows > 0) {
                    mysqli_data_seek($RsForanea, 0);
                    $row_RsForanea = mysqli_fetch_assoc($RsForanea);
                    mysqli_free_result($RsForanea);
                }
                // $fila_de_datos_str .= '</select><input name="campos_grid[]" type="hidden" value="'.$campo.'_grid">';
            } elseif ($tipo == 'foranea1') {
                $where_str = ' WHERE ' . $this->replace_general($campo) . ' = ' . $campo_valor;
                if ($campo_valor != '') {
                    $query_RsForanea = 'SELECT * FROM ' . $this->replace_general($this->nombre_tabla_foranea($campo)) . $where_str . ' ORDER BY ' . $this->replace_general($campo);
                    // echo $query_RsForanea;
                    $RsForanea = mysqli_query($query_RsForanea, CONEXION) or trigger_error(mysql_error(), E_USER_ERROR);
                    $row_RsForanea = mysqli_fetch_assoc($RsForanea);
                    $totalRows_RsForanea = mysqli_num_rows($RsForanea);
                    do {
                        if ($row_RsForanea[$this->replace_general($campo)] == $campo_valor) {
                            $fila_de_datos_str .= $row_RsForanea[$this->replace_general($this->nombre_tabla_foranea($campo))];
                        }
                    } while ($row_RsForanea = mysqli_fetch_assoc($RsForanea));
                    $rows = mysqli_num_rows($RsForanea);
                    if ($rows > 0) {
                        mysqli_data_seek($RsForanea, 0);
                        $row_RsForanea = mysqli_fetch_assoc($RsForanea);
                        mysqli_free_result($RsForanea);
                    }
                }
                // $fila_de_datos_str .= '</select><input name="campos_grid[]" type="hidden" value="'.$campo.'_grid">';
            } elseif ($tipo == 'foranea2') {
                $where_str = ' WHERE ' . $this->replace_general($campo) . ' = ' . $campo_valor;
                if ($campo_valor != '') {
                    $query_RsForanea = 'SELECT * FROM ' . $this->replace_general($this->nombre_tabla_foranea($campo)) . $where_str . ' ORDER BY ' . $this->replace_general($campo);
                    // echo $query_RsForanea;
                    $RsForanea = mysqli_query($query_RsForanea, CONEXION) or trigger_error(mysql_error(), E_USER_ERROR);
                    $row_RsForanea = mysqli_fetch_assoc($RsForanea);
                    $totalRows_RsForanea = mysqli_num_rows($RsForanea);
                    do {
                        if ($row_RsForanea[$this->replace_general($campo)] == $campo_valor) {
                            $fila_de_datos_str .= $row_RsForanea[$this->replace_general($this->nombre_tabla_foranea($campo))];
                        }
                    } while ($row_RsForanea = mysqli_fetch_assoc($RsForanea));
                    $rows = mysqli_num_rows($RsForanea);
                    if ($rows > 0) {
                        mysqli_data_seek($RsForanea, 0);
                        $row_RsForanea = mysqli_fetch_assoc($RsForanea);
                        mysqli_free_result($RsForanea);
                    }
                }
                // $fila_de_datos_str .= '</select><input name="campos_grid[]" type="hidden" value="'.$campo.'_grid">';
            } elseif ($tipo == 'foranea1extracorto') {
                $where_str = ' WHERE codigo = ' . $campo_valor;
                $query_RsForanea = 'SELECT * FROM ' . $this->replace_general($campo) . $where_str . ' ORDER BY ' . $this->replace_general($campo);
                $RsForanea = mysqli_query($query_RsForanea, CONEXION) or trigger_error(mysql_error(), E_USER_ERROR);
                $row_RsForanea = mysqli_fetch_assoc($RsForanea);
                $totalRows_RsForanea = mysqli_num_rows($RsForanea);
                do {
                    if ($row_RsForanea['codigo'] == $campo_valor) {
                        $fila_de_datos_str .= $row_RsForanea[$this->replace_general($campo)];
                    }
                } while ($row_RsForanea = mysqli_fetch_assoc($RsForanea));
                $rows = mysqli_num_rows($RsForanea);
                if ($rows > 0) {
                    mysqli_data_seek($RsForanea, 0);
                    $row_RsForanea = mysqli_fetch_assoc($RsForanea);
                    mysqli_free_result($RsForanea);
                }
                // $fila_de_datos_str .= '</select><input name="campos_grid[]" type="hidden" value="'.$campo.'_grid">';
            } elseif ($tipo == 'hora') {
                $campo_valor_arr = array();
                $campo_valor_arr = explode(':', $campo_valor);
                $campo_valor_hora = $campo_valor_arr[0];
                $campo_valor_minutos = $campo_valor_arr[1];
                for ($i = 0; $i < 23; $i++) {
                    if ($i < 10) {
                        if ($campo_valor_hora == '0' . $i) {
                            $fila_de_datos_str .= '0' . $i;
                        }
                    } else {
                        if ($campo_valor_hora == $i) {
                            $fila_de_datos_str .= $i;
                        }
                    }
                }
                $fila_de_datos_str .= ':';
                for ($i = 0; $i < 59; $i++) {
                    if ($i < 10) {
                        if ($campo_valor_minutos == '0' . $i) {
                            $fila_de_datos_str .= '0' . $i;
                        }
                    } else {
                        if ($campo_valor_minutos == $i) {
                            $fila_de_datos_str .= $i;
                        }
                    }
                }
            } elseif ($tipo == 'fecha') {
                $campo_valor_fecha_arr = array();
                $campo_valor_fecha_arr = explode('-', $campo_valor);
                $campo_valor_anio = $campo_valor_fecha_arr[0];
                $campo_valor_mes = $campo_valor_fecha_arr[1];
                $campo_valor_dia = $campo_valor_fecha_arr[2];
                if ($campo_valor_anio > 0) {
                    for ($i = 1; $i <= 31; $i++) {
                        if ($i < 10) {
                            if ($campo_valor_dia == '0' . $i) {
                                $fila_de_datos_str .= $i;
                            }
                        } else {
                            if ($campo_valor_dia == $i) {
                                $fila_de_datos_str .= $i;
                            }
                        }
                    }
                    $fila_de_datos_str .= ' de ';
                    if ($campo_valor_mes == '01') {
                        $fila_de_datos_str .= ' Enero ';
                    }
                    if ($campo_valor_mes == '02') {
                        $fila_de_datos_str .= ' Febrero ';
                    }
                    if ($campo_valor_mes == '03') {
                        $fila_de_datos_str .= ' Marzo ';
                    }
                    if ($campo_valor_mes == '04') {
                        $fila_de_datos_str .= ' Abril ';
                    }
                    if ($campo_valor_mes == '05') {
                        $fila_de_datos_str .= ' Mayo ';
                    }
                    if ($campo_valor_mes == '06') {
                        $fila_de_datos_str .= ' Junio ';
                    }
                    if ($campo_valor_mes == '07') {
                        $fila_de_datos_str .= ' Julio ';
                    }
                    if ($campo_valor_mes == '08') {
                        $fila_de_datos_str .= ' Agosto ';
                    }
                    if ($campo_valor_mes == '09') {
                        $fila_de_datos_str .= ' Septiembre ';
                    }
                    if ($campo_valor_mes == '10') {
                        $fila_de_datos_str .= ' Octubre ';
                    }
                    if ($campo_valor_mes == '11') {
                        $fila_de_datos_str .= ' Noviembre ';
                    }
                    if ($campo_valor_mes == '12') {
                        $fila_de_datos_str .= ' Diciembre ';
                    }
                    $fila_de_datos_str .= ' de ' . $campo_valor_anio;
                }
            } elseif ($tipo == 'cheque') {
                if ($campo_valor == '1') {
                    $fila_de_datos_str .= ' Si ';
                } else {
                    $fila_de_datos_str .= ' No ';
                }
            }
        }
        return $fila_de_datos_str;
    }

    public function __destruct() {
        unset($this->filas);
        unset($this->fila_de_datos_str);
    }

}

?>