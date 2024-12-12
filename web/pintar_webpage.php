<?php
class pintar_webpage extends parametros_web{

    public $str_bloque_principal;
    public $str_bloque_secundario;

    public function __construct() {
        
    }
function pintar_biblioteca($idBiblioteca) {


        mysqli_select_db($this->db_connection, $this->db_database);

        mysqli_query("SET NAMES 'utf8'");

        $query_rsBiblioteca = "SELECT * FROM Biblioteca ORDER BY idBiblioteca DESC;";
        $rsBiblioteca = mysqli_query($query_rsBiblioteca, CONEXION) or die(mysql_error());
        $row_rsBiblioteca = mysqli_fetch_assoc($rsBiblioteca);

        $totalRows_rsBiblioteca = mysqli_num_rows($rsBiblioteca);

        $rotuloSeccion = 'Biblioteca<br>';

        $this->str_bloque_principal = '';

        $this->str_bloque_secundario = '';

        do {
            if ($row_rsBiblioteca['idBiblioteca'] == $idBiblioteca) {

                $this->str_bloque_principal .= '<h3 class="titulo1">';

                $this->str_bloque_principal .= $rotuloSeccion;

                $this->str_bloque_principal .= $row_rsBiblioteca['Biblioteca'];

                $this->str_bloque_principal .= '</h3>';

                $this->str_bloque_principal .= '<img src="webimages/';

                $this->str_bloque_principal .= 'word.png';

                $this->str_bloque_principal .= '"><br>';

                $this->str_bloque_principal .= $row_rsBiblioteca['descripcion'];

                $this->str_bloque_principal .= '<br>Fecha: ' . $row_rsBiblioteca['fecha'];

                $this->str_bloque_principal .= '<h4 class="titulo2">';

                $this->str_bloque_principal .= '<a target="_blank" href="' . $row_rsBiblioteca['link'] . '">Información Adicional</a>';

                $this->str_bloque_principal .= '</h4>';
            } else {

                $this->str_bloque_secundario .= '<hr>';

                $this->str_bloque_secundario .= '<h4 class="titulo2">';

                $this->str_bloque_secundario .= '<a href="index.php?idBiblioteca=' . $row_rsBiblioteca['idBiblioteca'] . '">' . $row_rsBiblioteca['Biblioteca'] . '</a>';

                $this->str_bloque_secundario .= '</h4>';

                $this->str_bloque_secundario .= $row_rsBiblioteca['descripcion'];
            }
        } while ($row_rsBiblioteca = mysqli_fetch_assoc($rsBiblioteca));

        mysqli_free_result($rsBiblioteca);
    }

     function pintar_enlace_externo($idEnlaceexterno) {

        mysqli_select_db($this->db_connection, $this->db_database);

        mysqli_query("SET NAMES 'utf8'");


        $query_rsEnlaceexterno = "SELECT * FROM Enlaceexterno ORDER BY idEnlaceexterno DESC;";

        $rsEnlaceexterno = mysqli_query($query_rsEnlaceexterno, CONEXION) or die(mysql_error());
        $row_rsEnlaceexterno = mysqli_fetch_assoc($rsEnlaceexterno);

        $totalRows_rsEnlaceexterno = mysqli_num_rows($rsEnlaceexterno);

        $rotuloSeccion = 'Enlaces<br>';

        $this->str_bloque_principal = '';

        $this->str_bloque_secundario = '';

        do {
            if ($row_rsEnlaceexterno['idEnlaceexterno'] == $idEnlaceexterno) {

                $this->str_bloque_principal .= '<h3 class="titulo1">';

                $this->str_bloque_principal .= $rotuloSeccion;

                $this->str_bloque_principal .= $row_rsEnlaceexterno['Enlaceexterno'];

                $this->str_bloque_principal .= '</h3>';

                $this->str_bloque_principal .= $row_rsEnlaceexterno['descripcionEnlace'];

                $this->str_bloque_principal .= '<h4 class="titulo2">';

                $this->str_bloque_principal .= '<a target="_blank" href="' . $row_rsEnlaceexterno['link'] . '">' . $row_rsEnlaceexterno['link'] . '</a>';

                $this->str_bloque_principal .= '</h4>';
            } else {

                $this->str_bloque_secundario .= '<hr>';

                $this->str_bloque_secundario .= '<h4 class="titulo2">';

                $this->str_bloque_secundario .= '<a href="index.php?idEnlaceexterno=' . $row_rsEnlaceexterno['idEnlaceexterno'] . '">' . $row_rsEnlaceexterno['Enlaceexterno'] . '</a>';

                $this->str_bloque_secundario .= '</h4>';

                $this->str_bloque_secundario .= '<a target="_blank" href="' . $row_rsEnlaceexterno['link'] . '">' . $row_rsEnlaceexterno['link'] . '</a>';
            }
        } while ($row_rsEnlaceexterno = mysqli_fetch_assoc($rsEnlaceexterno));


        mysqli_free_result($rsEnlaceexterno);
    }

