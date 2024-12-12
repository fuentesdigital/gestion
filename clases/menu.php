<?php

/* Pinta el Menu de Acuerdo al nivel de acceso
 *
 */

class menu extends lista_de_reportes {

    public $menu_str;
    public $submenu_top_str;
    public $menu_top_str;
    public $menu_bottom_str;
    public $submenu_str;
    public $opcion_str;

    public function __construct() {
        $this->menu_top_str = array();
        $this->menu_str = '';
        $this->submenu_top_str = array();
        $this->submenu_str = array();
        $this->opcion_str = array();
    }

    public function print_menu($idNivel) {
        if ($idNivel != '') {
            mysqli_select_db($this->db_connection, $this->db_database);
            $query_RsMenu = 'SELECT DISTINCT Menu.idMenu, Menu.Menu from Menu, Opcion Where Menu.idMenu = Opcion.idMenu and idOpcion in (SELECT idOpcion FROM Niveldetallegrid WHERE padre = ' . $idNivel . ') and Menu.estado = 1 ORDER BY Menu.orden';
            //echo $query_RsMenu;
            $RsMenu = mysqli_query($this->db_connection, $query_RsMenu) or trigger_error(mysqli_error(''), E_USER_ERROR);
            $row_RsMenu = mysqli_fetch_assoc($RsMenu);
            $total_RsMenu = mysqli_num_rows($RsMenu);
            if ($total_RsMenu > 0) {
                $contador = 0;
                do {
                    $contador++;
                    $codigo_menu = $row_RsMenu['idMenu'];
                    $nombre_menu = $row_RsMenu['Menu'];
                    $this->submenu_top_str[$contador] = '<ul>';
                    $query_RsSubMenu = 'SELECT DISTINCT Submenu.idSubmenu, Submenu.Submenu from Submenu, Opcion where Submenu.idSubmenu = Opcion.idSubmenu and idOpcion in (SELECT idOpcion FROM Niveldetallegrid WHERE padre = ' . $idNivel . ') AND Submenu.idMenu = ' . $codigo_menu . '. ORDER BY Submenu.orden ';
                    // echo $query_RsSubMenu;
                    $RsSubMenu = mysqli_query($this->db_connection, $query_RsSubMenu) or trigger_error(mysqli_error(), E_USER_ERROR);
                    $row_RsSubMenu = mysqli_fetch_assoc($RsSubMenu);
                    $total_RsSubMenu = mysqli_num_rows($RsSubMenu);
                    if ($total_RsSubMenu > 0) {
                        $contador_submenu = 0;
                        if ($contador_submenu == 0) {
                            $this->menu_top_str[$contador] = $nombre_menu;
                        }
                        do {
                            $contador_submenu++;
                            $codigo_sub_menu = $row_RsSubMenu['idSubmenu'];
                            $nombre_sub_menu = $row_RsSubMenu['Submenu'];
                            $query_RsItem = 'SELECT idOpcion, Opcion, url FROM Opcion WHERE idMenu = ' . $codigo_menu . ' AND idSubmenu = ' . $codigo_sub_menu . ' AND activo = 1 and idOpcion in (SELECT idOpcion FROM Niveldetallegrid WHERE padre = ' . $idNivel . ') ORDER BY orden ASC;';
                            // echo $query_RsItem;
                            $RsItem =  mysqli_query($this->db_connection,$query_RsItem) or trigger_error(mysqli_error(), E_USER_ERROR);
                            $row_RsItem = mysqli_fetch_assoc($RsItem);
                            $total_RsItem = mysqli_num_rows($RsItem);
                            if ($total_RsItem > 0) {
                                $contador_item = 0;
                                if ($contador_item == 0) {
                                    $this->submenu_str[$contador][$contador_submenu] = '<a href="#">' . $nombre_sub_menu . '</a>';
                                }
                                do {
                                    $contador_item++;
                                    $nombre_item = $row_RsItem['Opcion'];
                                    $codigo_item = $row_RsItem['idOpcion'];
                                    if (strstr($row_RsItem['url'], 'browser.php') != '') {
                                        $url_item = '"' . $row_RsItem['url'] . '&id_op=' . $codigo_item . '&titulo_sufix=Todos"';
                                    } else {
                                        $url_item = '"' . $row_RsItem['url'] . '"';
                                    }

                                    $this->opcion_str[$contador][$contador_submenu][$contador_item] = '<a href=' . $url_item . '>' . $nombre_item . '</a>';
                                } while ($row_RsItem = mysqli_fetch_assoc($RsItem));
                            }
                        } while ($row_RsSubMenu = mysqli_fetch_assoc($RsSubMenu));
                    }
                } while ($row_RsMenu = mysqli_fetch_assoc($RsMenu));
                mysqli_free_result($RsItem);
                mysqli_free_result($RsSubMenu);
                mysqli_free_result($RsMenu);

                $this->menu_str = '<div id="ddtopmenubar" class="chromemenu"><ul>';
                for ($i = 1; $i <= count($this->menu_top_str); $i++) {
                    $this->menu_str .= '<li><a href="#" rel="ddsubmenu' . $i . '">' . $this->menu_top_str[$i] . '</a></li>';
                }
                $this->menu_str .= '</ul></div>
<script type="text/javascript">
ddlevelsmenu.setup("ddtopmenubar", "topbar") //ddlevelsmenu.setup("mainmenuid", "topbar")
</script>';
                for ($i = 1; $i <= count($this->menu_top_str); $i++) {
                    $this->menu_str .= '<ul id="ddsubmenu' . $i . '" class="ddsubmenustyle">';
                    for ($j = 1; $j <= count($this->submenu_str[$i]); $j++) {
                        $this->menu_str .= '<li>' . $this->submenu_str[$i][$j] . '<ul>';
                        for ($k = 1; $k <= count($this->opcion_str[$i][$j]); $k++) {
                            $this->menu_str .= '<li>' . $this->opcion_str[$i][$j][$k] . '</li>';
                        }
                        $this->menu_str .= '</ul></li>';
                    }
                    $this->menu_str .= '</ul>';
                }
            }
        }
        return $this->menu_str;
    }

    public function __destruct() {
        unset($this->menu_str);
        unset($this->menu_top_str);
        unset($this->submenu_str);
        unset($this->opcion_str);
        unset($this->print_menu);
    }

}

?>