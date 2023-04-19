<?php
define( "URL_DB","D:\project\src\common\db_common.php" );
include_once( URL_DB );




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
        <div class = "v-line">
        </div>
            <a class="home" href="petlist_list.php"> <img src="./pet.png" alt=""></a>
            <p class="day">함께한지 +<? echo $dog_day ?></p>
            <progress value="<? echo round($chinmildo) ?>" max="100"></progress>
            <? echo round($chinmildo)."%" ?>
            <div class="profile_main">
                <div class="profile_img">

                </div>
                <div class="profile_con">
                    <?php  
                        $arr
                        = array(
                            "pet_no" => 1
                        );
                        $ee = pet_info($arr["pet_no"]);
                    ?>

                    <p>이름 : <?php echo $ee["pet_name"]; ?> </p>
                    <p>입양일 :<?php echo $ee["pet_birth"]; ?> </p>
                    <p>성별 :<?php echo $ee["pet_gender"]; ?> </p>
                </div>
            </div>
        </div>
    </div>
    
</body>
</html>