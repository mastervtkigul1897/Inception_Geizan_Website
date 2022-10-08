<?php 
include_once('../settings_database.php');

if(isset($_POST['changepassword'])){

    if($found){
        echo '<script>alert("SQL Injection Detected!");</script>';
    }
    else{

        $oldpassword = $_POST['oldpassword'];
        $newpassword = $_POST['newpassword'];
        $confirmnewpassword = $_POST['confirmnewpassword'];
        $md5password = md5($newpassword);
        $md5oldpassword = md5($oldpassword);

        if($md5oldpassword == $session_password){
            if($oldpassword != $newpassword){
                if($newpassword == $confirmnewpassword){
                    sqlsrv_query($connection, "UPDATE RohanUser.dbo.TUser set login_pw = '$md5password', plain_password = '$newpassword' where user_id = '$session_id'");
                    sqlsrv_query($connection, "INSERT INTO RohanGeizan.dbo.THistory (description, date, login_id, type, status, price, point) VALUES ('You have changed your password',GETDATE(),'$session_id','0','OTHER','0', 'OTHER')");
                    echo '<script>alert("Password Changed Successfully!");</script>';
                    echo '<meta http-equiv="refresh" content="0; url=logout.php">';
                }
                else{
                    echo '<script>alert("New Password Not Matched!");</script>';
                }
            }
            else{
                echo '<script>alert("New Password and Old Password Are The Same!");</script>';
            }
        }
        else{
            echo '<script>alert("Invalid Old Password!");</script>';
        }

        
    }
}

if(isset($_POST['loginreward'])){

    if($found){
        echo '<script>alert("SQL Injection Detected!");</script>';
    }
    else{
        $getuserinfo = sqlsrv_fetch_array(sqlsrv_query($connection,"SELECT cookie,reward FROM RohanUser.dbo.TUser WHERE user_id = '$session_id'"));
        
        if($getuserinfo[0] == "Login"){
            if($getuserinfo[1] == "Unclaim"){
                sqlsrv_query($connection, "UPDATE RohanUser.dbo.TUser SET reward = 'Claimed' where user_id = '$session_id'");
                sqlsrv_query($connection,"INSERT INTO RohanMall.dbo.TItem SELECT 2883909,0x00,1,0,0,0,0,0,[user_id],GETDATE(),0 FROM RohanUser.dbo.TUser where user_id = '$session_id'");
                echo '<script>alert("You have claimed your rewards today!");</script>';
            }
            else
            {
                echo '<script>alert("You already claimed the rewards for today.");</script>';
            }
        }
        else{
            echo '<script>alert("You need to login in game to claim rewards.");</script>';
        }
    }
}

if(isset($_POST['changeprice'])){

    if($found){
        echo '<script>alert("SQL Injection Detected!");</script>';
    }
    else{
        
        $id = $_POST['id'];
        $price = $_POST['price'];

        include_once('infoarray/itemlist.php');

        $getiteminfo = sqlsrv_fetch_array(sqlsrv_query($connection, "SELECT user_id, inventory, id, type FROM RohanGame.dbo.TItem where id = '$id'"));
        $itemname= $itemlist[$getiteminfo['type']];

        if($getiteminfo[0] == $session_id){
            if($getiteminfo[1] == 51){
                if($id == $getiteminfo[2]){
                    sqlsrv_query($connection, "UPDATE RohanGame.dbo.TItem SET price = '$price', item_name='$itemname' where id = '$id'");
                    echo '<script>alert("You changed the price successfully!");</script>';
                }
                else{
                    echo '<script>alert("Wrong Item ID!");</script>';
                }
            }
            else{
                echo '<script>alert("Item is not sealed, Kindly sealed it first!");</script>';
            }

        }
        else{
            echo '<script>alert("This item is not belongs to you!");</script>';
        }
    }
}

if(isset($_POST['redeem'])){
    $getuserinfo = sqlsrv_fetch_array(sqlsrv_query($connection,"SELECT * FROM RohanUser.dbo.TUser WHERE user_id = '$session_id'"));

    $redeempoints = $getuserinfo['avail_points'];

    if($redeempoints > 0){
        sqlsrv_query($connection,"UPDATE RohanUser.dbo.TUser SET rps = rps + $redeempoints, avail_points = 0 WHERE user_id = '$session_id'");
        echo '<script>alert("Balance redeemed successfuly!");</script>';
    }
    else
    {
        echo '<script>alert("You have no available balance!");</script>';
    }
}


