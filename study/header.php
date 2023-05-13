<!DOCTYPE html>
<html lang="ko">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" >
    <link rel="stylesheet" href="movie_main.css">
    <title>bootstrap</title>
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-light" style="background-color: rgb(229, 243, 254);">
        <div class="container-fluid">
            <a class="navbar-brand" href="movie_main.php"><h1>BBB</h1></a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0 margin_center">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="#">영화</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" href="#">예매</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" href="#">영화관</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" href="#"  aria-disabled="true">이벤트</a>
                    </li>
                </ul>
            </div>
        </div>
        <div>
            <?php
            session_start();
            if(empty($_SESSION["login_id"])){
                ?>
            <button type="button" class="log_button" onclick="location.href='movie_login.php'">로그인</button>
            <?php
            }
            else{
            ?>
            <a href="#"><?php echo $_SESSION["login_id"] ?></a>
            <button type="button" class="logout_button" onclick="location.href='./login/logout.php'">로그아웃</button>
            <?php
            }
            ?>
        </div>
    </nav>
</body>
</html>