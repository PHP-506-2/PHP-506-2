<?php
function db_conn( &$param_conn )
{
    $host = "localhost";
    $user = "root";
    $pass = "root506";
    $charset = "utf8mb4";
    $db_name = "study_group";
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

function id_search( &$param_arr )
{
    $sql = " SELECT "
        ." * "
        ." FROM "
        ." login "
        ." WHERE "
        ." login_id = :login_id "
        ." AND "
        ." login_password = :login_password  ";

    $arr_prepare
    = array(
        ":login_id" => $param_arr[0]
        ,":login_password" => $param_arr[1]
    );
    
    $conn = null;
    try 
    {
        db_conn( $conn );
        $stmt = $conn->prepare( $sql );
        $stmt->execute( $arr_prepare );
        $result= $stmt->fetchAll();
    } 
    catch ( Exception $e ) 
    {
        return $e->getMessage();
    }
    finally
    {
        $conn = null;
    }
    return $result;
}
// $arr = array("wo4013","gurwo1234");
// $app = id_search($arr);
// var_dump($app);

function sign_up($param_arr)
{
$sql =
" INSERT INTO login( "
." login_id "
." ,login_password "
." ,login_email "
." ,login_tel "
." ) "
." VALUES ( "
." :login_id "
." ,:login_password "
." ,:login_email "
." ,:login_tel "
." ) "
;
$arr_prepare =
array(
":login_id" => $param_arr["login_id"]
,":login_password" => $param_arr["login_password"]
,":login_email" => $param_arr["login_email"]
,":login_tel" => $param_arr["login_tel"]
);
$conn = null;
try
{
db_conn( $conn );
$conn->beginTransaction();
$stmt = $conn->prepare( $sql );
$stmt->execute( $arr_prepare );
$conn->commit();
}
catch ( Exception $e)
{
$conn->rollback();
return $e->getMessage();
}
finally
{
$conn = null;
}
}

function id_config( &$param_arr ) {
    
    $sql = " SELECT "
        ." login_id "
        ." FROM "
        ." login "
        ." WHERE "
        ." login_email = :login_email "
        ;

    $arr_prepare
    = array(
        ":login_email" => $param_arr["login_email"]
    );

    $conn = null;
    try 
    {
        db_conn( $conn );
        $stmt = $conn->prepare( $sql );
        $stmt->execute( $arr_prepare );
        $result= $stmt->fetchAll();
    } 
    catch ( Exception $e ) 
    {
        return $e->getMessage();
    }
    finally
    {
        $conn = null;
    }
    return $result;
}


function pw_config( &$param_arr ) {
    
    $sql = " SELECT "
        ." login_password "
        ." FROM "
        ." login "
        ." WHERE "
        ." login_tel = :login_tel "
        ;

    $arr_prepare
    = array(
        ":login_tel" => $param_arr["login_tel"]
    );

    $conn = null;
    try 
    {
        db_conn( $conn );
        $stmt = $conn->prepare( $sql );
        $stmt->execute( $arr_prepare );
        $result= $stmt->fetchAll();
    } 
    catch ( Exception $e ) 
    {
        return $e->getMessage();
    }
    finally
    {
        $conn = null;
    }
    return $result;
}

?>