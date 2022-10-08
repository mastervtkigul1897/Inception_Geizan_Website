<?php include('settings_config.php'); ?>
<ul>
    <li><span class="counter"><?php echo number_format($getuserinfo['rps'], 2);?></span><p>RPS</p></li>
    <li><span class="counter"><?php echo number_format($getuserinfo['ems'], 2);?></span><p>EMS</p></li>
    <li><span class="counter"><?php echo number_format($getuserinfo['gps'], 2);?></span><p>GPS </p></li>
</ul>
<br>
<b>SV Time: <font color="blue"><?php date_default_timezone_set('Africa/Conakry'); echo $runningTime = date('h:i A'); ?></b></font><br>
<b>PH Time: <font color="green"><?php date_default_timezone_set('Asia/Manila'); echo $runningTime = date('h:i A'); ?></b></font><br>
