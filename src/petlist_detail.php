<?php
define( "DOC_ROOT", $_SERVER["DOCUMENT_ROOT"]."/" );
define( "URL_DB", DOC_ROOT."PHP-506-2/src/common/db_common.php" ); 
include_once( URL_DB );


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
</head>
<body>
    
    <div> 
    <?php
    $arr_prepare = array("list_no" => 1);
    $result = petlist_detail( $arr_prepare["list_no"]);

    if ( $result["list_comp_flg"] === 0 )
    {
        echo "진행 예정";
    }
    else if ( $result["list_comp_flg"] === 1 )
    {
        echo "진행 중";
    }
    else if ( $result["list_comp_flg"] === 2 )
    {
        echo "진행 완료";
    }
    else if ( $result["list_comp_flg"] === 3 )
    {
        echo "기간 만료";
    } ?>
    </div> <br>
    <div> <?php echo $result["list_title"]  ?></div> <br>
    <div> <?php echo $result["list_contents"]  ?></div> <br>
    <div> <?php echo $result["list_start"]  ?></div> <br>
    <div> <?php echo $result["list_end"]  ?></div>

    <div>
    <button type="button"><a href="petlist_comp.php?list_no=<?php echo $arr_prepare["list_no"] ?>">진행 완료</a> </button>
    <button><a href="petlist_update.php">수정하기ㄹ</a></button>
    <button><a href="petlist_list.php">리스트ㄹ</a></button>
    </div>


</body>
</html>