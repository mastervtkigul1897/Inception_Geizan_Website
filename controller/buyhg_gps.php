<?php
include('../settings_database.php');

if($found){
    echo '<div class="alert alert-danger alert-dismissable col col-lg-12"><p class="block">SQL Injection Detected!</p></div>';
}
else{
    
    if(isset($_POST['trigger'])){
        $getaccountrps = sqlsrv_fetch_array(sqlsrv_query($connection, "SELECT gps FROM RohanUser.dbo.TUser where user_id = '$session_id'"));
        if($getaccountrps[0] >= 169){
            $insertitem = sqlsrv_query($connection,"INSERT INTO RohanMall.dbo.TItem SELECT 4326290,0x00,1,0,0,0,0,0,[user_id],GETDATE(),0 FROM RohanUser.dbo.TUser where user_id = '$session_id'");

            if($insertitem)
            {
                sqlsrv_query($connection, "UPDATE RohanUser.dbo.TUser set gps = gps - 169 where user_id = '$session_id'");
                sqlsrv_query($connection, "INSERT INTO RohanGeizan.dbo.THistory (description, date, login_id, type, status, price, point) VALUES ('',GETDATE(),'$session_id','4326290','HG','169', 'GPS')");
                echo '<div class="alert alert-success alert-dismissable col col-lg-12"><p class="block">You have successfully purchased - Holiday Giftbox</p></div>';
            }
            else
            {
                echo '<div class="alert alert-danger alert-dismissable col col-lg-12"><p class="block">Insert Mall Item Query Error</p></div>';
            }
        }
        else{
            echo '<div class="alert alert-danger alert-dismissable col col-lg-12"><p class="block">Insufficient Game Points, Kindly Join the Events to Obtain Points!</p></div>';
        }
    }
}
?>