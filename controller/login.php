<?php
include('../settings_database.php');

if($found){
    echo '<div class="alert alert-danger alert-dismissable col col-lg-12"><p class="block">SQL Injection Detected!</p></div>';
}
else{
    
    $username = $_POST['username'];
    $password = $_POST['password'];
    $md5password = md5($password);

    $getuserinfoquery = sqlsrv_query($connection, "SELECT user_id, login_pw, login_id, grade FROM RohanUser.dbo.TUser where login_id = '$username'");
    $getuserinfo = sqlsrv_fetch_array($getuserinfoquery);
    $dbuserid = $getuserinfo['user_id'];
    $dbusername = $getuserinfo['login_id'];
    $dbpassword = $getuserinfo['login_pw'];

    $checkerrors = array();

    if($dbpassword != $md5password){
        echo '<div class="alert alert-danger outline" role="alert"><p>Invalid Credentials!</p></div>';
        $checkerrors[] = 'Err';
    }

    if(empty($checkerrors)){
        echo '<div class="alert alert-success outline" role="alert"><p>Login Successfully! Redirecting to dashboard...</p></div>';
        session_start();
        $ip = $_SERVER['REMOTE_ADDR'];
        $_SESSION['user_id'] = $dbuserid;
        $_SESSION['username'] = $dbusername;
        $_SESSION['password'] = $dbpassword;
        sqlsrv_query($connection, "INSERT INTO RohanGeizan.dbo.THistory (description, date, login_id, type, status, price, point) VALUES ('You have logged in using IP Address: $ip',GETDATE(),'$dbuserid','0','OTHER','0', 'OTHER')");
        echo '<meta http-equiv="refresh" content="2; url=index.php">';
    }
}
?>