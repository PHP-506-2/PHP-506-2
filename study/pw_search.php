<!DOCTYPE html>
<html lang="ko">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<form action="sub_pw_search.php" method="post">
    <label for="id">ID</label>
    <input type="text" id="id" name="login_id" autocomplete="off" placeholder="ID를 입력하세요" autocomplete="off" required>
    <br>
    <label for="email">Email</label>
    <input type="email" id="email" name="login_email" placeholder="Email을 입력하세요" autocomplete="off" required>
    <br>
    <button type="submit">조회</button>
    <button type="button" onclick="location.href='movie_login.php'">취소</button>
</form>
</body>
</html>