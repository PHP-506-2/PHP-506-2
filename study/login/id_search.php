<?php
define("DB_CON",$_SERVER["DOCUMENT_ROOT"]."/practice/login");
define("URL",DB_CON."/common/common_db.php");
include_once(URL);
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
<form action="search.php" method="post">
    <label for="tel">번호</label>
    <input type="tel" id="tel" name="login_tel" placeholder="전화번호를 입력하세요">
    <br>
    <button type="submit">조회</button>
    <button type="button" onclick="location.href='login_page.php'">취소</button>
</form>
</body>
</html>