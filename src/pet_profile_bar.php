<?php
    define( "COMMON_DEFINE", "./common/define.php" );
    include_once( COMMON_DEFINE );
    include_once( URL_DB );

    $pet_information = pet_info() ;
    usleep(20000);
?>

    <div class="wrap">
        <div class="profile_bar">
            <div class = "v-line"></div>
            <a class="home" href="petlist_list.php"> <img src="../img/pet.png" alt=""></a>
            <div class ="sp_1">
                <p class="day">
                <?php 
                    $end_date = $pet_information["pet_birth"];
                    $to_date = date("Y-m-d");
                    if ( $end_date < $to_date ) {
                        $ddy = floor((strtotime($end_date) - strtotime(date('Y-m-d'))) / 86400);
                        echo $pet_information["pet_name"]."하고 함께한지 D + ".mb_substr($ddy, 1);
                    } else if ( $end_date === $to_date ) {
                        echo  "D - Day";
                    } 
                    else {
                        $ddy = ( strtotime($end_date) - strtotime($to_date) ) / 86400;
                        echo "D - ".$ddy;
                    }
                ?>
                </p>
                <progress id="progress" value="<? echo round($dog_love_percent) ?>" max="100"></progress>
                <p class="per"><? echo round($dog_love_percent)."%" ?></p>
                <p>♥<?php echo $pet_information["pet_name"]; ?>하고의 친밀도♥</p>
            </div>

            <div class="profile_main">
                <div class="profile_img">
                    <a href="petlist_profile_insert.php">
                    <?php if (file_exists('../img/profile_img.jpg')) { ?><img class="two" src="../img/profile_img.jpg" alt="profile image"><?php } 
                        else { ?><img class="two" src="../img/default_profile_img.jpg" alt="default profile image"><?php } ?>
                        
                    </a>
                </div>
                <p>프로필 수정은 프로필사진을 클릭해 주세요</p>
                <br>
                <div class="profile_con">
                    <p class = "p_1" >이름 : <?php echo $pet_information["pet_name"]; ?> </p>
                    <p class = "p_1" >입양일 : <?php echo $pet_information["pet_birth"]; ?> </p>
                    <p class = "p_1" >성별 : <?php if ($pet_information["pet_gender"] === "M" ) { echo "남자"; } else { echo "여자"; } ?> </p>
                </div>
            </div>
        </div>
        <div class="lk_1">
        <a class="btn_1" href="https://www.zooseyo.or.kr/zooseyo_or_kr.html?" target=_blank>종합유기견보호센터</a>
        <a class="btn_1" href="https://www.karma.or.kr/" target=_blank>동물구조관리협회</a>
        </div>
    </div>
