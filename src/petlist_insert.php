<?php
    include_once( "./common/define.php" );
    include_once( URL_DB );
    
    $http_method = $_SERVER["REQUEST_METHOD"];
    
    // -------------------------------------------------------
    if ( $http_method === "POST" ) {
        $arr_post = $_POST;
        pet_list_insert( $arr_post );
        $list_no = pet_list_listno_inquiry();
        header( "Location: petlist_detail.php?list_no=$list_no" ); 
        exit();
    }
    // -------------------------------------------------------
    ?>

<!DOCTYPE html>
<html lang="ko">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="../css/common.css">
        <link rel="stylesheet" href="./css/pet_insert.css">
        <title>petlist_insert</title>
    </head>
<body>
    <div class="petlist_main_border">
    <? include_once( URL_HEADER ); ?>
        <form action="petlist_insert.php" method="post" class="contents">
            <select name="list_comp_flg" id="list_comp_flg">
                <option value="0">진행 예정</option>
                <option value="1">진행 중</option>
                <option value="2">진행 완료</option>
                <option value="3">기간 만료</option>
            </select>
            <br>
            <label class="label_title" for="title">제목</label>
            <input class="input_title" type="text" maxlength="100" name="list_title" id="title" placeholder="제목을 입력하세요." required>
            <br>
            <label for="start_time">시작일자</label>
            <input type="datetime-local" name="list_start" id="start_time" required>
            <br>
            <label for="end_time">기한일자</label>
            <input type="datetime-local" name="list_end" id="end_time" required>
            <br>
            <label for="location">장소</label>
            <input type="text" maxlength="100" name="list_location" id="location" required>
            <br>
            <label for="contents">내용</label>
            <textarea class="input_contents" maxlength="250" name="list_contents" id="contents" placeholder="내용을 입력하세요." required></textarea>
            <br>
            <button type="submit" title="작성">작성</button>
            <button type="button" title="취소"><a href="petlist_list.php">취소</a></button>
        </form>
    </div>
</body>
</html>