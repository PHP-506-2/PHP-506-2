<?php
    //---------------------------------
    //함수명    : db_conn
    //기능      : php를 db에 연결
    //파라미터  : array(속성)   $param_conn(파라미터 명)
    //---------------------------------

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
                PDO::ATTR_EMULATE_PREPARES      => false
                ,PDO::ATTR_ERRMODE              => PDO::ERRMODE_EXCEPTION
                ,PDO::ATTR_DEFAULT_FETCH_MODE   => PDO::FETCH_ASSOC
            );

        try
        {
            $param_conn = new PDO( $dns, $user, $pass, $pdo_option );
        }
        catch (Exception $e)
        {
            $param_conn = null;
            throw new Exception( $e->getMessage() );
        }
    }


    //---------------------------------
    //함수명    : sign_up()
    //기능      : id, password insert
    //파라미터  : array(속성)
    //---------------------------------

    function sign_up(&$param_arr)
    {
    $sql = 
    " INSERT INTO login( "
        ." login_id "
        ." ,login_password "
        ." ,login_email "
        ." ) "
        ." VALUES ( "
        ." :login_id "
        ." ,:login_password "
        ." ,:login_email "
        ." ) "
        ;

    $arr_prepare =
            array(
                ":login_id" => $param_arr["login_id"]
                ,":login_password" => $param_arr["login_password"]
                ,":login_email" => $param_arr["login_email"]
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

    function id_search(&$param){
        $sql = " SELECT "
                ." login_id "
                ." FROM login "
                ." WHERE "
                ." login_email = :login_email "
                ;
    
                $arr_prepare =
                array(
                    ":login_email"  => $param["login_email"]
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
                return $e->getMessage();
            }
            finally
            {
                $conn = null;
            }
            return $result;
    }

    function pw_search(&$param){
        $sql = " SELECT "
                ." login_password "
                ." FROM login "
                ." WHERE "
                ." login_email = :login_email "
                ." AND "
                ." login_id = :login_id "
                ;
    
                $arr_prepare =
                array(
                    ":login_email" => $param["login_email"]
                    ,":login_id" => $param["login_id"]
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
                return $e->getMessage();
            }
            finally
            {
                $conn = null;
            }
            return $result;
    }
?>