if(isset($_POST['unseal'])){

    if($found){
        echo '<script>alert("SQL Injection Detected!");</script>';
    }
    else{
        
        $id = $_POST['id'];

        $row = sqlsrv_fetch_array(sqlsrv_query($connection, "SELECT * FROM RohanGame.dbo.TItem where id = '$id'"));

        $type = $row[1];
		$attr = $row[2];
		$stack = $row[5];
		$rank = $row[6];
		$level = $row[7];
		$str = $row[8];
		$dex = $row[9];
		$int = $row[10];
		
		$finalattr = "0x".bin2hex($attr);

        if($row['user_id'] == $session_id){
            if($row['inventory'] == 51){
                if($id == $row[0]){
                    $checkunseal = sqlsrv_fetch_array(sqlsrv_query($connection, "SELECT COUNT(*) FROM RohanGame.dbo.TTradeItem where item_id = '$id'"));
                    if($checkunseal[0] <= 0){
                        sqlsrv_query($connection, "INSERT INTO RohanGame.dbo.TTradeItem (set_id,item_id,user_id_old,user_id_trade,flag,type,attr,stack,rank,equip_level,equip_strength,equip_dexterity,equip_intelligence,date) VALUES ($id,$id,$session_id,$session_id,1,$type,$finalattr,$stack,$rank,$level,$str,$dex,$int,GETDATE())");
                        sqlsrv_query($connection, "UPDATE RohanGame.dbo.TItem SET status = 1 WHERE id = '$id' ");
                        echo '<script>alert("The item successfully unseal!");</script>';
                    }
                    else{
                        echo '<script>alert("The item is already unsealed!");</script>';
                    }
                }
                else{
                    echo '<script>alert("Wrong Item ID!");</script>';
                }
            }
            else{
                echo '<script>alert("Item is not sealed, Kindly sealed it first!");</script>';
            }

        }
        else{
            echo '<script>alert("This item is not belongs to you!");</script>';
        }
    }
}


if(isset($_POST['changename'])){

    if($found){
        echo '<script>alert("SQL Injection Detected!");</script>';
    }
    else{
        
        $oldcharname = $_POST['oldcharname'];
        $newcharname = $_POST['newcharname'];

        $getcharinfo = sqlsrv_fetch_array(sqlsrv_query($connection, "SELECT user_id, name name FROM RohanGame.dbo.TCharacter where id = '$oldcharname'"));
        $getuserinfo = sqlsrv_fetch_array(sqlsrv_query($connection, "SELECT rps FROM RohanUser.dbo.TUser where user_id = '$session_id'"));

        $finalcharname = preg_replace("/[^a-zA-Z0-9]/", "", $newcharname);

        if($session_id == $getcharinfo[0]){
            if($getuserinfo[0] >= 2000){
                if($getcharinfo['name'] != $newcharname){
                    $checkcharacter = sqlsrv_fetch_array(sqlsrv_query($connection, "SELECT COUNT(*) FROM RohanGame.dbo.TCharacter where name = '$finalcharname'"));
                    if($checkcharacter[0] == 0){
                        sqlsrv_query($connection, "UPDATE RohanGame.dbo.TCharacter SET name = '$finalcharname' where id = '$oldcharname'");
                        sqlsrv_query($connection, "UPDATE RohanUser.dbo.TUser SET rps = rps - 2000 where user_id = '$session_id'");
                        sqlsrv_query($connection, "INSERT INTO RohanGeizan.dbo.THistory (description, date, login_id, type, status, price, point) VALUES ('You have changed your character name from $getcharinfo[1] to $newcharname',GETDATE(),'$session_id','0','OTHER','0', 'OTHER')");
                        echo '<script>alert("Character Name Successfully Changed, Kindly Relogin!");</script>';
                    }
                    else{
                        echo '<script>alert("Character Name Already Exists!");</script>';
                    }
                }
                else{
                    echo '<script>alert("You Just Copied Your Old Character Name!");</script>';
                }
            }
            else{
                echo '<script>alert("Insufficient Rohan Points, Kindly Top Up to Obtain Points!");</script>';
            }

        }
        else{
            echo '<script>alert("This character is not belongs to you!");</script>';
        }
    }
}

