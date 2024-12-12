<?php
$parametros_arr = array();
$campo_val = "'" . $campo . "'";
$tabla_val = "'" . $tabla . "'";
$parametros_arr['script_code'] = '<script language="javascript">
                            function validar_duplicado(campo,valor_campo,tabla){
                                var marco = document.getElementById("iframeOculto1");
                                    if(marco!=null){
                                        var marco = getIFrameDocument("iframeOculto1");
                                        marco.location="validar.php?campo="+campo+"&valor_campo="+valor_campo+"&tabla="+tabla+"&tipo_restriccion=1";
                                    }
                                }
                        </script><iframe src="iframe.htm" id="iframeOculto1" name="iframeOculto1" style="width: 0px; height:0px; border: 0px"></iframe>';
$parametros_arr['class_line'] = 'tr1';
$parametros_arr['class_ctrl'] = 'input_text';
$parametros_arr['size_ctrl'] = '32';
$parametros_arr['maxlength'] = '';
$parametros_arr['campo_valor'] = '';
$parametros_arr['rotulo'] = '(*) ' . $rotulo;
$parametros_arr['campo'] = $campo;
$parametros_arr['evento_str'] = ' onBlur="validar_duplicado(' . $campo_val . ',this.value,' . $tabla_val . ');" onkeypress="return digitos_validos(event,0);" ';
$parametros_arr['read_only'] = false;
$this->fila_de_datos_str .= $this->asignar_control('input', $parametros_arr);
?>