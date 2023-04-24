
<?php
    include_once( "./common/define.php" );
    include_once( URL_DB );
    
    $result_pet_list_list = pet_list_list();

    // pet정보 테이블 전체 정보 획득
    $a = 1; //함수가 pet_info( &$param_arr )라서 pet_no = 1의 값을 가져오기 위해
    $result_pet_info = pet_info( $a ); //숫자 넣으면 error
    
    //pet_profile_bar.php의 설정 불러오기
    $arr
    = array(
        "pet_no" => 1
    );
    $ee = pet_info($arr["pet_no"]);
    
//dday정보에따라 바뀌는 상세 페이지
    $dday_get = $_GET;

    if( array_key_exists("d_day_num",$_GET ))
    {
        $d_day_num = $_GET["d_day_num"];
    }
    else {
        $d_day_num = 1; //처음접속시 $_GET값이 없으니까 1페이지로
    }

    $arr_prepare =
    array(
        "d_day_num" => $d_day_num
    );

    $result_dday_paging = pet_list_print_ddaylist( $arr_prepare );



    // 페이징 기능을 위한 쿼리--------------------------------------------
        // $arr_get = $_GET;
        
        // $limit_num = 8;
        
        // list 테이블 전체 카운트 획득
        // $listallcnt = pet_list_listcnt();
        // echo $listallcnt;
        
        // max page number
        // $max_page_num = ceil( (int)$listallcnt / $limit_num ); 
        // echo $max_page_num;
    
        // if( array_key_exists("page_num",$_GET )) //array_key_exists("page_num",$_GET ) = $_GET 값이 있으면
        // {
            // $page_num = $_GET["page_num"];
        // }
        // else {
            // $page_num = 1; //처음접속시 $_GET값이 없으니까 1페이지로
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
        // $result_paging = pet_list_listpaging( $arr_prepare ); //
    // ----------------------------------------------------------------

    // 데이터를 오름차순(ASC)이나 내림차순(DESC)으로 정렬
?>

<!DOCTYPE html>
<html lang="ko">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/common.css">
    <link rel="stylesheet" href="../css/petlist_delete.css">
    <link rel="stylesheet" href="../css/pet_profile_bar.css">
    <title>Document</title>
</head>
<body>
    <div class="petlist_main_border">
        <div class="petlist_profile_container">
            <? include_once( URL_HEADER ); ?>
            <?php
            include_once 'pet_profile_bar.php';
            ?> 
        </div>

        <h1><?pet_list_print_pet_name()?></h1>

        <div class="petlist_contents_container">
        <?php
            foreach ( $result_paging as $val ) {
        ?>
            <li>
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
                        else if ( $val["list_comp_flg"] === 3 ) //리스트 기간만료 취소선
                        {
                    ?>
                            <span class="todo_item title list_cancel_line">
                                <a href="petlist_detail.php?list_no=<?php echo $val['list_no'] ?>"><?php echo $val['list_title'] ?></a>
                            </span>
                    <?
                        }
                        else {
                    ?>

                <!-- 제목표시의 오류가 빈번함 -->
                    <span class="todo_item title">
                        <a href="petlist_detail.php?list_no=<?php echo $val['list_no'] ?>"><?php echo $val['list_title'] ?></a>
                    </span>
                    <!-- <button class="delBtn">x</button> -->
                    <?
                        }
                    ?>
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
                            else
                            {
                                echo "진행 완료";
                            }
                            ?>
                    </span>
                </li>
                <?php
                    }
                ?>
            </ul>

<?
            try {
    $to_date = date("Y-m-d");
    $end_date = substr($result_pet_list_list['list_end'], 0 , 10 );
    $interval = $end_date->diff($to_date);
    print_r($interval);
    echo $interval->format('%R%a DAY');
    }
    catch (Exception $e){
    echo $e;
    }

?>
</body>
</html>