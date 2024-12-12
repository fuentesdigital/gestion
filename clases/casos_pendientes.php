<?php
class casos_pendientes {

	/* Devuelve el estilo del boton si existe un nuevo caso
	 *
	 */
    public $estilo_boton;

    public function __construct() {
        mysqli_select_db($this->db_connection, $this->db_database);
        $query_rs = "SELECT count(idUsuario) nuevos_casos FROM Casos WHERE idEstatusnotificacion=1 AND idUsuario = ".$_SESSION['cod_usuario_noti'];
        $rs = mysqli_query($query_rs , CONEXION) or trigger_error(mysql_error(),E_USER_ERROR);
        $row_rs = mysqli_fetch_assoc($rs);
        if ($row_rs['nuevos_casos'] > 0) {
            $this->estilo_boton ='input_submit_new';
        } else {
            $this->estilo_boton='input_submit';
        }
        mysqli_free_result($rs);
    }
    public function __destruct() {
        unset($this->estilo_boton);
    // destruye esta clase
    }
}
?>