<?php
    define( "COMMON_DEFINE", "./common/define.php" );
    include_once( COMMON_DEFINE );
    include_once( URL_DB );

    $pet_information = pet_info() ; // 최신 펫 정보목록을 $pet_information에 저장
?>
    <div class="wrap">
        <div class="profile_bar">
            <div class = "v-line"></div>
            <a class="home" href="petlist_list.php"> <img src="../img/pet.png" alt=""></a>
            <div class ="sp_1">
                <p class="day">
                <?php 
                    $end_date = $pet_information["pet_birth"]; // 펫 입양일을 $end_date에 저장
                    $to_date = date("Y-m-d");// 현재 날짜를 $to_date에 저장
                        $ddy = floor((strtotime($to_date) - strtotime($end_date)) / 86400); //현재날짜에서 펫입양일 빼주고 86400 으로 나눠줍니다
                        echo $pet_information["pet_name"]."하고 함께한지 D + ".$ddy; //나눠준값 출력
                ?>
                </p>
                <progress id="progress" value="<? echo round($dog_love_percent) ?>" max="100"></progress> 
                <p class="per"><? echo round($dog_love_percent)."%" ?></p>  
                <p>♥<?php echo $pet_information["pet_name"]; ?>하고의 친밀도♥</p>
            </div>

            <div class="profile_main">
                <div class="profile_img">
                    <a href="petlist_profile_insert.php">
                    <?php 
                        if (file_exists('../img/profile_img.jpg')) { ?> 
                            <!-- 브라우저에 캐시된 이미지를 사용하지 않게 설정 -->
                            <img class="two" src="../img/profile_img.jpg?t=<? echo date("h:i:s"); ?>" alt="profile image">
                    <?php } 
                        else { ?>
                            <img class="two" src="../img/default_profile_img.jpg" alt="default profile image">
                    <?php } 
                    ?>    
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
