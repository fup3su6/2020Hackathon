<!DOCTYPE html>
<html lang="zh_TW">

<head>
    <!-- Required meta tags-->
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="au theme template" />
    <meta name="author" content="Hau Nguyen" />
    <meta name="keywords" content="au theme template" />

    <!-- Title Page-->
    <title>Tables</title>

    <!-- Fontfaces CSS-->
    <link href="css/font-face.css" rel="stylesheet" media="all" />
    <link href="vendor/font-awesome-4.7/css/font-awesome.min.css" rel="stylesheet" media="all" />
    <link href="vendor/font-awesome-5/css/fontawesome-all.min.css" rel="stylesheet" media="all" />
    <link href="vendor/mdi-font/css/material-design-iconic-font.min.css" rel="stylesheet" media="all" />

    <!-- Bootstrap CSS-->
    <link href="vendor/bootstrap-4.1/bootstrap.min.css" rel="stylesheet" media="all" />

    <!-- Vendor CSS-->
    <link href="vendor/animsition/animsition.min.css" rel="stylesheet" media="all" />
    <link href="vendor/bootstrap-progressbar/bootstrap-progressbar-3.3.4.min.css" rel="stylesheet" media="all" />
    <link href="vendor/wow/animate.css" rel="stylesheet" media="all" />
    <link href="vendor/css-hamburgers/hamburgers.min.css" rel="stylesheet" media="all" />
    <link href="vendor/slick/slick.css" rel="stylesheet" media="all" />
    <link href="vendor/select2/select2.min.css" rel="stylesheet" media="all" />
    <link href="vendor/perfect-scrollbar/perfect-scrollbar.css" rel="stylesheet" media="all" />

    <!-- Main CSS-->
    <link href="css/theme.css" rel="stylesheet" media="all" />
</head>
<?php
$host = 'localhost';
$dbname = 'root';
$dbpw = 'root';
$db = 'order';
$totalTree = 0;
$account = $_GET["name"];

$conn = new mysqli($host, $dbname, $dbpw, $db);

//資料庫連線錯誤
if($conn->connect_error)
{
    die("Connection failed: ".$conn->connect_error);
}

