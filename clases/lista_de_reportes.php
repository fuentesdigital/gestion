<?php
class lista_de_reportes extends iptimemark {

    public $select_reportes_str ;


    public function __construct() {
        $this->select_reportes_str  =  '';
    }

    public function lista_de_reportes_view() {

        global $option_name_array;
        global $total_opciones;
        global $codigo_seleccionado;

        $this->select_reportes_str = '<select class="select_list_largo" name="reporte_seleccionado">';

        $codigo_seleccionado = '';

        for($i=0;$i<$total_opciones;$i++) {
            if (isset($_GET['reporte_seleccionado']) && $_GET['reporte_seleccionado'] != '' && $_GET['reporte_seleccionado'] == $i) {
                $_selected_str = ' selected ';
                $codigo_seleccionado = $i;
            }
            else {
                $_selected_str = ' ';
            }
            $this->select_reportes_str .= '<option '.$_selected_str.' value="'.$i.'">'.$option_name_array[$i] .'</option>';
        }
        $this->select_reportes_str .= '</select>';


    }

    public function __destruct() {
        unset($this->select_reportes_str);
        unset($this->lista_de_reportes_view);
    }
}
?>
