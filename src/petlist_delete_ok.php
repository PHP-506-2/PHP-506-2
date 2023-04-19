<?php
    include_once( "./common/define.php" );
    include_once( URL_DB );


// $arr_post = $_GET;
// var_dump( $arr_post );
// pet_list_delete( $arr_post["list_no"] );
$arr_post = array("list_no" => 14); // 임시지정
pet_list_delete( $arr_post );

header( "Location: " ); // 리스트 페이지 경로 추가 예정
exit();

?>