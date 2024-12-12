<?php
echo $_software->hora_e_ip();

$_software->borrar_array(get_defined_constants());

$_software->borrar_array(get_defined_functions());

$_software->borrar_array(get_declared_classes());

$_software->borrar_array($_POST);

$_software->borrar_array($_GET);

$_software->borrar_array($_SERVER);

?>



