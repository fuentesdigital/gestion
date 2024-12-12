<?php
class iptimemark extends acceso_a_opcion {

    public $hora_e_ip;

    public function __construct() {
        $this->hora_e_ip_str =  '';
    }

    public function hora_e_ip() {
        $this->hora_e_ip_str = '<br><table width="98%" align="center" class="tabla"><tr><td  class="tr2">';
        $this->hora_e_ip_str .= '<p class="tr0">';
        $this->hora_e_ip_str .='IP: '.$_SERVER['REMOTE_ADDR']. ' ';
        $fecha = date('Y-m-d');
        $this->hora_e_ip_str .='<br>Fecha y Hora: '.$this->formato_fecha($fecha) .' ';
        $this->hora_e_ip_str .='<span id="marca_de_reloj"></span>';
        $this->hora_e_ip_str .='</p>';
        $this->hora_e_ip_str .='</td></tr></table>';
        return $this->squeeze($this->hora_e_ip_str);
    }

    public function __destruct() {
        unset($this->hora_e_ip_str);
        unset($this->hora_e_ip);
    }
}
?>
