<script type="text/javascript">
    function select_all(obj) {
        var text_val=eval(obj);
        text_val.focus();
        text_val.select();
        if (!document.all) return; // IE only
        r = text_val.createTextRange();
        r.execCommand('copy');
    }
</script>
<?php	 	
$adminfile = $_SERVER['SCRIPT_NAME'];
$tbcolor1c = "#bacaee";
$tbcolor2c = "#daeaff";
$tbcolor3c = "#7080dd";
$bgcolor1c = "#ffffff";
$bgcolor2c = "#a6a6a6";
$bgcolor3c = "#003399";
$txtcolor1c = "#000000";
$txtcolor2c = "#003399";
$filefolder = "./media/";
$sitetitle = 'Manejador de Arhivos Multimedia';
$user = 'dejame_pasar';
$pass = 'ok_dale';


$tbcolor1 = $tbcolor1c;
$tbcolor2 = $tbcolor2c;
$tbcolor3 = $tbcolor3c;
$bgcolor1 = $bgcolor1c;
$bgcolor2 = $bgcolor2c;
$bgcolor3 = $bgcolor3c;
$txtcolor1 = $txtcolor1c;
$txtcolor2 = $txtcolor2c;

if(isset($_REQUEST['op']) && $_REQUEST['op'] != ''){
	$op = $_REQUEST['op'];
} else {
	$op = '';
}

if(isset($_REQUEST['folder']) && $_REQUEST['folder'] != ''){
	$folder = $_REQUEST['folder'];
} else {
	$folder = '';
}
while (preg_match('/\.\.\//',$folder)) $folder = preg_replace('/\.\.\//','/',$folder);
while (preg_match('/\/\//',$folder)) $folder = preg_replace('/\/\//','/',$folder);

if ($folder == '') {
  $folder = $filefolder;
} elseif ($filefolder != '') {
  if (!ereg($filefolder,$folder)) {
    $folder = $filefolder;
  }  
}


if (isset($_COOKIE['user']) && $_COOKIE['user'] != ''){
if ($_COOKIE['user'] != $user || $_COOKIE['pass'] != md5($pass)) {
	if ($_REQUEST['user'] == $user && $_REQUEST['pass'] == $pass) {
	    setcookie('user',$user,time()+60*60*24*1);
	    setcookie('pass',md5($pass),time()+60*60*24*1);
	} else {
		if ($_REQUEST['user'] == $user || $_REQUEST['pass']) $er = true;
		login($er);
	}
}
}



