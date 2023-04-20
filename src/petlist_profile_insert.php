<?php
include_once( "./common/define.php" );
include_once( URL_DB );


$http_method = $_SERVER["REQUEST_METHOD"];



// 처리 완료 후 홈 페이지로 이동
if ( $http_method === "POST" ) {
    $arr_post = $_POST;
    pet_profile_insert( $arr_post );
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
    <link rel="stylesheet" href="../css/petlist_profile_insert.css">
</head>
<body>
    <div class="petlist_main_border">
        <h1>PET PROFILE</h1>
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
                <select name="pet_gender" id="select">
                    <option value="M" selected>남</option>
                    <option value="F">여</option>
                </select>
            </div>
            <br>
            <br>
            <div class="btn_wrap">
                <a class="petbutton" type="submit">
                    저장
                </a>
                <a class="petbutton" href="petlist_list.php">
                    취소
                </a>
            </div>
        </form>
    </div>



</body>
</html>