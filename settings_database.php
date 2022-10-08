<?php 
error_reporting(0);

include('sqlinjection/sql_priva.php');
include('sqlinjection/sql_check.php');
include('sqlinjection/sql_inject.php');
include('sqlinjection/sql_injection.php');

/* SESSIONS */
session_start();
$session_id = $_SESSION['user_id'];
$session_username = $_SESSION['username'];
$session_password = $_SESSION['password'];

/* DATABASE CONFIGURATION */
$serverName = 'WIN-2PJGC0MOLO7';
$uid        = 'sa';
$pwd        = 'P@ssword123x!@#!!!!!';
$connectionInfo = array( "UID"=>$uid, "PWD"=>$pwd, "Database" =>  "RohanUser");

$connection = sqlsrv_connect( $serverName, $connectionInfo);
if( $connection === false ) {
  print_r(sqlsrv_errors());
  die ('Unable to connect to the database'); # Unable to connect to the database
}

/* SQL PREVENTION FOR POST METHOD */
$array_char = array("/","\\","*",":","!","?", "&", "%", "ù","^", "$", "=","¨","{","}","(",")","~","#","[","]","ç","à","é","€","§",";","¤","°","£","`","<",">");
$found = false;
foreach($_POST as $value)
foreach($array_char as $word){
if(substr_count($value, $word) > 0){
    $found = true;
    }
}
?>

