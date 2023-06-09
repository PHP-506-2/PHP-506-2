<?php
include_once( "./common/define.php" );
include_once( URL_DB );

$http_method = $_SERVER["REQUEST_METHOD"]; // POST인지 GET인지 확인

$arr_get = $_GET; // 0420 add 이동호
$list_no = $arr_get['list_no'];

if( $http_method === "GET")
{
    $list_no = 1; // 변수생성
    if ( array_key_exists( "list_no", $_GET ) ) // 배열에 key가 존재하는지 확인
    {
        $list_no = $_GET["list_no"];
    }
    
    $result_info = pet_list_select( $list_no ); // 특정 PK의 레코드 쿼리문 함수에 번호에 해당하는 정보 가지고 오기
    
}
// POST 일때
    else
    {
        $arr_post = $_POST;

        $result_cnt = pet_list_update( $arr_post );
        header( "Location: petlist_detail.php?list_no=".$arr_post["list_no"] ); // 해당 번호의 디테일 페이지로 이동
        exit();
    }
    ?>
<!DOCTYPE html>
<html lang="ko">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>pet to do list</title>
        <link rel="icon" type="image/png" sizes="32x32" href="../img/favi.jpg">
        <link rel="icon" type="image/png" sizes="96x96" href="../img/favi.jpg">
        <link rel="icon" type="image/png" sizes="16x16" href="../img/favi.jpg">
        <link rel="manifest" href="/manifest.json">
        <meta name="msapplication-TileColor" content="#ffffff">
        <meta name="msapplication-TileImage" content="/ms-icon-144x144.png">
        <meta name="theme-color" content="#ffffff">
        <link rel="stylesheet" href="../css/common.css">
        <link rel="stylesheet" href="../css/pet_profile_bar.css">
        <link rel="stylesheet" href="../css/petlist_update.css">
    </head>
    <body>
        <div class="petlist_main_border">
            <? include_once( URL_HEADER ); ?>
            
            <h1><?php pet_list_print_pet_name() ?></h1><br><br>
            <div class="petlist_contents_container">
                <div class="update_form">
                    <form class="update_form_put" method="post" action="petlist_update.php"> <!-- 전체 폼 -->
                        <div class="upput"> <!-- 작성 폼 DIV -->
                            <select name="list_comp_flg" id="select">
                                <option value="0" selected>진행예정</option>
                                <option value="1">진행중</option>
                                <option value="2">진행완료</option>
                            </select>
                            <input type="hidden" name="list_no" id="bno" value="<?php echo $result_info['list_no'] ?>">
                            <br> 
                            <label for="title">제목 : </label>
                            <input type="text" class="pet_tit" name="list_title"  id="title" required placeholder="제목" autocomplete="off"
                            value="<?php echo $result_info['list_title'] ?>">
                            <br>
                            <label for="title">시작일자 : </label>
                            <input type="datetime-local" name="list_start"  id="title" required 
                            value="<?php echo $result_info['list_start'] ?>">
                            <br>
                            <label for="title">기한일자 : </label>
                            <input type="datetime-local" name="list_end"  id="title" required
                            value="<?php echo $result_info['list_end'] ?>">
                            <br>
                            <label for="title">장소 : </label>
                            <input type="text" name="list_location"  id="title" required placeholder="장소" autocomplete="off"
                            value="<?php echo $result_info['list_location'] ?>">
                            <br>
                            <br>
                            <label class="contents" for="contents">내용 : </label>
                            <textarea class="input_contents" name="list_contents" id="contents" spellcheck="false" cols="60" rows="12"><?php echo $result_info['list_contents'] ?></textarea>
                        </div>    
                        <div class="btn_wrap"> <!-- 버튼 폼 DIV -->
                            <button class="petbutton" type="submit" >
                                수정 완료
                            </button>
                            <a class="petbutton del" href='petlist_delete.php?list_no=<?php echo $list_no ?>'> 
                                삭제 하기
                            </a>
                            <a class="petbutton" href='petlist_detail.php?list_no=<?php echo $list_no ?>'>
                                취소
                            </a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
</body>
</html>