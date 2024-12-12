<?php

class browser_editar_kernel extends utiles {
    /* Nucleo para Editar Datos en la Base
     *
     */

    public $filas;
    public $fila_de_datos_str;

    /**
     *  Almacena el Nombre del Codigo de la Tabla.
     */
    public $codigo_tabla = '';

    public function __construct() {
        global $tabla;
        global $nombre_campo;
        global $codigo;
        global $where_str_nivel_2;
        global $nombre_seccion;
        global $codigo;
        global $titulo_seccion;

        if ($where_str_nivel_2 == '1') {
            $query_rs = 'SELECT * FROM ' . $this->GetSQLValueString($tabla, 'nocomillas') . ' WHERE padre  = ' . $this->GetSQLValueString($_GET['padre'], 'nocomillas') . ' AND correlativo = ' . $this->GetSQLValueString($_GET['correlativo'], 'text') . ';';
        } else {
            $query_rs = 'SELECT * FROM ' . $this->GetSQLValueString($tabla, 'nocomillas') . ' WHERE ' . $this->GetSQLValueString($nombre_campo, 'nocomillas') . ' = ' . $this->GetSQLValueString($codigo, 'nocomillas') . ';';
        }
        mysqli_select_db($this->db_connection, $this->db_database);

        // echo $query_rs;

        $rs = mysqli_query($query_rs, CONEXION) or trigger_error(mysql_error(), E_USER_ERROR);
        $row_rs = mysqli_fetch_assoc($rs);
        $numfields = mysqli_num_fields($rs);

        $submit_str = "MM_validateForm(" . $this->validar_campos() . ");document.form1[0].focus();return document.MM_returnValue";

        $this->filas = '<form action="' . EDIT_FORM_ACTION . '" method="post" name="form1" onSubmit="' . $submit_str . '" id="form1">
<table width="98%" align="left" class="tabla"><td colspan="2" class="tr2">MODIFICAR ' . $titulo_seccion . '&nbsp;&nbsp;-&nbsp;&nbsp;Campos Requeridos Marcados con ( * )</td>';
        for ($i = 0; $i < $numfields; $i++) { // Header
            $this->fila_de_datos_str = '';
            $this->fila_de_datos_rotulo($tabla, $this->mysqli_field_name($rs, $i));
            $this->fila_de_datos_edit($tabla, $this->mysqli_field_name($rs, $i), $row_rs[$this->mysqli_field_name($rs, $i)]);
            $this->filas .= $this->fila_de_datos_str;
        }
        $this->filas .= '<tr valign="baseline" class="tr3">
<td width="40%" align="right" nowrap></td>
<td width="60%"><input  name="Submit" type="submit"   id="Submit" class="input_submit" value="Guardar" onClick="document.pressed=-1"></td></tr>
</table><input type="hidden" name="MM_update" value="form1">
<input name="tabla" type="hidden" id="tabla" value="' . $tabla . '">
<input name="nombre_seccion" type="hidden" id="nombre_seccion" value="' . $nombre_seccion . '">
<input name="nombre_campo" type="hidden" id="nombre_campo" value="' . $nombre_campo . '">
<input name="codigo" type="hidden" id="codigo" value="' . $codigo . '">
<input name="url_parent" type="hidden" id="url_parent"></form>';
        $this->filas = $this->squeeze($this->filas);
        mysqli_free_result($rs);
    }

    function fila_de_datos_edit($tabla, $campo, $campo_valor) {

        global $codigo;

        global $nombre_seccion;

        $entidad_Rs = $tabla . '_definicion';
        //$metadata_Rs     = new metadatos_array();
        $row_Rs = $this->recorrer_entidad($entidad_Rs);

        $rotulo = $row_Rs[$entidad_Rs][$campo . '_rotulo'];

        $entidad_Rs = $tabla . '_definicion';
        //$metadata_Rs     = new metadatos_array();
        $row_Rs = $this->recorrer_entidad($entidad_Rs);

        $tipo = $row_Rs[$entidad_Rs][$campo . '_tipo'];

        //echo $tipo ;

        $folder_base_tipos = FOLDER_BASE_NAME.'/tipos/edit/';

        if ($tipo == 'textarea_ppal') {
            include($folder_base_tipos . "textarea_ppal.php");
        } elseif ($tipo == 'textarea') {
            include($folder_base_tipos . "textarea.php");
        } elseif ($tipo == 'input') {
            include($folder_base_tipos . "input.php");
        } elseif ($tipo == 'inputfree') {
            include($folder_base_tipos . "inputfree.php");
        } elseif ($tipo == 'inputunico_ppal') {
            include($folder_base_tipos . "inputunico_ppal.php");
        } elseif ($tipo == 'inputuniconumero_ppal') {
            include($folder_base_tipos . "inputuniconumero_ppal.php");
        } elseif ($tipo == 'inputreq_ppal') {
            include($folder_base_tipos . "inputreq_ppal.php");
        } elseif ($tipo == 'inputletras_ppal') {
            include($folder_base_tipos . "inputletras_ppal.php");
        } elseif ($tipo == 'inputreqletras_ppal') {
            include($folder_base_tipos . "inputreqletras_ppal.php");
        } elseif ($tipo == 'inputcorto') {
            include($folder_base_tipos . "inputcorto.php");
        } elseif ($tipo == 'inputcortodinero') {
            include($folder_base_tipos . "inputcortodinero.php");
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
        } elseif ($tipo == 'grid1') {
            include($folder_base_tipos . "grid1.php");
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

    public function __destruct() {
        // destruye esta clase
        unset($this->filas);
        unset($this->fila_de_datos_str);
        unset($this->codigo_tabla);
        unset($this->fila_de_datos_edit);
    }

}

?>