<?php

class acceso_a_opcion extends validar_ingreso {

    /**
     *  Retorna los derechos sobre la pantalla por usuario
     */
    public $opciones_validas;

    public function __construct() {
        $this->opciones_validas = array();
    }

    /*
     * <b>acceso opcion</b><br>
     * Devuelve el Acceso a las diferentes opciones sobre la pantalla por usuario.<br>
     * <b>$id_op</b> es el codigo de la opcion.<br>
     */

    function acceso_opcion($id_op) {
        global $id_op;
        if ($id_op != '' && isset($_SESSION['Nivel_de_Usuario'])) {
            mysqli_select_db($this->db_connection, $this->db_database);
            $query_RsAccesos = 'SELECT * FROM Niveldetallegrid WHERE padre =' . $_SESSION['Nivel_de_Usuario'] . ' AND idOpcion = ' . $this->GetSQLValueString($id_op, 'nocomillas') . ';';
            $RsAccesos = mysqli_query($this->db_connection, $query_RsAccesos);
            $this->opciones_validas = mysqli_fetch_assoc($RsAccesos);
            if (mysqli_num_rows($RsAccesos) == 0) {
                header('Location: login.php');
            } else {
                mysqli_select_db($this->db_connection, $this->db_database);
                $query_freno_de_mano = 'SELECT * FROM Opcion WHERE idOpcion = ' . $this->GetSQLValueString($id_op, 'nocomillas') . ';';
                // echo $query_freno_de_mano ;
                $RsFreno_de_mano = mysqli_query($this->db_connection, $query_freno_de_mano);
                $row_RsFreno_de_mano = mysqli_fetch_assoc($RsFreno_de_mano);
                mysqli_free_result($RsFreno_de_mano);
                if (isset($_GET['tabla'])) {
                    if (strrchr($_GET['tabla'], 'detalle') == false) {
                        if (strrchr($row_RsFreno_de_mano['url'], $_GET['tabla']) == false) {
                            header('Location: login.php');
                        }
                    }
                }
            }
            mysqli_free_result($RsAccesos);
        }
    }

    public function __destruct() {
        unset($this->opciones_validas);
        unset($this->acceso_opcion);
    }

}
