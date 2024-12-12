<?php

/**
 * <b>Connection</b>.
 * Define la conexion del Sistema a la Base de Datos<br>
 */
class principal extends rpt_ficha {

    public $db_connection = null;
    public $db_server = null;
    public $db_database = null;
    public $db_username = null;
    public $db_password = null;
    public $db_conectado = false;

    public function __construct() {
        ini_set('memory_limit', -1);
        @ob_start('ob_gzhandler');
        date_default_timezone_set('America/El_Salvador');
        session_start();
        $this->AbrirConexion(SERVER_NAME, DB_NAME, DB_USER_NAME, DB_PWD);
    }

    public function AbrirConexion($server, $database, $username, $password) {
        $this->db_server = $server;
        $this->db_database = $database;
        $this->db_username = $username;
        $this->db_password = $password;
        if (!$this->db_conectado) {
            try {
                $this->db_connection = mysqli_connect($this->db_server, $this->db_username, $this->db_password);
                mysqli_select_db($this->db_connection, $this->db_database);
                mysqli_query($this->db_connection, "SET NAMES 'utf8'");
                if (!$this->db_connection) {
                    $this->db_conectado = false;
                    throw new Exception('MySQL Connection Database Error: ' . mysqli_error());
                } else {
                    $this->db_conectado = true;
                }
            } catch (Exception $e) {
                echo $e->GetMessage();
            }
        } else {
            return 'Error: No connection has been established to the database. Cannot open connection.';
        }
    }

    public function Close() {
        global $db_connection, $CONNECTED;
        if ($CONNECTED) {
            mysqli_close($db_connection);
            $CONNECTED = false;
        } else {
            return 'Error: No connection has been established to the database. Cannot close connection.';
        }
    }

    public function __destruct() {
        unset($this->AbrirConexion);
        unset($this->Close);
        unset($this->Open);
        unset($this->db_connection);
        unset($this->db_server);
        unset($this->db_database);
        unset($this->db_username);
        unset($this->db_password);
        unset($this->CONNECTED);
    }

}

?>