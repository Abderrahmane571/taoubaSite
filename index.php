<?php

$conn=mysqli_connect("localhost","root","","taouba_site_new");
$conn->set_charset("utf8"); /*pour le jeu de caracteres é,à,..*/
session_start();


$sqlKitab="SELECT desc_kitab,id_k from kitab";


$sqlType="SELECT * from type_sujet";
$sqld="select * from cour c,cour_prof l,professeur p where c.type='1' and c.id_cour=l.id_cour_r and p.id_prof=l.id_prof_r order by c.date_cour desc LIMIT 0,9";
$sqlk="select * from cour c,cour_prof l,professeur p where c.type='2' and c.id_cour=l.id_cour_r and p.id_prof=l.id_prof_r order by c.date_cour desc LIMIT 0,9";
$sqldao="select * from cour c,cour_prof l,professeur p where c.type='4' and c.id_cour=l.id_cour_r and p.id_prof=l.id_prof_r order by c.date_cour desc LIMIT 0,9";
$sqldd="select * from cour c,cour_prof l,professeur p where c.type='3' and c.id_cour=l.id_cour_r and p.id_prof=l.id_prof_r order by c.date_cour desc LIMIT 0,9";


?>
<!doctype>
<html>

<head>
    <meta charset="UTF-8">
    <link href="css/bootstrap.css" rel="stylesheet">
    <link href="css/bootstrap-rtl.css" rel="stylesheet">

    <link href="css/style.css" rel="stylesheet">

    <link href="css/font-awesome.css" rel="stylesheet">
    <script src="js/jquery.js"></script>
    <script src="js/bootstrap.js"></script>
    <link href="css/jquery.fancybox.css" rel="stylesheet">
    <script src="js/jquery.fancybox.pack.js"></script>
    <script src="js/head.js"></script>
  <style>
        .content {
            margin: 5%;
        }
        footer table tr td{
            padding:5px;
        }
        img {
            position: center;
            width: 100%;
            height: 300px;
        } //
        .main .row {
            padding: 0px;
            margin: 0px;
        }

        .glyphicon {
            margin-left: 10px;
        }

        /*Remove rounded coners*/

        nav.sidebar.navbar {
            margin-bottom: 135px;
            margin-top: 20px;
            background-color: #24130b;
            border-radius: 0px;
            z-index: 20;
        }

        nav.sidebar,
        .main {
            -webkit-transition: margin 200ms ease-out;
            -moz-transition: margin 200ms ease-out;
            -o-transition: margin 200ms ease-out;
            transition: margin 200ms ease-out;
            z-index: 20;

        }

        /* Add gap to nav and right windows.*/

        .main {
            padding: 10px 10px 0 10px;
        }

        /* .....NavBar: Icon only with coloring/layout.....*/

        /*small/medium side display*/

        @media (min-width: 768px) {

            /*Allow main to be next to Nav*/
            .main {
                position: absolute;
                width: calc(100% - 40px);
                /*keeps 100% minus nav size*/
                /* margin-left: 40px;*/
                float: right;
            }

            /*lets nav bar to be showed on mouseover*/
            nav.sidebar:hover+.main {
                // margin-top: 10px;
                margin-left: 200px;
                z-index: 20;
            }

            /*Center Brand*/
            nav.sidebar.navbar.sidebar>.container .navbar-brand,
            .navbar>.container-fluid .navbar-brand {
                margin-left: 0px;
                z-index: 20;
            }
            /*Center Brand*/
            nav.sidebar .navbar-brand,
            nav.sidebar .navbar-header {
                text-align: center;
                width: 100%;
                margin-left: 0px;
                z-index: 20;
            }

            /*Center Icons*/
            nav.sidebar a {
                padding-right: 13px;
                z-index: 20;
            }

            /*adds border top to first nav box */
            nav.sidebar .navbar-nav>li:first-child {
                border-top: 1px #e5e5e5 solid;
                z-index: 20;
            }

            /*adds border to bottom nav boxes*/
            nav.sidebar .navbar-nav>li {
                border-bottom: 1px #e5e5e5 solid;
                z-index: 20;
            }

            /* Colors/style dropdown box*/
            nav.sidebar .navbar-nav .open .dropdown-menu {
                position: static;
                float: none;
                width: auto;
                margin-top: 0;
                background-color: transparent;
                border: 0;
                -webkit-box-shadow: none;
                box-shadow: none;
                z-index: 20;

            }

            /*allows nav box to use 100% width*/
            nav.sidebar .navbar-collapse,
            nav.sidebar .container-fluid {
                padding: 0 0px 0 0px;
                z-index: 20;
            }

            /*colors dropdown box text */
            .navbar-inverse .navbar-nav .open .dropdown-menu>li>a {
                color: #777;
                z-index: 20;
            }

            /*gives sidebar width/height*/
            nav.sidebar {
                width: 200px;
                height: 100%;
                margin-left: -160px;
                float: right;
                margin-bottom: 0px;
                z-index: 20;
            }

            /*give sidebar 100% width;*/
            nav.sidebar li {
                width: 100%;
                z-index: 20;
            }

            /* Move nav to full on mouse over*/
            nav.sidebar:hover {
                margin-left: 0px;
                z-index: 20;
            }
            /*for hiden things when navbar hidden*/
            .forAnimate {
                opacity: 0;
            }
        }

        /* .....NavBar: Fully showing nav bar..... */

        @media (min-width: 1330px) {

            /*Allow main to be next to Nav*/
            .main {
                width: calc(100% - 200px);
                /*keeps 100% minus nav size*/
                margin-left: 200px;
            }

            /*Show all nav*/
            nav.sidebar {
                margin-left: 0px;
                float: right;
                z-index: 20;
            }
            /*Show hidden items on nav*/
            nav.sidebar .forAnimate {

                opacity: 1;
                z-index: 20;


            }
        }

        nav.sidebar .navbar-nav .open .dropdown-menu>li>a:hover,
        nav.sidebar .navbar-nav .open .dropdown-menu>li>a:focus {
            color: #CCC;
            background-color: transparent;
            z-index: 20;

        }

        nav:hover .forAnimate {
            opacity: 1;
            z-index: 20;

        }

        section {
            padding-left: 15px;
        }
    </style>
