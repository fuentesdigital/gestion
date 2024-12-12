<?php
include_once("software.php");
include_once("clases/validar_dependiente.php");


$llave_primaria = $_GET['llave_primaria'];

$rotulo_llave_primaria= substr($llave_primaria,2,  strlen($llave_primaria));

$nombre_llave_foranea = $_GET['nombre_llave_foranea'];

$rotulo_llave_foranea = substr($nombre_llave_foranea,2,  strlen($nombre_llave_foranea));

$valor_llave_primaria = $_GET['valor_llave_primaria'];

$valor_seleccionado = trim($_GET['valor_seleccionado']);

$validar_campos = new validar_dependiente();
echo $validar_campos->script_validacion;

?>