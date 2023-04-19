<?php
include_once( "./common/define.php" );
include_once( URL_DB );


$http_method = $_SERVER["REQUEST_METHOD"];



// 처리 완료 후 홈 페이지로 이동
if ( $http_method === "POST" ) {
    $arr_post = $_POST;
    pet_list_insert( $arr_post );
    header( "Location: petlist_list.php" );
    exit();
}
?>

<!DOCTYPE html>
<html lang="ko">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PROFILE INSERT</title>
    <link rel="stylesheet" href="../css/common.css">
</head>
<body>
    <h1>Pet Profile</h1>
    <form method="post" action="petlist_profile_insert.php">
            <div class="con_main">
                <label for="name">이름 : </label>
                <input type="text" name="pet_name"  id="name" required placeholder="이름" autocomplete="off">
                <br>
                <br>
                <label for="birth">입양일 : </label>
                <input type="date" name="pet_birth"  id="birth" required>
                <br>
                <br>
                <select name="select" id="select">
                    <option value="0" selected>남</option>
                    <option value="1">여</option>
                </select>
            </div>
            <br>
            <br>
            <div class="btn_wrap">
                <button class="btn_fix" type="submit">
                    수정
                </button>
                <button href="board_list.php">
                    취소
                </button>
            </div>
        </form>




</body>
</html>