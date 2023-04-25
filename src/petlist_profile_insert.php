<?php
include_once( "./common/define.php" );
include_once( URL_DB );


$http_method = $_SERVER["REQUEST_METHOD"];


// 처리 완료 후 홈 페이지로 이동       isset은 변수설정 여부 확인
if ( $http_method === "POST" && isset($_FILES["image"]) === false ) {
    $arr_post = $_POST;
    pet_profile_insert( $arr_post ); //함수에 파라미터를 넣어서 적용시킨다.
    header( "Location: petlist_list.php" );
    exit();
}

// 이미지 업로드
// 반려동물 정보입력과 프로필 이미지 업로드가 모두 POST방식이기 때문에, 구분 지어주기위한 조건문
if ($http_method === "POST" && isset($_FILES["image"])) {
    $image_path = "../img/profile_img.jpg"; // 이미지 경로 지정
    move_uploaded_file($_FILES["image"]["tmp_name"], $image_path); // 사용자가 업로드한 이미지파일을 지정한 이미지 경로에 복사
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
        
            <div class="profile_insert_form">
                <h1>PET PROFILE</h1>
                <form method="post" action="petlist_profile_insert.php"> <!-- 전체 폼 -->
                    <div class="con_main"> <!-- 작성 폼 DIV -->
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
                    <div class="btn_wrap"> <!-- 버튼 폼 DIV -->
                        <button class="petbutton erd_1 "  type="submit">
                            저장
                        </button>
                        <a class="petbutton" href="petlist_list.php">
                            취소
                        </a>
                    </div>
                </form>
                <div class="picture"> <!-- 사진 폼 DIV -->
                    <!-- enctype="multipart/form-data" : 주로 파일이나 이미지를 전송할때 사용, 모든 문자를 인코딩(코드화) 하지않음, 인코딩 한다면 디코딩 처리를 따로 해줘야함 -->
                    <form action="petlist_profile_insert.php" method="POST" enctype="multipart/form-data">
                        <label for="profile_img">프로필 사진 선택 :</label>
                        <!-- accept="image/*" : 이미지 파일(.jpg, .png, ...)만 선택 가능하게 설정 -->
                        <input class="file" type="file" name="image" accept="image/*">
                        <br>
                        <button class="petbutton a_btn" type="submit">프로필 사진 업로드</button>
                        <!-- petlist_profile_img_delete.php을 실행하게 설정함 -->
                        <a class="petbutton a_btn" href="petlist_profile_img_delete.php">프로필 사진 지우기</a>
                    </form>
                </div>
            </div>
        
    </div>
</body>
</html>