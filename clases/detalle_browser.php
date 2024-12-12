<?php
class detalle_browser extends browser_kernel {
	/* Retorna los detalles de la tabla
	 *
	 */

    public $opcion_detalle;
    public $rotulo_detalle;
    public $size_detalle;

    public function __construct() {
        $this->size_detalle = 0;
        $this->opcion_detalle =   array();
        $this->rotulo_detalle =   array();

    }
    public function recorrer_detalle() {
        global $tabla;
        $this->size_detalle = 0;
        $entidad_detalle  = $tabla. '_detalle';
        // $metadata_detalle     = new metadatos_array();
        if (count($this->recorrer_entidad($entidad_detalle)) > 0) {
            $row_rs_detalle = $this->recorrer_entidad($entidad_detalle);
            $key = array_keys($row_rs_detalle[$entidad_detalle]);
            $size_arr = sizeOf($key)/2;
            $this->size_detalle = $size_arr;
            for ($i=0;$i<$size_arr ;$i++) {
                $this->opcion_detalle[$i] =  $row_rs_detalle[$entidad_detalle]['opcion_'.$i];
                $this->rotulo_detalle[$i] =  $row_rs_detalle[$entidad_detalle]['rotulo_'.$i];
            }
        }
    }
    public function __destruct() {
        unset($this->opcion_detalle);
        unset($this->rotulo_detalle);
        unset($this->recorrer_detalle);
        unset($this->size_detalle);
    }
}
?>