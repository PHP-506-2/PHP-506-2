
<?php
    include_once( "./common/define.php" );
    include_once( URL_DB );
    
    // pet정보 테이블 전체 정보 획득
    $a = 1; //함수가 pet_info( &$param_arr )라서 pet_no = 1의 값을 가져오기 위해
    $result_pet_info = pet_info( $a ); //숫자 넣으면 error
    
    //pet_profile_bar.php의 설정 불러오기
    $arr
    = array(
        "pet_no" => 1
    );
    $ee = pet_info($arr["pet_no"]);
    
    // 페이징 기능을 위한 쿼리--------------------------------------------
        $arr_get = $_GET;
        
        $limit_num = 8;
        
        // list 테이블 전체 카운트 획득
        $listallcnt = pet_list_listcnt();
        // echo $listallcnt;
        
        // max page number
        $max_page_num = ceil( (int)$listallcnt / $limit_num ); 
        // echo $max_page_num;
    
        if( array_key_exists("page_num",$_GET )) //array_key_exists("page_num",$_GET ) = $_GET 값이 있으면
        {
            $page_num = $_GET["page_num"];
        }
        else {
            $page_num = 1; //처음접속시 $_GET값이 없으니까 1페이지로
        }
        
        // offset (1페이지일때 0,2페이지일때 5,3페이지 일때 10 ...)
        // $page_num = 2;
        $offset_num = ($page_num * $limit_num)-$limit_num;
        // echo $offset_num ;
        
        $arr_prepare =
        array(
            "limit_num" => $limit_num
            ,"offset"   => $offset_num 
        );
        
        // 페이징용 데이터 검색
        $result_paging = pet_list_listpaging( $arr_prepare ); //
    // ----------------------------------------------------------------

    // 데이터를 오름차순(ASC)이나 내림차순(DESC)으로 정렬
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    
</body>
</html>