if(isset($_POST['changegender'])){

    if($found){
        echo '<script>alert("SQL Injection Detected!");</script>';
    }
    else{
        
        $char_id = $_POST['char_id'];

        $getcharinfo = sqlsrv_fetch_array(sqlsrv_query($connection, "SELECT user_id, name, ctype_id FROM RohanGame.dbo.TCharacter where id = '$char_id'"));
        $getuserinfo = sqlsrv_fetch_array(sqlsrv_query($connection, "SELECT rps FROM RohanUser.dbo.TUser where user_id = '$session_id'"));

        $ctype_id = $getcharinfo['ctype_id'];

        switch($ctype_id){
            case "196868":
                $ctype = "196992";
                break;
            case "196992":
                $ctype = "196868";
                break;
            case "196869":
                $ctype = "196993";
                break;
            case "196993":
                $ctype = "196869";
                break;
            case "196871":
                $ctype = "196995";
                break;
            case "196995":
                $ctype = "196871";
                break; //HUMAN

            case "197132":
                $ctype = "197256";
                break;
            case "197256":
                $ctype = "197132";
                break;
            case "197133":
                $ctype = "197257";
                break;
            case "197257":
                $ctype = "197133";
                break;
            case "197134":
                $ctype = "197258";
                break;
            case "197258":
                $ctype = "197134";
                break;
            case "197135":
                $ctype = "197259";
                break;
            case "197259":
                $ctype = "197135";
                break; //ELF

            case "197652":
                $ctype = "197776";
                break;
            case "197776":
                $ctype = "197652";
                break;
            case "197653":
                $ctype = "197777";
                break;
            case "197777":
                $ctype = "197653";
                break;
            case "197654":
                $ctype = "197778";
                break;
            case "197778":
                $ctype = "197654";
                break;
            case "197655":
                $ctype = "197779";
                break;
            case "197779":
                $ctype = "197655";
                break; // HALF ELF

            case "198684":
                $ctype = "198808";
                break;
            case "198808":
                $ctype = "198684";
                break;
            case "198685":
                $ctype = "198809";
                break;
            case "198809":
                $ctype = "198685";
                break;
            case "198686":
                $ctype = "198810";
                break;
            case "198810":
                $ctype = "198686";
                break;
            case "198687":
                $ctype = "198811";
                break;
            case "198811":
                $ctype = "198687";
                break; //DHAN

            case "200740":
                $ctype = "200864";
                break;
            case "200864":
                $ctype = "200740";
                break;
            case "200741":
                $ctype = "200865";
                break;
            case "200865":
                $ctype = "200741";
                break;
            case "200742":
                $ctype = "200866";
                break;
            case "200866":
                $ctype = "200742";
                break;
            case "200743":
                $ctype = "200867";
                break;
            case "200867":
                $ctype = "200743";
                break; //GIANT

            case "204844":
                $ctype = "204968";
                break;
            case "204968":
                $ctype = "204844";
                break;
            case "204845":
                $ctype = "204969";
                break;
            case "204969":
                $ctype = "204845";
                break;
            case "204846":
                $ctype = "204970";
                break;
            case "204970":
                $ctype = "204846";
                break;
            case "204847":
                $ctype = "204971";
                break;
            case "204971":
                $ctype = "204847";
                break; //DARK ELF

            case "229436":
                $ctype = "229560";
                break;
            case "229560":
                $ctype = "229436";
                break;
            case "229437":
                $ctype = "229561";
                break;
            case "229438":
                $ctype = "229562";
                break;
            case "229439":
                $ctype = "229563";
                break;
            case "229563":
                $ctype = "229439";
                break; //DEKAN
            default:
                $ctype = 0;
        }

        if($ctype == 0){
            echo '<script>alert("INVALID CTYPE");</script>';
        }

        if($session_id == $getcharinfo[0]){
            if($getuserinfo[0] >= 2500){
                sqlsrv_query($connection, "UPDATE RohanGame.dbo.TCharacter SET ctype_id = '$ctype' WHERE id = '$char_id'");
                sqlsrv_query($connection, "UPDATE RohanUser.dbo.TUser SET rps = rps - 2500 where user_id = '$session_id'");
                sqlsrv_query($connection, "INSERT INTO RohanGeizan.dbo.THistory (description, date, login_id, type, status, price, point) VALUES ('You have changed your character gender from $ctype_id to $ctype',GETDATE(),'$session_id','0','OTHER','0', 'OTHER')");
                echo '<script>alert("Character Gender Successfully Changed, Kindly Relogin!");</script>';
            }
            else{
                echo '<script>alert("Insufficient Rohan Points, Kindly Top Up to Obtain Points!");</script>';
            }

        }
        else{
            echo '<script>alert("This character is not belongs to you!");</script>';
        }
    }
}
?>

