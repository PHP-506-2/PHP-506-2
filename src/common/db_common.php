<?php
function db_conn( &$param_conn )
{
    $host = "localhost";
    $user = "root";
    $pass = "root506";
    $charset = "utf8mb4";
    $db_name = "pet_todolist";
    $dns = "mysql:host=".$host.";dbname=".$db_name.";charset=".$charset; 
    $pdo_option = 
        array(
            PDO::ATTR_EMULATE_PREPARES         => false 
            ,PDO::ATTR_ERRMODE                 => PDO::ERRMODE_EXCEPTION 
            ,PDO::ATTR_DEFAULT_FETCH_MODE      => PDO::FETCH_ASSOC 
        );
    
    try
    {
        $param_conn = new PDO( $dns, $user, $pass, $pdo_option );
    }
    catch( Exception $e)
    {   
        $param_conn = null;
        throw new Exception( $e->getMessage() );
    }
}


//----------------------------------------------------
//--리스트에서 받아온 리스트 번호로 상세 정보 출력 하는 함수
//--------------------------------------------------------
function petlist_detail( &$param_arr )
{
    $sql =
        " SELECT "
        ." list_title "
        ." ,list_contents "
        ." ,list_start "
        ." ,list_end "
        ." ,list_comp_flg "
        ." FROM " 
        ." pet_list "
        ." WHERE "
        ." list_no = :list_no "
    ;

    $arr_prepare = array(":list_no" => $param_arr);

    $conn = null;
    try 
    {
        db_conn( $conn );
        $stmt = $conn->prepare( $sql );
        $stmt->execute( $arr_prepare );
        $result = $stmt->fetchAll();
    } 
    catch (Exception $e) 
    {
        $e -> getMessage();
    }
    finally
    {
        $conn = null;
    }
    return $result[0];
}
// $arr_prepare = array("list_no" => 1);
// $result = petlist_detail( $arr_prepare["list_no"]);
// var_dump($result);

//----------------------------------------------------
// 진행 완료로 바꾸는 함수 
//----------------------------------------------------

function petlist_complete( &$param_no )
{
    $sql =
        " UPDATE "
        ." pet_list "
        ." SET "
        ." list_comp_flg = '2' "
        ." WHERE "
        ." list_no = :list_no "
        ;

        $arr_prepare
        = array(
            ":list_no" => $param_no
        );

    $conn = null;
    try 
    {
        db_conn( $conn );
        $conn->beginTransaction();
        $stmt = $conn->prepare( $sql );
        $stmt->execute( $arr_prepare );
        $result_cnt = $stmt->rowCount();
        $conn->commit();
    } 
    catch ( Exception $e ) 
    {
        $conn->rollback();
        return $e->getMessage();
    }
    finally
    {
        $conn = null;
    }
    return $result;
}

// $arr_prepare = array("list_no" => 1);
// $result = petlist_complete( $arr_prepare["list_no"]);
// var_dump($result);

//--------------------------------------------------------//
//---------------강아지 키운 날짜 계산----------------------//
//---------------------------------------------------------//

$now = time();        // 현재 시간을 초단위로 구해줍니다. 
$hour = date('H');    // 현재 몇시인지 구해줍니다. h는 12시간으로 표기 H는 24시간으로 표기해줍니다./
$min = date('i');      // 현재 몇분인지 구해줍니다./  
$sec = date('s');      // 현재 몇초인지 구해줍니다./
$day = mktime($hour,$min,$sec,05,01,2012);//특정하게 지정된 날짜의 시간을 초단위로 구해줍니다
$result_day = $now - $day;  //현재시간에서 특정날시간을 빼줍니다./
$dog_day = $result_day/86400; //초단위결과값을 날짜로 환산해줍니다./
echo "똥개와 함께한지  $dog_day 일째"; //구해진 날짜값을 출력합니다./


//--------------------------------------------------------------------------
//---------전체  목록 가져와서 개수로 바꾸기-------------------------------------
//---------------------------------------------------------------------------

