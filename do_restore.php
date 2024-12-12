<?
include_once("software.php");
include_once("backuprestore.php");

$obj=new Backuprestoresql();
$obj->restoreSql('curr_bk.sql.gz');
?>