    function pintar_exposicion($idExposicion) {

    
    mysqli_select_db($this->db_connection, $this->db_database);

    mysqli_query("SET NAMES 'utf8'");


    $query_rsExposicion = "SELECT * FROM Exposicion ORDER BY idExposicion DESC;";
    $rsExposicion = mysqli_query($query_rsExposicion, CONEXION) or die(mysql_error());
    $row_rsExposicion = mysqli_fetch_assoc($rsExposicion);
    
    
    
    $totalRows_rsExposicion = mysqli_num_rows($rsExposicion);

    $rotuloSeccion = 'Exposiciones y Charlas<br>';

    $this->str_bloque_principal = '';

    $this->str_bloque_secundario = '';

    do {
        if ($row_rsExposicion['idExposicion'] == $idExposicion) {

            $this->str_bloque_principal .= '<h3 class="titulo1">';

            $this->str_bloque_principal .= $rotuloSeccion;

            $this->str_bloque_principal .= $row_rsExposicion['Exposicion'];

            $this->str_bloque_principal .= '</h3>';
                      
            $this->str_bloque_principal .= '<br>Expositor: '.$row_rsExposicion['expositor'];

            $this->str_bloque_principal .= '<br>Fecha de Inicio: ' . $row_rsExposicion['fechainicio'];
            
            $this->str_bloque_principal .= '<br>Fecha de Cierre: ' . $row_rsExposicion['fechafin'];

           
        } else {

            $this->str_bloque_secundario .= '<hr>';

            $this->str_bloque_secundario .= '<h4 class="titulo2">';

            $this->str_bloque_secundario .= '<a href="index.php?idExposicion=' . $row_rsExposicion['idExposicion'] . '">' . $row_rsExposicion['Exposicion'] . '</a>';

            $this->str_bloque_secundario .= '</h4>';

            $this->str_bloque_secundario .= '<br>Expositor: '.$row_rsExposicion['expositor'];
        }
    } while ($row_rsExposicion = mysqli_fetch_assoc($rsExposicion));

    mysqli_free_result($rsExposicion);
}

function pintar_galerias($tbl, $idTabla) {


        mysqli_select_db($this->db_connection, $this->db_database);

        mysqli_query("SET NAMES 'utf8'");

        $query_rsGaleriaImagenes = "SELECT * FROM " . $tbl . " ORDER BY id" . $tbl . " DESC;";
        $rsGaleriaImagenes = mysqli_query($query_rsGaleriaImagenes, CONEXION) or die(mysql_error());
        $row_rsGaleriaImagenes = mysqli_fetch_assoc($rsGaleriaImagenes);
        $totalRows_rsGaleriaImagenes = mysqli_num_rows($rsGaleriaImagenes);

        $rotuloSeccion = '';

        if ($tbl == 'Fotodiaria') {
            $rotuloSeccion = 'Foto del día<br>';
        } else if ($tbl == 'Galeria') {
            $rotuloSeccion = 'Galería de imágenes<br>';
        }

        $this->str_bloque_principal = '';

        $this->str_bloque_secundario = '';

        do {
            if ($row_rsGaleriaImagenes['id' . $tbl] == $idTabla) {

                $this->str_bloque_principal .= '<h3 class="titulo1">';

                $this->str_bloque_principal .= $rotuloSeccion;

                $this->str_bloque_principal .= $row_rsGaleriaImagenes[$tbl];

                $this->str_bloque_principal .= '</h3>';

                $this->str_bloque_principal .= '<img src="';

                $this->str_bloque_principal .= $row_rsGaleriaImagenes['archivoDocumento'];

                $this->str_bloque_principal .= '"><br>';

                $this->str_bloque_principal .= $row_rsGaleriaImagenes['descripcion'];

                $this->str_bloque_principal .= '<br>Fecha: ' . $row_rsGaleriaImagenes['fecha'];

                $this->str_bloque_principal .= '<br>Créditos: ' . $this->rotulo_llave('Contacto', 'Contacto', 'idContacto', $row_rsGaleriaImagenes['idContacto']);

                $this->str_bloque_principal .= '<br>Fuente: ' . $row_rsGaleriaImagenes['fuente'];

                $this->str_bloque_principal .= '<h4 class="titulo2">';

                $this->str_bloque_principal .= '<a target="_blank" href="' . $row_rsGaleriaImagenes['link'] . '">Información Adicional</a>';

                $this->str_bloque_principal .= '</h4>';
            } else {

                $this->str_bloque_secundario .= '<hr>';

                $this->str_bloque_secundario .= '<h4 class="titulo2">';

                $this->str_bloque_secundario .= '<a href="index.php?tbl=' . $tbl . '&idTabla=' . $row_rsGaleriaImagenes['id' . $tbl] . '">' . $row_rsGaleriaImagenes[$tbl] . '</a>';

                $this->str_bloque_secundario .= '</h4>';

                $this->str_bloque_secundario .= $row_rsGaleriaImagenes['descripcion'];
            }
        } while ($row_rsGaleriaImagenes = mysqli_fetch_assoc($rsGaleriaImagenes));

        mysqli_free_result($rsGaleriaImagenes);
    }

function pintar_lista_multimedia() {


        mysqli_select_db($this->db_connection, $this->db_database);

        mysqli_query("SET NAMES 'utf8'");

        function pintar_lista_multimedia() {

            mysqli_select_db($this->db_connection, $this->db_database);

            mysqli_query("SET NAMES 'utf8'");

            $query_rsListaMultimedia = "SELECT * FROM Seccionmultimedia WHERE estado=1 ORDER BY idSeccionmultimedia;";

            $rsListaMultimedia = mysqli_query($query_rsListaMultimedia, CONEXION) or die(mysql_error());
            $row_rsListaMultimedia = mysqli_fetch_assoc($rsListaMultimedia);
            $totalRows_rsListaMultimedia = mysqli_num_rows($rsListaMultimedia);

            //echo $row_rsListaMultimedia['idGaleria'];

            do {
                $this->str_bloque_principal = '<br><a href="index.php?idSeccionmultimedia=' . $row_rsListaMultimedia['idSeccionmultimedia'] . '"><img src="webimages/cheque.png" border="0"><span class="titulo3">' . $row_rsListaMultimedia['Seccionmultimedia'] . '</span></a>';
            } while ($row_rsListaMultimedia = mysqli_fetch_assoc($rsListaMultimedia));

            mysqli_free_result($rsListaMultimedia);
        }

    }

