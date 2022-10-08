<?php 
error_reporting(0);
include_once('settings_database.php');
include_once('controller/change_function.php');

/* PAGE(S) CONFIG */
$title = "Rohan: Inception | Home";
$register = "Rohan: Inception | Auth";
$itemmall = "Rohan: Inception | Mall";
$copyright = "Rohan: Inception";


/* GET METHOD DECLARATION */
$category = $_GET['category'];
$charname = $_GET['charname'];

/* SQL PREVENTION FOR GET METHOD */
$array_char = array("'","/","\\","*",":","!","?", "&", "%", "ù","^", "$", "=","¨","{","}","(",")","~","#","[","]","ç","à","é","€","§",";","¤","°","£","`","<",">");
$found = false;
foreach($_GET as $value)
foreach($array_char as $word){
if(substr_count($value, $word) > 0){
    $found = true;
    }
}

$limit = 30;  
if (isset($_GET["page"])) { $page  = $_GET["page"]; } else { $page=1; };  
$start_from = ($page-1) * $limit; 

/** GET CHAR ID */
$getcharid =  sqlsrv_fetch_array(sqlsrv_query($connection, "SELECT id FROM RohanGame.dbo.TCharacter WHERE name = '$charname'"));
$getresultcharitem = "SELECT * FROM RohanGame.dbo.TItem WHERE char_id = $getcharid[0] ORDER BY inventory ASC OFFSET  $start_from ROWS  FETCH NEXT $limit ROWS ONLY";

/**------------------------ PAGE-START-QUERIES ---------------------------------*/

/** GET ACCOUNT DATA*/
$getuserinfo = sqlsrv_fetch_array(sqlsrv_query($connection, "SELECT * FROM RohanUser.dbo.TUser where user_id = '$session_id'"));

/** GET ITEM MALL ITEMS */
$getallitems = "SELECT * FROM RohanGeizan.dbo.TItems";
$getitemsbycategory = "SELECT * FROM RohanGeizan.dbo.TItems where category = '$category'";

/** GET SEALED ITEMS */ 

$getmyitems = "SELECT * FROM RohanGame.dbo.TItem where user_id = $session_id and inventory = 51 and status = 0";
$getemitems = "SELECT * FROM RohanGame.dbo.TItem where user_id != $session_id and inventory = 51 and status = 0 and price != 0 ORDER BY date_registered DESC OFFSET  $start_from ROWS  FETCH NEXT $limit ROWS ONLY";

$s = $_GET['s'];
$getemitems_s = "SELECT * FROM RohanGame.dbo.TItem where item_name LIKE '%$s%' and user_id != $session_id and inventory = 51 and status = 0 and price != 0 ORDER BY date_registered DESC OFFSET  $start_from ROWS  FETCH NEXT $limit ROWS ONLY";
/** GET MY CHARACTERS */
$getmychars = "SELECT * FROM RohanGame.dbo.TCharacter where user_id = '$session_id'";

/** GET TRANSACTION HISTORY */

$gebuyerlogsquery = "SELECT * FROM RohanGeizan.dbo.THistory WHERE login_id = '$session_id' and status = 'EM'";
$getselllogs = "SELECT * FROM RohanGeizan.dbo.THistory WHERE seller_id = '$session_id' and status = 'EM'";
$getimlogs = "SELECT * FROM RohanGeizan.dbo.THistory WHERE login_id = '$session_id' and status = 'IM'";
$getotherlogs = "SELECT * FROM RohanGeizan.dbo.THistory WHERE login_id = '$session_id' and status = 'OTHER'";

$getincome = "SELECT * FROM RohanGeizan.dbo.TReseller";

/** GET RAFFLE ENTRIES */
$getraffleentries = "SELECT * FROM RohanGeizan.dbo.TRaffle";
$getraffleentriesindv = "SELECT * FROM RohanGeizan.dbo.TRaffle WHERE username = '$session_username'";

/** GET GACHAPON ENTRIES */
$getgachapon = "SELECT * FROM RohanGeizan.dbo.THistory WHERE status = 'HG'";

/** GET RESET DUNGEON ENTRIES */
$getrd = "SELECT * FROM RohanGeizan.dbo.THistory WHERE status = 'ED'";

/** GET ONLINE PLAYERS */
$getonline = "SELECT COUNT(*) FROM RohanGame.dbo.TCharacterLogin WHERE login = 1";
/**------------------------ PAGE-END-QUERIES ----------------------------------*/

?>
