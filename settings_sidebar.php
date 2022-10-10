<?php include_once('settings2modal.php'); 

if($getuserinfo['grade'] >= 200){
    include('tool_modal.php');
}
?>
<header class="main-nav">
    <div class="sidebar-user text-center"><img class="img-90 rounded-circle" src="../assets/images/logo/logo.png" alt="">
    <h6 class="mt-3 f-14 f-w-600"><?php echo $session_username; ?></h6>
        <p class="mb-0 font-roboto"><?php if($getuserinfo['grade'] <= 10) { echo '<font color="Green">Player Account</font>'; } else if($getuserinfo['grade'] <= 200) { echo '<font color="Gray".>Reseller</font>'; } else { echo '<font color="Red">GM Account</font>'; }?></p>
        <div id="refresh">
            <?php include_once('reload_points.php'); ?>
        </div>
        <script type="text/javascript">
            var autoLoad = setInterval(
            function ()
            {
                $('#refresh').load('reload_points.php');
            }, 100);
        </script>
        <hr>
        <?php 
            if($getuserinfo['grade'] >= 200){
                $serverincome = sqlsrv_fetch_array(sqlsrv_query($connection, "SELECT SUM(server_income) FROM RohanGeizan.dbo.TReseller"));
                $resellerincome = sqlsrv_fetch_array(sqlsrv_query($connection, "SELECT SUM(reseller_income) FROM RohanGeizan.dbo.TReseller"));

                echo '<b>Server: &nbsp; '.number_format($serverincome[0],2).' PHP<br></b>';
                echo '<b>Reseller: '.number_format($resellerincome[0],2).' PHP<br></b>';
            }
        ?>
    </div>
    <nav>
    <div class="main-navbar">
        <div class="left-arrow" id="left-arrow"><i data-feather="arrow-left"></i></div>
        <div id="mainnav">           
        <ul class="nav-menu custom-scrollbar">
            <li class="back-btn">
            <div class="mobile-back text-end"><span>Back</span><i class="fa fa-angle-right ps-2" aria-hidden="true"></i></div>
            </li>
            <li class="sidebar-main-title">
            <div>
                <p style="font-size: 15px;">Dashboard</p>
            </div>
            </li>
            <li><a class="nav-link menu-title link-nav" href="index.php"><i class="fa fa-home"></i>&nbsp<span> Home</span></a></li>
            <br>
            <?php if($getuserinfo['grade'] == 250 && $getuserinfo['login_id'] == 'marvin' || $getuserinfo['grade'] == 250 && $getuserinfo['login_id'] == 'maricris') { ?>
            <li class="sidebar-main-title">
            <div>
                <p style="font-size: 15px;">Administrator</p>
            </div>
            </li>
            <li><a class="nav-link menu-title link-nav" href="#" data-bs-toggle="modal" data-bs-target="#SendRPS"><i class="fa fa-lock"></i>&nbsp<span> Send RPS</span></a></li>
            <li><a class="nav-link menu-title link-nav" href="#" data-bs-toggle="modal" data-bs-target="#SendFreebies"><i class="fa fa-edit"></i>&nbsp<span> Send Freebies</span></a></li>
            <li><a class="nav-link menu-title link-nav" href="#" data-bs-toggle="modal" data-bs-target="#SendItemAdmin"><i class="fa fa-edit"></i>&nbsp<span> Send Item</span></a></li>
            <br>
            <?php } ?>
            <?php if($getuserinfo['grade'] == 250 && $getuserinfo['login_id'] == 'maricris' || $getuserinfo['grade'] == 250 && $getuserinfo['login_id'] == 'marvin') { ?>
            <li class="sidebar-main-title">
            <div>
                <p style="font-size: 15px;">Event</p>
            </div>
            </li>
            <li><a class="nav-link menu-title link-nav" href="#" data-bs-toggle="modal" data-bs-target="#SendGPS"><i class="fa fa-lock"></i>&nbsp<span> Send GPS</span></a></li>
            <li><a class="nav-link menu-title link-nav" href="#" data-bs-toggle="modal" data-bs-target="#SendItemEM"><i class="fa fa-edit"></i>&nbsp<span> Send Item</span></a></li>
            <br>
            <?php } ?>
            <?php if($getuserinfo['grade'] == 250 && $getuserinfo['login_id'] == 'marvin' || $getuserinfo['grade'] == 200 && $getuserinfo['login_id'] == 'Rizaldi') {?>
            <li class="sidebar-main-title">
            <div>
                <p style="font-size: 15px;">Reseller</p>
            </div>
            </li>
            <li><a class="nav-link menu-title link-nav" href="#" data-bs-toggle="modal" data-bs-target="#SendRPSReseller"><i class="fa fa-lock"></i>&nbsp<span> Send RPS</span></a></li>
            <li><a class="nav-link menu-title link-nav" href="transactionlogs.php"><i class="fa fa-ticket"></i>&nbsp<span> Transaction Logs</span></a></li>
            <br>
            <?php } ?>
            <?php if($session_username) {?>
            <li class="sidebar-main-title">
            <div>
                <p style="font-size: 15px;">Points</p>
            </div>
            </li>
            <li><a class="nav-link menu-title link-nav" href="redeem.php"><i class="fa fa-square"></i>&nbsp<span> Redeem RPS (<?php echo number_format($getuserinfo['avail_points'], 2); ?>)</span></a></li>
            <br>
            <li class="sidebar-main-title">
            <div>
                <p style="font-size: 15px;">Item Mall</p>
            </div>
            </li>
            <li class="dropdown"><a class="nav-link menu-title" href="javascript:void(0)" data-bs-original-title="" title=""><i class="fa fa-list"></i> &nbsp <span> Category</span><div class="according-menu"><i class="fa fa-angle-right"></i></div></a>
                <ul class="nav-submenu menu-content" style="display: none;">
                    <li><a href="itemmall.php?category=All"><i class="fa fa-thumb-tack"></i> All</a></li>
                    <li><a href="itemmall.php?category=Forging"><i class="fa fa-thumb-tack"></i> Forging</a></li>
                    <li><a href="itemmall.php?category=Upgrade"><i class="fa fa-thumb-tack"></i> Upgrade</a></li>
                    <li><a href="itemmall.php?category=Talisman"><i class="fa fa-thumb-tack"></i> Talismans</a></li>
                    <li><a href="itemmall.php?category=Costume"><i class="fa fa-thumb-tack"></i> Costumes</a></li>
                    <li><a href="itemmall.php?category=Mount"><i class="fa fa-thumb-tack"></i> Mounts</a></li>
                    <li><a href="itemmall.php?category=Scroll"><i class="fa fa-thumb-tack"></i> Scrolls</a></li>
                    <li><a href="itemmall.php?category=Etc"><i class="fa fa-thumb-tack"></i> Etc</a></li>
                    <li><a href="itemmall.php?category=Pet"><i class="fa fa-thumb-tack"></i> Pets</a></li>
                </ul>
            </li>
           <!-- <li><a class="nav-link menu-title link-nav" href="raffle09.php"><i class="fa fa-ticket"></i>&nbsp<span> Raffle Shuffle</span></a></li>-->
            
            <br>
            <li class="sidebar-main-title">
            <div>
                <p style="font-size: 15px;">Exchange Mall</p>
            </div>
            </li>
            <li><a class="nav-link menu-title link-nav" href="emitems.php?page=1"><i class="fa fa-square"></i>&nbsp<span> Items</span></a></li>
            <br>
            <li class="sidebar-main-title">
            <div>
                <p style="font-size: 15px;">Event</p>
            </div>
            </li>
          <li><a class="nav-link menu-title link-nav" href="holiday.php"><i class="fa fa-archive"></i>&nbsp<span> Holiday Giftbox</span></a></li>
            <!--<li><a class="nav-link menu-title link-nav" href="resetdungeon.php"><i class="fa fa-refresh"></i>&nbsp<span> Reset Dungeon</span></a></li>-->
             <!--<li><a class="nav-link menu-title link-nav" href="loginrewards.php"><i class="fa fa-calendar"></i>&nbsp<span> 7 Day Login (Soon)</span></a></li>-->
            <br>
            
            <li class="sidebar-main-title">
            <div>
                <p style="font-size: 15px;">Account</p>
            </div>
            </li>
            <li><a class="nav-link menu-title link-nav" href="#" data-bs-toggle="modal" data-bs-target="#ChangePassword"><i class="fa fa-lock"></i>&nbsp<span> Change Password</span></a></li>
            <li><a class="nav-link menu-title link-nav" href="#" data-bs-toggle="modal" data-bs-target="#ChangeName"><i class="fa fa-edit"></i>&nbsp<span> Change Name</span></a></li>
            <li><a class="nav-link menu-title link-nav" href="#" data-bs-toggle="modal" data-bs-target="#ChangeGender"><i class="fa fa-edit"></i>&nbsp<span> Change Gender</span></a></li>
            <li class="sidebar-main-title">
            <div>
                <p style="font-size: 15px;"></p>
            </div>
            </li>
            <li><a class="nav-link menu-title link-nav" href="myitems.php"><i class="fa fa-star"></i>&nbsp<span> Sealed Items</span></a></li>
            <li class="sidebar-main-title">
            <div>
                <p style="font-size: 15px;"></p>
            </div>
            </li>
            <li><a class="nav-link menu-title link-nav" href="transactions.php"><i class="fa fa-ticket"></i>&nbsp<span> My Transactions</span></a></li>
            <!--<li><a class="nav-link menu-title link-nav" href="mytickets.php"><i class="fa fa-ticket"></i>&nbsp<span> My Tickets</span></a></li>-->
            <br>

            <?php } ?>
            <!--   
            <li class="sidebar-main-title">
            <div>
                <p style="font-size: 15px;">Points</p>
            </div>
            </li>
            <li><a class="nav-link menu-title link-nav" href="#"><i class="fa fa-money"></i>&nbsp<span> Redeem RPS</span></a></li>
            <li><a class="nav-link menu-title link-nav" href="#"><i class="fa fa-exchange"></i></i>&nbsp<span> Trade RPS (Soon)</span></a></li>
            -->
            <br>
            <br>
            <br>
            <br>
            <br>
            <br>
            
            
            <br>
            <br>
            <br>
        </div>
        <div class="right-arrow" id="right-arrow"><i data-feather="arrow-right"></i></div>
    </div>
    </nav>
</header>