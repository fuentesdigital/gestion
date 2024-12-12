<?php

include_once("software.php");
if (isset($_POST['borrar_bitacora']) && $_POST['borrar_bitacora'] == "1") {
    $deleteSQL = "DELETE FROM Bitacora";
    mysqli_select_db($_software->db_connection, $_software->db_database);
    $Result1 = mysqli_query($_software->db_connection, $deleteSQL) or trigger_error(mysqli_error(), E_USER_ERROR);
    $_software->bitacora("bitacora", "0", 'borrar');
    header('Location: bitacora.php');
}
?>