</head>

<body>
    <header>
        <div class="bg1">
            <div class="conrainer">
                <div class="row">
                    <div class="col-xs-12 col-sm-12 col-md-8">
                        <a href="index.php" class="logo"></a>
                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-4">
                        <div class="imghed"></div>
                    </div>
                </div>
            </div>
        </div>

        <div class="bg2">
<div class="container">
<div class="row">

<div class="col-xs-12 col-sm-12 col-md-9">
    <nav class="navbar navbar-default">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand">القائمة</a>
        </div>

        <!-- Collect the nav links, forms, and other content for toggling -->
        <div id="bs-example-navbar-collapse-1" class="collapse navbar-collapse">
        	<ul id="menu-%d8%a7%d9%84%d9%82%d8%a7%d8%a6%d9%85%d8%a9" class="nav navbar-nav">
        		<li id="menu-item-9" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-9">
        			<a title="" href="#">التعريف بالمسجد</a>
        		</li>
    			<li id="menu-item-13" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-13">
    				<a title="" href="#">التعريف بشيوخ المسجد</a>
    			</li>
    			<li id="menu-item-17" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-17">
    				<a title="" href="#">نشاطات المسجد</a>	
    			</li>
                <li id="menu-item-17" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-17">
                    <a title="" href="#">نشاطات المدرسة القرآنية</a>  
                </li>
                <li id="menu-item-17" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-17">
                    <a title="" href="#">أخرى</a>  
                </li>
    		</ul>
        </div>
    </nav>    
    
</div>
    
    

