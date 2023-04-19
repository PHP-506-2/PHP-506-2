<?php
define( "DOC_ROOT", $_SERVER["DOCUMENT_ROOT"]."/" );
define( "URL_DB", DOC_ROOT."PHP-506-2/src/common/db_common.php" );
    // define( "URL_HEADER", "" ); // 헤더파일 경로 추가 예정
    include_once( URL_DB );

    $a = 15; // 임시로 글번호 지정
    $result = petlist_detail( $a );
    // var_dump( $result );

    // $arr_get = $_GET;
    // petlist_detail( $arr_get["list_no"] );


    // if ( $result["list_comp_flg"] === 0 ) 
    // {
    //     echo "진행 예정";
    // } 
    // else if ( $result["list_comp_flg"] === 1 ) 
    // {
    //     echo "진행 중";
    // } 
    // else if ( $result["list_comp_flg"] === 2 ) 
    // {
    //     echo "진행 완료";
    // } 
    // else if ( $result["list_comp_flg"] === 3 ) 
    // {
    //     echo "기간 만료";
    // } 
?>
<!DOCTYPE html>
<html lang="ko">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/petlist_delete.css"> <!-- 통합시 경로 수정 -->
    <title>petlist_delete</title>
</head>
<body>
    <div class="container"> <!-- 내용 출력 -->
        <div><?php echo $result["list_title"] ?></div>
        <br>
        <div><?php echo $result["list_contents"] ?></div>
        <br>
        <div><?php echo $result["list_start"] ?></div>
        <br>
        <div><?php echo $result["list_end"] ?></div>
        <br>
        <div><?php if ( $result["list_comp_flg"] === 0 ) { echo "진행 예정"; } else if ( $result["list_comp_flg"] === 1 ) { echo "진행 중"; } else if ( $result["list_comp_flg"] === 2 ) { echo "진행 완료"; } else if ( $result["list_comp_flg"] === 3 ) { echo "기간 만료"; }  ?></div></div>
    </div>
    <br>
    <div> <!-- 경고 메세지 -->
        정보를 완전히 삭제합니다.
        <br>
        동의 하시면 확인을 눌러주세요.
    </div>
    <br>
    <div> <!-- 버튼 -->
    <form action="petlist_delete_ok.php" method="get">
        <button type="submit" title="삭제">삭제</button>
    </form>
    <form action="petlist.php">
        <button type="button" title="삭제 취소"><a href="petlist.php">삭제 취소</a></button>
    </form>
    </div>
</body>
</html>