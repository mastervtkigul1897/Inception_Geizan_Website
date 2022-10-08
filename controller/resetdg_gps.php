<?php
include('../settings_database.php');

if($found){
    echo '<div class="alert alert-danger alert-dismissable col col-lg-12"><p class="block">SQL Injection Detected!</p></div>';
}
else{
    
    if(isset($_POST['trigger'])){
        $selchar = $_POST['selchar'];

        $getaccountrps = sqlsrv_fetch_array(sqlsrv_query($connection, "SELECT gps FROM RohanUser.dbo.TUser where user_id = '$session_id'"));

        if($getaccountrps[0] >= 299){

            $getrecordrestrictdg = sqlsrv_fetch_array(sqlsrv_query($connection, "SELECT COUNT(*) FROM RohanGame.dbo.TIndunRestrictInfo where char_id = '$selchar'"));
            $getcharname = sqlsrv_fetch_array(sqlsrv_query($connection,"SELECT name,user_id FROM RohanGame.dbo.TCharacter where id = '$selchar'"));
        
            if($getrecordrestrictdg[0] >= 1){
                $deleterecord = sqlsrv_query($connection,"DELETE RohanGame.dbo.TIndunRestrictInfo where char_id = '$selchar'");
                if($deleterecord)
                {
                    sqlsrv_query($connection, "UPDATE RohanUser.dbo.TUser set gps = gps - 199 where user_id = '$session_id'");
                    sqlsrv_query($connection, "INSERT INTO RohanGeizan.dbo.THistory (description, date, login_id, type, status, price, point) VALUES ('$getcharname[0]',GETDATE(),'$session_id','0','ED','299', 'GPS')");
                    sqlsrv_query($connection, "INSERT INTO RohanUser.dbo.TDisconnect (user_id, server_id, char_id) VALUES ('$getcharname[1]','31','0')");
                    echo '<div class="alert alert-success alert-dismissable col col-lg-12"><p class="block">You have successfully Reset Dungeon Entrace</p></div>';
                }
                else
                {
                    echo '<div class="alert alert-danger alert-dismissable col col-lg-12"><p class="block">Query Error</p></div>';
                }
            }
            else{
                echo '<div class="alert alert-danger alert-dismissable col col-lg-12"><p class="block">'.$getcharname[0].' does not have record in Elemental Dungeon!</p></div>';
            }
        }
        else{
            echo '<div class="alert alert-danger alert-dismissable col col-lg-12"><p class="block">Insufficient Game Points, Kindly Join the Events to Obtain Points!</p></div>';
        }
    }
}
?>