print('
  <body class="animsition">
    <div class="page-wrapper">
      <!-- HEADER MOBILE-->
      <header class="header-mobile d-block d-lg-none">
        <div class="header-mobile__bar">
          <div class="container-fluid">
            <div class="header-mobile-inner">
                <img src="images/plant.png" alt="Harvest Together" />
                <span>&nbsp&nbspHarvest Together Portal</span>
              <button class="hamburger hamburger--slider" type="button">
                <span class="hamburger-box">
                  <span class="hamburger-inner"></span>
                </span>
              </button>
            </div>
          </div>
        </div>
        <nav class="navbar-mobile">
          <div class="container-fluid">
            <ul class="navbar-mobile__list list-unstyled">
              <li>
                <a class="js-arrow" href="#">
                  <i class="fas fa-tachometer-alt"></i>
                  <span onclick="history.back()">DashBoard</span></a>
              </li>
              <li>
                <a href="#">
                  <i class="fas fa-table"></i>Order Detail</a>
              </li>
            </ul>
          </div>
        </nav>
      </header>
      <!-- END HEADER MOBILE-->

      <!-- MENU SIDEBAR-->
      <aside class="menu-sidebar d-none d-lg-block">
        <div class="logo">
          <img src="images/plant.png" alt="Harvest Together"/>
          <span>&nbsp&nbspHarvest Together Portal</span>
        </div>
        <div class="menu-sidebar__content js-scrollbar1">
          <nav class="navbar-sidebar">
            <ul class="list-unstyled navbar__list">
              <li>
                <a class="js-arrow" href="#">
                  <i class="fas fa-tachometer-alt"></i>
                  <span onclick="history.back()">Dashboard</span></a
                >
              </li>
              <li class="active">
                <a href="#">
                  <i class="fas fa-table"></i>Order Detail</a>
              </li>
            </ul>
          </nav>
        </div>
      </aside>
      <!-- END MENU SIDEBAR-->');

      //儲存從後端抓得該farmer資料
      $saveData = array();
  
      $sql="SELECT * FROM `purchase` WHERE `FarmName` = '$account'";
      $result = $conn->query($sql);

      if ($result->num_rows > 0) {
          $show= "SELECT * FROM `purchase`";
          $result2 = $conn->query($show);

          if ($result2->num_rows > 0)
          {
              while($row = $result2 -> fetch_assoc())
              {
                  if($row['FarmName'] == $account)
                  {
                      array_push($saveData, $row);
                  }
              }
          }
      } 
      else {
          echo "<div>Login failed</div>";
      }

      print('
      <!-- PAGE CONTAINER-->
      <div class="page-container">
      <!-- HEADER DESKTOP-->
      <header class="header-desktop">
        <div class="section__content section__content--p30">
            <div class="container-fluid">
                <div class="header-wrap">
                    <form class="form-header" action="" method="POST">
                        <div class="au-input--xl"></div>
                    </form>
                    <div class="header-button">
                        <div class="noti-wrap"></div>
                        <div class="account-wrap">
                            <div class="account-item clearfix js-item-menu">
                                <div class="image">
                                    <img src="images/icon/avatar-01.png" alt="Head Photo" />
                                </div>
                                <div class="content">');
                                    print("<a class='js-acc-btn' href='#'>$account</a>");
                                    print('
                                </div>
                                <div class="account-dropdown js-dropdown">
                                    <div class="info clearfix">
                                        <div class="image">
                                            <a href="#">
                                                <img src="images/icon/avatar-01.png" alt="Head Photo" />
                                            </a>
                                        </div>
                                        <div class="content">
                                            <h5 class="name">');
                                            print($account);
                                            print('
                                            </h5>
                                            <span class="email">johndoe@example.com</span>
                                        </div>
                                    </div>
                                    <div class="account-dropdown__footer">
                                        <a href="../transitive/index.html">
                                            <i class="zmdi zmdi-power"></i>Logout</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </header>
    <!-- HEADER DESKTOP-->

        <!-- MAIN CONTENT-->
        <div class="main-content">
          <div class="section__content section__content--p30">
            <div class="container-fluid">

              <div class="row m-t-30">
              <div class="col-md-12">
                  <!-- DATA TABLE-->
                  <div class="table-responsive m-b-40">');
                  if (count($saveData) > 0)
                      {
                          //判斷對應的farm Name
                          print("<table class='table table-borderless table-data3' style = 'color:white;word-wrap:break-word; word-break:break-all; white-space:normal;' >
                          <thead><tr>
                          <td>No</td>
                          <td>農民姓名</td>
                          <td>種類</td>
                          <td>數量</td>
                          <td>顧客姓名</td>
                          <td>年齡</td>
                          <td>電話</td>
                          <td>地址</td>
                          <td>E-mail</td>
                          <td>付款方式</td>
                          <td>收入</td>
                          </tr></thead>
                          <tbody>");
                      
                        $index = 1;

                        $tableName = array("FarmName","Type","Amount","CustomName","Gender","Tel","Address","Mail","Payment","Income");

                        foreach($saveData as $key=>$data)
                        {
                            print("<tr>");
                            ++$key;
                            print("<td>$key</td>");
                        
                            for($i = 0;$i<sizeof($tableName);++$i)
                            {
                                $tmp = $tableName[$i];
                                print("<td> $data[$tmp] </td>");
                            }

                            print("</tr>");
                            
                        }
                      print("</tbody></table></div>");
                    }
                      
                      print('
      </div>
    <!-- END DATA TABLE-->');
  $conn->close();            
?>
<!-- END DATA TABLE-->
<div class="row">
    <div class="col-md-12">
        <div class="copyright">
            <p>
                Copyright © 2018 Colorlib. All rights reserved. Template
                by <a href="https://colorlib.com">Colorlib</a>.
            </p>
        </div>
    </div>
</div>
                  </body>
<!-- Jquery JS-->
<script src="vendor/jquery-3.2.1.min.js"></script>
<!-- Bootstrap JS-->
<script src="vendor/bootstrap-4.1/popper.min.js"></script>
<script src="vendor/bootstrap-4.1/bootstrap.min.js"></script>
<!-- Vendor JS       -->
<script src="vendor/slick/slick.min.js"></script>
<script src="vendor/wow/wow.min.js"></script>
<script src="vendor/animsition/animsition.min.js"></script>
<script src="vendor/bootstrap-progressbar/bootstrap-progressbar.min.js"></script>
<script src="vendor/counter-up/jquery.waypoints.min.js"></script>
<script src="vendor/counter-up/jquery.counterup.min.js"></script>
<script src="vendor/circle-progress/circle-progress.min.js"></script>
<script src="vendor/perfect-scrollbar/perfect-scrollbar.js"></script>
<script src="vendor/chartjs/Chart.bundle.min.js"></script>
<script src="vendor/select2/select2.min.js"></script>

<!-- Main JS-->
<script src="js/main.js"></script>
</body>

</html>
<!-- end document-->