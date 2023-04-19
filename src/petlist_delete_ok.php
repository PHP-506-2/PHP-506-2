<?php

include_once( "./common/define.php" );
include_once( URL_DB );

$arr_get = $_GET;

pet_list_delete( $arr_get );

header( "Location: petlist_list.php" );
exit();

?>