<?php

class parametros_web extends lista_de_reportes {

    public $idBiblioteca;
    public $idEnlaceexterno;
    public $idProyecto;
    public $idExposicion;
    public $pintarMultimedia;
    public $pintarSimple;
    public $pintarBiblioteca;
    public $pintarEnlaceexterno;
    public $pintarProyecto;
    public $pintarExposicion;
    public $idSeccionmultimedia;
    public $rotuloMultimedia;
    public $idContenidomultimedia;
    public $idSeccionsimple;
    public $rotulosimple;
    public $idContenidosimple;    
    public $tbl;
    public $idTabla;

    public function __construct() {
        
    }

    function crear_parametros_web() {
        $this->idBiblioteca = $this->maximo_id('Biblioteca');
        $this->idEnlaceexterno = $this->maximo_id('Enlaceexterno');
        $this->idProyecto = $this->maximo_id('Proyecto');
        $this->idExposicion = $this->maximo_id('Exposicion');
        $this->pintarMultimedia = false;
        $this->pintarSimple = false;
        $this->pintarBiblioteca = false;
        $this->pintarEnlaceexterno = false;
        $this->pintarProyecto = false;
        $this->pintarExposicion = false;

        if (isset($_GET['idSeccionmultimedia']) && $_GET['idSeccionmultimedia'] != '') {

            $this->idSeccionmultimedia = $_GET['idSeccionmultimedia'];

            $this->rotuloMultimedia = $this->rotulo_llave('Seccionmultimedia', 'Seccionmultimedia', 'idSeccionmultimedia ', $this->idSeccionmultimedia);

            if (isset($_GET['idContenidomultimedia']) && $_GET['idContenidomultimedia'] != '') {
                $this->idContenidomultimedia = $_GET['idContenidomultimedia'];
            } else {
                $this->idContenidomultimedia = $this->maximo_id_compuesto('Contenidomultimedia', 'idSeccionmultimedia', $this->idSeccionmultimedia);
            }
            $this->pintarMultimedia = true;
        } else if (isset($_GET['idSeccionsimple']) && $_GET['idSeccionsimple'] != '') {

            $this->idSeccionsimple = $_GET['idSeccionsimple'];

            $this->rotulosimple = $this->rotulo_llave('Seccionsimple', 'Seccionsimple', 'idSeccionsimple', $this->idSeccionsimple);

            if (isset($_GET['idContenidosimple']) && $_GET['idContenidosimple'] != '') {
                $this->idContenidosimple = $_GET['idContenidosimple'];
            } else {
                $this->idContenidosimple = $this->maximo_id_compuesto('Contenidosimple', 'idSeccionsimple', $this->idSeccionsimple);
            }
            $this->pintarSimple = true;
        } else if (isset($_GET['idBiblioteca']) && $_GET['idBiblioteca'] != '') {

            $this->idBiblioteca = $_GET['idBiblioteca'];

            $this->pintarBiblioteca = true;
        } else if (isset($_GET['idEnlaceexterno']) && $_GET['idEnlaceexterno'] != '') {

            $this->idEnlaceexterno = $_GET['idEnlaceexterno'];

            $this->pintarEnlaceexterno = true;
        } else if (isset($_GET['idProyecto']) && $_GET['idProyecto'] != '') {

            $this->idProyecto = $_GET['idProyecto'];

            $this->pintarProyecto = true;
        } else if (isset($_GET['idExposicion']) && $_GET['idExposicion'] != '') {

            $this->idExposicion = $_GET['idExposicion'];

            $this->pintarExposicion = true;
        } else {
            if (isset($_GET['tbl']) && $_GET['tbl'] != '') {
                $this->tbl = $_GET['tbl'];
            } else {
                $this->tbl = 'Fotodiaria';
            }
            if (isset($_GET['idTabla']) && $_GET['idTabla'] != '') {
                $this->idTabla = $_GET['idTabla'];
            } else {
                $this->idTabla = $this->maximo_id($this->tbl);
                
            }
        }
    }

    public function __destruct() {
        unset($this->idBiblioteca);
        unset($this->idEnlaceexterno);
        unset($this->idProyecto);
        unset($this->idExposicion);
        unset($this->pintarMultimedia);
        unset($this->pintarSimple);
        unset($this->pintarBiblioteca);
        unset($this->pintarEnlaceexterno);
        unset($this->pintarProyecto);
        unset($this->pintarExposicion);
        unset($this->idSeccionmultimedia);
        unset($this->rotuloMultimedia);
        unset($this->idContenidomultimedia);
        unset($this->idSeccionsimple);
        unset($this->rotulosimple);
        unset($this->idContenidosimple);
        unset($this->tbl);
        unset($this->idTabla);
    }

}

?>