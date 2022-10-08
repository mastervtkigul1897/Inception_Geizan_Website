<?php 
include('../settings_database.php');

if($found){
    echo '<script>alert("SQL Injection Detected!");</script>';
}
else{
    
    $id = $_POST['id'];

    $row = sqlsrv_fetch_array(sqlsrv_query($connection, "SELECT * FROM RohanGame.dbo.TItem where id = '$id'"));

    $user_id_old = $row['user_id'];
    $type = $row[1];
    $attr = $row[2];
    $stack = $row[5];
    $rank = $row[6];
    $level = $row[7];
    $str = $row[8];
    $dex = $row[9];
    $int = $row[10];
    $price = $row['price'];
    
    $finalattr = "0x".bin2hex($attr);
    $tax = $price * 0.10;
    $finalprice = $price - $tax;

    $getuserinfo = sqlsrv_fetch_array(sqlsrv_query($connection, "SELECT * FROM RohanUser.dbo.TUser WHERE user_id = '$session_id'"));

    if($row['user_id'] != $session_id){
        if($row['inventory'] == 51){
            if($id == $row[0]){
                if($getuserinfo['rps'] >= $price){
                    $checkunseal = sqlsrv_fetch_array(sqlsrv_query($connection, "SELECT COUNT(*) FROM RohanGame.dbo.TTradeItem where item_id = '$id'"));
                    if($checkunseal[0] <= 0){
                        sqlsrv_query($connection, "INSERT INTO RohanGame.dbo.TTradeItem (set_id,item_id,user_id_old,user_id_trade,flag,type,attr,stack,rank,equip_level,equip_strength,equip_dexterity,equip_intelligence,date) VALUES ($id,$id,$session_id,$session_id,1,$type,$finalattr,$stack,$rank,$level,$str,$dex,$int,GETDATE())");
                        sqlsrv_query($connection, "UPDATE RohanGame.dbo.TItem SET status = 1 WHERE id = '$id' ");
                        sqlsrv_query($connection, "UPDATE RohanUser.dbo.TUser SET rps = rps - $price WHERE user_id = '$session_id'");
                        sqlsrv_query($connection, "UPDATE RohanUser.dbo.TUser SET ems = ems + $finalprice WHERE user_id = '$user_id_old'");
                        sqlsrv_query($connection, "UPDATE RohanGame.dbo.TItem SET user_id = $session_id WHERE id = '$id'");
                        sqlsrv_query($connection, "INSERT INTO RohanGeizan.dbo.THistory (description, date, login_id, type, status, price, point, seller_id) VALUES ('',GETDATE(),'$session_id','$type','EM','$price', 'RPS','$user_id_old')");
                        //sqlsrv_query($connection, "INSERT INTO RohanGeizan.dbo.THistory (description, date, login_id, type, status, price, point, seller_buyer) VALUES ('',GETDATE(),'$user_id_old','$type','SELLER','$price', 'RPS','$session_id')");
                        echo '<div class="alert alert-success alert-dismissable col col-lg-12"><p class="block">You Have Purchased the Item Successfully!</p></div>';
                    }
                    else{
                        echo '<div class="alert alert-danger alert-dismissable col col-lg-12"><p class="block">Unable to do this action!</p></div>';
                    }
                }
                else{
                    echo '<div class="alert alert-danger alert-dismissable col col-lg-12"><p class="block">Insufficient Rohan Points, Kindly Top Up to Obtain Points!</p></div>';
                }
            }
            else{
                echo '<div class="alert alert-danger alert-dismissable col col-lg-12"><p class="block">Wrong Item</p></div>';
            }
        }
        else{
            echo '<div class="alert alert-danger alert-dismissable col col-lg-12"><p class="block">Item is Not Sealed, Kindly Sealed it First!</p></div>';
        }

    }
    else{
        echo '<div class="alert alert-danger alert-dismissable col col-lg-12"><p class="block">This Item Already Belongs To You!</p></div>';
    }
}

?>