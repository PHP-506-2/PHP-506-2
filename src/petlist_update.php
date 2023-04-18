<?php
define( "SRC_ROOT", $_SERVER["DOCUMENT_ROOT"]."/PHP-506-2/src/" );
define( "URL_DB", SRC_ROOT."common/db_common.php" );
include_once( URL_DB );

$http_method = $_SERVER["REQUEST_METHOD"];


if( $http_method === "GET")
    {
        $board_no = 1;
        if ( array_key_exists( "board_no", $_GET ) ) 
        {
            $board_no = $_GET["board_no"];
        }

        $result_info = petlist_detail( $board_no );
    }
    // POST 일때
    // else
    // {
    //     $arr_post = $_POST;
    //     $arr_info = 
    //         array(
    //             "board_no" => $arr_post["board_no"]
    //             ,"board_title" => $arr_post["board_title"]
    //             ,"board_contents" => $arr_post["board_contents"]
    //         );

    //     // update
    //     $result_cnt = update_board_info_no( $arr_info );

    // }

 








// header( "Location: petlist_detail.php?board_no=".$arr_post["list_no"] );
//     exit();

?>
<!DOCTYPE html>
<html lang="ko">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        li{
            list-style: none;
        }
        
    </style>
</head>
<body>
    <div class="update_form">
        <select name="select" id="select">
            <option value="0" selected>진행예정</option>
            <option value="1">진행중</option>
            <option value="2">진행완료</option>
            <option value="2">진행실패</option>
        </select>
        <!-- <ul>
                <li>제목 :<?php echo $pet_list_update['board_title'] ?></li>
                <li>시작일자 :</li>
                <li>기한일자 :</li>
                <li>장소 :</li>
                <li>내용 :</li>
            </ul> -->
            <form method="get" action="petlist_update.php">
                <label for="bno">번호 : </label>
                <input type="text" name="list_no" id="bno" value="<?php echo $result_info['list_no'] ?>" readonly>
                <br>
                <br>
                <label for="title">TITLE : </label>
                <input type="text" name="list_title"  id="title" required placeholder="제목" autocomplete="off"
                value="<?php echo $result_info['list_title'] ?>">
                <br>
                <br>
                <label for="contents">내용 : </label>
                <textarea class="input_contents" name="list_contents" id="contents" spellcheck="false" cols="48" rows="15" ><?php echo $result_info['list_contents'] ?>
                </textarea>
                <br>
                <br>
                <div class="btn_wrap">
                    <button class="btn_fix" type="submit">
                        수정
                    </button>
                    <a class="trash" href='list_detail.php?board_no=<?php echo $result_info['list_no'] ?>'>
                        삭제
                    </a>
                    <a class="btn_fix" href='petlist_list.php'>
                        취소
                    </a>
                </div>
            </form>
    </div>
    
</body>
</html>