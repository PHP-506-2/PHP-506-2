<?php
//udt
define( "DOC_ROOT", $_SERVER["DOCUMENT_ROOT"]."/" );
define( "URL_DB", DOC_ROOT."PHP-506-2/src/common/db_common.php" ); 
include_once( URL_DB );

$arr_get = $_GET;
var_dump($arr_get);

$result_udt = petlist_complete($arr_get["list_no"]);
header( "Location: petlist_list.php" );
exit();
?>