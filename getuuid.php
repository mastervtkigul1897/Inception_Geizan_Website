<?php 


function GetMAC(){
    ob_start();
    system('getmac');
    $Content = ob_get_contents();
    ob_clean();
    return substr($Content, strpos($Content,'\\')-20, 17);
}

function isWindows() {
    return preg_match("/(Windows)/i", $_SERVER["HTTP_USER_AGENT"]);
}

// Use the function
if(isWindows()){
    echo GetMAC();
    echo $_SERVER['HTTP_X_FORWARDED_FOR'];
    echo "<br>ALLOWED";
}
else {
    echo GetMAC();
    echo $_SERVER['HTTP_X_FORWARDED_FOR'];
    echo "NOT ALLOWED";
}

?>