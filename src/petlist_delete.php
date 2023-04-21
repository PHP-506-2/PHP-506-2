<?php
    include_once( "./common/define.php" );
    include_once( URL_DB );
    // include_once( URL_HEADER );

    $arr_get = $_GET; // 0419 add 이동호
    $list_no = $arr_get['list_no'];
    $result = petlist_detail( $arr_get['list_no'] );
    // if ( $result["list_comp_flg"] === 0 ) 
    // {
    //     echo "진행 예정";
    // } 
    // else if ( $result["list_comp_flg"] === 1 ) 
    // {
    //     echo "진행 중";
    // } 
    // else if ( $result["list_comp_flg"] === 2 ) 
    // {
    //     echo "진행 완료";
    // } 
    // else if ( $result["list_comp_flg"] === 3 ) 
    // {
    //     echo "기간 만료";
    // } 

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
    <title>pet to do list</title>
    <link rel="icon" type="image/png" sizes="16x16" href="../img/favi.jpg">
    <link rel="manifest" href="/manifest.json">
    <meta name="msapplication-TileColor" content="#ffffff">
    <meta name="msapplication-TileImage" content="/ms-icon-144x144.png">
    <meta name="theme-color" content="#ffffff">
</head>
<body>
    <div class="petlist_main_border">
        <?include_once( URL_HEADER );?>
        <div>
            <h1><?php pet_list_print_pet_name() ?></h1><br><br>
            <div class="container petlist_contents_container"> <!-- 내용 출력 -->
            <br>
                <div class="pettodobutton dday"><?php $end_date = substr( $result["list_end"], 0 , 10 ); $to_date = date("Y-m-d"); if ( $end_date < $to_date ) { $ddy = floor((strtotime($end_date) - strtotime(date('Y-m-d'))) / 86400); echo "DAY + ".mb_substr($ddy, 1); } else if ( $end_date === $to_date ) { echo  "D - Day"; } else { $ddy = ( strtotime($end_date) - strtotime($to_date) ) / 86400; echo "DAY - ".$ddy; } ?>
                </div>
                <span class="pettodobutton progress"><?php if ( $result["list_comp_flg"] === 0 ) { echo "진행 예정"; } else if ( $result["list_comp_flg"] === 1 ) { echo "진행 중"; } else { echo "진행 완료"; }  ?></span>
                <br><br>
                <div>제목 : <?php echo $result["list_title"] ?></div>
                <br>
                <div>시작일자 : <?php echo $result["list_start"] ?></div>
                <br>
                <div>기한일자 : <?php echo $result["list_end"] ?></div>
                <br>
                <div>장소 : <?php echo $result["list_location"] ?></div>
                <br>
                <div>내용 : <?php echo $result["list_contents"] ?></div>
                <br>
                <div> <!-- 경고 메세지 -->
                    정보를 완전히 삭제합니다.
                    <br>
                    동의 하시면 삭제를 눌러주세요.
                </div>
                <br>
                <div class="del_btns"> <!-- 버튼 -->
                    <a class="petbutton" href="petlist_detail.php?list_no=<?php echo $arr_get['list_no'] ?>">취소 하기</a>
                    <a class="petbutton" href="petlist_delete_ok.php?list_no=<?php echo $arr_get['list_no'] ?>">삭제 완료</a>
                </div>
            </div>
        </div>
    </div>
</body>
</html>