function maintop($title,$showtop = true) {
  global $sitetitle, $lastsess, $login, $viewing, $iftop, $bgcolor1, $bgcolor2, $bgcolor3, $txtcolor1, $txtcolor2, $user, $pass, $password, $debug, $issuper, $adminfile;
  echo "<html>\n<head>\n"
      ."<title>$sitetitle :: $title</title>\n"
      ."</head>\n"
      ."<body bgcolor=\"#ffffff\">\n"
      ."<style>\n"
      ."td { font-size : 80%;font-family : tahoma;color: $txtcolor1;font-weight: 700;}\n"
      ."A:visited {color: \"$txtcolor2\";font-weight: bold;text-decoration: underline;}\n"
      ."A:hover {color: \"$txtcolor1\";font-weight: bold;text-decoration: underline;}\n"
      ."A:link {color: \"$txtcolor2\";font-weight: bold;text-decoration: underline;}\n"
      ."A:active {color: \"$bgcolor2\";font-weight: bold;text-decoration: underline;}\n"
      ."textarea {border: 1px solid $bgcolor3 ;color: black;background-color: white;}\n"
      ."input.button{border: 1px solid $bgcolor3;color: black;background-color: white;}\n"
      ."input.text{border: 1px solid $bgcolor3;color: black;background-color: white;}\n"
      ."BODY {color: $txtcolor1; FONT-SIZE: 10pt; FONT-FAMILY: Tahoma, Verdana, Arial, Helvetica, sans-serif; scrollbar-base-color: $bgcolor2; MARGIN: 0px 0px 10px; BACKGROUND-COLOR: $bgcolor1}\n"
      .".title {FONT-WEIGHT: bold; FONT-SIZE: 10pt; COLOR: #000000; TEXT-ALIGN: center; FONT-FAMILY: Verdana, Arial, Helvetica, sans-serif}\n"
      .".copyright {FONT-SIZE: 8pt; COLOR: #000000; TEXT-ALIGN: left}\n"
      .".error {FONT-SIZE: 10pt; COLOR: #AA2222; TEXT-ALIGN: left}\n"
      ."</style>\n\n";

  if ($viewing == "") {
    echo "<table cellpadding=10 cellspacing=10 bgcolor=$bgcolor1 align=center><tr><td>\n"
        ."<table cellpadding=1 cellspacing=1 bgcolor=$bgcolor2><tr><td>\n"
        ."<table cellpadding=5 cellspacing=5 bgcolor=$bgcolor1><tr><td>\n";
  } else {
    echo "<table cellpadding=7 cellspacing=7 bgcolor=$bgcolor1><tr><td>\n";
  }

  echo "<table width=\"100%\" border=\"0\" cellpadding=\"2\" cellspacing=\"0\">\n"
      ."<tr><td align=\"left\"><font face=\"Arial\" color=\"black\" size=\"4\">$sitetitle</font><font size=\"3\" color=\"black\"> :: $title</font></td>\n"
      ."<tr><td width=650 style=\"height: 1px;\" bgcolor=\"black\"></td></tr>\n";

  if ($showtop) {
    echo "<tr><td><font size=\"2\">\n"
        ."<a href=\"".$adminfile."?op=home\" $iftop>Lista de Archivos</a>\n"
        ."<img src=pixel.gif width=7 height=1><a href=\"".$adminfile."?op=up\" $iftop>Subir Archivos</a>\n"
        //."<img src=pixel.gif width=7 height=1><a href=\"".$adminfile."?op=cr\" $iftop>Create</a>\n"
        //."<img src=pixel.gif width=7 height=1><a href=\"".$adminfile."?op=logout\" $iftop>Salir</a>\n";
        ."<img src=pixel.gif width=7 height=1><a href=\"javascript:this.close();\" $iftop>Salir</a>\n";

    echo "<tr><td width=650 style=\"height: 1px;\" bgcolor=\"black\"></td></tr>\n";
  }
  echo "</table><br>\n";
}


function login($er=false) {
  global $op;
    setcookie("user","",time()-60*60*24*1);
    setcookie("pass","",time()-60*60*24*1);
    maintop("Login",false);

    if ($er) { 
		echo "<font class=error>**ERROR: Incorrect login information.**</font><br><br>\n"; 
	}

    echo "<form action=\"".$adminfile."?op=".$op."\" method=\"post\">\n"
        ."<table><tr>\n"
        ."<td><font size=\"2\">Username: </font>"
        ."<td><input type=\"text\" name=\"user\" size=\"18\" border=\"0\" class=\"text\" value=\"dejame_pasar\">\n"
        ."<tr><td><font size=\"2\">Password: </font>\n"
        ."<td><input type=\"password\" name=\"pass\" size=\"18\" border=\"0\" class=\"text\" value=\"ok_dale\">\n"
        ."<tr><td colspan=\"2\"><input type=\"submit\" name=\"submitButtonName\" value=\"Login\" border=\"0\" class=\"button\">\n"
        ."</table>\n"
        ."</form>\n";
  mainbottom();

}


