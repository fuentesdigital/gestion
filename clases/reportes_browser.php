<?php
class reportes_browser extends detalle_browser {
	/* Retorna los reportes de la tabla
	 *
	 */

    public $url_reportes;
    public $nombre_reporte;
    public $size_reportes;

    public function __construct() {
        $this->size_reportes;
        $this->url_reportes =   array();
        $this->nombre_reporte =   array();

    }
    public function recorrer_reportes() {
        global $tabla;
        $this->size_reportes = 0;
        $entidad_reportes  = $tabla."_reportes";
        //$metadata_reportes = new metadatos_array();
        if (count($this->recorrer_entidad($entidad_reportes)) > 0) {
            $row_rs_reportes = $this->recorrer_entidad($entidad_reportes);
            if (count($row_rs_reportes[$entidad_reportes]) > 0) {
                $key = array_keys($row_rs_reportes[$entidad_reportes]);
                $size_arr = sizeOf($key)/2;
                $this->size_reportes = $size_arr;
                for ($i=0;$i<$size_arr;$i++) {
                    $this->nombre_reporte[$i] =  $row_rs_reportes[$entidad_reportes]['rotulo_'.$i];
                    $this->url_reportes[$i] =  $row_rs_reportes[$entidad_reportes]['url_'.$i];
                }
            }
        }
    }
    public function __destruct() {
        unset($this->opcion_reportes);
        unset($this->nombre_reporte);
        unset($this->recorrer_reportes);
        unset($this->size_reportes);
    }
}
?>