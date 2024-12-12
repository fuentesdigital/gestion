<?php
$parametros_arr['campo'] = $campo;
$parametros_arr['campo_valor'] = '';
$parametros_arr['rotulo'] = '<br>' . $rotulo;
$parametros_arr['insertar'] = '1';
$parametros_arr['read_only'] = false;
$parametros_arr['boton_agregar'] = '<a href="#" onClick="javascript:agregar_elemento' . $campo . '(\'insertar\', \'browser_insertar.php?tabla=' . $this->nombre_tabla_foranea($campo) . '&nombre_seccion=' . $nombre_seccion . '&no_menu=1&repintartabla=1\',\'' . str_replace(" ", '', md5(microtime())) . '\');"><img src="add.png" id="imagenForanea' . $campo . '" border=0 align="right"></a><br>';
$parametros_arr['script_code'] = '<script>                
                    function HideFrame' . $campo . '() {
                    var fr' . $campo . ' = document.getElementById ("iframeForanea' . $campo . '");
                        if(fr' . $campo . '.style.display=="none") {
                            fr' . $campo . '.style.display="block";
                            imagenForanea' . $campo . '.src = "minus.png";
                        } else {
                            fr' . $campo . '.style.display="none";
                            imagenForanea' . $campo . '.src = "add.png";
                        }
                    }            
                function agregar_elemento' . $campo . '(tipo,url){
                    var formForanea' . $campo . ' = document.form1;
                    var marcoForanea' . $campo . ' = getIFrameDocument("iframeForanea' . $campo . '");
                    marcoForanea' . $campo . '.location = url;
                    HideFrame' . $campo . '();
                }            
                function borrar_lista_' . $campo . '(){
                   document.form1.' . $campo . '.options.length=0;
                   HideFrame' . $campo . '();                       
                }
                function llenar_foranea2_' . $campo . '(campo,vineta,opcion,contador){
                    	document.form1.' . $campo . '.options[contador]=new Option(opcion,vineta); 
                }
                function foranea2_seleccionado_' . $campo . '(codigo_id){
                    var largoformForanea' . $campo . ' = document.form1.' . $campo . '.options.length;
                    for(i=0;i<largoformForanea' . $campo . ';i++){
                        if(document.form1.' . $campo . '.options[i].value==codigo_id){
                            document.form1.' . $campo . '.selectedIndex=i;
                        }
                    }
                }
            </script>';
$parametros_arr['ubicacionInferior'] = '<tr valign="baseline" class="tr7"><td colspan="4">&nbsp;<iframe src="iframe.htm" id="iframeForanea' . $campo . '" name="iframeForanea' . $campo . '" style="width:100%; height:100%;display:none; " frameborder="0" scrolling="yes"></iframe></td></tr>';
$parametros_arr['evento_str'] = '1';
$this->fila_de_datos_str .= $this->asignar_control('select', $parametros_arr);
?>