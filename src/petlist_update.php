<?php
define( "SRC_ROOT", $_SERVER["DOCUMENT_ROOT"]."/PHP-506-2/src/" );
define( "URL_DB", SRC_ROOT."common/db_common.php" );
include_once( URL_DB );

$http_method = $_SERVER["REQUEST_METHOD"];




if( $http_method === "GET")
    {
        $list_no = 1;
        if ( array_key_exists( "list_no", $_GET ) ) 
        {
            $list_no = $_GET["list_no"];
        }

        $result_info = petlist_detail( $list_no );

    }
//     // POST 일때
//     else
//     {
//         $arr_post = $_POST;
//         $arr_info = 
//             array(
//                 "list_title" => $param_arr["list_title"]
//                 ,"list_start" => $param_arr["list_start"]
//                 ,"list_end" => $param_arr["list_end"]
//                 ,"list_location" => $param_arr["list_location"]
//                 ,"list_contents" => $param_arr["list_contents"]
//                 ,"list_no" => $param_arr["list_no"]
//             );

     
//         $result_cnt = pet_list_update( $arr_info );

//     }



// header( "Location: petlist_detail.php?board_no=".$arr_post["list_no"] );
// exit();

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
            <option value="3">진행실패</option>
        </select>
     
        <form method="get" action="petlist_update.php">
            <label for="bno">번호 : </label>
            <input type="text" name="list_no" id="bno" value="<?php echo $result_info['list_no'] ?>" readonly>
            <br>
            <label for="title">제목 : </label>
            <input type="text" name="list_title"  id="title" required placeholder="제목" autocomplete="off"
            value="<?php echo $result_info['list_title'] ?>">
            <br>
            <label for="title">시작일자 : </label>
            <input type="date" name="list_start"  id="title" required autocomplete="off"
            value="<?php echo $result_info['list_start'] ?>">
            <br>
            <label for="title">기한일자 : </label>
            <input type="date" name="list_end"  id="title" required autocomplete="off"
            value="<?php echo $result_info['list_end'] ?>">
            <br>
            <label for="title">장소 : </label>
            <input type="text" name="list_location"  id="title" required placeholder="장소" autocomplete="off"
            value="<?php echo $result_info['list_location'] ?>">
            <br>
            <label for="contents">내용 : </label>
            <textarea class="input_contents" name="list_contents" id="contents" spellcheck="false" cols="48" rows="15" >
                <?php echo $result_info['list_contents'] ?>
            </textarea>
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