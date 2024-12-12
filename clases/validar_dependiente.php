<?php

/**
 * <b>Validar Campos</b><br>.
 * Valida La relación entre dos campos de selección encadenados o dependientes.<br>
 *
 */
class validar_dependiente extends utiles {

    /**
     *  Almacena el script de validacion de los campos
     */
    public $script_validacion = '';
    public $texto_dependiente = '';
    public $valor_dependiente = '';

    public function __construct() {


        global $nombre_llave_foranea;
        global $rotulo_llave_foranea;
        global $llave_primaria;
        global $rotulo_llave_foranea;
        global $llave_primaria;
        global $valor_llave_primaria;
        global $valor_seleccionado;

        $query_lista = 'SELECT  `' . $nombre_llave_foranea . '`,  `' . $rotulo_llave_foranea . '`,  `' . $llave_primaria . '` FROM `' . $rotulo_llave_foranea . '` WHERE ' . $llave_primaria . ' = "' . $valor_llave_primaria . '"';

        mysqli_select_db($this->db_connection, $this->db_database);
        $rs_lista = mysqli_query($query_lista, CONEXION) or trigger_error(mysql_error(), E_USER_ERROR);

        $totalRows_rs_lista = mysqli_num_rows($rs_lista);
        $this->script_validacion .= '<script language="javascript">
            function addOption(text,value )
            {
                var optn = document.createElement("OPTION");
                optn.text = text;
                optn.value = value;
                parent.document.form1.' . $nombre_llave_foranea . '.options.add(optn);
            }
            function limpiarDependiente(){
                parent.document.form1.' . $nombre_llave_foranea . '.length = 0;                
            }
            limpiarDependiente();
        </script>
        ';
        if ($totalRows_rs_lista > 0) {
            $this->script_validacion .= '<script language="javascript">';
            while ($row_rs_lista = mysqli_fetch_assoc($rs_lista)) {
                $this->texto_dependiente = $row_rs_lista[$nombre_llave_foranea];
                $this->valor_dependiente = $row_rs_lista[$rotulo_llave_foranea];
                $this->script_validacion .= "addOption('" . $this->valor_dependiente . "','" . $this->texto_dependiente . "');\n\n";
            }
            if($valor_seleccionado <> ''){
                $this->script_validacion .= 'parent.document.form1.' . $nombre_llave_foranea . '.value='.$valor_seleccionado.';';
            }
            $this->script_validacion .= '</script>';
        }
        mysqli_free_result($rs_lista);
    }

    public function __destruct() {
        unset($this->script_validacion);
        unset($this->texto_dependiente);
        unset($this->valor_dependiente);
    }

}

?>