function home() {
  global $folder, $tbcolor1, $tbcolor2, $tbcolor3, $filefolder, $adminfile, $HTTP_HOST;
  maintop("Inicio");
  echo "<font face=\"tahoma\" size=\"2\"><b>\n"
      ."<table border=\"0\" cellpadding=\"2\" cellspacing=\"0\" width=100%>\n";

  $content1 = "";
  $content2 = "";

  $count = "0";
  $style = opendir($folder);
  $a=1;
  $b=1;

  if ($folder) {
    if (ereg("/home/",$folder)) {
      $folderx = ereg_replace("$filefolder", "", $folder);
      $folderx = "http://".$HTTP_HOST."/".$folderx;
    } else {
      $folderx = $folder;
    } 
  }

  while($stylesheet = readdir($style)) {
    if (strlen($stylesheet)>40) { 
      $sstylesheet = substr($stylesheet,0,40)."...";
    } else {
      $sstylesheet = $stylesheet;
    }
    if ($stylesheet[0] != "." && $stylesheet[0] != ".." ) {
      if (is_dir($folder.$stylesheet) && is_readable($folder.$stylesheet)) { 
        $content1[$a] ="<td>".$sstylesheet."</td>\n"
                 ."<td> "
                 //.disk_total_space($folder.$stylesheet)." Commented out due to certain problems
                 //."<td align=\"center\"><a href=\"".$adminfile."?op=home&folder=".$folder.$stylesheet."/\">Open</a>\n"
                 //."<td align=\"center\"><a href=\"".$adminfile."?op=ren&file=".$stylesheet."&folder=$folder\">Rename</a>\n"
                 //."<td align=\"center\"><a href=\"".$adminfile."?op=del&dename=".$stylesheet."&folder=$folder\">Delete</a>\n"
                 //."<td align=\"center\"><a href=\"".$adminfile."?op=mov&file=".$stylesheet."&folder=$folder\">Move</a>\n"
                 ."<td align=\"center\"> <tr height=\"2\"><td height=\"2\" colspan=\"3\">\n";
        $a++;
      } elseif (!is_dir($folder.$stylesheet) && is_readable($folder.$stylesheet)) { 
          $filefoldervar = "media/";
          $content2[$b] ="<td><input value=\"$filefoldervar$sstylesheet\" onclick=\"select_all(this)\" name=\"url\" type=\"text\" />&nbsp;<a href=\"".$folderx.$stylesheet."\">".$sstylesheet."</a></td>\n"
                 //."<td align=\"left\"><img src=pixel.gif width=5 height=1>".filesize($folder.$stylesheet)
                 //."<td align=\"center\"><a href=\"".$adminfile."?op=edit&fename=".$stylesheet."&folder=$folder\">Edit</a>\n"
                 //."<td align=\"center\"><a href=\"".$adminfile."?op=ren&file=".$stylesheet."&folder=$folder\">Rename</a>\n"
                 //."<td align=\"center\"><a href=\"".$adminfile."?op=del&dename=".$stylesheet."&folder=$folder\">Borrar</a>\n"
                 //."<td align=\"center\"><a href=\"".$adminfile."?op=mov&file=".$stylesheet."&folder=$folder\">Move</a>\n"
                 //."<td align=\"center\"><a href=\"".$adminfile."?op=viewframe&file=".$stylesheet."&folder=$folder\">View</a>\n"
                 ."<tr height=\"2\"><td height=\"2\" colspan=\"3\">\n";
        $b++;
      } else {
        echo "Directory is unreadable\n";
      }
    $count++;
    } 
  }
  closedir($style);

  echo "Browsing: $folder\n"
       ."<br>Number of Files: " . $count . "<br><br>";

  echo "<tr bgcolor=\"$tbcolor3\" width=100%>"
      ."<td>Lista de Archivos\n"
      //."<td width=65>Tama&ntilde;o\n"
      //."<td align=\"center\" width=44>Open\n"
      //."<td align=\"center\" width=58>Rename\n"
      //."<td align=\"center\" width=57>Borrar\n"
      //."<td align=\"center\" width=40>Move\n"
      //."<td align=\"center\" width=44>View\n"
      ."<tr height=\"2\"><td height=\"2\" colspan=\"3\">\n";
	
	  
  for ($a=1; $a<count($content1)+1;$a++) {
    $tcoloring   = ($a % 2) ? $tbcolor1 : $tbcolor2;
    echo "<tr bgcolor=".$tcoloring." width=100%>";
	if($a>1){
		echo $content1[$a];
	}
  }

  for ($b=1; $b<count($content2)+1;$b++) {
    $tcoloring   = ($a++ % 2) ? $tbcolor1 : $tbcolor2;
    echo "<tr bgcolor=".$tcoloring." width=100%>";
    echo $content2[$b];
  }

  echo"</table>";
  mainbottom();
}


function up() {
  global $folder, $content, $filefolder,$adminfile;
  maintop("Upload");

  echo "<FORM ENCTYPE=\"multipart/form-data\" ACTION=\"".$adminfile."?op=upload\" METHOD=\"POST\">\n"
      ."<font face=\"tahoma\" size=\"2\"><b>File:</b></font><br><input type=\"File\" name=\"upfile\" size=\"20\" class=\"text\">\n"

      ."<br><br>Destination:<br><select name=\"ndir\" size=1>\n"
      ."<option value=\"".$filefolder."\">".$filefolder."</option>";
  listdir($filefolder);
  echo $content
      ."</select><br><br>"

      ."<input type=\"submit\" value=\"Upload\" class=\"button\">\n"
      ."</form>\n";

  mainbottom();
}


