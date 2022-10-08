<?php 
include_once('../settings_database.php');

$getuserinfo = sqlsrv_fetch_array(sqlsrv_query($connection, "SELECT * FROM RohanUser.dbo.TUser WHERE login_id = '$session_username'"));

if($getuserinfo['grade'] == 250){
    if(isset($_POST['sendrps'])){
        if($found){
            echo '<script>alert("SQL Injection Detected!");</script>';
        }
        else{
            $username = $_POST['username'];
            $points = $_POST['points'];
            $comments = $_POST['comments'];
            $amount = $_POST['amount'];

            $checkuser = sqlsrv_fetch_array(sqlsrv_query($connection, "SELECT COUNT(*) FROM RohanUser.dbo.TUser WHERE login_id = '$username'"));

            if($checkuser[0] == 1){
                sqlsrv_query($connection, "UPDATE RohanUser.dbo.TUser SET avail_points = avail_points + $points WHERE login_id = '$username'");
                sqlsrv_query($connection, "INSERT INTO RohanGeizan.dbo.TRps (username, points, comments, date, type, amount) VALUES ('$username','$points','$comments',GETDATE(), 'RPS','$amount')");
                echo '<script>alert("Points Successfully Sent!");</script>';
                echo '<meta http-equiv="refresh" content="0; url=redirect.php">';    
            }
            else{
                echo '<script>alert("Username not exist!");</script>';
                echo '<meta http-equiv="refresh" content="0; url=redirect.php">';    
            }
            
        }
    }

    if(isset($_POST['sendgps'])){
        if($found){
            echo '<script>alert("SQL Injection Detected!");</script>';
        }
        else{
            $charname = $_POST['charname'];
            $points = $_POST['points'];
            $comments = $_POST['comments'];

            $checkchar = sqlsrv_fetch_array(sqlsrv_query($connection, "SELECT * FROM RohanGame.dbo.TCharacter WHERE name = '$charname'"));

            if($checkchar['name'] == $charname){
                $user_id = $checkchar['user_id'];
                sqlsrv_query($connection, "UPDATE RohanUser.dbo.TUser SET gps = gps + $points WHERE user_id = '$user_id'");
                sqlsrv_query($connection, "INSERT INTO RohanGeizan.dbo.TRps (username, points, comments, date, type) VALUES ('$username','$points','$comments',GETDATE(), 'GPS')");
                echo '<script>alert("Points Successfully Sent!");</script>';
                echo '<meta http-equiv="refresh" content="0; url=redirect.php">';    
            }
            else{
                echo '<script>alert("Character not exist!");</script>';
                echo '<meta http-equiv="refresh" content="0; url=redirect.php">';    
            }
            
        }
    }

    if(isset($_POST['onlinefreebies'])){
        if($found){
            echo '<script>alert("SQL Injection Detected!");</script>';
        }
        else{
            $itemcode = $_POST['itemcode'];
            $stack = $_POST['stack'];
            $attr = $_POST['attr'];

            sqlsrv_query($connection, "INSERT INTO RohanGame.dbo.TEventItem SELECT $itemcode,$attr,$stack,0,0,0,0,0,char_id,GETDATE() FROM RohanGame.dbo.TCharacterLogin WHERE login = 1");
            sqlsrv_query($connection, "INSERT INTO RohanGeizan.dbo.TLogs (username,type,stack,attr,character,date) VALUES ('$session_username','$itemcode','$stack','$attr','Online',GETDATE())");
            echo '<script>alert("Freebies Sent to All Online Players Only!");</script>';
            echo '<meta http-equiv="refresh" content="0; url=redirect.php">';    
        }
    }

    if(isset($_POST['allfreebies'])){
        if($found){
            echo '<script>alert("SQL Injection Detected!");</script>';
        }
        else{
            $itemcode = $_POST['itemcode'];
            $stack = $_POST['stack'];
            $attr = $_POST['attr'];

            sqlsrv_query($connection, "INSERT INTO RohanGame.dbo.TEventItem SELECT $itemcode,$attr,$stack,0,0,0,0,0,id,GETDATE() FROM RohanGame.dbo.TCharacter");
            sqlsrv_query($connection, "INSERT INTO RohanGeizan.dbo.TLogs (username,type,stack,attr,character,date) VALUES ('$session_username','$itemcode','$stack','$attr','All',GETDATE())");
            echo '<script>alert("Freebies Sent to All Players!");</script>';
            echo '<meta http-equiv="refresh" content="0; url=redirect.php">';    
        }
    }

    if(isset($_POST['senditem'])){
        if($found){
            echo '<script>alert("SQL Injection Detected!");</script>';
        }
        else{
            $itemcode = $_POST['itemcode'];
            $stack = $_POST['stack'];
            $attr = $_POST['attr'];
            $charname = $_POST['charname'];

            $checkchar = sqlsrv_fetch_array(sqlsrv_query($connection, "SELECT COUNT(*) FROM RohanGame.dbo.TCharacter WHERE name = '$charname'"));

            if($checkchar[0] == 1){
                sqlsrv_query($connection, "INSERT INTO RohanGame.dbo.TEventItem SELECT $itemcode,$attr,$stack,0,0,0,0,0,id,GETDATE() FROM RohanGame.dbo.TCharacter WHERE name = '$charname'");
                sqlsrv_query($connection, "INSERT INTO RohanGeizan.dbo.TLogs (username,type,stack,attr,character,date) VALUES ('$session_username','$itemcode','$stack','$attr','$charname',GETDATE())");
                echo '<script>alert("Item Successfully Sent To '.$charname.'!");</script>';
                echo '<meta http-equiv="refresh" content="0; url=redirect.php">';    
            }
            else{
                echo '<script>alert("Character Not Exist!");</script>';
                echo '<meta http-equiv="refresh" content="0; url=redirect.php">';    
            }
        }
    }

    if(isset($_POST['senditemem'])){
        if($found){
            echo '<script>alert("SQL Injection Detected!");</script>';
        }
        else{
            $itemcode = $_POST['itemcode'];
            $attr = $_POST['attr'];
            $charname = $_POST['charname'];

            $checkchar = sqlsrv_fetch_array(sqlsrv_query($connection, "SELECT COUNT(*) FROM RohanGame.dbo.TCharacter WHERE name = '$charname'"));

            if($checkchar[0] == 1){
                sqlsrv_query($connection, "INSERT INTO RohanGame.dbo.TEventItem SELECT $itemcode,$attr,0x4c03,0,0,0,0,0,id,GETDATE() FROM RohanGame.dbo.TCharacter WHERE name = '$charname'");
                sqlsrv_query($connection, "INSERT INTO RohanGeizan.dbo.TLogs (username,type,stack,attr,character,date) VALUES ('$session_username','$itemcode','$stack','$attr','$charname',GETDATE())");
                echo '<script>alert("Item Successfully Sent To '.$charname.'!");</script>';
                echo '<meta http-equiv="refresh" content="0; url=redirect.php">';    
            }
            else{
                echo '<script>alert("Character Not Exist!");</script>';
                echo '<meta http-equiv="refresh" content="0; url=redirect.php">';    
            }
        }
    }
}

