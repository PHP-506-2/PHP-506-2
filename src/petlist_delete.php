<?php

include_once( "./common/define.php" );
include_once( URL_DB );

$arr_get = $_GET; // 0419 add 이동호
$result = petlist_detail( $arr_get['list_no'] ); // 삭제할 글 정보 출력

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
        <?include_once( URL_HEADER );?> <!-- 헤더 -->
        <div>
            <h1><?php pet_list_print_pet_name() ?></h1> <!-- 반려동물 이름' to do list 출력 -->
            <br>
            <br>
            <div class="container petlist_contents_container"> <!-- 내용 출력 -->
            <br>
                <div class="pettodobutton dday">
                    <?php d_day_count( $result["list_end"] ) ?> <!-- D - day 출력 -->
                </div>
                <span class="pettodobutton progress">
                    <?php progress( $result["list_comp_flg"] ) ?> <!-- 진행상황 출력 -->
                </span>
                <br>
                <br>
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
                <div class="del_btns"> 
                    <p> <!-- 경고 메세지 -->
                        정보를 완전히 삭제합니다.
                        <br>
                        동의 하시면 삭제를 눌러주세요.
                    </p>
                    <br> <!-- 버튼 -->
                    <a class="petbutton" href="petlist_detail.php?list_no=<?php echo $arr_get['list_no'] ?>">취소 하기</a>
                    <a class="petbutton" href="petlist_delete_ok.php?list_no=<?php echo $arr_get['list_no'] ?>">삭제 완료</a>
                </div>
            </div>
        </div>
    </div>
</body>
</html>