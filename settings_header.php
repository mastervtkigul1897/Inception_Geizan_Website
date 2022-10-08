<div class="page-main-header">
    <div class="main-header-right row m-0">
        <div class="main-header-left">
            <div class="toggle-sidebar"><i class="status_toggle middle" data-feather="align-center" id="sidebar-toggle"></i></div>
        </div>
        <div class="left-menu-header col"><p><b><marquee>VENGEANCE IS ALWAYS AN OPTION</marquee></b></p></div>
       
        <div class="nav-right col pull-right right-menu p-0">
        <ul class="nav-menus">
            <li><a class="text-dark" href="#!" onclick="javascript:toggleFullScreen()"><i data-feather="maximize"></i></a></li>
            <li>
            <div class="mode"><i class="fa fa-moon-o"></i></div>
            </li>
            <?php if($session_username){ ?>
            <li class="onhover-dropdown p-0">
                <button class="btn btn-primary-light" type="button"><a href="logout.php"><i data-feather="log-out"></i>Logout</a></button>
            </li>
            <?php }else{?>
            <li class="onhover-dropdown p-0">
                <button class="btn btn-primary-light" type="button"><a href="signup.php"><i data-feather="check-square"></i>Register</a></button>
            </li>
            <li class="onhover-dropdown p-0">
                <button class="btn btn-primary-light" type="button"><a href="signin.php"><i data-feather="user-check"></i>Login</a></button>
            </li>
            <?php } ?>
        </ul>
        </div>
        <div class="d-lg-none mobile-toggle pull-right w-auto"><i data-feather="more-horizontal"></i></div>
    </div>
</div>