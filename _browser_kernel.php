<?php
class browser_kernel extends utiles {
    /* Extrae de la base de datos la informacion principal
	 * de los catalogos y la deja lista para el ordenamiento, la busqueda y el paginado
    */

    public $buscador_str;
    public $ordenar_str;
    public $rs;
    public $row_rs;
    public $numfields;
    public $campo_llave;
    public $startRow_rs;
    public $totalRows_rs;
    public $currentPage;
    public $queryString_rs;
    public $totalPages_rs;
    public $maxRows_rs;
    public $pageNum_rs;
    public $fila_de_datos_grid_def = array();

    public function __construct() {
        global $tabla;
        global $ned;
        global $where_str;
        global $rotulo_boton_ordenar;
        global $ord_desc_val;
        global $flag;
        global $id_op;
        global $form_action;
        global $nombre_seccion;
        global $whereEstado;


        $rotulo_campos = '';
        $rotulo_mensaje = '';
        $hidden_ordenar_str = '';
        $select_ordenar_option = '';
        $campo_valor_buscado = '';

        $this->buscador_str  = '';

        if ($flag == 0) {
            $this->buscador_str = '<form name="form_buscador" method="get" action="'.$form_action.'" onKeyUp="highlight(event)" onClick="highlight(event)">
            <table width="98%" align="center" class="tabla"><tr><td colspan="2" class="tr2">BUSCAR '.$nombre_seccion.'</td></tr>';
        }
        if ($flag == 1) {
            $this->ordenar_str = '<form action="'.$form_action.'" method="get" name="form_ordenar" id="form_ordenar">
            <table width="98%" align="center" class="tabla">';
        }

        $entidad_def  = $tabla. '_definicion';
        // $metadata_def     = new metadatos_array();
        $row_rs_def = $this->recorrer_entidad($entidad_def);

        $numfields_def = count($row_rs_def[$entidad_def]);
        if ($flag == 1) {
            $this->ordenar_str .= '<tr><td class="tr1" width="534px"><select  class= "select_list_largo" name="ordenar_por">';
            $order_by = '';
            if (isset($_GET['ordenar_por']) && $_GET['ordenar_por'] != '') {
                $order_by = ' ORDER BY ' . $_GET['ordenar_por'] ;
                if (isset($_GET['ordenar_descendente']) && $_GET['ordenar_descendente'] == '1') {
                    $order_by .= ' DESC ';
                }
            }
        }
        // echo $entidad_def;
        $keys = array_keys($row_rs_def[$entidad_def]);
        $i=0;
        foreach($keys as $key) {
            if (strstr($row_rs_def[$entidad_def][$key],'primaria1_')) {
                $this->campo_llave = $this->codigo_tabla($tabla);
                $llave = 1;
            }

            if (strstr($row_rs_def[$entidad_def][$key],'grid1')) {
                $llave_grid = explode('_',$key);
                $this->fila_de_datos_grid_def[] = $llave_grid[0];
            }
            if (strstr($row_rs_def[$entidad_def][$key],'_ppal') || strstr($row_rs_def[$entidad_def][$key],'_auto') || strstr($row_rs_def[$entidad_def][$key],'foranea')) {
                if ($tabla == 'empleado' && (strstr($row_rs_def[$entidad_def][$key],'municipio') || strstr($row_rs_def[$entidad_def][$key],'sexo'))) {
                    echo ''; // no info.
                }
                else {
                    $rotulo_arr = explode('_',$key);
                    $campo_rotulo = $rotulo_arr[0].'_rotulo';
                    $rotulo_campos .= $rotulo_arr[0].', ';
                    $rotulo_nombre = $rotulo_arr[0];
                    $entidad_rot =  $tabla. '_definicion';
                    // $metadata_rot  = new metadatos_array();

                    if (count($this->recorrer_entidad($entidad_rot)) > 0) {

                        $row_rs_rot = $this->recorrer_entidad($entidad_rot);

                        $rotulo_mensaje .= $row_rs_rot[$entidad_rot][$campo_rotulo].'/';

                        // $metadata_srch    = new metadatos_array();
                        $row_rs_srch = $this->recorrer_entidad($entidad_rot);
                        if ($row_rs_def[$entidad_def][$key] == 'foranea1') {
                            $llave = 1;
                            if ($flag == 0) {
                                $this->buscador_str .= '<tr><td class="tr1">'.$row_rs_rot[$entidad_rot][$campo_rotulo].'</td> <td class="tr1"><select  class= "select_list_largo" name="'.$campo_rotulo.'">';
                            }
                            if (isset($_GET[$campo_rotulo])) {
                                $hidden_ordenar_str .= '<input type="hidden" name="'.$campo_rotulo.'" value="'.$_GET[$campo_rotulo].'">';
                            }
                            if ($flag == 1) {
                                $this->ordenar_str .= '<option '.$select_ordenar_option.' value="'. $rotulo_arr[0].'">'.$row_rs_rot[$entidad_rot][$campo_rotulo] .'</option>';
                            }
                            $query_Rsfora1 = 'SELECT * FROM '.$this->replace_general($this->nombre_tabla_foranea($rotulo_arr[0]));
                            if ($flag == 0) {
                                $Rsfora1 = mysqli_query($query_Rsfora1, CONEXION)  or trigger_error(mysql_error(),E_USER_ERROR);
                                $row_Rsfora1 = mysqli_fetch_assoc($Rsfora1);
                                $totalRows_Rsfora1 = mysqli_num_rows($Rsfora1);
                                $this->buscador_str .= '<option value=""></option>';
                                do {
                                    $op_cod = $row_Rsfora1['id'.$this->replace_general($this->nombre_tabla_foranea($rotulo_arr[0]))];
                                    $this->buscador_str .= '<option ';
                                    if (isset($_GET[$campo_rotulo]) && $_GET[$campo_rotulo]  != '' ) {
                                        if ($op_cod  == $_GET[$campo_rotulo] ) {
                                            $this->buscador_str .=  ' SELECTED ' ;
                                        }
                                    }
                                    $this->buscador_str .= ' value="'.$op_cod.'">'.$row_Rsfora1[$this->replace_general($this->nombre_tabla_foranea($rotulo_arr[0]))].'</option>';
                                }
                                while ($row_Rsfora1 = mysqli_fetch_assoc($Rsfora1));
                                $rows = mysqli_num_rows($Rsfora1);
                                if($rows > 0) {
                                    mysqli_data_seek($Rsfora1, 0);
                                    $row_Rsfora1 = mysqli_fetch_assoc($Rsfora1);
                                    mysqli_free_result($Rsfora1);
                                }
                                $this->buscador_str .= '</select></td></tr>';
                            }
                        }
                        else {
                            if ($flag == 0) {
                                if (isset($_GET[$campo_rotulo])) {
                                    $campo_valor_buscado = $_GET[$campo_rotulo];
                                }
                                else {
                                    $campo_valor_buscado = '';
                                }
                                $this->buscador_str .= '<tr><td class="tr1">'.$row_rs_rot[$entidad_rot][$campo_rotulo].'</td><td class="tr1"><input class="input_text" type="text" name="'.$campo_rotulo.'" value="'.$campo_valor_buscado.'"></td></tr>';
                            }
                            if (isset($_GET[$campo_rotulo])) {
                                $hidden_ordenar_str .= '<input type="hidden" name="'.$campo_rotulo.'" value="'.$_GET[$campo_rotulo].'">';
                            }
                            if ($flag == 1) {
                                if (isset($_GET['ordenar_por'])) {
                                    if ($_GET['ordenar_por'] == $rotulo_arr[0]) {
                                        $select_ordenar_option = ' selected ';
                                    }
                                    else {
                                        $select_ordenar_option = ' ';
                                    }
                                }
                                $this->ordenar_str .= '<option '.$select_ordenar_option.' value="'. $rotulo_arr[0].'">'.$row_rs_rot[$entidad_rot][$campo_rotulo] .'</option>';
                            }
                        }
                        if ($llave == 1) {
                            if (isset($_GET[$campo_rotulo]) && $_GET[$campo_rotulo]  != '' ) {
                                $where_str .= "	 AND UPPER(" .$rotulo_arr[0]. ") LIKE '".  strtoupper($_GET[$campo_rotulo]) ."'";
                            }
                        }
                        else {
                            if (isset($_GET[$campo_rotulo]) && $_GET[$campo_rotulo]  != '' ) {
                                $where_str .= "	AND UPPER(" . $rotulo_arr[0]. ") LIKE '%".  strtoupper($_GET[$campo_rotulo]) ."%'";
                            }
                        }
                    }
                }
            }
            $i++;
        }
        if ($flag == 1) {
            if(isset($_GET['s'])) {
                $s = $_GET['s'];
            }
            else {
                $s = '';
            }
            $this->ordenar_str .= '</select>'.$hidden_ordenar_str.'
<input name="tabla" type="hidden" value="'. $_GET["tabla"].'">
<input name="titulo_sufix" type="hidden" value="'. $_GET["titulo_sufix"].'">
<input name="estado" type="hidden" value="'. $_GET["estado"].'">
<input name="nombre_seccion" type="hidden" value="'. $_GET["nombre_seccion"].'">
<input name="s" type="hidden" id="s" value="'.$s.'">
<input name="ned" type="hidden" id="ned" value="'.$ned.'">
<input name="id_op" type="hidden" id="id_op" value="'.$id_op.'">
<input name="flag" type="hidden" id="flag" value="'.$flag.'">
<input name="ordenar_descendente" type="hidden" id="ordenar_descendente" value="'.$ord_desc_val.'">
<td class="tr1" align="right"><input name="Submit2" type="submit" class="input_submit" value=" Orden '.$rotulo_boton_ordenar.' "></td></tr>';
        }
        $this->currentPage = $_SERVER["PHP_SELF"];

        $this->maxRows_rs = 8;
        $this->pageNum_rs = 0;
        if (isset($_GET['pageNum_rs'])) {
            $this->pageNum_rs = $_GET['pageNum_rs'];
        }
        $this->startRow_rs = $this->pageNum_rs * $this->maxRows_rs;

        mysqli_select_db($this->db_connection, $this->db_database);

        if (isset($_GET['ordenar_por']) && $_GET['ordenar_por'] != '') {
            //dummy
        }
        else {
            $order_by = ' ORDER BY '. $this->campo_llave . ' DESC ';
        }

        $where_str .= $whereEstado ;

        $query_rs = 'SELECT ' . substr($rotulo_campos,0,strlen($rotulo_campos)-2)  . ' FROM `'. $tabla. '` '. $where_str . $order_by;
        //echo $query_rs ;
        if ($flag == 1) {


            $query_limit_rs = sprintf('%s LIMIT %d, %d', $query_rs, $this->startRow_rs, $this->maxRows_rs);

            // echo $query_limit_rs;

            $this->rs= mysqli_query($query_limit_rs, CONEXION)  or trigger_error(mysql_error(),E_USER_ERROR);
            $this->numfields = mysqli_num_fields($this->rs);
            if (isset($_GET['totalRows_rs'])) {
                $this->totalRows_rs = $_GET['totalRows_rs'];
            }
            else {
                $all_rs = mysqli_query($query_rs)  or trigger_error(mysql_error(),E_USER_ERROR);
                $this->totalRows_rs = mysqli_num_rows($all_rs);
            }
            $this->totalPages_rs = ceil($this->totalRows_rs/$this->maxRows_rs)-1;

            $this->queryString_rs = '';
            if (!empty($_SERVER['QUERY_STRING'])) {
                $params = explode('&', $_SERVER['QUERY_STRING']);
                $newParams = array();
                foreach ($params as $param) {
                    if (stristr($param, 'pageNum_rs') == false &&
                            stristr($param, 'totalRows_rs') == false) {
                        array_push($newParams, $param);
                    }
                }
                if (count($newParams) != 0) {
                    $this->queryString_rs = '&' . htmlentities(implode('&', $newParams),ENT_COMPAT,'UTF-8');
                }
            }
            $this->queryString_rs = sprintf('&totalRows_rs=%d%s', $this->totalRows_rs, $this->queryString_rs);
        }
        if ($flag == 1) {
            $this->ordenar_str .= '</table></form>';
        }
        if ($flag == 0) {
            if(isset($_GET['s'])) {
                $s = $_GET['s'];
            }
            else {
                $s = '';
            }
            $this->buscador_str .='<tr align="center">
<td colspan="2" class="tr3"><input name="tabla" type="hidden" value="'. $_GET["tabla"].'">
<input name="titulo_sufix" type="hidden" value="'. $_GET["titulo_sufix"].'">
<input name="nombre_seccion" type="hidden" value="'. $_GET["nombre_seccion"].'">
<input name="s" type="hidden" id="s" value="'.$s.'">
<input name="flag" type="hidden" id="flag" value="1">
<input name="id_op" type="hidden" id="flag" value="'.$id_op.'">
<input name="ned" type="hidden" id="ned3" value="'.$ned.'">
<input name="Reset" type="reset" class="input_submit" value="      Cancelar      ">
<input name="Submit" type="submit" class="input_submit" value="      Buscar      "></td></tr></table></form>';
        }

    }


    public function __destruct() {
        // destruye esta clase

        unset($this->buscador_str);
        unset($this->ordenar_str);
        unset($this->rs);
        unset($this->row_rs);
        unset($this->numfields);
        unset($this->campo_llave);
        unset($this->startRow_rs);
        unset($this->totalRows_rs);
        unset($this->currentPage);
        unset($this->queryString_rs);
        unset($this->totalPages_rs);
        unset($this->maxRows_rs);
        unset($this->pageNum_rs);
        unset($this->fila_de_datos_grid_def);

    }
}
?>