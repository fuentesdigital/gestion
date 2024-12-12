<?php

/**
 * <b>validar_ingreso</b>.<br>
 * Valida el acceso al sistema.<br>
 * Establece el limite de memoria a Indefinido.<br>
 * Abre el cache de escritura.<br>
 * e inicializa las sesiones.<br>
 * de otro modo, sale del sistema.
 */
class validar_ingreso extends utiles {

    /**
     * LogoutApp
     * Controla la salida del sistema.<br>
     */
    public $LogoutApp = false;
    public $redirect_str;

    public function __construct() {
        /*ini_set('memory_limit', -1);
        @ob_start('ob_gzhandler');
        date_default_timezone_set('America/El_Salvador');
        session_start();*/
    }

    public function cerrar_session() {
        session_destroy();
        $session_array = array_keys($_SESSION);
        foreach ($session_array as $session_key) {
            unset($_SESSION[$session_key]);
        }
        echo $this->go_home();
    }

    /**
     * <b>validar</b>.<br>
     * Valida el acceso al sistema.<br>
     * de otro modo, sale del sistema.
     */
    public function doLogin() {

        $Nombre_de_Usuario = strtoupper($this->GetSQLValueString($_POST['Usuario'], 'text'));

        $colorSistema = $this->GetSQLValueString($_POST['temaSistema'], 'int');

        setcookie("ColorSistemaCookie", $colorSistema, time() + 60 * 60 * 24 * 1);

        if ($Nombre_de_Usuario != '') {
            $Password_str = strtoupper($this->GetSQLValueString($_POST['Contrasena'], 'text'));
            mysqli_select_db($this->db_connection, $this->db_database);
            $query_RsLogin = 'SELECT * FROM `Usuario` WHERE upper(Usuario) = ' . $Nombre_de_Usuario;
            $RsLogin = mysqli_query($this->db_connection, $query_RsLogin) or trigger_error(mysql_error(), E_USER_ERROR);
            $row_RsLogin = mysqli_fetch_assoc($RsLogin);
            $totalRows_RsLogin = mysqli_num_rows($RsLogin);
            if (($row_RsLogin['contrasena'] == md5($Password_str) AND $Password_str != '')) {
                $_SESSION['usuario_sistema'] = $row_RsLogin['Usuario'];
                $_SESSION['cod_usuario_noti'] = $row_RsLogin['idUsuario'];
                $_SESSION['is_in_session'] = md5('LoginSessionNameID');
                $_SESSION['admin_nombre'] = $row_RsLogin['nombre1'];
                $_SESSION['admin_apellidos'] = $row_RsLogin['apellido1'];
                $_SESSION['Nivel_de_Usuario'] = $row_RsLogin['idNivel'];
                $_SESSION['idSexo'] = $row_RsLogin['idSexo'];
                $_SESSION['idResolutor'] = $this->rotulo_llave('Resolutor', 'idResolutor', 'idUsuario', $row_RsLogin['idUsuario']);
                header('Location: welcome.php');
            } else {
                $this->failed_login_str = "<script type='text/javascript' language='javascript'>
                                    alert('Usuario o Clave mal Digitados!\\nIntente Nuevamente...');
                                 </script>";
                echo $this->failed_login_str;
            }
        }
    }

    public function go_home() {
        global $es_home_page;
        if ($es_home_page == '0') {
            $this->redirect_str = "<script type='text/javascript' language='javascript'>
                                        if (window.name != ''){
                                            window.close();
                                            window.opener.location= 'login.php';
                                        } else {
                                            window.location='login.php';
                                        }
                                    </script>";
            return $this->redirect_str;
        }
    }

    public function acceso_valido() {
        if (!isset($_SESSION['is_in_session']) || $_SESSION['is_in_session'] != md5('LoginSessionNameID')) {
            echo $this->go_home();
            $this->LogoutApp = true;
        } else {
            $this->LogoutApp = false;
        }
    }

    public function __destruct() {
        unset($this->validar);
        unset($this->LogoutApp);
        unset($this->failed_login_str);
        unset($this->redirect_str);
        unset($this->acceso_valido);
        unset($this->doLogin);
        unset($this->cerrar_session);
        unset($this->go_home);
    }

}

?>