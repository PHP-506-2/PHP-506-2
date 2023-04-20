<?php
include_once( "./common/define.php" );
include_once( URL_DB );

$http_method = $_SERVER["REQUEST_METHOD"];

$arr_get = $_GET; // 0420 add 이동호
$list_no = $arr_get['list_no'];

if( $http_method === "GET")
{
    $list_no = 1;
    if ( array_key_exists( "list_no", $_GET ) ) 
    {
        $list_no = $_GET["list_no"];
    }
    
    $result_info = pet_list_select( $list_no );
    
}
// POST 일때
    else
    {
        $arr_post = $_POST;
        $arr_info = 
        array(
            "list_no" => $arr_post["list_no"]
            ,"list_title" => $arr_post["list_title"]
            ,"list_start" => $arr_post["list_start"]
            ,"list_end" => $arr_post["list_end"]
            ,"list_location" => $arr_post["list_location"]
            ,"list_contents" => $arr_post["list_contents"]
        );
        
        
        $result_cnt = pet_list_update( $arr_info );
        header( "Location: petlist_detail.php?list_no=".$arr_post["list_no"] );
        exit();
    }
    // pet정보 테이블 전체 정보 획득
    $a = 1; //함수가 pet_info( &$param_arr )라서 pet_no = 1의 값을 가져오기 위해
    $result_pet_info = pet_info( $a ); //숫자 넣으면 error
    
    
    ?>
<!DOCTYPE html>
<html lang="ko">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>UPDATE</title>
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
            
            <div class="petlist_contents_container">
                    <?php 
                    include_once 'pet_profile_bar.php';
                    ?>
            <h1><?php pet_list_print_pet_name() ?></h1><br><br>
            
                <div class="update_form">

                    <select name="select" id="select">
                        <option value="0" selected>진행예정</option>
                        <option value="1">진행중</option>
                        <option value="2">진행완료</option>
                        <option value="3">진행실패</option>
                    </select>
                    
                    <form class="update_form_put" method="post" action="petlist_update.php">
                    <div class="upput"> 
                            <div class="upput">
                            <input type="hidden" name="list_no" id="bno" value="<?php echo $result_info['list_no'] ?>" readonly>
                            <br> 
                            <br> 
                            <label for="title">제목 : </label>
                            <input type="text" name="list_title"  id="title" required placeholder="제목" autocomplete="off"
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
                            <textarea class="input_contents" name="list_contents" id="contents" spellcheck="false" cols="48" rows="15"><?php echo $result_info['list_contents'] ?></textarea>
                         </div>    
                        <div class="btn_wrap">
                            <button class="petbutton" type="submit" >
                                수정
                            </button>
                            <a class="petbutton" href='petlist_delete.php?list_no=<?php echo $list_no ?>'> 
                                삭제
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