if($getuserinfo['grade'] >= 200){
    if(isset($_POST['sendrpsreseller'])){
        if($found){
            echo '<script>alert("SQL Injection Detected!");</script>';
        }
        else{
            $username = $_POST['username'];
            $points = $_POST['points'];
            $comments = $_POST['comments'];
            $amountusd = $_POST['amountusd'];

            $serverincome = $amountusd * 0.65;
            $resellerincome = $amountusd * 0.35;

            $checkuser = sqlsrv_fetch_array(sqlsrv_query($connection, "SELECT COUNT(*) FROM RohanUser.dbo.TUser WHERE login_id = '$username'"));

            if($checkuser[0] == 1){
                sqlsrv_query($connection, "UPDATE RohanUser.dbo.TUser SET rps = rps + $points WHERE login_id = '$username'");
                sqlsrv_query($connection, "INSERT INTO RohanGeizan.dbo.TReseller (username, points, comments, amount, server_income, reseller_income, date, reseller_id) VALUES ('$username','$points','$comments','$amountusd','$serverincome','$resellerincome',GETDATE(), '$session_username')");
                echo '<script>alert("Points Successfully Sent!");</script>';
                echo '<meta http-equiv="refresh" content="0; url=redirect.php">';    
            }
            else{
                echo '<script>alert("Username not exist!");</script>';
                echo '<meta http-equiv="refresh" content="0; url=redirect.php">';    
            }
            
        }
    }
}

?>