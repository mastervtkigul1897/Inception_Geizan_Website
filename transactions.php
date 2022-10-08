<?php include_once('settings_config.php'); include_once('infoarray/itemlist.php'); ?>
<?php if(!$session_username){ header('location: /home'); } ?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Rohan Online, Rohan Private Server, Rohan Blood Feud, Rohan, Website Templates, Geizan, Top Private Server">
    <meta name="keywords" content="Rohan Online, Rohan Private Server, Rohan Blood Feud, Rohan, Website Templates, Geizan, Top Private Server">
    <meta name="author" content="pixelstrap">
    <link rel="icon" href="../assets/images/favicon.png" type="image/x-icon">
    <link rel="shortcut icon" href="../assets/images/favicon.png" type="image/x-icon">
    <title><?php echo $itemmall; ?></title>
    <!-- Google font-->
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&amp;display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&amp;display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Rubik:ital,wght@0,400;0,500;0,600;0,700;0,800;0,900;1,300;1,400;1,500;1,600;1,700;1,800;1,900&amp;display=swap" rel="stylesheet">
    <!-- Font Awesome-->
    <link rel="stylesheet" type="text/css" href="../assets/css/fontawesome.css">
    <!-- ico-font-->
    <link rel="stylesheet" type="text/css" href="../assets/css/icofont.css">
    <!-- Themify icon-->
    <link rel="stylesheet" type="text/css" href="../assets/css/themify.css">
    <!-- Flag icon-->
    <link rel="stylesheet" type="text/css" href="../assets/css/flag-icon.css">
    <!-- Feather icon-->
    <link rel="stylesheet" type="text/css" href="../assets/css/feather-icon.css">
    <!-- Plugins css start-->
    <link rel="stylesheet" type="text/css" href="../assets/css/datatables.css">
    <!-- Plugins css Ends-->
    <!-- Bootstrap css-->
    <link rel="stylesheet" type="text/css" href="../assets/css/bootstrap.css">
    <!-- App css-->
    <link rel="stylesheet" type="text/css" href="../assets/css/style.css">
    <link id="color" rel="stylesheet" href="../assets/css/color-1.css" media="screen">
    <!-- Responsive css-->
    <link rel="stylesheet" type="text/css" href="../assets/css/responsive.css">
  </head>
  <body>
    <!-- Loader starts-->
    <div class="loader-wrapper">
      <div class="theme-loader">    
        <div class="loader-p"></div>
      </div>
    </div>
    <!-- Loader ends-->
    <!-- page-wrapper Start       -->
    <div class="page-wrapper compact-wrapper" id="pageWrapper">
      <!-- Page Header Start-->
      <?php include_once('settings_header.php');?>
      <!-- Page Header Ends                              -->
      <!-- Page Body Start-->
      <div class="page-body-wrapper sidebar-icon">
      <!-- Page Sidebar Start-->
      <?php include_once('settings_sidebar.php');?>
      <!-- Page Sidebar Ends-->
      <!-- Page Body Start-->
      <div class="page-body-wrapper horizontal-menu">
        <div class="page-body">
        <style>
            td{
              font-size: 13px;
            }
            th{
              font-size: 14px;
            }
          </style>
          <!-- Container-fluid starts-->
          <div class="container-fluid">
            <div class="row">
              <!-- Zero Configuration  Starts-->
              <div class="col-sm-6">
                <div class="card">
                  <div class="card-header">
                    <h5><?php echo $category;?> EXCHANGE MALL EXPENDITURES</h5>
                  </div>
                  <div class="card-body">
                    <div class="table-responsive">
                      <table class="display" id="basic-8">
                        <thead>
                          <tr>
                            <th style="width: 200px;">Name</th>
                            <th style="width:20px; text-align:center;">Price</th>
                            <th style="width:20px; text-align:center;">Seller</th>
                            <th style="width:20px; text-align:center;">Date</th>
                          </tr>
                        </thead>
                        <tbody>
                          <?php 
                            if($found){
                              echo '<div class="alert alert-danger alert-dismissable col col-lg-12"><p class="block">SQL Injection Detected!</p></div>';
                            }
                            else{
                              $getemlogs = sqlsrv_query($connection, $gebuyerlogsquery);
                              while($rows = sqlsrv_fetch_array($getemlogs)){
                                $seller_id = $rows['seller_id'];
                                $seller = sqlsrv_fetch_array(sqlsrv_query($connection, "SELECT login_id FROM RohanUser.dbo.TUser WHERE user_id = '$seller_id'"));
                          ?>
                          <tr>
                            <td style="width: 200px;"><?php echo $itemlist[$rows['type']];?></td>
                            <td style="width:20px; text-align:center;"><?php echo number_format($rows['price'], 2); ?></td>
                            <td style="width:20px; text-align:center;"><?php echo $seller['login_id']; ?></td>
                            <td style="width:20px; text-align:center;"><?php echo $rows['date']; ?></td>
                          </tr>
                          <?php }} ?>
                        </tbody>
                      </table>
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-sm-6">
                <div class="card">
                  <div class="card-header">
                    <h5><?php echo $category;?> EXCHANGE MALL INCOME</h5>
                  </div>
                  <div class="card-body">
                    <div class="table-responsive">
                      <table class="display" id="basic-3">
                        <thead>
                          <tr>
                            <th style="width: 200px;">Name</th>
                            <th style="width:20px; text-align:center;">Price</th>
                            <th style="width:20px; text-align:center;">Buyer</th>
                            <th style="width:20px; text-align:center;">Date</th>
                          </tr>
                        </thead>
                        <tbody>
                          <?php 
                            if($found){
                              echo '<div class="alert alert-danger alert-dismissable col col-lg-12"><p class="block">SQL Injection Detected!</p></div>';
                            }
                            else{
                              $getemlogs = sqlsrv_query($connection, $getselllogs);
                              while($rows = sqlsrv_fetch_array($getemlogs)){
                                $buyer_id = $rows['login_id'];
                                $seller = sqlsrv_fetch_array(sqlsrv_query($connection, "SELECT login_id FROM RohanUser.dbo.TUser WHERE user_id = '$buyer_id'"));
                          ?>
                          <tr>
                            <td style="width: 200px;"><?php echo $itemlist[$rows['type']];?></td>
                            <td style="width:20px; text-align:center;"><?php echo number_format($rows['price'], 2); ?></td>
                            <td style="width:20px; text-align:center;"><?php echo $seller['login_id']; ?></td>
                            <td style="width:20px; text-align:center;"><?php echo $rows['date']; ?></td>
                          </tr>
                          <?php }} ?>
                        </tbody>
                      </table>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <!-- Container-fluid Ends-->
          <!-- Container-fluid starts-->
          <div class="container-fluid">
            <div class="row">
              <!-- Zero Configuration  Starts-->
              <div class="col-sm-6">
                <div class="card">
                  <div class="card-header">
                    <h5><?php echo $category;?> ITEM MALL PURCHASE</h5>
                  </div>
                  <div class="card-body">
                    <div class="table-responsive">
                      <table class="display" id="basic-6">
                        <thead>
                          <tr>
                            <th style="width: 200px;">Name</th>
                            <th style="width:20px; text-align:center;">Price</th>
                            <th style="width:20px; text-align:center;">Point</th>
                            <th style="width:20px; text-align:center;">Date</th>
                          </tr>
                        </thead>
                        <tbody>
                          <?php 
                            if($found){
                              echo '<div class="alert alert-danger alert-dismissable col col-lg-12"><p class="block">SQL Injection Detected!</p></div>';
                            }
                            else{
                              $getimlogsq = sqlsrv_query($connection, $getimlogs);
                              while($rows = sqlsrv_fetch_array($getimlogsq)){
                          ?>
                          <tr>
                            <td style="width: 200px;"><?php echo $itemlist[$rows['type']];?></td>
                            <td style="width:20px; text-align:center;"><?php echo number_format($rows['price'], 2); ?></td>
                            <td style="width:20px; text-align:center;"><?php echo $rows['point']; ?></td>
                            <td style="width:20px; text-align:center;"><?php echo $rows['date']; ?></td>
                          </tr>
                          <?php }} ?>
                        </tbody>
                      </table>
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-sm-6">
                <div class="card">
                  <div class="card-header">
                    <h5><?php echo $category;?> OTHER LOGS</h5>
                  </div>
                  <div class="card-body">
                    <div class="table-responsive">
                      <table class="display" id="basic-1">
                        <thead>
                          <tr>
                            <th style="width: 200px;">Description</th>
                            <th style="width:20px; text-align:center;">Date</th>
                          </tr>
                        </thead>
                        <tbody>
                          <?php 
                            if($found){
                              echo '<div class="alert alert-danger alert-dismissable col col-lg-12"><p class="block">SQL Injection Detected!</p></div>';
                            }
                            else{
                              $getotherlogs = sqlsrv_query($connection, $getotherlogs);
                              while($rows = sqlsrv_fetch_array($getotherlogs)){
                          ?>
                          <tr>
                            <td style="width: 200px;"><?php echo $rows['description']; ?></td>
                            <td style="width:20px; text-align:center;"><?php echo $rows['date']; ?></td>
                          </tr>
                          <?php }} ?>
                        </tbody>
                      </table>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <!-- Container-fluid Ends-->
        </div>
        <!-- footer start-->>
      </div>
    </div>
    
    <!-- latest jquery-->
    <script src="../assets/js/jquery-3.5.1.min.js"></script>
    <script>
    $(document).ready(function () {
        $('#basic-1').DataTable({
            order: [[1, 'desc']],
        });
    });
    $(document).ready(function () {
        $('#basic-8').DataTable({
            order: [[3, 'desc']],
        });
    });

    $(document).ready(function () {
        $('#basic-6').DataTable({
            order: [[3, 'desc']],
        });
    });

    </script>
    <!-- feather icon js-->
    <script src="../assets/js/icons/feather-icon/feather.min.js"></script>
    <script src="../assets/js/icons/feather-icon/feather-icon.js"></script>
    <!-- Sidebar jquery-->
    <script src="../assets/js/sidebar-menu.js"></script>
    <script src="../assets/js/config.js"></script>
    <!-- Bootstrap js-->
    <script src="../assets/js/bootstrap/popper.min.js"></script>
    <script src="../assets/js/bootstrap/bootstrap.min.js"></script>
    <!-- Plugins JS start-->
    <script src="../assets/js/datatable/datatables/jquery.dataTables.min.js"></script>
    <script src="../assets/js/datatable/datatables/datatable.custom.js"></script>
    <script src="../assets/js/tooltip-init.js"></script>
    <!-- Plugins JS Ends-->
    <!-- Theme js-->
    <script src="../assets/js/script.js"></script>
    <script src="../assets/js/theme-customizer/customizer.js"></script>
    <!-- login js-->
    <!-- Plugin used-->
  </body>
</html>