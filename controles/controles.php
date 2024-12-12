<?php
class controles extends constantes{

    public $control_str;

    public function __construct() {
        $this->control_str = '';
    }
    public function asignar_control($control,$parametros_arr) {
        if ($control !='') {
            if($control == 'seccion') {
                include(FOLDER_BASE_NAME.'controles/lista_de_controles/seccion.php');
            }elseif($control == 'input') {
                include(FOLDER_BASE_NAME.'controles/lista_de_controles/input.php');
            }elseif($control == 'fecha') {
                include(FOLDER_BASE_NAME.'controles/lista_de_controles/fecha.php');
            }elseif($control == 'hora') {
                include(FOLDER_BASE_NAME.'controles/lista_de_controles/hora.php');
            }elseif($control == 'textarea') {
                include(FOLDER_BASE_NAME.'controles/lista_de_controles/textarea.php');
            }elseif($control == 'cheque') {
                include(FOLDER_BASE_NAME.'controles/lista_de_controles/cheque.php');
            }elseif($control == 'select') {
                include(FOLDER_BASE_NAME.'controles/lista_de_controles/select.php');
            }elseif($control == 'grid_launcher') {
                include(FOLDER_BASE_NAME.'controles/lista_de_controles/grid_launcher.php');
            }elseif($control == 'desde_hasta') {
                include(FOLDER_BASE_NAME.'controles/lista_de_controles/desde_hasta.php');
            }elseif($control == 'sino') {
                include(FOLDER_BASE_NAME.'controles/lista_de_controles/sino.php');
            }elseif($control == 'autocomplete') {
                include(FOLDER_BASE_NAME.'controles/lista_de_controles/autocomplete.php');
            }
            return $this->control_str;
        }
    }
    public function __destruct() {
        unset($this->control_str);
        unset($this->asignar_control);
    }
}
?>