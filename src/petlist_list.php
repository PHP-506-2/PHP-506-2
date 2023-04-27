<?php
    include_once( "./common/define.php" );
    include_once( URL_DB );
    // include_once( URL_HEADER );
    // include_once( "C:/Apache24/htdocs/PHP-506-2-2/src/common/db_common.php" );
    
    // list 테이블 전체 정보 획득
    // $result_pet_list_list = pet_list_list();   //0420 del_$result_paging랑 중복 필요없음!! 
    // var_dump(pet_list_list());
    
    // pet정보 테이블 전체 정보 획득
    $result_pet_info = pet_info();
    
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
        
        // offset (1페이지일때 0,2페이지일때 8,3페이지 일때 16 ...)
        // $page_num = 2; //TEST
        $offset_num = ($page_num * $limit_num)-$limit_num;
        // echo $offset_num ;
        
        $arr_prepare =
        array(
            "limit_num" => $limit_num
            ,"offset"   => $offset_num 
        );
        
        // 페이징용 데이터 검색
        $result_paging = pet_list_listpaging( $arr_prepare ); 
    // ----------------------------------------------------------------

    // 데이터를 오름차순(ASC)이나 내림차순(DESC)으로 정렬
?>

<!DOCTYPE html>
<html lang="ko">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>pet to do list</title>
        <!-- 파비콘 -->
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
            <? 
            include_once( URL_HEADER ); 
            include_once 'pet_profile_bar.php';     //프로필바 php 가져옴_회면의 좌측부분
            ?>
        </div>

        <h1><? if (  isset($result_pet_info) ) {    //if $result_pet_info가 있을경우 
                    echo pet_list_print_pet_name(); //함수 pet_list_print_pet_name의 반려동물 이름
                }  
                else {
                    echo "pet 정보 없음";
                } ?>
        </h1>      <!-- 사용자 지정 이름으로 변경가능한 반려동물 이름함수 사용 -->

        <div class="petlist_contents_container">
            <a class="petlist_list_insertpagebutton" href="petlist_insert.php">+ 새로 작성하기</a>

            <!-- 리스트 아이템 -->
            <ul class="petlist_list_item_container">
                <?php
                    foreach ( $result_paging as $val ) {        // $result_list = pet_list_list() 의 배열값을 $val로 가져와서 배열값만큼 돌림
                ?>

                    <li>
                    <!-- 체크박스 이미지 -->
                        <?
                            if ( $val["list_comp_flg"] === 0 || $val["list_comp_flg"] === 1 ) 
                            {
                        ?>
                            <img src="../img/checkbox.png" alt="no_checked" class="check_img">
                        <?
                            }
                            else {
                        ?>
                            <img src="../img/checkbox_check.png" alt="checked" class="check_img">
                        <?
                            }
                        ?>

                        <?php
                    // 리스트 마감임박 하이라이트(.list_highlight) : end날짜 정보를 불러와서 d-1 일때 ( = 오늘날짜 +1 = end날짜 일때 )
                    // 리스트 수행완료 취소선(.list_cancel_line) : $val["list_comp_flg"] === 2 인 진행 완료 리스트 취소선
                            if ( $val["list_comp_flg"] === 2 ) //리스트 수행완료 취소선
                            {
                        ?>
                            <span class="todo_item title list_cancel_line">
                                <a href="petlist_detail.php?list_no=<?php echo $val['list_no'] ?>"><?php echo $val['list_title'] ?></a>
                            </span>
                        <?
                            }
                            else if ( substr($val['list_end'], 0 , 10 ) ===  date("Y-m-d", strtotime("+1 day", strtotime(date("Y-m-d"))))) //리스트 마감임박 하이라이트
                            {
                        ?>
                            <span class="todo_item title">
                                <a class="list_highlight" href="petlist_detail.php?list_no=<?php echo $val['list_no'] ?>"><?php echo $val['list_title'] ?></a>
                            </span>
                        <?
                            }
                            else {
                        ?>

                    <!-- 제목표시 -->
                        <span class="todo_item title">
                            <a href="petlist_detail.php?list_no=<?php echo $val['list_no'] ?>"><?php echo $val['list_title'] ?></a>
                        </span>
                        <?
                            }
                        ?>
                    <!-- DAY-* 표시 -->
                    <? if ( $val["list_comp_flg"] != 2 ) { // 진행 완료 시 D - Day 표시 삭제
                    ?>
                        <span class="pettodobutton todo_item dday">
                            <?php d_day_count( $val["list_end"] ) ?>
                        </span>
                    <?
                        }
                    ?>

                    <!-- 진행상황표시 -->
                        <span class="pettodobutton todo_item progress">
                            <?php progress( $val["list_comp_flg"] ) ?>
                        </span>
                    </li>
                <?php
                    } //foreach close
                ?>
            </ul>
        </div>     
        <!-- 페이징 번호 -->
        <div class="petlist_list_bottom">
            <div class="paging_bar">
                <a class="paging_bar paging_number" href='petlist_list.php?page_num=<?php echo 1 ?> '>
                    <?php echo "처음으로" ?> 
                <?php 
                if ($page_num > 1)
                {
                    ?>
                <a class="paging_bar paging_number" href='petlist_list.php?page_num=<?php echo $page_num - 1 ?> '>
                <?php echo "앞으로"?> 
                </a>
                <?php
                } else{ ?>
                    <a class="paging_bar paging_number hidden " href='petlist_list.php?page_num=<?php echo $page_num + 1?> '>
                    <?php echo "앞으로"?> 
                    </a><?php
                }
                ?>
                <?php
                    for ($i = 1; $i <= $max_page_num ; $i++)
                    { 
                ?>
                    </a>
                    <a class="paging_bar paging_number" href='petlist_list.php?page_num=<?php echo $i ?> '>
                        <?php echo $i?> 
                    </a>
                <?php
                    }
                ?>
            <?php 
                if ($page_num < $max_page_num)
                {
                    ?>
                <a class="paging_bar paging_number" href='petlist_list.php?page_num=<?php echo $page_num + 1?> '>
                <?php echo "뒤로"?> 
                </a>
                <?php
                }else{?>
                    <a class="paging_bar paging_number hidden " href='petlist_list.php?page_num=<?php echo $page_num + 1?> '>
                    <?php echo "뒤로"?> 
                    </a><?php
                }
                ?>
                <a class="paging_bar paging_number" href='petlist_list.php?page_num=<?php echo $max_page_num ?> '>
                <?php echo "마지막으로" ?> 
            </div>    <!-- class petlist_list_bottom 부분마침  -->
        </div>        <!-- class petlist_contents_container 부분마침 -->
    </div>            <!-- class petlist_main_border 부분마침 -->
</body>
</html>