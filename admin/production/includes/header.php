<?php
session_start();
if(isset($_POST['logout'])){
	// echo"<script>alert('')</script>";
	session_destroy();
	header("location:../../index.php");
}


require_once "actions/connect.php";

	
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
 
    <title>Admin</title>
		
 <script src="../vendors/sweetalert-master/dist/sweetalert-dev.js"></script>
  <link rel="stylesheet" href="../vendors/sweetalert-master/dist/sweetalert.css">
    <!-- Bootstrap -->
    <link href="../vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="../vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <!-- NProgress -->
    <link href="../vendors/nprogress/nprogress.css" rel="stylesheet">
    <!-- iCheck -->
    <link href="../vendors/iCheck/skins/flat/green.css" rel="stylesheet">
    <!-- Datatables -->
    <link href="../vendors/datatables.net-bs/css/dataTables.bootstrap.min.css" rel="stylesheet">
    <link href="../vendors/datatables.net-buttons-bs/css/buttons.bootstrap.min.css" rel="stylesheet">
    <link href="../vendors/datatables.net-fixedheader-bs/css/fixedHeader.bootstrap.min.css" rel="stylesheet">
    <link href="../vendors/datatables.net-responsive-bs/css/responsive.bootstrap.min.css" rel="stylesheet">
    <link href="../vendors/datatables.net-scroller-bs/css/scroller.bootstrap.min.css" rel="stylesheet">

    <!-- Custom Theme Style -->
    <link href="../build/css/custom.min.css" rel="stylesheet">
  
  <style>
.card{
  width:100%;
  height:auto;
  margin: 4% auto;
  box-shadow:-3px 5px 15px #000;
  cursor: pointer;
}
div#dispBeforeEdit img,div#dispBeforeAdd img{max-width:100px;max-height:100px;height:auto;width:100%;margin:5px;}
  </style>
 
  </head>

  <body class="nav-md">
    <div class="container body">
      <div class="main_container">
        <div class="col-md-3 left_col menu_fixed">
          <div class="left_col scroll-view" style="background:rgba(0,0,0,0.4);">
            <div class="navbar nav_title" style="border: 0;">
              <a href="index.html" class="site_title"><i class="fa fa-home"></i> <span>Home</span></a>
            </div>

            <div class="clearfix"></div>

            <br />

            <!-- sidebar menu -->
            <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
              <div class="menu_section">
                <h3>General</h3>
                <ul class="nav side-menu">
                 
               
                  <li><a href="kitab.php"><i class="fa fa-book"></i>كتب</a></li>
                  <li><a href="prof.php"><i class="fa fa-user"></i>شيوخ</a></li>
                  <li><a href="index.php"><i class=" fa fa-microphone"></i>دروس</a></li>
                  <li><a href="cour_prof.php"><i class=" fa fa-book"></i>شيوخ -دروس</a></li>
                  <li><a href="daoura.php"><i class=" fa fa-book"></i>دورات</a></li>
	
				   
                     
                  
                </ul>
              </div>

            </div>
            <!-- /sidebar menu -->

          </div>
        </div>

        <!-- top navigation -->
        <div class="top_nav">
          <div class="nav_menu">
            <nav>
              <div class="nav toggle">
                <a id="menu_toggle"><i class="fa fa-bars"></i></a>
              </div>

              <ul class="nav navbar-nav navbar-right">
                <li class="">
                  <a href="javascript:;" class="user-profile dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                    admin
                    <span class=" fa fa-angle-down"></span>
                  </a>
                  <ul class="dropdown-menu dropdown-usermenu pull-right">
                    
                    <li><form method="post"><input type="submit" name="logout"  style="" value="logout"style="border-style:none" /><i class="fa fa-sign-out pull-right"></i> </form></li>
                  </ul>
                </li>

               </ul>
            </nav>
          </div>
        </div>
        <!-- /top navigation -->
