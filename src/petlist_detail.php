<?php
    include_once( "./common/define.php" );
    include_once( URL_DB );
    include_once( URL_HEADER );


$arr_prepare = array("list_no" => 1);
$result = petlist_detail( $arr_prepare["list_no"]);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../css/pet_detail.css">
</head>
<body>
    
<div class = "div_big" >
<h1>'이백'이의 TO DO LIST</h1><br><br>
        <div > 
        <?php
        $arr_prepare = array("list_no" => 1);
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
        </div> <br>
        <div> 제목 :  <?php echo $result["list_title"]  ?></div> <br>
        <div> 시작일자 : <?php echo $result["list_start"]  ?></div> <br>
        <div> 기한일자 :  <?php echo $result["list_end"]  ?></div><br>
        <div> <input class="input_1" type="text" value = "<?php echo $result["list_contents"]?>" readonly > </div> <br>
    <div class="ll_1">
        <div class="lk_1">
        <a class="btn_1" href="petlist_comp.php?list_no=<?php echo $arr_prepare["list_no"] ?>">진행 완료</a>
        <a class="btn_1" href="petlist_update.php">수정하기</a>
        <a class="btn_1" href="petlist_list.php">리스트</a>
        </div>
    </div>
</div>

</body>
</html>