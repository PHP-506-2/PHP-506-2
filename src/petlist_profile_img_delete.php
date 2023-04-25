<?php
$location = "../img/profile_img.jpg"; // 경로 설정

if ( isset( $location ) ) { // 경로에 파일이 존재한다면
    unlink( $location ); // 파일 삭제
    header( "Location: petlist_profile_insert.php" ); // 처리후 프로필 작성 페이지로 이동
} else {
    header( "Location: petlist_profile_insert.php" ); // 경로에 파일이 존재하지 않는다면 프로필 작성 페이지로 이동
}
?>