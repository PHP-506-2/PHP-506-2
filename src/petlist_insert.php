<?php

include_once( "./common/define.php" );
include_once( URL_DB );

$http_method = $_SERVER["REQUEST_METHOD"];
if ( $http_method === "POST" ) {
    $arr_post = $_POST; 
    pet_list_insert( $arr_post ); // $_POST로 받아온 정보를 사용, pet_list_insert 함수를 호출
    $list_no = pet_list_listno_inquiry(); // pet_list_listno_inquiry 함수(가장 최신글 번호 조회)를 $list_no 변수에 담음
    header( "Location: petlist_detail.php?list_no=$list_no" ); // 작성완료 후, 상세 페이지로 이동
    exit();
}

?>

<!DOCTYPE html>
<html lang="ko">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="../css/common.css">
        <link rel="stylesheet" href="../css/petlist_insert.css">
        <link rel="stylesheet" href="../css/pet_profile_bar.css">
        <title>pet to do list</title>
        <link rel="icon" type="image/png" sizes="16x16" href="../img/favi.jpg">
        <link rel="manifest" href="/manifest.json">
        <meta name="msapplication-TileColor" content="#ffffff">
        <meta name="msapplication-TileImage" content="/ms-icon-144x144.png">
        <meta name="theme-color" content="#ffffff">
    </head>
<body>
    <div class="petlist_main_border ">
    <? include_once( URL_HEADER ); ?> <!-- 헤더 -->
    <h1><?php pet_list_print_pet_name() ?></h1> <!-- 반려동물 이름' to do list 출력 -->
    <div class="petlist_contents_container">
        <br>
            <!-- 정보 입력 부분 -->
            <form action="petlist_insert.php" method="post" class="contents">
                <select name="list_comp_flg" id="list_comp_flg">
                    <option value="0">진행 예정</option>
                    <option value="1">진행 중</option>
                    <option value="2">진행 완료</option>
                </select>
                <br>
                <label class="label_title" for="title">제목 : </label>
                <input class="input_title" type="text" name="list_title" id="title" maxlength="100" placeholder="제목을 입력하세요." required>
                <br>
                <label for="start_time">시작일자 : </label>
                <input type="datetime-local" name="list_start" id="start_time" required>
                <br>
                <label for="end_time">기한일자 : </label>
                <input type="datetime-local" name="list_end" id="end_time" required>
                <br>
                <label for="location" class="margin-bottom">장소 : </label>
                <input type="text" name="list_location" id="location" maxlength="100" placeholder="장소를 입력하세요." required>
                <br>
                <label for="contents" class="contents_1">내용 : </label>
                <textarea class="input_contents contents_1" name="list_contents" id="contents" maxlength="250" placeholder="내용을 입력하세요." cols="70" rows="15" required></textarea>
                <br>
                <!-- 버튼 부분 -->
                <div class="insert_btns">
                    <button type="submit" class="petbutton">
                        <a class="submit_btn">작성 하기
                    </button>
                    <a class="petbutton" href="petlist_list.php">취소 하기</a>
                </div>
            </form>
        </div>
    </div>
</body>
</html>