<div class="col-xs-12 col-sm-12 col-md-3">
<div class="social">
    <ul>
    <li><a href="https://www.youtube.com/channel/UCyZ5lwI5fsDzOBKTnDRJKuA" target="_blank"><i class="fa fa-youtube"></i></a></li>    
    <li><a href="#"><i class="fa fa-google-plus"></i></a></li>    
    <li><a href="#"><i class="fa fa-twitter"></i></a></li>    
    <li><a href="#"><i class="fa fa-facebook"></i></a></li>    
    </ul>
    </div>  
</div>
    
    


</div><!-- /row -->
</div><!-- /container -->
</div>



    </header>



    <div class="clear"></div>
    <div class="content">


    	<!-- slider  -->

            <div id="myCarousel" class="carousel slide" data-ride="carousel">
  <!-- Indicators -->
  <ol class="carousel-indicators">
    <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
    <li data-target="#myCarousel" data-slide-to="1"></li>
    <li data-target="#myCarousel" data-slide-to="2"></li>
  </ol>

  <!-- Wrapper for slides -->
  <div class="carousel-inner">
    <div class="item active">
      <img src="images/1.jpg" alt="">
      <div class="carousel-caption">
	    <h3 style="font-family: kof">بناء المسجد</h3>
	    <p style="font-family: kof">صور من عين المكان</p>
  	  </div>
    </div>

    <div class="item">
      <img src="images/2.jpg" alt="">
      <div class="carousel-caption">
	    <h3 style="font-family: kof">بناء المسجد</h3>
	    <p style="font-family: kof">صور من عين المكان</p>
  	  </div>
    </div>

    <div class="item">
      <img src="images/3.jpg" alt="">
      <div class="carousel-caption">
	    <h3 style="font-family: kof">بناء المسجد</h3>
	    <p style="font-family: kof">صور من عين المكان</p>
  	  </div>
    </div>
  </div>

  <!-- Left and right controls -->
  <a class="left carousel-control" href="#myCarousel" data-slide="prev">
    <span class="glyphicon glyphicon-chevron-left"></span>
    <span class="sr-only">السابق</span>
  </a>
  <a class="right carousel-control" href="#myCarousel" data-slide="next">
    <span class="glyphicon glyphicon-chevron-right"></span>
    <span class="sr-only">التالي</span>
  </a>
