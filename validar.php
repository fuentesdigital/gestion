<?php
include_once("software.php");
include_once("clases/validar_campos.php");

$campo= $_GET['campo'];
$valor_campo = $_GET['valor_campo'];
$tipo_restriccion = $_GET['tipo_restriccion'];

$valor_campo = $_GET['valor_campo'];
$tabla = $_GET['tabla'];

$validar_campos = new validar_campos();
echo $validar_campos->script_validacion;