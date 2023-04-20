<?php
    include_once( "./common/define.php" );
    include_once( URL_DB );
    
    
    // $arr_prepare = array("list_no" => 1);
    // $result = petlist_detail( $arr_prepare["list_no"]);

    $arr_get = $_GET; // 0419 add 이동호
    $list_no = $arr_get['list_no'];
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../css/common.css">
    <link rel="stylesheet" href="../css/pet_detail.css">
</head>
<body>
    <div class = "petlist_main_border">
        <?php include_once( URL_HEADER ); ?>
    
        <div class = "div_big" >
        <h1><?php echo "'".mb_substr($ee['pet_name'],1,2)."'이"; ?>의 TO DO LIST</h1><br><br>
        <div > 
        <?php
        $arr_prepare = array("list_no" => $list_no); // 0419 udt 이동호
        $result = petlist_detail( $arr_prepare["list_no"]);

        if ( $result["list_comp_flg"] === 0 )
        {
            echo "진행상태 : 진행 예정";
        }
        else if ( $result["list_comp_flg"] === 1 )
        {
            echo "진행상태 : 진행 중";
        }
        else if ( $result["list_comp_flg"] === 2 )
        {
            echo "진행상태 : 진행 완료";
        }
        else if ( $result["list_comp_flg"] === 3 )
        {
            echo "진행상태 : 기간 만료";
        } ?>
        <?php
                        // substr( string, start [, length ] )
                        $end_date = substr($result['list_end'], 0 , 10 );
                        $to_date = date("Y-m-d");
                        if ( $end_date < $to_date ) 
                        {
                            $ddy = floor((strtotime($end_date) - strtotime(date('Y-m-d'))) / 86400);
                            echo "DAY + ".mb_substr($ddy, 1);
                        } 
                        else if ( $end_date === $to_date ) 
                        {
                            echo  "D - Day";
                        } 
                        else 
                        {
                            $ddy = ( strtotime($end_date) - strtotime($to_date) ) / 86400;
                            echo "DAY - ".$ddy;
                        }
        ?>
        </div> <br>
        <div> 제목 :  <?php echo $result["list_title"]  ?></div> <br>
        <div> 시작일자 : <?php echo $result["list_start"]  ?></div> <br>
        <div> 기한일자 :  <?php echo $result["list_end"]  ?></div><br>
        <div> <textarea class="input_1" readonly cols="48" rows="15"><?php echo $result["list_contents"]?></textarea> </div> <br>
    <div class="div_lk_1">
        <div class="lk_1">
        <a class="btn_1" href="petlist_comp.php?list_no=<?php echo $arr_prepare["list_no"] ?>">진행 완료</a> <!-- 0419 udt 이동호 -->
        <a class="btn_1" href="petlist_update.php?list_no=<?php echo $arr_prepare["list_no"] ?>">수정하기</a> <!-- 0419 udt 이동호 -->
        <a class="btn_1" href="petlist_list.php">리스트</a>
        </div>
    </div>
    </div>
</div>

</body>
</html>