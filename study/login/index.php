<?php
session_start();
if(!isset($_SESSION['login_id'])) {
    echo "<script>location.replace('login_page.php');</script>";            
}

else {
    $username = $_SESSION['login_id'];
    $name = $_SESSION['login_password'];
} 
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
    <div class="base">
        <h2><?php echo "Hi, $username";?></h2>
        <button type="button" class="btn" onclick="location.href='logout.php'">
            LOGOUT
        </button>
    </div>
</body>
</html>