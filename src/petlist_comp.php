<?php
//udt
include_once( "./common/define.php" );
include_once( URL_DB );


$arr_get = $_GET;

$result_udt = petlist_complete($arr_get["list_no"]);
header( "Location: petlist_list.php" );
exit();
?>