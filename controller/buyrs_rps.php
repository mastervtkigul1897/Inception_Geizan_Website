<?php
include('../settings_database.php');

if($found){
    echo '<div class="alert alert-danger alert-dismissable col col-lg-12"><p class="block">SQL Injection Detected!</p></div>';
}
else{
    
    if(isset($_POST['trigger'])){
        $getpoints = sqlsrv_fetch_array(sqlsrv_query($connection, "SELECT rps FROM RohanUser.dbo.TUser where user_id = '$session_id'"));

        if($getpoints[0] >= 149){
            $ticketID = strtoupper(uniqid('RST-'));
            sqlsrv_query($connection, "INSERT INTO RohanGeizan.dbo.TRaffle (ticketID, username, status, payment, date) VALUES ('$ticketID','$session_username','Watiting for Raffle Draw','RPS',GETDATE())");
            sqlsrv_query($connection, "UPDATE RohanUser.dbo.TUser set rps = rps - 149 where user_id = '$session_id'");
            echo '<div class="alert alert-success alert-dismissable col col-lg-12"><p class="block">You have successfully purchased, Ticket ID: '.$ticketID.'</p></div>';
        } 
        else{
            echo '<div class="alert alert-danger alert-dismissable col col-lg-12"><p class="block">Insufficient Rohan Points, Kindly Top Up to Obtain Points!</p></div>';
        }
    }
}
?>