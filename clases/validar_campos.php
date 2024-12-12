<?php
/**
 * <b>Validar Campos</b><br>.
 * Valida Campos de los Formularios previo Ingreso del Formulario.<br>
 *
 */

class validar_campos extends utiles {
/**
 *  Almacena el script de validacion de los campos
 */
    public $script_validacion= '';

    public function __construct() {
        global $campo;
        global $valor_campo ;
        global $tipo_restriccion;
        global $valor_campo;
        global $tabla;

        $rotulo_campo = $this->rotulo_llave_array($tabla.'_definicion',$campo,$campo,$valor_campo);

        mysqli_select_db($this->db_connection, $this->db_database);
        $query_rs_validar_duplicado = "SELECT $campo FROM $tabla WHERE $campo = '$valor_campo'";
        $query_rs_validar_duplicado ;
        $rs_validar_duplicado = mysqli_query($query_rs_validar_duplicado, CONEXION)  or trigger_error(mysql_error(),E_USER_ERROR);
        $row_rs_validar_duplicado = mysqli_fetch_assoc($rs_validar_duplicado);
        $totalRows_rs_validar_duplicado = mysqli_num_rows($rs_validar_duplicado);
        mysqli_free_result($rs_validar_duplicado);
        if ($totalRows_rs_validar_duplicado > 0 && trim($row_rs_validar_duplicado[$campo]) != '') {
            $this->script_validacion .= '
                                <script language="javascript">
                                        function duplicado(nombre_campo){
                                            if(window.parent.document.form1.'.$campo.'.value != \'\'){                                      
                                                //alert("Campo Duplicado! ("+nombre_campo+")");
                                                var textValidacion=window.parent.document.getElementById("mensajes_de_validacion");
                                                textValidacion.innerHTML="<blink>Campo Duplicado! ('.$rotulo_campo.')</blink>";                                                
                                                window.parent.document.form1.'.$campo.'.focus();
                                                return false;
                                            } else {
                                                var textValidacion=window.parent.document.getElementById("mensajes_de_validacion");
                                                textValidacion.innerHTML="&nbsp;";  
                                                return true;
                                            }
                                        }
                                    duplicado("'.$rotulo_campo.'");
                               </script>';
        } else {
            $this->script_validacion = '<script language="javascript">
                                        function obligatorio(nombre_campo){
                                            if (window.parent.document.form1.'.$campo.'.value == ""){
                                                //alert("Campo Obligatorio! ('.$rotulo_campo.')")
                                                var textValidacion=window.parent.document.getElementById("mensajes_de_validacion");
                                                textValidacion.innerHTML="<blink>Campo Obligatorio! ('.$rotulo_campo.')</blink>";                                                
                                                window.parent.document.form1.'.$campo.'.focus();
                                                return false;
                                            } else {
                                                var textValidacion=window.parent.document.getElementById("mensajes_de_validacion");
                                                textValidacion.innerHTML="&nbsp;";                                                
                                                return true;
                                            }
                                        }
                                </script>
                                        <script language="javascript">
                                        obligatorio("'.$rotulo_campo.'");
                                </script>';
        }
    }

    public function __destruct() {
        unset($this->script_validacion);
    }
}
?>