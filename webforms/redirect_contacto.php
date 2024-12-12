<?php 
// This is the processing page. All process ocurrs here and then it should redirect to another page
?>
<?php
$r = "Location: finish_contacto.php?process=true&";
if(isset($_POST))
{
	foreach($_POST as $key=>$val)
	{
		$r .= $key."=".$val."&";
	}
}
$r = substr($r, 0, strlen($r) - 1);

header($r);
?>