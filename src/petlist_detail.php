<?php
    include_once( "./common/define.php" );
    include_once( URL_DB );
    
    
    // $arr_prepare = array("list_no" => 1);
    // $result = petlist_detail( $arr_prepare["list_no"]);

    $arr_get = $_GET; // 0419 add 이동호 // 0425 add   $_GET 값을  $arr_get 에 저장
    // $list_no = $arr_get['list_no']; //0424 del 최혁재
?>

<!DOCTYPE html>
<html lang="ko">
    <head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>pet to do list</title>
    <link rel="icon" type="image/png" sizes="32x32" href="../img/favi.jpg">
    <link rel="icon" type="image/png" sizes="96x96" href="../img/favi.jpg">
    <link rel="icon" type="image/png" sizes="16x16" href="../img/favi.jpg">
    <link rel="manifest" href="/manifest.json">
    <meta name="msapplication-TileColor" content="#FFFFFF">
    <meta name="msapplication-TileImage" content="/ms-icon-144x144.png">
    <meta name="theme-color" content="#FFFFFF">
    <link rel="stylesheet" href="../css/common.css">
    <link rel="stylesheet" href="../css/pet_detail.css">
    <link rel="stylesheet" href="../css/pet_profile_bar.css">
</head>
<body>
<div class = "petlist_main_border">
    <?php include_once( URL_HEADER ); ?>
    
    <h1><?php pet_list_print_pet_name() ?></h1><br><br> 
    <div class = "petlist_contents_container" >
        
        <div class="pettodobutton dday">
            <?php
            // $arr_prepare = array("list_no" => $list_no); // 0419 udt 이동호 // 0424 del 최혁재
            $result = petlist_detail($arr_get['list_no']); //0424 udt 최혁재 // $result에  $arr_get['list_no']가 포함된 디테일 정보 저장
        
            // substr( string, start [, length ] )
            
            d_day_count( $result["list_end"] )
        ?>
        </div>

        <div class="pettodobutton progress">
        <?php progress( $result["list_comp_flg"] ) ?>
        </div>
        
        <br>
        <div> 제목 :  <?php echo $result["list_title"]  ?></div> <br>
        <div> 시작일자 : <?php echo $result["list_start"]  ?></div> <br>
        <div> 기한일자 :  <?php echo $result["list_end"]  ?></div><br>
        <div> 장소 :  <?php echo $result["list_location"]  ?></div><br>
        <div> <label class="er1" for="er1">내용 :</label> <textarea class="input_1" id="er1" readonly cols="48" rows="15"><?php echo $result["list_contents"]?></textarea> </div> <br>
        <div class="div_lk_1">
            <div class="lk_1">
            <a class="btn_1" href="petlist_comp.php?list_no=<?php echo $arr_get['list_no'] ?>">진행 완료</a> <!-- 0419 udt 이동호 --> <!-- 0424 udt 최혁재 -->
            <a class="btn_1" href="petlist_update.php?list_no=<?php echo $arr_get['list_no']?>">수정 하기</a> <!-- 0419 udt 이동호 --> <!-- 0424 udt 최혁재 -->
            <a class="btn_1" href="petlist_list.php">리스트</a>
            </div>
        </div>
    </div>
</div>

</body>
</html>