  function pintar_lista_simple() {

        mysqli_select_db($this->db_connection, $this->db_database);

        mysqli_query("SET NAMES 'utf8'");

        $query_rsListaSimple = "SELECT * FROM Seccionsimple WHERE estado=1 ORDER BY idSeccionsimple;";

        //echo $query_rsListaSimple;

        $rsListaSimple = mysqli_query($query_rsListaSimple, CONEXION) or die(mysql_error());
        $row_rsListaSimple = mysqli_fetch_assoc($rsListaSimple);
        $totalRows_rsListaSimple = mysqli_num_rows($rsListaSimple);

        //echo $row_rsListaSimple['idGaleria'];

        do {
            $this->str_bloque_principal = '<br><a href="index.php?idSeccionsimple=' . $row_rsListaSimple['idSeccionsimple'] . '"><img src="webimages/cheque.png" border="0"><span class="titulo3">' . $row_rsListaSimple['Seccionsimple'] . '</span></a>';
        } while ($row_rsListaSimple = mysqli_fetch_assoc($rsListaSimple));

        mysqli_free_result($rsListaSimple);
    }

function pintar_multimedia($idSeccionmultimedia, $idContenidomultimedia) {

        global $rotuloMultimedia;

        mysqli_select_db($this->db_connection, $this->db_database);

        mysqli_query("SET NAMES 'utf8'");


        $query_rsMultimedia = "SELECT * FROM Contenidomultimedia WHERE idSeccionmultimedia = '" . $idSeccionmultimedia . "' AND estado=1 ORDER BY idContenidomultimedia DESC;";

        //echo $query_rsMultimedia;

        $rsMultimedia = mysqli_query($query_rsMultimedia, CONEXION) or die(mysql_error());
        $row_rsMultimedia = mysqli_fetch_assoc($rsMultimedia);
        $totalRows_rsMultimedia = mysqli_num_rows($rsMultimedia);

        //echo $row_rsMultimedia['idGaleria'];

        $this->str_bloque_principal = '';

        $this->str_bloque_secundario = '';

        do {
            if ($row_rsMultimedia['idContenidomultimedia'] == $idContenidomultimedia) {

                $this->str_bloque_principal .= '<h3 class="titulo1">';

                $this->str_bloque_principal .= $rotuloMultimedia . '<br>' . $row_rsMultimedia['Contenidomultimedia'];

                $this->str_bloque_principal .= '</h3>';

                $this->str_bloque_principal .= $row_rsMultimedia['contenidohtml'];
            } else {

                $this->str_bloque_secundario .= '<hr>';

                $this->str_bloque_secundario .= '<h4 class="titulo2">';

                $this->str_bloque_secundario .= '<a href="index.php?idSeccionmultimedia=' . $row_rsMultimedia['idSeccionmultimedia'] . '&idContenidomultimedia=' . $row_rsMultimedia['idContenidomultimedia'] . '">' . $row_rsMultimedia['Contenidomultimedia'] . '</a>';

                $this->str_bloque_secundario .= '</h4>';
            }
        } while ($row_rsMultimedia = mysqli_fetch_assoc($rsMultimedia));

        mysqli_free_result($rsMultimedia);
    }
    function pintar_proyecto($idProyecto) {

    mysqli_select_db($this->db_connection, $this->db_database);
    
    mysqli_query("SET NAMES 'utf8'");

    $query_rsProyecto = "SELECT * FROM Proyecto ORDER BY idProyecto DESC;";
    $rsProyecto = mysqli_query($query_rsProyecto, CONEXION) or die(mysql_error());
    $row_rsProyecto = mysqli_fetch_assoc($rsProyecto);
    
        $totalRows_rsProyecto = mysqli_num_rows($rsProyecto);

    $rotuloSeccion = 'Proyectos<br>';

    $this->str_bloque_principal = '';

    $this->str_bloque_secundario = '';

    do {
        if ($row_rsProyecto['idProyecto'] == $idProyecto) {

            $this->str_bloque_principal .= '<h3 class="titulo1">';

            $this->str_bloque_principal .= $rotuloSeccion;

            $this->str_bloque_principal .= $row_rsProyecto['Proyecto'];

            $this->str_bloque_principal .= '</h3>';

            $this->str_bloque_principal .= $row_rsProyecto['detalle'];

            $this->str_bloque_principal .= '<br>Fecha de Inicio: ' . $row_rsProyecto['fechainicio'];
            
            $this->str_bloque_principal .= '<br>Fecha de Cierre: ' . $row_rsProyecto['fechafin'];

        } else {

            $this->str_bloque_secundario .= '<hr>';

            $this->str_bloque_secundario .= '<h4 class="titulo2">';

            $this->str_bloque_secundario .= '<a href="index.php?idProyecto=' . $row_rsProyecto['idProyecto'] . '">' . $row_rsProyecto['Proyecto'] . '</a>';

            $this->str_bloque_secundario .= '</h4>';

        }
    } while ($row_rsProyecto = mysqli_fetch_assoc($rsProyecto));

    mysqli_free_result($rsProyecto);
}
function pintar_simple($idSeccionsimple, $idContenidosimple) {

        global $rotulosimple;

        mysqli_select_db($this->db_connection, $this->db_database);

        mysqli_query("SET NAMES 'utf8'");

        $query_rssimple = "SELECT * FROM Contenidosimple WHERE idSeccionsimple = '" . $idSeccionsimple . "' AND estado=1 ORDER BY idContenidosimple DESC;";

        //echo $query_rssimple;

        $rssimple = mysqli_query($query_rssimple, CONEXION) or die(mysql_error());
        $row_rssimple = mysqli_fetch_assoc($rssimple);
        $totalRows_rssimple = mysqli_num_rows($rssimple);

        //echo $row_rssimple['idGaleria'];

        $this->str_bloque_principal = '';

        $this->str_bloque_secundario = '';

        do {
            if ($row_rssimple['idContenidosimple'] == $idContenidosimple) {

                $this->str_bloque_principal .= '<h3 class="titulo1">';

                $this->str_bloque_principal .= $rotulosimple . '<br>' . $row_rssimple['Contenidosimple'];

                $this->str_bloque_principal .= '</h3>';

                $this->str_bloque_principal .= $row_rssimple['contenidohtml'];

                $query_rssimpledetalle = "SELECT * FROM `Contenidosimpledetallegrid` WHERE padre = '" . $idContenidosimple . "' ORDER BY correlativo DESC;";

//    echo $query_rssimpledetalle;

                $rssimpledetalle = mysqli_query($query_rssimpledetalle, CONEXION) or die(mysql_error());
                //$row_rssimpledetalle = mysqli_fetch_assoc($rssimpledetalle);
                $totalRows_rssimpledetalle = mysqli_num_rows($rssimpledetalle);


                while ($row_rssimpledetalle = mysqli_fetch_assoc($rssimpledetalle)) {
                    $this->str_bloque_principal .= '<br><a target="_blank" href="' . $row_rssimpledetalle['link'] . '">' . $row_rssimpledetalle['Contenidosimple'] . '</a>';
                    //$this->str_bloque_principal .= $row_rssimpledetalle['descripcionContenidosimple'];
                    //$this->str_bloque_principal .= $row_rssimpledetalle['link'];
                }
            } else {

                $this->str_bloque_secundario .= '<hr>';

                $this->str_bloque_secundario .= '<h4 class="titulo2">';

                $this->str_bloque_secundario .= '<a href="index.php?idSeccionsimple=' . $row_rssimple['idSeccionsimple'] . '&idContenidosimple=' . $row_rssimple['idContenidosimple'] . '">' . $row_rssimple['Contenidosimple'] . '</a>';

                $this->str_bloque_secundario .= '</h4>';
            }
        } while ($row_rssimple = mysqli_fetch_assoc($rssimple));

        mysqli_free_result($rssimple);
    }

    public function __destruct() {
        unset($this->str_bloque_principal);
        unset($this->str_bloque_secundario);
    }

}

?>