function all_list()
{
    $sql =
        " SELECT "
        ." * "
        ." FROM " 
        ." pet_list "
        ." LIMIT :limit_start "
    ;

    
    $arr_prepare
    = array(
        ":limit_start" => 100
    );

    $conn = null;
    try 
    {
        db_conn( $conn );
        $stmt = $conn->prepare( $sql );
        $stmt->execute( $arr_prepare );
        $result = $stmt->fetchAll();
        $all_1 = count($result);
    } 
    catch (Exception $e) 
    {
        $e -> getMessage();
    }
    finally
    {
        $conn = null;
    }
    return $all_1 ;
}

$all_count = all_list();
// echo $all_count ;
//---------------------------------------------------------------------------------
//---------진행 완료된 목록 가져와서 개수로 바꾸기----------------------------------
//-------------------------------------------------------------------------------------

function complete_list()
{
    $sql =
        " SELECT "
        ." * "
        ." FROM " 
        ." pet_list "
        ." WHERE "
        ." list_comp_flg = :list_comp_flg "
    ;

    
    $arr_prepare
    = array(
        ":list_comp_flg" => 2
    );

    $conn = null;
    try 
    {
        db_conn( $conn );
        $stmt = $conn->prepare( $sql );
        $stmt->execute( $arr_prepare );
        $result = $stmt->fetchAll();
        $all_1 = count($result);
    } 
    catch (Exception $e) 
    {
        $e -> getMessage();
    }
    finally
    {
        $conn = null;
    }
    return $all_1 ;
}

$comp_count = complete_list();
// echo $comp_count;
//--------------------------------------------------------------------------------
//----------------(진행완료 / 전체리스트)*100 소수첫째자리 반올림해서 퍼센트 구하기//
//----------------------------------------------------------------------------------
$chinmildo =  ($comp_count/$all_count)*100;
echo $chinmildo."%";


//---------------------------------------------------------------------------------
//---------------------반려동물 정보 가져오는 함수 ----------------------------------
//---------------------------------------------------------------------------------
function pet_info( &$param_arr )
{
    $sql =
        " SELECT "
        ." pet_name "
        ." ,pet_birth "
        ." ,pet_gender "
        ." FROM " 
        ." pet_profile "
        ." WHERE "
        ." pet_no = :pet_no "
    ;

    
    $arr_prepare
    = array(
        ":pet_no" => $param_arr
    );

    $conn = null;
    try 
    {
        db_conn( $conn );
        $stmt = $conn->prepare( $sql );
        $stmt->execute( $arr_prepare );
        $result = $stmt->fetchAll();
    } 
    catch (Exception $e) 
    {
        $e -> getMessage();
    }
    finally
    {
        $conn = null;
    }
    return $result;
}

// --------------------------------- 0418 add 이동호
// 함수명	: pet_list_insert
// 기능		: 리스트 작성
// 파라미터	: Array             &$arr_param
// 리턴값	: INT/STRING	    $result_cnt/ERRMSG
// ---------------------------------
function pet_list_insert( &$arr_param ) 
{
    $sql =
        " INSERT INTO "
        ."  pet_list( "
        ."      list_title "
        ."      ,list_contents "
        ."      ,list_start "
        ."      ,list_end "
        ."      ,list_comp_flg"
        ."      ,list_location "
        ." ) "
        ." VALUES( "
        ."      :list_title "
        ."      ,:list_contents "
        ."      ,:list_start "
        ."      ,:list_end "
        ."      ,:list_comp_flg "
        ."      ,:list_location "
        ." ) "
        ;
    $arr_prepare =
        array(
            ":list_title"       => $arr_param["list_title"]
            ,":list_contents"   => $arr_param["list_contents"]
            ,":list_start"      => $arr_param["list_start"]
            ,":list_end"        => $arr_param["list_end"]
            ,":list_comp_flg"   => $arr_param["list_comp_flg"]
            ,":list_location"   => $arr_param["list_location"]
        );

    $conn = null;
    try 
    {
        db_conn( $conn );
        $conn->beginTransaction();
        $stmt = $conn->prepare( $sql );
        $stmt->execute( $arr_prepare );
        $result_cnt = $stmt->rowCount();
        $conn->commit();
    } 
    catch ( Exception $e ) 
    {
        $conn->rollback();
        return $e->getMessage();
    } 
    finally 
    {
        $conn = null;
    }

    return $result_cnt;
}

// $arr_prepare
// = array(
//     "pet_no" => 1 );
// var_dump( pet_info( $arr_prepare["pet_no"] ));