<?php
include('../settings_database.php');

if($found){
    echo '<div class="alert alert-danger alert-dismissable col col-lg-12"><p class="block">SQL Injection Detected!</p></div>';
}
else{
    
    $itemid = $_POST['itemid'];
    
    $getiteminfo = sqlsrv_fetch_array(sqlsrv_query($connection, "SELECT * FROM RohanGeizan.dbo.TItems where itemid = '$itemid'"));
    $dbname = $getiteminfo['itemname'];
    $dbtype = $getiteminfo['type'];
    $dbprice = $getiteminfo['price'];
    $dbqty = $getiteminfo['qty'];
    $dbcategory = $getiteminfo['category'];
    $dbimg = $getiteminfo['img'];

    $tax = $dbprice * 0.25;
    $additional = $dbprice + $tax;

    $getaccountems = sqlsrv_fetch_array(sqlsrv_query($connection, "SELECT gps FROM RohanUser.dbo.TUser where user_id = '$session_id'"));

    if($getaccountems[0] >= $additional){
        $insertitem = sqlsrv_query($connection,"INSERT INTO RohanMall.dbo.TItem SELECT $dbtype,0x00,$dbqty,0,0,0,0,0,[user_id],GETDATE(),0 FROM RohanUser.dbo.TUser where user_id = '$session_id'");

        if($insertitem)
        {
            sqlsrv_query($connection, "UPDATE RohanUser.dbo.TUser set gps = gps - $additional where user_id = '$session_id'");
            sqlsrv_query($connection, "INSERT INTO RohanGeizan.dbo.THistory (description, date, login_id, type, status, price, point) VALUES ('',GETDATE(),'$session_id','$dbtype','IM','$additional', 'GPS')");
            echo '<div class="alert alert-success alert-dismissable col col-lg-12"><p class="block">You have successfully purchased - '.$dbname.'</p></div>';
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
?>