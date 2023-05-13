<!DOCTYPE html>
<html lang="ko">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>main_page</title>
    <style>
        body { font-family: sans-serif; }
        input, textarea { font-family: sans-serif; }
        textarea { width: 600px; height: 300px; }
        </style>
</head>
<body>
    <form action="check_login.php" method="post">
        <label for="id">I D</label>
        <input type="text" id="id" name="login_id" autocomplete="off" required>
    <br>
        <label for="password">PW</label>
        <input type="password" id="password" name="login_password" autocomplete="off" required>
    <br>
    <button type="submit" >LOGIN</button>
    </form>
    <a href="sign_up_page.php">회원가입</a>
    <span> / </span>
    <a href="id_search.php">아이디 찾기</a>
    <span> / </span>
    <a href="pw_search.php">비밀번호 찾기</a>

    <?php
        // if ( $send == 'Yes' ) {
        //     echo '<p>Message has been sent.</p>';
        // }
        ?>
        <form action="mail.php" method="POST">
        <p><input type="text" name="subject" placeholder="제목" required /></p>
        <p><textarea name="content" required></textarea></p>
        <p><input type="submit" /></p>
        </form>
</body>
</html>