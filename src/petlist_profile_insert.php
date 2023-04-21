<?php
include_once( "./common/define.php" );
include_once( URL_DB );


$http_method = $_SERVER["REQUEST_METHOD"];



// 처리 완료 후 홈 페이지로 이동
if ( $http_method === "POST" && isset($_FILES["image"]) === false ) {
    $arr_post = $_POST;
    pet_profile_insert( $arr_post );
    header( "Location: petlist_list.php" );
    exit();
}

// 이미지 업로드
if ($http_method === "POST" && isset($_FILES["image"])) {
    $image_path = "../img/profile_img.jpg";
    move_uploaded_file($_FILES["image"]["tmp_name"], $image_path);
}


?>
<!DOCTYPE html>
<html lang="ko">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>pet to do list</title>
    <link rel="icon" type="image/png" sizes="16x16" href="../img/favi.jpg">
    <link rel="manifest" href="/manifest.json">
    <meta name="msapplication-TileColor" content="#ffffff">
    <meta name="msapplication-TileImage" content="/ms-icon-144x144.png">
    <meta name="theme-color" content="#ffffff">
    <link rel="stylesheet" href="../css/common.css">
    <link rel="stylesheet" href="../css/petlist_profile_insert.css">
    <link rel="stylesheet" href="../css/pet_profile_bar.css">
</head>
<body>
    <div class="petlist_main_border">
        <? include_once( URL_HEADER ); ?>
        
            <div class="petlist_contents_container">
                <?php 
                include_once 'pet_profile_bar.php';
                ?>
            </div>
        
            <div class="profile_insert_form">
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
                        <label for="pet_gender">성별 : </label>
                        <select name="pet_gender" id="select">
                            <option value="M" selected>남</option>
                            <option value="F">여</option>
                        </select>
                    </div>
                    <br>
                    <br>
                    <div class="btn_wrap">
                        <button class="petbutton erd_1 "  type="submit">
                            저장
                        </button>
                        <a class="petbutton" href="petlist_list.php">
                            취소
                        </a>
                    </div>
                </form>
                <div class="picture">
                    <form action="petlist_profile_insert.php" method="POST" enctype="multipart/form-data">
                        <label for="profile_img">프로필 사진 선택 :</label>
                        <input class="file" type="file" name="image" accept="image/*">
                        <br>
                        <button class="petbutton a_btn" type="submit">프로필 사진 업로드</button>
                        <a class="petbutton a_btn" href="petlist_profile_img_delete.php">프로필 사진 지우기</a>
                    </form>
                </div>
            </div>
        
    </div>
</body>
</html>