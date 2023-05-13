<?php
define("DB_CON",$_SERVER["DOCUMENT_ROOT"]."/study/login");
define("URL",DB_CON."/common/common_db.php");
include_once(URL);

session_start();
$id = $_POST['login_id'];
$pw = $_POST['login_password'];
$sql1 = "SELECT * FROM login WHERE login_id = '$id'";
    $conn = null;
    db_conn($conn);
    $stmt = $conn->query($sql1);
    $row1 = $stmt->fetchAll();
    var_dump($row1);
    $conn =null;
    // var_dump($row1);
    // $sql = "SELECT * FROM login WHERE login_id = '$id' AND login_password = '$pw'";
    //     $conn = null;
    //     db_conn($conn);
    //     $stmt = $conn->query($sql);
    //     $row = $stmt->fetchAll();
    if(!empty($row1)){
    $pver = password_verify($pw, $row1[0]["login_password"]);
    if ($pver === true) {
        $_SESSION['login_id'] = $row1[0]['login_id'];
        $_SESSION['login_password'] = $row1[0]['login_password'];
        echo "<script>location.replace('../movie_main.php');</script>";
        exit;
    }
}else{
    echo "<script>alert('Invalid username or password')</script>";
    echo "<script>location.replace('../movie_login.php');</script>";
    exit();
}
?>