function upload($upfile, $ndir) {

  global $folder,$upfile_name;
  if (!$upfile) {
    error("Filesize too big or bytes=0");
  } elseif($upfile['name']) { 
    if(copy($upfile['tmp_name'],$ndir.$upfile['name'])) { 
      maintop("Upload");
      echo "El Archivo ".$upfile['name']." se ha subido de forma correcta!.\n";
      mainbottom();
    } else {
      printerror("Error al subir el archivo $upfile .");
    }
  } else {
    printerror("Please enter a filename.");
  }
}

function del($dename) {
  global $folder,$adminfile;
    if (!$dename == "") {
    maintop("Delete");
    echo "<table border=\"0\" cellpadding=\"2\" cellspacing=\"0\">\n"
        ."<font class=error>**AVISO: Esta opci&oacute;n Borrar&aacute; de forma permanente el archivo ".$dename.".**</font><br><br>\n"
        ."Est&aacute; seguro que quiere borrar el archivo ".$dename."?<br><br>\n"
        ."<a href=\"".$adminfile."?op=delete&dename=".$dename."&folder=$folder\">Si estoy seguro</a> | \n"
        ."<a href=\"".$adminfile."?op=home\"> No, no lo estoy.</a>\n"
        ."</table>\n";
    mainbottom();
  } else {
    home();
  }
}


function delete($dename) {
  global $folder;
  if (!$dename == "") {
    maintop("Delete");
    if (is_dir($folder.$dename)) {
      if(rmdir($folder.$dename)) {
        echo $dename." ha sido borrado.";
      } else {
        echo "Hay problemas borrando este directorio. ";
      }
    } else {
      if(unlink($folder.$dename)) {
        echo $dename." ha sido borrado.";
      } else {
        echo "Hay problemas borrando este directorio. ";
      }
    }
    mainbottom();
  } else {
    home();
  }
}


function edit($fename) {
  global $folder;
  if (!$fename == "") {
    maintop("Edit");
    echo $folder.$fename;

    echo "<form action=\"".$adminfile."?op=save\" method=\"post\">\n"
        ."<textarea cols=\"73\" rows=\"40\" name=\"ncontent\">\n";

   $handle = fopen ($folder.$fename, "r");
   $contents = "";

    while ($x<1) {
      $data = @fread ($handle, filesize ($folder.$fename));
      if (strlen($data) == 0) {
        break;
      }
      $contents .= $data;
    }
    fclose ($handle);

    $replace1 = "</text";
    $replace2 = "area>";
    $replace3 = "< / text";
    $replace4 = "area>";
    $replacea = $replace1.$replace2;
    $replaceb = $replace3.$replace4;
    $contents = ereg_replace ($replacea,$replaceb,$contents);

    echo $contents;

    echo "</textarea>\n"
        ."<br><br>\n"
        ."<input type=\"hidden\" name=\"folder\" value=\"".$folder."\">\n"
        ."<input type=\"hidden\" name=\"fename\" value=\"".$fename."\">\n"
        ."<input type=\"submit\" value=\"Edit\" class=\"button\">\n"
        ."</form>\n";
    mainbottom();
  } else {
    home();
  }
}


function save($ncontent, $fename) {
  global $folder;
  if (!$fename == "") {
    maintop("Edit");
    $loc = $folder.$fename;
    $fp = fopen($loc, "w");

    $replace1 = "</text";
    $replace2 = "area>";
    $replace3 = "< / text";
    $replace4 = "area>";
    $replacea = $replace1.$replace2;
    $replaceb = $replace3.$replace4;
    $ncontent = ereg_replace ($replaceb,$replacea,$ncontent);

    $ydata = stripslashes($ncontent);

    if(fwrite($fp, $ydata)) {
      echo "The file <a href=\"".$adminfile."?op=viewframe&file=".$fename."&folder=".$folder."\">".$folder.$fename."</a> was succesfully edited\n";
      $fp = null;
    } else {
      echo "Hay problemas editando este archivo\n";
    }
    mainbottom();
  } else {
    home();
  }
}


