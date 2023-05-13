<?php
define("DB_CON",$_SERVER["DOCUMENT_ROOT"]."/study/login");
define("URL",DB_CON."/common/common_db.php");
include_once(URL);
$rqs_method = $_SERVER["REQUEST_METHOD"];
if($rqs_method === "POST"){
$arr_post = $_POST;
$hpw = password_hash($arr_post["login_password"],PASSWORD_DEFAULT);
$arr_prepare = 
        array(
            "login_id" => $arr_post["login_id"]
            ,"login_password" => $hpw
            ,"login_email" => $arr_post["login_email"]
        );
sign_up($arr_prepare);
header("Location: movie_login.php");
exit;
}
?>
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
    <form action="" method="post">
        <div class="mb-3">
        <label for="exampleFormControlInput1" class="form-label">ID</label>
        <input type="text" class="form-control" name="login_id" id="exampleFormControlInput1" placeholder="ID를 입력하세요" autocomplete="off" required>
        </div>
        <div class="mb-3">
        <label for="exampleFormControlInput2" class="form-label">PW</label>
        <input type="password" class="form-control" name="login_password" id="exampleFormControlInput2" placeholder="비밀번호를 입력하세요." autocomplete="off" required>
        </div>
        <div class="mb-3">
        <label for="exampleFormControlInput3" class="form-label">PW</label>
        <input type="email" class="form-control" name="login_email" id="exampleFormControlInput3" placeholder="Email을 입력하세요." autocomplete="off" required>
        </div>
        <br>
        <div >
            <button type="submit" >가입</button>
            <button type="button" onclick="location.href='movie_login.php'">취 소</button>
        </div>
    </form>
</body>
</html>