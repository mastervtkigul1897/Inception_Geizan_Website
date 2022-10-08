<?php
include('../settings_database.php');

if($found){
    echo '<div class="alert alert-danger alert-dismissable col col-lg-12"><p class="block">SQL Injection Detected!</p></div>';
}
else{
    
    $email = $_POST['email'];
    $username = $_POST['username'];
    $password = $_POST['password'];
    $confirmpassword = $_POST['confirmpassword'];
    $captcha = $_POST['captcha'];
    $hid = $_POST['hid'];
    $md5password = md5($password);

    $getuserinfoquery = sqlsrv_query($connection, "SELECT login_id, email FROM RohanUser.dbo.TUser where login_id = '$username'");
    $getuserinfo = sqlsrv_fetch_array($getuserinfoquery);
    $dbusername = $getuserinfo['login_id'];
    $dbemail = $getuserinfo['email'];

    $checkerrors = array();

    if($hid != $captcha){
        echo '<div class="alert alert-danger outline" role="alert"><p>Captcha not matched! Refresh the page.</p></div>';
        $checkerrors[] = 'Err';
    }
    if($password != $confirmpassword){
        echo '<div class="alert alert-danger outline" role="alert"><p>Password not matched! Refresh the page.</p></div>';
        $checkerrors[] = 'Err';
    }
    if($dbusername == $username){
        echo '<div class="alert alert-danger outline" role="alert"><p>Username existed! Refresh the page.</p></div>';
        $checkerrors[] = 'Err';
    }
    if($dbemail == $email){
        echo '<div class="alert alert-danger outline" role="alert"><p>Email existed! Refresh the page.</p></div>';
        $checkerrors[] = 'Err';
    }

    if(empty($checkerrors)){
        $createaccount = sqlsrv_query($connection, "INSERT INTO RohanUser.dbo.TUser (login_id,login_pw,grade,plain_password,email,rps,gps,ems,cookie,reward) VALUES ('$username','$md5password',10,'$password','$email',0,0,0,'NoLogin','Unclaim')");
        if($createaccount){
            echo '<div class="alert alert-success outline" role="alert"><p>Registered Successfully! Redirecting to login...</p></div>';
            echo '<meta http-equiv="refresh" content="2; url=signin.php">';
        }
        else{
            echo '<div class="alert alert-danger outline" role="alert"><p>Registration Query Error! Refresh the page.</p></div>';
        }
    }
}
?>