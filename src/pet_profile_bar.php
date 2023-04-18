<?php

define( "SRC_ROOT", $_SERVER["DOCUMENT_ROOT"]."/PHP-506-2/src/" );
define( "URL_DB", SRC_ROOT."common/db_common.php" );
include_once( URL_DB );

$http_method = $_SERVER["REQUEST_METHOD"];



?>

<!DOCTYPE html>
<html lang="ko">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/pet_profile_bar.css">
    <title>Document</title>
</head>
<body>
    <div class="wrap">
        <div class="profile_bar">
            <a class="home" href="petlist_list.php"> <img src="./pet.png" alt=""></a>
            <p class="day">함께한지 +<? echo $dog_day ?></p>
            <progress value="<? echo round($chinmildo) ?>" max="100"></progress>
            <? echo round($chinmildo)."%" ?>
            <div class="profile_main">
                <div class="profile_img">

                </div>
                <div class="profile_con">
                    <p>이름 :</p>
                </div>
            </div>
        </div>
    </div>
</body>
</html>