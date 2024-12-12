<?php

class rpt_ficha extends browser_ficha_kernel {

    public $ficha_completa_out;

    public function __construct() {
        $this->rpt_ficha();
    }

    public function rpt_ficha() {
        global $nombre_seccion;
        global $tabla;
        global $nombre_campo;
        global $codigo;
        global $microtime_val;
        global $es_grid;

        $this->ficha_completa_out = '';


        $class_tabla = ' border="0" cellpadding="0" cellspacing="0" class="tabla" ';
        $filas_view_detalle = '';
        $nombre_seccion = str_replace("_", " ", $_GET['nombre_seccion']);
        $titulo_seccion_0 = NOMBRE_SISTEMA;
        $titulo_seccion_1 = $nombre_seccion;

        $_browser_ficha_kernel = new browser_ficha_kernel();

        $filas_view_detalle = $_browser_ficha_kernel->filas;

        $reporte_str = '<table ' . $class_tabla . '>';
        $reporte_str .= '<tr>';
        $reporte_str .= '<td>';
        $reporte_str .= '<font size="2px"><B>';
        $reporte_str .= $titulo_seccion_0;
        $reporte_str .= ' - ';
        $reporte_str .= $titulo_seccion_1;
        $reporte_str .= '</B></font>';
        $reporte_str .= '</td>';
        $reporte_str .= '</tr>';
        $reporte_str .= $filas_view_detalle;
        $reporte_str .= '</table>';
        $reporte_str_html = '<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html><head><META HTTP-EQUIV="Pragma" CONTENT="no-cache"><meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<title>' . $titulo_seccion_0 . ' ' . $titulo_seccion_1 . '</title>
<link href="../css/print.css" rel="stylesheet" type="text/css"></head><body>';
        $reporte_str_html .= $reporte_str;
        $reporte_str_html .= '</body></html>';
        $this->ficha_completa_out = $reporte_str_html;
        //return $this->ficha_completa_out;
    }

    public function __destruct() {
        unset($this->ficha_completa_out);
        unset($this->ficha_completa);
    }

}

?>