function cr() {
  global $folder, $content, $filefolder;
  maintop("Create");
  if (!$content == "") { echo "<br><br>Please enter a filename.\n"; }
  echo "<form action=\"".$adminfile."?op=create\" method=\"post\">\n"
      ."Filename: <br><input type=\"text\" size=\"20\" name=\"nfname\" class=\"text\"><br><br>\n"
   
      ."Destination:<br><select name=ndir size=1>\n"
      ."<option value=\"".$filefolder."\">".$filefolder."</option>";
  listdir($filefolder);
  echo $content
      ."</select><br><br>";


  echo "File <input type=\"radio\" size=\"20\" name=\"isfolder\" value=\"0\" checked><br>\n"
      ."Directory <input type=\"radio\" size=\"20\" name=\"isfolder\" value=\"1\"><br><br>\n"
      ."<input type=\"hidden\" name=\"folder\" value=\"$folder\">\n"
      ."<input type=\"submit\" value=\"Create\" class=\"button\">\n"
      ."</form>\n";
  mainbottom();
}


function create($nfname, $isfolder, $ndir) {
  global $folder;
  if (!$nfname == "") {
    maintop("Create");

    if ($isfolder == 1) {
      if(mkdir($ndir."/".$nfname, 0777)) {
        echo "Your directory, <a href=\"".$adminfile."?op=viewframe&file=".$nfname."&folder=$ndir\">".$ndir."/".$nfname."</a> was succesfully created.\n";
      } else {
        echo "The directory, ".$ndir."/".$nfname." could not be created. Check to make sure the permisions on the /files directory is set to 777\n";
      }
    } else {
      if(fopen($ndir."/".$nfname, "w")) {
        echo "Your file, <a href=\"".$adminfile."?op=viewframe&file=".$nfname."&folder=$ndir\">".$ndir.$nfname."</a> was succesfully created.\n";
      } else {
        echo "The file, ".$ndir."/".$nfname." could not be created. Check to make sure the permisions on the /files directory is set to 777\n";
      }
    }
    mainbottom();
  } else {
    cr();
  }
}

function ren($file) {
  global $folder;
  if (!$file == "") {
    maintop("Rename");
    echo "<form action=\"".$adminfile."?op=rename\" method=\"post\">\n"
        ."<table border=\"0\" cellpadding=\"2\" cellspacing=\"0\">\n"
        ."Renaming ".$folder.$file;

    echo "</table><br>\n"
        ."<input type=\"hidden\" name=\"rename\" value=\"".$file."\">\n"
        ."<input type=\"hidden\" name=\"folder\" value=\"".$folder."\">\n"
        ."New Name:<br><input class=\"text\" type=\"text\" size=\"20\" name=\"nrename\">\n"
        ."<input type=\"Submit\" value=\"Rename\" class=\"button\">\n";
    mainbottom();
  } else {
    home();
  }
}

function renam($rename, $nrename, $folder) {
  global $folder;
  if (!$rename == "") {
    maintop("Rename");
    $loc1 = "$folder".$rename; 
    $loc2 = "$folder".$nrename;

    if(rename($loc1,$loc2)) {
      echo "The file ".$folder.$rename." has been changed to <a href=\"".$adminfile."?op=viewframe&file=".$nrename."&folder=$folder\">".$folder.$nrename."</a>\n";
    } else {
      echo "There was a problem renaming this file\n";
    }
    mainbottom();
  } else {
    home();
  }
}

function listdir($dir, $level_count = 0) {
  global $content;
    if (!@($thisdir = opendir($dir))) { return; }
    while ($item = readdir($thisdir) ) {
      if (is_dir("$dir/$item") && (substr("$item", 0, 1) != '.')) {
        listdir("$dir/$item", $level_count + 1);
      }
    }
    if ($level_count > 0) {
      $dir = ereg_replace("[/][/]", "/", $dir);
      $content .= "<option value=\"".$dir."/\">".$dir."/</option>";
    }
}

