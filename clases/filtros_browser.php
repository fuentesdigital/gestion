<?php
class filtros_browser extends menu{
	/* Define las condiciones WHERE en las sentencias SQL de los catalogos
	 *
	 */
    public $where_str;
    public function __construct() {
        global $tabla;
        $this->where_str = ' WHERE 1 ';
        $where_str_busc= ' WHERE 1 ';
        if ($tabla == 'ventadeservicios' && $_SESSION['cod_vendedor'] != '') {
            $this->where_str .= ' AND vendedores =  '.	$_SESSION['cod_vendedor'] ;
        }
        if ($tabla == 'notificacion' && $_GET['ned'] == '1') {
            $this->where_str .= ' AND usuario =  '.	$_SESSION['cod_usuario_noti'];
        }
        if (isset($_GET['a'])) {
            if ($_GET['a'] == '1') {
                if ($tabla == 'empleado') {
                    $this->where_str .= ' AND (idEstatusempleado < 5 or idEstatusempleado > 9) ';
                }
            }
            if ($_GET['a'] == '0') {
                if ($tabla == 'empleado') {
                    $this->where_str .= ' AND (idEstatusempleado >= 5 and  idEstatusempleado <= 9) ';
                }
            }
        }
    }
    public function __destruct() {
        // destruye esta clase
        unset($this->where_str);
    }
}
?>