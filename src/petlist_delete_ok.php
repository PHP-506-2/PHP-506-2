<?php

include_once( "./common/define.php" );
include_once( URL_DB );

$arr_get = $_GET;

pet_list_delete( $arr_get ); // $_GET으로 받아온 정보(list_no)를 사용, 글 삭제

header( "Location: petlist_list.php" ); // 처리 후 리스트 페이지로 이동
exit();

?>