<?php
$parametros_arr['campo'] = $campo;
$parametros_arr['campo_valor'] = '';
$parametros_arr['rotulo'] = $rotulo;
$parametros_arr['insertar'] = '1';
$parametros_arr['read_only'] = false;
$parametros_arr['boton_agregar'] = '';
$parametros_arr['script_code'] = '<script>                
            function validar_dependiente(llave_primaria,valor_llave_primaria,valor_seleccionado){
                var form = document.form1;
                var marcobk = getIFrameDocument("iframeDependiente");
                var j=0;
                var frm = document.form1;
                    for (i=0;i<frm.elements.length;i++)
                        {
                            if(frm.elements[i].name == llave_primaria){
                                j = i + 2;
                            }
                        }
                var nombre_llave_foranea = frm.elements[j].name;            
                marcobk.location = \'validar_dependiente.php?llave_primaria=\'+llave_primaria+\'&nombre_llave_foranea=\'+nombre_llave_foranea+\'&valor_llave_primaria=\'+valor_llave_primaria+\'&valor_seleccionado=\'+valor_seleccionado;
                }            
            window.onload = function()
            {
                var j=0;
                var frm = document.form1;
                    for (i=0;i<frm.elements.length;i++)
                        {
                            if(frm.elements[i].name == \'' . $campo . '\'){
                                j = i;
                            }
                        }
                var valor_seleccionado = frm.elements[j].value;            
                
                validar_dependiente(\'' . $campo . '\',valor_seleccionado,\'\');
            }
            </script>    
            <iframe src="iframe.htm" id="iframeDependiente" name="iframeDependiente" style="width:0px; height:0px;" frameborder="0" scrolling="no"></iframe>';
$parametros_arr['evento_str'] = ' onChange="validar_dependiente(this.name,this.value,\'\');"  ';
$parametros_arr['ubicacionInferior'] = '';
$this->fila_de_datos_str .= $this->asignar_control('select', $parametros_arr);
?>