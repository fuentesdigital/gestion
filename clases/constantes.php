<?php

class constantes extends metadatos_array {
    /* Define las constantes del sistema
     *
     */

    public $_form_action;
    public $_editFormAction;
    public $_currPage;
    public $_rotulo_constante;

    public function __construct() {

        $this->_form_action = $_SERVER['PHP_SELF'];
        $this->_editFormAction = $_SERVER['PHP_SELF'];

        if (isset($_SERVER['QUERY_STRING'])) {
            $this->_editFormAction .= '?' . htmlentities($_SERVER['QUERY_STRING']);
        }

        $this->_currPage = 'http://' . $_SERVER['SERVER_NAME'] . $_SERVER['PHP_SELF'];
    }

    function rotulo_constante($descripcion) {
        $entidad = 'Constantes';
        //$metadata    = new metadatos_array();
        $arrayData = $this->recorrer_entidad($entidad);
        $this->_rotulo_constante = $arrayData[$entidad][$descripcion];
        return $this->_rotulo_constante;
    }

    public function __destruct() {
        unset($this->_form_action);
        unset($this->_editFormAction);
        unset($this->_currPage);
        unset($this->_rotulo_constante);
        unset($this->rotulo_constante);
    }

}

?>
