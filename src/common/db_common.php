<?php
// ---------------------------------
// 함수명	: db_conn
// 기능		: DB Connection
// 파라미터	: Obj	&$param_conn
// 리턴값	: 없음
// ---------------------------------
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


//------------------------------------------------ 최혁재
// 함수명   : petlist_detail
// 기능     : 리스트에서 받아온 리스트번호로 상세정보 출력
// 파라미터 : Array     &$param_arr
// 리턴값   : INT/STRING       $result/ERRMSG
//------------------------------------------------
//--------------------------------------------------------
function petlist_detail( &$param_arr )
{
    $sql =
        " SELECT "
        ." * "
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

//------------------------------------------------ 최혁재
// 함수명   : petlist_complete
// 기능     : 진행 완료로 변경 
// 파라미터 : Array     &$param_no
// 리턴값   : INT/STRING       $result/ERRMSG
//------------------------------------------------

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

//--------------------------------------------------------//
//---------------강아지 키운 날짜 계산----------------------//(최혁재)
//------------------0420 del ------------------------------최혁재
//---------------------------------------------------------//

// $now = time();        // 현재 시간을 초단위로 구해줍니다. 
// $hour = date('H');    // 현재 몇시인지 구해줍니다. h는 12시간으로 표기 H는 24시간으로 표기해줍니다./
// $min = date('i');      // 현재 몇분인지 구해줍니다./  
// $sec = date('s');      // 현재 몇초인지 구해줍니다./
// $day = mktime($hour,$min,$sec,05,01,2012);//특정하게 지정된 날짜의 시간을 초단위로 구해줍니다
// $result_day = $now - $day;  //현재시간에서 특정날시간을 빼줍니다./
// $dog_day = $result_day/86400; //초단위결과값을 날짜로 환산해줍니다./
// // echo "똥개와 함께한지  $dog_day 일째"; //구해진 날짜값을 출력합니다./ 



//------------------------------------------------ 최혁재
// 함수명   : all_list
// 기능     : 전체  목록 가져와서 개수로 바꾸기
// 파라미터 : 없음
// 리턴값   : INT/STRING       $result/ERRMSG
//------------------------------------------------

function all_list()
{
    $sql =
        " SELECT "
        ." * "
        ." FROM " 
        ." pet_list "
    ;

    
    $arr_prepare
    = array(
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
//------------------------------------------------ 최혁재
// 함수명   : complete_list
// 기능     : 완료 목록 가져와서 개수로 바꾸기
// 파라미터 : 없음
// 리턴값   : INT/STRING       $result/ERRMSG
//------------------------------------------------

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
//--------------------------------------------------------------------------------
//----------------(진행완료 / 전체리스트)*100 소수첫째자리 반올림해서 퍼센트 구하기// (최혁재)
//----------------------------------------------------------------------------------
//---------------------------------------------------
//------------0420 데이터가 0건일때 에러표시 수정 최혁재
//------------$all_count 비어있을때 all_count 에 1을 대입해줌
//---------------------------------------------------------
if(empty($all_count))
{
    $all_count = 1;
}
// else if(empty($all_count))
// {
//     $comp_count = 1;
// }

//(진행완료 / 전체리스트)*100 소수첫째자리 반올림해서 퍼센트 구해서 $dog_love_percent 에 저장
$dog_love_percent =  ($comp_count/$all_count)*100;


//------------------------------------------------ 최혁재
// 함수명   : pet_info
// 기능     : 반려동물 정보 가져오기
// 파라미터 : 없음
// 리턴값   : INT/STRING       $result[0]/ERRMSG
//------------------------------------------------
function pet_info()
{
    $sql =
        " SELECT "
        ." pet_name "
        ." ,pet_birth "
        ." ,pet_gender "
        ." FROM " 
        ." pet_profile "
        ." ORDER BY "
        ." pet_no DESC "
        ." LIMIT 1 "
    ;

    
    $arr_prepare
    = array(
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
    return $result[0];
}
$arr
= array(
    "pet_no" => 1
);

// --------------------------------- 0418 add 이동호
// 함수명	: pet_list_insert
// 기능		: to do list 작성
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


//------------------------------------------------ 백유정
// 함수명   : pet_list_update
// 기능     : 리스트 수정
// 파라미터 : Array     &$param_arr
// 리턴값   : INT/STFING       $result_cnt/ERRMSG
//------------------------------------------------
function pet_list_update( &$param_arr )
{
    $sql =
        " UPDATE "
        ." pet_list "
        ." SET "
        ." list_title = :list_title "
        ." , list_start = :list_start "
        ." , list_end = :list_end "
        ." , list_location = :list_location "
        ." , list_contents = :list_contents "
        ." , list_comp_flg = :list_comp_flg "
        ." WHERE "
        ." list_no = :list_no "
        ;


    $arr_prepare = 
        array(
            ":list_title" => $param_arr["list_title"]
            ,":list_start" => $param_arr["list_start"]
            ,":list_end" => $param_arr["list_end"]
            ,":list_location" => $param_arr["list_location"]
            ,":list_contents" => $param_arr["list_contents"]
            ,":list_no" => $param_arr["list_no"]
            ,":list_comp_flg" => $param_arr["list_comp_flg"]
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
    catch( Exception $e)
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


//------------------------------------------------ 신유진
// 함수명   : pet_list_list
// 기능     :전체 리스트 정보가져오기
// 파라미터 : Array
// 리턴값   : Array/String     $result/errorMSG
//------------------------------------------------
function pet_list_list()
{
    //쿼리문
    $sql =
        " SELECT "
        ." * "
        ." FROM "
        ." pet_list "
        ;
    
    //모든 글을 조건없이 배열로 가져온다
    $arr_prepare =array();

    // DB연결 부분
    $conn = null;     
    try
    {
        db_conn( $conn );
        $stmt = $conn->prepare( $sql );
        $stmt->execute( $arr_prepare );
        $result = $stmt->fetchAll();
    }
    catch( Exception $e)
    {
        return $e->getMessage();
    }
    finally
    {
        $conn = null;   
    }
    return $result;
}

// --------------------------------- 0418 백유정
// 함수명	: pet_profile_insert
// 기능		: 프로필 작성
// 파라미터	: Array             &$arr_param
// 리턴값	: INT/STRING	    $result_cnt/ERRMSG
// ---------------------------------
function pet_profile_insert( &$param_arr ) 
{
    $sql =
        " INSERT INTO "
        ."  pet_profile( "
        ."      pet_no "
        ."      ,pet_name "
        ."      ,pet_birth "
        ."      ,pet_gender "
        ." ) "
        ." VALUES( "
        ."      :pet_no "
        ."      ,:pet_name "
        ."      ,:pet_birth "
        ."      ,:pet_gender "
        ." ) "
        ;
    $arr_prepare =
        array(
            ":pet_no"       => $param_arr["pet_no"]
            ,":pet_name"   => $param_arr["pet_name"]
            ,":pet_birth"      => $param_arr["pet_birth"]
            ,":pet_gender"        => $param_arr["pet_gender"]
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

// --------------------------------- 0419 add 이동호
// 함수명	: pet_list_delete
// 기능		: to do list 삭제
// 파라미터	: INT               &$param_arr
// 리턴값	: INT/STRING	    $result_cnt/ERRMSG
// ---------------------------------
function pet_list_delete( &$param_arr ) 
{
    $sql =
        " DELETE "
        ." FROM "
        ."      pet_list "
        ." WHERE "
        ."      list_no = :list_no "
        ;
    $arr_prepare =
        array(
            ":list_no" => $param_arr["list_no"]
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

// --------------------------------- 0419 add 백유정
// 함수명   : pet_list_select
// 기능     : 특정 pk의 레코드 쿼리
// 파라미터 : INT     &$param_no
// 리턴값   : INT/STFING       $result_cnt/ERRMSG
//------------------------------------------------

function pet_list_select( &$param_no )
{
    $sql = 
    " SELECT "
    ." list_no "
    ." , list_title "
    ." , list_start "
    ." , list_end "
    ." , list_location "
    ." , list_contents "
    . " FROM "
    . " pet_list "
    . " WHERE "
    . " list_no = :list_no "
    ;

    $arr_prepare = 
        array(
            ":list_no"    => $param_no
        );

    $conn = null;
    try
    {
        db_conn( $conn ); 
        $stmt = $conn->prepare( $sql ); 
        $stmt->execute( $arr_prepare );
        $result = $stmt->fetchAll();
    } 
    catch( Exception $e )
    {
        return $e->getMessage();
    }
    finally
    {
        $conn = null;
    }

    return $result[0];
}

// --------------------------------- 0419 add 신유진
// 함수명   : pet_list_listcnt
// 기능     :전체 리스트 cnt 숫자깂으로 가져오기
// 파라미터 : 없음
// 리턴값   : INT/STRING     $result/errorMSG
//------------------------------------------------
function pet_list_listcnt()
{
    $sql = 
        " SELECT " 
        ."      COUNT(*) cnt "
        ." FROM " 
        ."      pet_list"
        ;
    $arr_prepare = array();

    $conn = null;
    try
    {
        db_conn( $conn );
        $stmt = $conn->prepare( $sql );
        $result = $stmt->execute ( $arr_prepare );
        $result = $stmt->fetchAll();
    }
    catch( Exception $e )
    {
        return $e->getMessage();
    }
    finally
    {
        $conn = null;
    }
    
    return $result[0]['cnt'];
}

// --------------------------------- 0419 add 신유진 / 0420 add flgEndASC 신유진 / 0421 change 전반적 수정 / 0421 change 0420으로 롤백
// 페이징 : 게시글 리스트에서 1페이지를 눌렀을때 1페이지 내용만, 2페이지를 눌렀을때 2페이지만 보여주는 것
// 함수명	: pet_list_listpaging
// 기능		: 게시글 페이지에 맞는 리스트갯수와 정렬되어진 값을 출력
// 파라미터	: Array		&$param_arr
// 리턴값	: Array		$result
//------------------------------------------------
function pet_list_listpaging( &$param_arr ) {
    $sql =
        " SELECT "
        ."      * "
        ." FROM "
        ."      pet_list "
        ." ORDER BY "
        ."      list_comp_flg ASC "
        ."      , list_end ASC "
        ." LIMIT :limit_num OFFSET :offset "
        ;
    $arr_prepare = 
        array(
            ":limit_num"    => $param_arr["limit_num"]
            ,":offset"      => $param_arr["offset"]
        );

    $conn = null;
    try {
        db_conn( $conn );
        $stmt = $conn->prepare( $sql );
        $stmt->execute( $arr_prepare ); // 쿼리 실행 후 $result에 담기
        $result = $stmt->fetchAll();
    } 
    catch ( Exception $e ) {
        return $e->getMessage();
    } 
    finally {
        $conn = null;
    }

    return $result;
}

// --------------------------------- 0420 add 이동호
// 함수명	: pet_list_listno_inquiry
// 기능		: 최신 글 번호 조회
// 파라미터	: 없음		
// 리턴값	: Int/String		$result[0]["max"]/ErrMSG
//------------------------------------------------
function pet_list_listno_inquiry() {
    $sql =
        " SELECT "
        ."      MAX(list_no) max "
        ." FROM "
        ."      pet_list "
        ;
    $arr_prepare = array();

    $conn = null;
    try {
        db_conn( $conn );
        $stmt = $conn->prepare( $sql );
        $stmt->execute( $arr_prepare );
        $result = $stmt->fetchAll();
    } 
    catch ( Exception $e ) {
        return $e->getMessage();
    } 
    finally {
        $conn = null;
    }

    return $result[0]["max"];
}

// --------------------------------- 0420 add 이동호
// 함수명	: pet_list_print_pet_name
// 기능		: petname_title 출력
// 파라미터	: 없음		
// 리턴값	: 없음
//------------------------------------------------
function pet_list_print_pet_name() {
    $pet_info = pet_info();
    echo "<span class='petnametitle'>".mb_substr( $pet_info['pet_name'], 1, 2 )."</span>"."'s TO DO LIST";
}

// --------------------------------- 0425 add 이동호
// 함수명	: d_day_count
// 기능		: D - day 출력
// 파라미터	: String            $param_date		
// 리턴값	: 없음
//------------------------------------------------
function d_day_count( &$param_date ) {
    $end_date = str_replace( "-", "", substr( $param_date, 0 , 10 ) ); 
    $to_date = date( "Ymd" ); 
    if ( $end_date < $to_date ) { 
        $ddy = ( strtotime( $to_date ) - strtotime( $end_date ) ) / 86400; 
        echo "DAY + ".$ddy; 
    } else if ( $end_date === $to_date ) { 
        echo  "D - Day"; 
    } else { 
        $ddy = ( strtotime( $end_date ) - strtotime( $to_date ) ) / 86400; 
        echo "DAY - ".$ddy; 
    }
}

// --------------------------------- 0425 add 이동호
// 함수명	: progress
// 기능		: 진행상황 출력
// 파라미터	: Int                   $param_flg		
// 리턴값	: 없음
//------------------------------------------------
function progress( &$param_flg ) {
    if ( $param_flg === 0 )
    {
        echo "진행 예정  ";
    }
    else if ( $param_flg === 1 )
    {
        echo "진행 중  ";
    }
    else
    {
        echo "진행 완료  ";
    }
}
?>