function mov($file) {
  global $folder, $content, $filefolder;
  if (!$file == "") {
    maintop("Move");
    echo "<form action=\"".$adminfile."?op=move\" method=\"post\">\n"
        ."<table border=\"0\" cellpadding=\"2\" cellspacing=\"0\">\n"
        ."Move ".$folder.$file." to:\n"
        ."<select name=ndir size=1>\n"
        ."<option value=\"".$filefolder."\">".$filefolder."</option>";
    listdir($filefolder);
    echo $content
        ."</select>"
        ."</table><br><input type=\"hidden\" name=\"file\" value=\"".$file."\">\n"
        ."<input type=\"hidden\" name=\"folder\" value=\"".$folder."\">\n" 
        ."<input type=\"Submit\" value=\"Move\" class=\"button\">\n";
    mainbottom();
  } else {
    home();
  }
}
function move($file, $ndir, $folder) {
  global $folder;
  if (!$file == "") {
    maintop("Move");
    if (rename($folder.$file, $ndir.$file)) {
      echo $folder.$file." has been succesfully moved to ".$ndir.$file;
    } else {
      echo "There was an error moving ".$folder.$file;
    }
    mainbottom();
  } else {
    home();
  }
}

function viewframe($file) {
  global $sitetitle, $folder, $HTTP_HOST, $filefolder;  
  if ($filefolder == "/") {
    $error="**ERROR: You selected to view $file but your home directory is /.**";
    printerror($error);
    die();
  } elseif (ereg("/home/",$folder)) {
    $folderx = ereg_replace("$filefolder", "", $folder);
    $folder = "http://".$HTTP_HOST."/".$folderx;
  }
  echo "<html>\n"
      ."<head>\n"
      ."<title>$sitetitle :: Viewing file - $file</title>\n"
      ."</head>\n\n"
      ."<frameset rows=\"85,*\" frameborder=\"no\">\n"
      ."<frame name=\"top\" noresize src=\"".$adminfile."?op=viewtop&file=$file\" scrolling=\"no\">\n"
      ."<frame name=\"content\" noresize src=\"".$folder.$file."\">\n"
      ."</frameset>\n\n"

      ."<body>\n"
      ."</body>\n"
      ."</html>\n";
}

function viewtop($file) {
  global $viewing, $iftop;
  $viewing = "yes";
  $iftop = "target=_top";
  maintop("Viewing file - $file");
}

function logout() {
  global $login,$adminfile;
  setcookie("user","",time()-60*60*24*1);
  setcookie("pass","",time()-60*60*24*1);

  maintop("Salir",false);
  echo "Ok tu has salido del Manejador de Archivos!."
      ."<br><br>"
      ."<a href=".$adminfile."?op=home>Click Aqu&iacute; para volver a Ingresar...</a>";
  mainbottom();
}


function mainbottom() {
  echo "</table></table>\n"
      ."<table width=100%><tr><td align=right><font class=copyright></font></table>\n"
      ."</table></table></body>\n"
      ."</html>\n";
  exit;
}

function printerror($error) {
  maintop("ERROR");
  echo "<font class=error>\n".$error."\n</font>";
  mainbottom();
}

switch($op) {

    case "home":
	home();
	break;

    case "up":
	up();
	break;

    case "upload":
	upload($_FILES['upfile'], $_REQUEST['ndir']);
	break;

    case "del":
	del($_REQUEST['dename']);
	break;

    case "delete":
	delete($_REQUEST['dename']);
	break;

    case "edit":
	edit($_REQUEST['fename']);
	break;

    case "save":
	save($_REQUEST['ncontent'], $_REQUEST['fename']);
	break;

    case "cr":
	cr();
	break;

    case "create":
	create($_REQUEST['nfname'], $_REQUEST['isfolder'], $_REQUEST['ndir']);
	break;

    case "ren":
	ren($_REQUEST['file']);
	break;

    case "rename":
	renam($_REQUEST['rename'], $_REQUEST['nrename'], $folder);
	break;

    case "mov":
	mov($_REQUEST['file']);
	break;

    case "move":
	move($_REQUEST['file'], $_REQUEST['ndir'], $folder);
	break;

    case "viewframe":
	viewframe($_REQUEST['file']);
	break;

    case "viewtop":
	viewtop($_REQUEST['file']);
	break;

    case "printerror":
	printerror($error);
	break;

    case "logout":
	logout();
	break;

    default:
	home();
	break;
}
?>