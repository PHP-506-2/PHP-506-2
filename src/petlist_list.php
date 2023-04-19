<?
    include_once( "./common/define.php" );
    include_once( URL_DB );
    include_once( URL_HEADER );
    // include_once( "C:/Apache24/htdocs/PHP-506-2-2/src/common/db_common.php" );

    // list 테이블 전체 정보 획득
    $result_list = pet_list_list();
    // var_dump(pet_list_list());

    // pet정보 테이블 전체 정보 획득
    $a = 1; //함수가 pet_info( &$param_arr )라서 pet_no = 1의 값을 가져오기 위해
    $result_pet_info = pet_info( $a ); //숫자 넣으면 error
    
    // $arr_get = $_GET;

    // $limit_num = 5;

    // list 테이블 전체 카운트 획득
    // $listallcnt = pet_list_listcnt();
    // echo $listallcnt;
    
    // max page number
    // $max_page_num = ceil( (int)$listallcnt / $limit_num ); 
    // echo $max_page_num;

    // if( array_key_exists("page_num",$_GET )) //array_key_exists("page_num",$_GET ) = $_GET 값이 있으면
    // {
    //     $page_num = $_GET["page_num"];
    // }
    // else {
    //     $page_num = 1; //처음접속시 $_GET값이 없으니까 1페이지로
    // }

    // offset (1페이지일때 0,2페이지일때 5,3페이지 일때 10 ...)
    // $page_num = 2;
    // $offset_num = ($page_num * $limit_num)-$limit_num;
    // echo $offset_num ;

    // $arr_prepare =
    // array(
    //     "limit_num" => $limit_num
    //     ,"offset"   => $offset_num 
    // );

	// 페이징용 데이터 검색
    // $result_paging = select_board_info_paging( $arr_prepare );
    // print_r( $result_cnt );
    // print_r( $limit_num );
    // print_r( $max_page_num );
?>

<!DOCTYPE html>
<html lang="ko">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>pet_todolist</title>
    <style>
        *
        {
            padding: 0;
            margin: 0;
        }
        li
        {
            list-style-type: none;
        }
        .petlist_container
        {

            border: 1px solid black;
            border-radius: 20px;
            margin: auto;
            background-color: aqua;
            width: 90%;
            height: 80%;
        }
        .petlist_profile_container
        {
            background-color: antiquewhite;
            display: inline-block;
            width: 20%;
            position: absolute;
            top: 0%;
            left: 0%;
        }
        .petlist_list_container
        {
            background-color: rgb(250, 255, 240);
            display: inline-block;
            width: 80%;
            position: absolute;
            top: 0%;
            right: 0%;
        }
        .todo_item
        {
            /* display: grid;
            background-color: white;
            grid-template-rows: 10% 50% 20% 20%; */
            display: inline-block;
        }

    </style>
</head>
<body>
    <div class="petlist_container">

        <div class="petlist_profile_container">
            <p>프로필와여</p>
        </div>

        <div class="petlist_list_container">
            <h1><?php echo $result_pet_info['pet_name']; ?>의 TO DO LIST</h1>
            <!-- **부분은 사용자 지정 이름으로 교체될 예정 -->

            <div class="button petlist_list_insert"><a href="petlist_insert.php">+ 새로 작성하기</a></div>
            <!-- 리스트 아이템 -->
            <ul class="petlist_list_item_container">
                <?php
                    foreach ( $result_list as $val ) // $result_list = pet_list_list() 의 배열값을 $val로 가져와서 배열값만큼 돌림
                    { 
                ?>
                <li>
                <!-- 체크박스 이미지로 할지 체크박스 기능으로 할지 -->
                    <div class="todo_item checkbox">□</div>
                <!-- 제목표시의 오류가 빈번함 -->
                    <div class="todo_item title"><a href="petlist_detail.php"><?php echo $val['list_title'] ?></a></div>
                    <!-- <button class="delBtn">x</button> -->
                <!-- DAY-* 표시 -->
                    <div class="todo_item dday">
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
                    </div>
                <!-- 진행상황표시 -->
                    <div class="todo_item ">
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
                    </div>
                </li>
                <?php
                    }
                ?>
            </ul>

            <!-- 페이징 번호 -->
            <?php
                // for ($i = 1; $i <= $max_page_num ; $i++)
                // { 
            ?>
                    <!-- <a class="btn btn-outline-dark" href='board_list.php?page_num=<?php //echo $i ?> '> -->
                        <!-- <?php //echo $i ?>  -->
                    <!-- </a> -->
            <?php
                // }
            ?>
            
        </div>
    </div>
</body>
</html>