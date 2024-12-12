<?php

class metadatos_array {

    public $array_data;

    public function __construct() {
        $this->array_data = array();
        $this->entidad_array = array();
        $this->entidad_name = '';
        $this->tipo_entidad = '';
        $this->file_nm = '';
        $this->full_file_name = '';
    }

    public function recorrer_entidad($entidad) {
        $this->entidad_array = explode('_', $entidad);
        $this->entidad_name = $this->entidad_array[0];
        $this->file_nm = strtolower($this->entidad_name);
        if (isset($this->entidad_array[1])) {
            $this->tipo_entidad = $this->entidad_array[1];
        }
        if ($entidad == 'Constantes') {
            include(FOLDER_BASE_NAME . 'metadatos/metadatos_array' . PREFIJO_FOLDERS . '/constantes.php');
        } else {
            if ($this->tipo_entidad == 'codigo') {
                $this->full_file_name = FOLDER_BASE_NAME . 'metadatos/metadatos_array' . PREFIJO_FOLDERS . '/main_codigo.php';
            } else {
                $this->full_file_name = FOLDER_BASE_NAME . 'metadatos/metadatos_array' . PREFIJO_FOLDERS . "/" . $this->file_nm . '_' . $this->tipo_entidad . '.php';
            }
            if (file_exists($this->full_file_name)) {
                include($this->full_file_name);
            }
        }
        return $this->array_data;
    }

    public function __destruct() {
        unset($this->array_data);
        unset($this->entidad_array);
        unset($this->entidad_name);
        unset($this->file_nm);
        unset($this->tipo_entidad);
        unset($this->full_file_name);
        unset($this->recorrer_entidad);
    }

}

?>