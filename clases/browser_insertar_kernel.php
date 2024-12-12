<?php

class browser_insertar_kernel extends principal {
    /* Nucleo para Insertar Datos en la Base
     *
     */

    public $filas;
    public $fila_de_datos_str;

    public function __construct() {

        global $tabla;
        global $nombre_seccion;
        global $no_menu;
        global $titulo_seccion;
        
        $this->AbrirConexion(SERVER_NAME, DB_NAME, DB_USER_NAME, DB_PWD);

        $microtime_val = $this->microtimestamp();
        mysqli_select_db($this->db_connection, $this->db_database);
        $query_rs = "SELECT * FROM `" . $tabla . "` LIMIT 0,1";
        $rs = mysqli_query($this->db_connection,$query_rs) or trigger_error(mysql_error(), E_USER_ERROR);
        $row_rs = mysqli_fetch_assoc($rs);
        $numfields = mysqli_num_fields($rs);
        $this->validar_campos();
        $submit_str = "MM_validateForm(" . $this->validar_campos() . ");document.form1[0].focus();return document.MM_returnValue";
        $this->filas = '<form action="' . EDIT_FORM_ACTION . '" method="post" name="form1" onKeyUp="highlight(event)" onClick="highlight(event)" onSubmit="' . $submit_str . '">
        <table width="98%" align="left" class="tabla"><tr><td colspan="2" class="tr2">INSERTAR ' . $titulo_seccion . '&nbsp;&nbsp;-&nbsp;&nbsp;Campos Requeridos Marcados con ( * )</td></tr>
            <tr><td colspan="2" class="tr3"><span name="mensajes_de_validacion" id="mensajes_de_validacion">&nbsp;</span></td></tr>';
        for ($i = 0; $i < $numfields; $i++) {
            $this->fila_de_datos_str = '';
            $this->fila_de_datos_rotulo($tabla, $this->mysqli_field_name($rs, $i));
            //$this->fila_de_datos_insert($tabla, $this->mysqli_field_name($rs, $i), $microtime_val);
            $this->filas .= $this->fila_de_datos_str;
        }
        $this->filas .= '<tr valign="baseline" class="tr3">
<td width="40%" align="right" nowrap>
</td>
<td width="60%"><input type="reset" class="input_submit" value="Cancelar"><input type="submit" name="submit_form" class="input_submit" value="Insertar"><input name="salir_al_insertar" type="checkbox" checked value="1" size="32" >  Salir Luego de Insertar</td>
</tr></table><input type="hidden" name="MM_insert" value="form1">
<input name="tabla" type="hidden" id="tabla" value="' . $tabla . '">
<input name="nombre_seccion" type="hidden" id="nombre_seccion" value="' . $nombre_seccion . '">
<input name="no_menu" type="hidden" id="no_menu" value="' . $no_menu . '">
<input name="url_parent" type="hidden" id="url_parent"></form><p>&nbsp;</p>';
        $this->filas = $this->squeeze($this->filas);
        mysqli_free_result($rs);
    }

    function fila_de_datos_insert($tabla, $campo, $microtime_val) {

        $entidad_Rs = $tabla . '_definicion';

        global $nombre_seccion;

        //$metadata_Rs     = new metadatos_array();

        if (count($this->recorrer_entidad($entidad_Rs)) > 0) {
        	
            $row_Rs = $this->recorrer_entidad($entidad_Rs);

            $rotulo = $row_Rs[$entidad_Rs][$campo . '_rotulo'];

            $entidad_Rs = $tabla . '_definicion';
            //$metadata_Rs     = new metadatos_array();
            $row_Rs = $this->recorrer_entidad($entidad_Rs);

            $tipo = $row_Rs[$entidad_Rs][$campo . '_tipo'];

            $folder_base_tipos = FOLDER_BASE_NAME.'/tipos/insert/';

            if ($tipo == 'textarea_ppal') {
                include($folder_base_tipos . "textarea_ppal.php");
            } elseif ($tipo == 'textarea') {
                include($folder_base_tipos . "textarea.php");
            } elseif ($tipo == 'input') {
                include($folder_base_tipos . "input.php");
            } elseif ($tipo == 'inputunico_ppal') {
                include($folder_base_tipos . "inputunico_ppal.php");
            } elseif ($tipo == 'inputuniconumero_ppal') {
                include($folder_base_tipos . "inputuniconumero_ppal.php");
            } elseif ($tipo == 'inputreq_ppal') {
                include($folder_base_tipos . "inputreq_ppal.php");
            } elseif ($tipo == 'inputreqletras_ppal') {
                include($folder_base_tipos . "inputreqletras_ppal.php");
            } elseif ($tipo == 'inputletras_ppal') {
                include($folder_base_tipos . "inputletras_ppal.php");
            } elseif ($tipo == 'inputcorto') {
                include($folder_base_tipos . "inputcorto.php");
            } elseif ($tipo == 'inputcortodinero') {
                include($folder_base_tipos . "inputcortodinero.php");
            } elseif ($tipo == 'input_ppal') {
                include($folder_base_tipos . "input_ppal.php");
            } elseif ($tipo == 'inputfree_ppal') {
                include($folder_base_tipos . "inputfree_ppal.php");
            } elseif ($tipo == 'inputfree') {
                include($folder_base_tipos . "inputfree.php");
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
            } elseif ($tipo == 'sino') {
                include($folder_base_tipos . "sino.php");
            } elseif ($tipo == 'inputautocomplete') {
                include($folder_base_tipos . "inputautocomplete.php");
            }
        }
    }

    public function __destruct() {
        unset($this->filas);
        unset($this->fila_de_datos_str);
    }

}

?>