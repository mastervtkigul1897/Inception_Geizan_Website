<?php include_once('settings_config.php'); ?>
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
          <!-- Container-fluid starts-->
          <div class="container-fluid">
            <div class="row">
              <!-- Zero Configuration  Starts-->
              <div class="col-sm-12">
                <div class="card">
                  <div class="card-header">
                    <h5><?php echo $category;?> Products</h5>
                  </div>
                  <style>
                    td{
                      font-size: 13px;
                    }
                    th{
                      font-size: 14px;
                    }
                  </style>
                  <div class="card-body">
                    <div class="table-responsive">
                      <table class="display" id="basic-1">
                        <thead>
                          <tr>
                            <th style="width:10px; text-align:center;">Image</th>
                            <th style="width: 300px;">Name</th>
                            <th style="width: 600px;">Description</th>
                            <th style="width:20px; text-align:center;">Price</th>
                            <th style="width:20px; text-align:center;">Stack</th>
                            <th style="width:20px; text-align:center;">Category</th>
                            <th style="text-align: center;">Action</th>
                          </tr>
                        </thead>
                        <tbody>
                          <?php 
                            if($found){
                              echo '<div class="alert alert-danger alert-dismissable col col-lg-12"><p class="block">SQL Injection Detected!</p></div>';
                            }
                            else{
                              if($category == "All"){
                                $getitems = sqlsrv_query($connection, $getallitems);
                              }
                              else{
                                $getitems = sqlsrv_query($connection, $getitemsbycategory);
                              }
                              while($rows = sqlsrv_fetch_array($getitems)){
                              include('settings_modal.php');
                              include('function_js.php');
                          ?>
                          <tr>
                            <td style="width:10px; text-align:center;"><img src="images/<?php echo $rows['img']; ?>"></td>
                            <td style="width: 300px;"><?php echo $rows['itemname']; ?></td>
                            <td style="width: 600px;"><?php echo $rows['description']; ?></td>
                            <td style="width:20px; text-align:center;"><?php echo number_format($rows['price'], 2); ?></td>
                            <td style="width:20px; text-align:center;"><?php echo $rows['qty']; ?></td>
                            <td style="width:20px; text-align:center;"><?php echo $rows['category']; ?></td>
                            <td style="text-align: center;"><button class="btn btn-primary" type="button" data-bs-toggle="modal" data-bs-target="#ItemmallModal<?php echo $rows[0]; ?>" data-bs-original-title="" title=""><i class="fa fa-shopping-cart me-2"></i> Buy Now</button></td>
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
        <!-- footer start-->
        <footer class="footer">
          <div class="container-fluid">
            <div class="row">
              <div class="col-md-6 footer-copyright">
                <p class="mb-0">Copyright 2021-22 © <?php echo $copyright; ?> All rights reserved.</p>
              </div>
              <div class="col-md-6">
                <p class="pull-right mb-0">Hand crafted & made with <i class="fa fa-heart font-secondary"></i></p>
              </div>
            </div>
          </div>
        </footer>
      </div>
    </div>
    <!-- latest jquery-->
    <script src="../assets/js/jquery-3.5.1.min.js"></script>
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