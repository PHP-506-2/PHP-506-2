<?php
define("DB_CON",$_SERVER["DOCUMENT_ROOT"]."/study/login");
define("URL",DB_CON."/common/common_db.php");
include_once(URL);

$arr_post = $_POST;
$result = id_search($arr_post);
if($result === []){
    echo "<script>alert('가입된 ID가 없습니다.')</script>";
    echo "<script>location.replace('../id_search.php');</script>";
    exit;
}
var_dump($result);
?>
<!DOCTYPE html>
<html lang="ko">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <p>ID는 <b><?php echo $result[0]["login_id"] ?></b>입니다.</p>
    <br>
    <button type="button" onclick="location.href='../movie_login.php'">확인</button>
</body>
</html>