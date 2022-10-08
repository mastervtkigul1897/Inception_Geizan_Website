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

    $getaccountems = sqlsrv_fetch_array(sqlsrv_query($connection, "SELECT ems FROM RohanUser.dbo.TUser where user_id = '$session_id'"));

    if($getaccountems[0] >= $dbprice){
        $insertitem = sqlsrv_query($connection,"INSERT INTO RohanMall.dbo.TItem SELECT $dbtype,0x00,$dbqty,0,0,0,0,0,[user_id],GETDATE(),0 FROM RohanUser.dbo.TUser where user_id = '$session_id'");

        if($insertitem)
        {
            sqlsrv_query($connection, "UPDATE RohanUser.dbo.TUser set ems = ems - $dbprice where user_id = '$session_id'");
            sqlsrv_query($connection, "INSERT INTO RohanGeizan.dbo.THistory (description, date, login_id, type, status, price, point) VALUES ('',GETDATE(),'$session_id','$dbtype','IM','$dbprice', 'EMS')");
            echo '<div class="alert alert-success alert-dismissable col col-lg-12"><p class="block">You have successfully purchased - '.$dbname.'</p></div>';
        }
        else
        {
            echo '<div class="alert alert-danger alert-dismissable col col-lg-12"><p class="block">Insert Mall Item Query Error</p></div>';
        }
    }
    else{
        echo '<div class="alert alert-danger alert-dismissable col col-lg-12"><p class="block">Insufficient Exchange Mall Points, Kindly Use Exchange Mall to Obtain Points!</p></div>';
    }

    
}
?>