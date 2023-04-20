<?php
    include_once( "./common/define.php" );
    include_once( URL_DB );
    // include_once( URL_HEADER );
    // include_once( "C:/Apache24/htdocs/PHP-506-2-2/src/common/db_common.php" );
    
    // list 테이블 전체 정보 획득
    $result_pet_list_list = pet_list_list();   //0420 del_$result_paging랑 중복 필요없음!! 
    // var_dump(pet_list_list());
    
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
        
        $limit_num = 5;
        
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
<html lang="ko">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>pet_todolist</title>
        <link rel="icon" type="image/png" sizes="32x32" href="../img/favi.jpg">
        <link rel="icon" type="image/png" sizes="96x96" href="../img/favi.jpg">
        <link rel="icon" type="image/png" sizes="16x16" href="../img/favi.jpg">
        <link rel="manifest" href="/manifest.json">
        <meta name="msapplication-TileColor" content="#FFFFFF">
        <meta name="msapplication-TileImage" content="/ms-icon-144x144.png">
        <meta name="theme-color" content="#FFFFFF">
    <link rel="stylesheet" href="../css/common.css">
    <link rel="stylesheet" href="../css/petlist_list.css">
    <link rel="stylesheet" href="../css/pet_profile_bar.css">
</head>
<body>
    <div class="petlist_main_border">   <!-- common.css의 전체contents부분의 border 통일부분 -->
        <div class="petlist_profile_container">     <!-- 보기쉽게 프로필 부분을 묶음 -->
            <? include_once( URL_HEADER ); ?>       
            <?php
            include_once 'pet_profile_bar.php';     //프로필바 php 가져옴_회면의 좌측부분
            ?> 
        </div>
        <div class="petlist_contents_container">
            <h1><?pet_list_print_pet_name()?></h1>      <!-- 사용자 지정 이름으로 변경가능한 반려동물 이름함수 사용 -->
            <a class="petlist_list_insertpagebutton" href="petlist_insert.php">+ 새로 작성하기</a>

            <!-- 리스트 아이템 -->
            <ul class="petlist_list_item_container">
                <?php
                    foreach ( $result_paging as $val ) {// $result_list = pet_list_list() 의 배열값을 $val로 가져와서 배열값만큼 돌림
                ?>
                <li>
                    <!-- 체크박스 이미지로 할지 체크박스 기능으로 할지 -->
                    <span class="todo_item checkbox">☆</span>

                    <!-- 제목표시의 오류가 빈번함 -->
                    <span class="todo_item title"><a href="petlist_detail.php?list_no=<?php echo $val['list_no'] ?>"><?php echo $val['list_title'] ?></a></span>
                    <!-- <button class="delBtn">x</button> -->

                <!-- DAY-* 표시 -->
                    <span class="pettodobutton todo_item dday">
                        <?php
                        // substr( string, start [, length ] )
                        $end_date = substr($val['list_end'], 0 , 10 );
                        $to_date = date("Y-m-d");
                        if ( $end_date < $to_date ) 
                        {
                            $ddy = floor((strtotime($end_date) - strtotime(date('Y-m-d'))) / 86400);
                            echo "DAY + ".mb_substr($ddy, 1);
                        } 
                        else if ( $end_date === $to_date ) 
                        {
                            echo  "D - Day";
                        } 
                        else 
                        {
                            $ddy = ( strtotime($end_date) - strtotime($to_date) ) / 86400;
                            echo "DAY - ".$ddy;
                        }
                        ?>
                    </span>

                <!-- 진행상황표시 -->
                    <span class="pettodobutton todo_item progress">
                        <?php 
                            if ( $val["list_comp_flg"] === 0 )
                            {
                                echo "진행 예정";
                            }
                            else if ( $val["list_comp_flg"] === 1 )
                            {
                                echo "진행 중";
                            }
                            else if ( $val["list_comp_flg"] === 2 )
                            {
                                echo "진행 완료";
                            }
                            else if ( $val["list_comp_flg"] === 3 )
                            {
                                echo "기간 만료";
                            }
                            ?>
                    </span>
                </li>
                <?php
                    }
                ?>
            </ul>
            
        <!-- 페이징 번호 -->
            <div class="petlist_list_bottom">
            <!-- ◀ 앞페이지로 -->
            <!-- <div class="page_bar back">
                <?php
                    //if ( $page_num > 1 ) {
                ?>
                    
                <?php
                    //}
                ?>
            </div> -->

            <div class="paging_bar">
                <?php
                    for ($i = 1; $i <= $max_page_num ; $i++)
                    { 
                ?>
                    <a class="paging_bar paging_number" href='petlist_list.php?page_num=<?php echo $i ?> '>
                        <?php echo $i?> 
                    </a>
                <?php
                    }
                ?>
            </div>

            <!-- ▶ 뒷페이지로 -->
            <!-- <div class="page_bar back">
                <?php
                    //if ( $page_num > 1 ) {
                ?>
                    
                <?php
                    //}
                ?>
            </div> -->
        </div>
        <!-- class petlist_contents_container 부분마침 -->
    </div>
    <!-- class petlist_main_border 부분마침 -->

    <!-- <p>test</p> -->
    <!-- <ul>
        <li> -->
            <?
            // foreach ($result_pet_list_list as $value) {
            //     pet_list_print_list()
            // };
            
            ?>
        <!-- </li>
    </ul> -->
</body>
</html>
