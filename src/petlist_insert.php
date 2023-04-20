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
        <link rel="stylesheet" href="../css/petlist_insert.css">
        <link rel="stylesheet" href="../css/pet_profile_bar.css">
        <title>petlist_insert</title>
    </head>
<body>
    <div class="petlist_main_border ">
    <? include_once( URL_HEADER ); ?>
    <div class="petlist_contents_container">
        <h1><?php pet_list_print_pet_name() ?></h1>
        <br>
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
                <label for="contents" class="contents">내용</label>
                <textarea class="input_contents" maxlength="250" name="list_contents" id="contents" placeholder="내용을 입력하세요." required cols="48" rows="15"></textarea>
                <br>
                <div class="insert_btns">
                    <button type="submit" title="작성" class="petbutton"><a>작성</button>
                    <a class="petbutton" href="petlist_list.php">취소</a>
                </div>
            </form>
        </div>
    </div>
</body>
</html>