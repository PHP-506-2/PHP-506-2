<?php
    define( "COMMON_DEFINE", "./common/define.php" );
    include_once( COMMON_DEFINE );
    include_once( URL_DB );

    $ee = pet_info() ;
?>

<!DOCTYPE html>
<html lang="ko">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/common.css">
    <link rel="stylesheet" href="../css/pet_profile_bar.css">
    <title>Document</title>
</head>
<body>
    <div class="wrap">
        <div class="profile_bar">
            <div class = "v-line"></div>
            <a class="home" href="petlist_list.php"> <img src="../img/pet.png" alt=""></a>
            <div class ="sp_1">
            <p class="day">
                <?php 
                    $end_date = $ee["pet_birth"];
                    $to_date = date("Y-m-d");
                    if ( $end_date < $to_date ) {
                        $ddy = floor((strtotime($end_date) - strtotime(date('Y-m-d'))) / 86400);
                        echo $ee["pet_name"]."와 함께한지 D + ".mb_substr($ddy, 1);
                    } else if ( $end_date === $to_date ) {
                        echo  "D - Day";
                    } 
                    else {
                        $ddy = ( strtotime($end_date) - strtotime($to_date) ) / 86400;
                        echo "D - ".$ddy;
                    }
                ?>
                </p>
                <progress id="progress" value="<? echo round($chinmildo) ?>" max="100"></progress>
                <p class="per"><? echo round($chinmildo)."%" ?></p>
                <p>♥<?php echo $ee["pet_name"]; ?>와의 친밀도♥</p>
            </div>

            <div class="profile_main">
                <div class="profile_img">
                <a href="petlist_profile_insert.php"><img class="two" src="../img/2100.jpg" alt=""></a>
                </div>
                <div class="profile_con">
                    <p class = "p_1" >이름 : <?php echo $ee["pet_name"]; ?> </p>
                    <p class = "p_1" >입양일 :<?php echo $ee["pet_birth"]; ?> </p>
                    <p class = "p_1" >성별 :<?php echo $ee["pet_gender"]; ?> </p>
                </div>
            </div>
        </div>
        <div class="lk_1">
        <a class="btn_1" href="https://www.zooseyo.or.kr/zooseyo_or_kr.html?" target=_blank>종합유기견보호센터</a>
        <a class="btn_1" href="https://www.karma.or.kr/" target=_blank>동물구조관리협회</a>
        </div>
    </div>
    
</body>
</html>