</div>
    	<!-- fin slider-->
        <br>

        <nav class="navbar navbar-inverse sidebar" role="navigation" style="font-family:kof;z-index:1000">
            <div class="container-fluid" >
                <!-- Brand and toggle get grouped for better mobile display -->
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-sidebar-navbar-collapse-1">
                                    <span class="sr-only">Toggle navigation</span>
                                    <span class="icon-bar"></span>
                                    <span class="icon-bar"></span>
                                    <span class="icon-bar"></span>
                                </button>
                    <a class="navbar-brand" href="#">Brand</a>
                </div>
                <!-- Collect the nav links, forms, and other content for toggling -->
                <div class="collapse navbar-collapse" id="bs-sidebar-navbar-collapse-1">
                    <ul class="nav navbar-nav">
                    	<li class="" style="border-top:none;"><a href="index.php">الرئيسية<span style="font-size:16px;" class="pull-right hidden-xs showopacity glyphicon glyphicon-home"></span></a></li>
                        <li class="" style="border-top:none;"><a href="khoutab.php">خطب الجمعة<span style="font-size:16px;" class="pull-right hidden-xs showopacity glyphicon glyphicon-chevron-left"></span></a></li>
                        <li class="" style="border-top:none;"><a href="dourousse_djoumoua.php">دروس الجمعة<span style="font-size:16px;" class="pull-right hidden-xs showopacity glyphicon glyphicon-chevron-left"></span></a></li>
                        <li class="" style="border-top:none;"><a href="daouarat.php">دورات علمية<span style="font-size:16px;" class="pull-right hidden-xs showopacity glyphicon glyphicon-chevron-left"></span></a></li>
                        
                         

                        
                        <li class="panel-group" id="accordion" >
                        <div class="panel panel-default" >
                               <div class="panel-heading" >
                                  <h4 class="panel-title" style="margin-right: -16">
                                       <a data-toggle="collapse" data-parent="#accordion" href="#collapseOne"><span class="glyphicon glyphicon-folder-close"></span>دروس المسجد</a>
                                  </h4>
                               </div>
                                    <div id="collapseOne" class="panel-collapse collapse ">
                                        <div class="panel-body">
                                             
                                            <ul class="" role="menu">
                                                <?php foreach ($conn->query($sqlType) as $rowType) {
                                                     $t="dourousse.php?t=".$rowType['id_sujet'];
                                                    ?>
                                                
                                                <li class="dropdown">
                                                   <a href="#" class="dropdown-toggle" data-toggle="dropdown" id="aKitab" style="margin-right: -15px" ><?php echo $rowType['desc_sujet'] ?><span  class="pull-right glyphicon glyphicon-folder-close" style="margin-right: 25px"></span></a>
                                                 <ul class="dropdown-menu forAnimate" id="ulMenu" role="menu">
                                                      <?php 
                                                      $type=$rowType['id_sujet'];
                                                      $sqlKitab="SELECT  desc_kitab,id_k from kitab where id_sujet_kitab='$type'";
                                                      foreach ($conn->query($sqlKitab) as $rowKitab) {
                                                         $t="kitab.php?t=".$rowKitab['id_k'];
                                                        ?>
                                                     <li><a href="<?php echo $t;?>" id="lKitab"><?php echo $rowKitab['desc_kitab'] ?></a></li>
                                                        <?php };?>
                                                 </ul>
                                                </li>

                                                 <?php };?>
                                            </ul>
                                                    
                                                       
                                                        
                                                   
                                        </div>
                                    </div>
                </div>
                </li>
            </ul>
                
            </div>
                                               
                                </div>
                               
                            
                      
        </nav>
        <div class="main">
            <!-- Content Here -->
            <div class="ctn">
            <div class="col-xs-12 col-sm-12 col-md-12" >
                <div class="titleblockx1">
                    <span><p>جديد الدروس</p></span>
                </div>
            </div>
            <div  class="row">
              <div class="vi">
                <?php 
                    foreach ($conn->query($sqld) as $rowd) {
                        /*while($donnees_messages=mysql_fetch_assoc($retour_messages)) // On lit les entrées une à une grâce à une boucle
                            {*/
                ?>
 				<div class="col-sm-4 col-xs-4 col-md-4">
                   
                   <div class="card1">
                        <div class="container1">
                            <div class="infobank1" style="font-family: kof">
                                <?php if ($rowd['type_support']="1"): ?>

                                 <video width="211" height="220" controls>
                                      <source src="<?php echo $rowd['src'];?>" controls>
                                </video> 

                                <?php else: ?>
                                <img src="images/1.jpg" style="padding-top:40px;height:220" >
                                <audio controls style="width:211">
                                    <source src="<?php echo $rowd['src'];?>">
                                </audio> 

                                <?php endif ?>
                                
                                <br><br><B>عنوان الدرس: <?php echo $rowd['titre'];?> </B><br><B>الشيخ: <?php echo $rowd['nom'];?> <?php echo $rowd['prenom'];?></B> <br><B>تاريخ القاء الدرس: <?php echo $rowd['date_cour'];?></B><br> <a style="font-family: kof" href="<?php echo $rowd['src'];?>" download="<?php echo $rowd['titre'];?>"><p align="left"><B>تحميل</B></p></a>
                            </div>
                        </div>
                    </div>
 				</div>
 				<?php
                    };?>
 			</div>
 		</div>

        <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="titleblockx1">
                    <span><p>جديد الخطب</p></span>
                </div>
        </div>
            <div  class="row">
              <div class="vi">
                
 				  <?php 
                    foreach ($conn->query($sqlk) as $rowk) {
                        /*while($donnees_messages=mysql_fetch_assoc($retour_messages)) // On lit les entrées une à une grâce à une boucle
                            {*/
                ?>
                <div class="col-sm-4 col-xs-4 col-md-4">
                   
                   <div class="card1">
                        <div class="container1">
                            <div class="infobank1" style="font-family: kof">
                                <?php if ($rowk['type_support']="1"): ?>

                                 <video width="211" height="220" controls>
                                      <source src="<?php echo $rowk['src'];?>" controls>
                                </video> 

                                <?php else: ?>
                                <img src="images/1.jpg" style="padding-top:40px;height:220" >
                                <audio controls style="width:211">
                                    <source src="<?php echo $rowk['src'];?>">
                                </audio> 

                                <?php endif ?>
                                
                                <br><br><B>عنوان الدرس: <?php echo $rowk['titre'];?> </B><br><B>الشيخ: <?php echo $rowk['nom'];?> <?php echo $rowk['prenom'];?></B> <br><B>تاريخ القاء الدرس: <?php echo $rowk['date_cour'];?></B><br> <a style="font-family: kof" href="<?php echo $rowk['src'];?>" download="<?php echo $rowk['titre'];?>"><p align="left"><B>تحميل</B></p></a>
                            </div>
                        </div>
                    </div>
                </div>
                <?php
                    };?>
 			</div>
 		</div>

        <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="titleblockx1">
                    <span><p>جديد دروس الجمعة</p></span>
                </div>
        </div>
        <div  class="row">
              <div class="vi">
                
 				  <?php 
                    foreach ($conn->query($sqldd) as $rowdd) {
                        /*while($donnees_messages=mysql_fetch_assoc($retour_messages)) // On lit les entrées une à une grâce à une boucle
                            {*/
                ?>
                <div class="col-sm-4 col-xs-4 col-md-4">
                   
                   <div class="card1">
                        <div class="container1">
                            <div class="infobank1" style="font-family: kof">
                                <?php if ($rowdd['type_support']="1"): ?>

                                 <video width="211" height="220" controls>
                                      <source src="<?php echo $rowdd['src'];?>" controls>
                                </video> 

                                <?php else: ?>
                                <img src="images/1.jpg" style="padding-top:40px;height:220" >
                                <audio controls style="width:211">
                                    <source src="<?php echo $rowdd['src'];?>">
                                </audio> 

                                <?php endif ?>
                                
                                <br><br><B>عنوان الدرس: <?php echo $rowdd['titre'];?> </B><br><B>الشيخ: <?php echo $rowdd['nom'];?> <?php echo $rowdd['prenom'];?></B> <br><B>تاريخ القاء الدرس: <?php echo $rowdd['date_cour'];?></B><br> <a style="font-family: kof" href="<?php echo $rowdd['src'];?>" download="<?php echo $rowdd['titre'];?>"><p align="left"><B>تحميل</B></p></a>
                            </div>
                        </div>
                    </div>
                </div>
                <?php
                    };?>
 				
 			</div>
 		</div>
         
    </div>
            
            

           



        </div>



    </div>


    <br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
    <br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
	<br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
    <br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
    <br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
    

    <div class="newfooter">
		<h4>للتواصل مع المسجد:</h4>
		<h5 href="#">0123456789<span style="font-size:16px,font-family: kof" class="pull-right hidden-xs showopacity glyphicon glyphicon-earphone"></span></h5>
		<h5 href="#">tawba@gmail.com<span style="font-size:16px,font-family: kof" class="pull-right hidden-xs showopacity glyphicon glyphicon-envelope"></span></h5>
		
		<h5 href="#">حي جنان عشابوا - دالي ابراهيم<span style="font-size:16px,font-family: kof" class="pull-right hidden-xs showopacity glyphicon glyphicon-map-marker"></span></h5>
	</div>


</body>

</html>