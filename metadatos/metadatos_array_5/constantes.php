<?php
$this->array_data['Constantes']['idConstante'] = '1';
$this->array_data['Constantes']['bienvenido_l1'] = 'Bienvenido al Sistema de Gesti&oacute;n de Informaci&oacute;n General,';
$this->array_data['Constantes']['bienvenido_l2'] = 'Por favor Ingrese su usuario y clave y oprima Aceptar.';
$this->array_data['Constantes']['login'] = ':: Ingreso al Sistema ::';
$this->array_data['Constantes']['iva'] = '1.1300';
$this->array_data['Constantes']['isss'] = '0.0300';
$this->array_data['Constantes']['afp'] = '0.0625';
$this->array_data['Constantes']['mensajeppal'] = 'SELECCIONE DEL MENU LA OPCION QUE DESEA UTILIZAR';
$this->array_data['Constantes']['nombresistema'] = 'SISTEMA DE GESTION DE INFORMACION GENERAL';
$this->array_data['Constantes']['nacimientocontratante'] = '1973-09-22';
$this->array_data['Constantes']['profesion'] = '';
$this->array_data['Constantes']['residencia'] = 'SAN SALVADOR';
$this->array_data['Constantes']['idMunicipio'] = '193';
$this->array_data['Constantes']['duipatrono'] = '';
$this->array_data['Constantes']['idMunicipio1'] = '193';
$this->array_data['Constantes']['fechadui'] = '2007-16-06';
$this->array_data['Constantes']['idNacionalidad'] = '1';
$this->array_data['Constantes']['contratadocomo'] = 'EMPLEADO DE OFICINA';
$this->array_data['Constantes']['horariotrabajo'] = 'LUNES A VIERNES DE 7:30 A.M. A 12:00 P.M. Y DE 12:30 P.M. A 3:30 P.M. INCLUYENDO UNA MEDIA HORA DE RECESO.';
$this->array_data['Constantes']['semanalaboral'] = '40 HORAS';
$this->array_data['Constantes']['idBanco'] = '5';
$this->array_data['Constantes']['gerente'] = '';
$this->array_data['Constantes']['telefonogerente'] = '';
$this->array_data['Constantes']['nitpatronal'] = '';
$this->array_data['Constantes']['nombrecontratante'] = '';
$this->array_data['Constantes']['botonmain'] = '';
$this->array_data['Constantes']['espacios'] = '';
if (isset($_COOKIE["ColorSistemaCookie"]) && $_COOKIE["ColorSistemaCookie"] != '') {
    $cualCookie = $_COOKIE["ColorSistemaCookie"];
} else {
    $cualCookie = "1";
}
if ($cualCookie == "1") {
    $this->array_data['Constantes']['tema'] = 'BLUE';
} else if ($cualCookie == "2") {
    $this->array_data['Constantes']['tema'] = 'LILA';
} else if ($cualCookie == "3") {
    $this->array_data['Constantes']['tema'] = 'GREEN';
} else if ($cualCookie == "4") {
    $this->array_data['Constantes']['tema'] = 'BLACK';
}
$this->array_data['Constantes']['ayuda'] = 'manual-contabilidad.html';
$this->array_data['Constantes']['precision'] = 2;
$this->array_data['Constantes']['licencia'] = '<br><br><table width="748px" border="0" cellpadding="6" align="left" cellspacing="4" bgcolor="#E9EEF5" class="tabla4"><tr><td>Copyright (c) ' . date("Y") . ' meMauricio - Fuentes Digital SOFTWARE.<br><br>Permission is hereby granted, free of charge, to any person obtaining a copy of this software and associated documentation files (the "Software"), to deal in the Software without restriction, including without limitation the rights to use, copy, modify, merge, publish, distribute, sublicense, and/or sell copies of the Software, and to permit persons to whom the Software is furnished to do so, subject to the following conditions: The above copyright notice and this permission notice shall be included in all copies or substantial portions of the Software.<br><br>THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS OR IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF MERCHANTABILITY, FITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT.<br><br>IN NO EVENT SHALL THE AUTHORS OR COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER LIABILITY, WHETHER IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING FROM, OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS IN THE SOFTWARE. </td></tr></table>';
?>
