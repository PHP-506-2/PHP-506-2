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
            ,PDO::ATTR_ERRMODE                 => PDO::ERRMODE_EXCEPTION // PDO Exception을 Throws 하도록 설정
            ,PDO::ATTR_DEFAULT_FETCH_MODE      => PDO::FETCH_ASSOC // 연상배열로 Fetch를 하도록 설정 
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

function pet_list_detail( &$param_arr )
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
$arr_prepare = array("list_no" => 1);
$result = pet_list_detail( $arr_prepare["list_no"]);
var_dump($result);


?>