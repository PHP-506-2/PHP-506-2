<!DOCTYPE html>
<html lang="ko">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="movie_login.css">
    <title>Document</title>
</head>
<body>
<?php require_once("header.php")?>
    <form action="./login/check_login.php" method="post">
        <div class="mb-3">
        <label for="exampleFormControlInput1" class="form-label">ID</label>
        <input type="text" class="form-control" id="exampleFormControlInput1" name="login_id" placeholder="ID를 입력하세요" autocomplete="off" required>
        </div>
        <div class="mb-3">
        <label for="exampleFormControlInput2" class="form-label">PW</label>
        <input type="password" class="form-control" id="exampleFormControlInput2" name="login_password" placeholder="비밀번호를 입력하세요." autocomplete="off" required>
        </div>
        <br>
        <div >
            <a href="sign_up_page.php" id="a_log">회원가입</a>
            <span> / </span>
            <a href="id_search.php" id="a_log">아이디 찾기</a>
            <span> / </span>
            <a href="pw_search.php" id="a_log">비밀번호 찾기</a>
            <button type="submit" >로그인</button>
            <button type="button" onclick="location.href='movie_main.php'">취 소</button>
        </div>
    </form>
</body>
</html>