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
                  <style>
                  table {
                    border-collapse: collapse;
                    border-spacing: 0;
                    width: 100%;
                    border: 1px solid #ddd;
                  }

                  th, td {
                    text-align: left;
                    padding: 10px;
                  }

                  tr:nth-child(even) {
                    background-color: #f2f2f2;
                  }
                  </style>
                      <table class="striped" style="width: 100%;">
                      <div class="input-group">
                        <form method="GET" action="emitems_s.php">
                          <input type="text" name="s" placeholder="Enter Keyword" class="form-control">
                          <input type="hidden" name="page" value="1" placeholder="Enter Keyword" class="form-control">
                          &nbsp; <button class="btn btn-outline-secondary" type="submit">Search</button>
                       </form>
                      </div>
                        <thead>
                          <tr>
                            <th style="width: 100px;">Name</th>
                            <th style="width: 300px;">Attributes</th>
                            <th style="width:20px; text-align:center;">Price</th>
                            <th style="width:20px; text-align:center;">Stack</th>
                            <th style="width:20px; text-align:center;">Date Sealed</th>
                            <th style="width:50px; text-align:center;">Actions</th>
                          </tr>
                        </thead>
                        <br>
                        <tbody>
                          <?php 
                            if($found){
                              echo '<div class="alert alert-danger alert-dismissable col col-lg-12"><p class="block">SQL Injection Detected!</p></div>';
                            }
                            else{
                                $getitems = sqlsrv_query($connection, $getemitems);
                                while($rows = sqlsrv_fetch_array($getitems)){
                                include('settings_modal.php');
                                include('function_js.php');
                                

                                include_once('infoarray/itemattr.php');
                                include_once('infoarray/itemlist.php');
                                
                                $str = bin2hex($rows[2]);
                                $arr2 = str_split($str, 2);
                                
                                $stats1 = $stats[$arr2[0]];
                                $value1 = hexdec($arr2[2].$arr2[1]);

                                $stats2 = $stats[$arr2[3]];
                                $value2 = hexdec($arr2[5].$arr2[4]);

                                $stats3 = $stats[$arr2[6]];
                                $value3 = hexdec($arr2[8].$arr2[7]);

                                $stats4 = $stats[$arr2[9]];
                                $value4 = hexdec($arr2[11].$arr2[10]);

                                $stats5 = $stats[$arr2[12]];
                                $value5 = hexdec($arr2[14].$arr2[13]);

                                $stats6 = $stats[$arr2[15]];
                                $value6 = hexdec($arr2[17].$arr2[16]);

                                $stats7 = $stats[$arr2[18]];
                                $value7 = hexdec($arr2[20].$arr2[19]);

                                $stats8 = $stats[$arr2[21]];
                                $value8 = hexdec($arr2[23].$arr2[22]);

                                $stats9 = $stats[$arr2[24]];
                                $value9 = hexdec($arr2[26].$arr2[25]);

                                $stats10 = $stats[$arr2[27]];
                                $value10 = hexdec($arr2[29].$arr2[38]);

                                $stats11 = $stats[$arr2[30]];
                                $value11 = hexdec($arr2[32].$arr2[31]);

                                $stats12 = $stats[$arr2[33]];
                                $value12 = hexdec($arr2[35].$arr2[34]);

                                $stats13 = $stats[$arr2[36]];
                                $value13 = hexdec($arr2[38].$arr2[37]);

                                $stats14 = $stats[$arr2[39]];
                                $value14 = hexdec($arr2[42].$arr2[41]);

                                if($value1 == 0){ $value1 = ""; }
                                if($value2 == 0){ $value2 = ""; }
                                if($value3 == 0){ $value3 = ""; }
                                if($value4 == 0){ $value4 = ""; }
                                if($value5 == 0){ $value5 = ""; }
                                if($value6 == 0){ $value6 = ""; }
                                if($value7 == 0){ $value7 = ""; }
                                if($value8 == 0){ $value8 = ""; }
                                if($value9 == 0){ $value9 = ""; }
                                if($value10 == 0){ $value10 = ""; }
                                if($value11 == 0){ $value11 = ""; }
                                if($value12 == 0){ $value12 = ""; }
                                
                                if($stats1 == "NONE"){ $value1 = ""; $stats1 = "";}
                                if($stats2 == "NONE"){ $value2 = ""; $stats2 = "";}
                                if($stats3 == "NONE"){ $value3 = ""; $stats3 = "";}
                                if($stats4 == "NONE"){ $value4 = ""; $stats4 = "";}
                                if($stats5 == "NONE"){ $value5 = ""; $stats5 = "";}
                                if($stats6 == "NONE"){ $value6 = ""; $stats6 = "";}
                                if($stats7 == "NONE"){ $value7 = ""; $stats7 = "";}
                                if($stats8 == "NONE"){ $value8 = ""; $stats8 = "";}
                                if($stats9 == "NONE"){ $value9 = ""; $stats9 = "";}
                                if($stats10 == "NONE"){ $value10 = ""; $stats10 = "";}
                                if($stats11 == "NONE"){ $value11 = ""; $stats11 = "";}
                                if($stats12 == "NONE"){ $value12 = ""; $stats12 = "";}
                          ?>
                          <tr>
                            <td style="width: 100px;"><?php echo $itemlist[$rows[1]];?></td>
                            <td style="width: 300px;">
                            <?php echo "<b>".$stats1."<font color='green'>".$value1."</font></b> &nbsp;";?>
                            <?php echo "<b>".$stats2."<font color='green'>".$value2."</font></b> &nbsp;";?>
                            <?php echo "<b>".$stats3."<font color='green'>".$value3."</font></b> &nbsp;";?>
                            <?php echo "<b>".$stats4."<font color='green'>".$value4."</font></b> &nbsp;";?>
                            <?php echo "<b>".$stats5."<font color='green'>".$value5."</font></b> &nbsp;";?>
                            <?php echo "<b>".$stats6."<font color='green'>".$value6."</font></b> &nbsp;";?>
                            <?php echo "<b>".$stats7."<font color='green'>".$value7."</font></b> &nbsp;";?>
                            <?php echo "<b>".$stats8."<font color='green'>".$value8."</font></b> &nbsp;";?>
                            <?php echo "<b>".$stats9."<font color='green'>".$value9."</font></b> &nbsp;";?>
                            <?php echo "<b>".$stats10."<font color='green'>".$value10."</font></b> &nbsp;";?>
                            <?php echo "<b>".$stats11."<font color='green'>".$value11."</font></b> &nbsp;";?>
                            <?php echo "<b>".$stats12."<font color='green'>".$value12."</font></b> &nbsp;";?>
                            </td>
                            <td style="width:20px; text-align:center;"><?php echo number_format($rows['price']); ?></td>
                            <td style="width:20px; text-align:center;"><?php echo $rows['stack']; ?></td>
                            <td style="width:20px; text-align:center;"><?php echo $rows['date_registered']; ?></td>
                            <td style="width:50px; text-align:center;">
                              <input type="hidden" name="id" value="<?php echo $rows[0]; ?>">
                              <button class="btn btn-primary" type="button" data-bs-toggle="modal" data-bs-target="#ExModal<?php echo $rows[0]; ?>"><i class="fa fa-shopping-cart me-2"></i> Buy Now</button></td>
                            </td>
                          </tr>
                          <?php }} ?>
                        </tbody>
                      </table>
                      <br>
                      <?php  
                      $sql = "SELECT COUNT(id) FROM RohanGame.dbo.TItem where user_id != $session_id and inventory = 51 and status = 0 and price != 0";  
                      $rs_result = sqlsrv_query($connection, $sql);  
                      $row = sqlsrv_fetch_array($rs_result);  
                      $total_records = $row[0];  
                      $total_pages = ceil($total_records / $limit);  
                      $pagLink = "<div class='pagination'>";
                      if($_GET['page'] > 1){
                        echo "<a class='btn btn-outline-success my-2 my-sm-0' href='emitems.php?page=".($page-1)."'><< Prev</a> &nbsp";  
                      }
                      else{
                      } 
                      $skipped = false;
                      for ($i = 1; $i <= $total_pages; $i++)  {
                        if ($i < 3 || $total_pages- $i < 3 || abs($page - $i) < 3) {
                          if ($skipped)
                            echo "<span> ... </span>";
                          $skipped = false;
                          echo "<a class='btn btn-outline-success my-2 my-sm-0' href='emitems.php?page=".$i."'>".$i."</a> &nbsp";  
                          #echo "<a class='btn inline' href='emitems.php?page=".$i."'>".$i." </a>";
                        } else {
                          $skipped = true;
                        }
                      }

                      echo "<a class='btn btn-outline-success my-2 my-sm-0' href='emitems.php?page=".($page+1)."'>Next >></a> &nbsp";  
                      ?>
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
    <script>
      $(document).ready(function () {
          $('#basic-1').DataTable({
              order: [[5, 'desc']],
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