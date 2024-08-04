<?php
session_start();
include 'commonincludefiles.php';
global $conn;
$sa_data = array();
$sa_data = getAllsarpanchData();
$d_sa_data = array();
$d_sa_data = getAlld_sarpanchData();
$talati_data = array();
$talati_data = getAlltalatiData();
$gram_sevak_data = array();
$gram_sevak_data = getAllgram_sevakData();
$history_data = array();
$history_data = getAllhistoryData();
$minister_data = array();
$minister_data = getAllministerData();
$news_data = array();
$news_data = getAllnewsData();
$activity_data = array();
$activity_data = getAllactivityData();
?>

<!DOCTYPE html>

<html xmlns="http://www.w3.org/1999/xhtml">

<head>
    <!-- Meta -->
    <meta charset="utf-8" /><meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no" /><meta name="description" /><meta name="author" /><meta name="keywords" content="Jepur Gram Panchayat Vijapur, Gram Panchayat Jepur, Online Jepur Panchayat, Jepur Vijapur, Gram Panchayat Vijapur, Gram Panchayat Software, Jepur Vijapur Mehsana, Gujarat" /><meta name="robots" content="all" /><title>
    E-Gram Panchayat
</title>

    <!-- Style Sheet : START -->
    

<!-- Bootstrap Core CSS -->
<link rel="stylesheet" href="assets/css/bootstrap.min.css" />
<!-- Customizable CSS -->
<link rel="stylesheet" href="assets/css/main.css" />
<link rel="stylesheet" href="assets/css/blue.css" />
<link rel="stylesheet" href="assets/css/owl.carousel.css" />
<link rel="stylesheet" href="assets/css/owl.transitions.css" />
<link rel="stylesheet" href="assets/css/animate.min.css" />
<link rel="stylesheet" href="assets/css/rateit.css" />
<link rel="stylesheet" href="assets/css/bootstrap-select.min.css" />
<link href="assets/css/lightbox.css" rel="stylesheet">

<!-- Icons/Glyphs -->
<link rel="stylesheet" href="assets/css/font-awesome.css" />

<!-- Fonts -->
<link href='http://fonts.googleapis.com/css?family=Roboto:300,400,500,700' rel='stylesheet' type='text/css' />
<link href='https://fonts.googleapis.com/css?family=Open+Sans:400,300,400italic,600,600italic,700,700italic,800' rel='stylesheet' type='text/css' />
<link href='https://fonts.googleapis.com/css?family=Montserrat:400,700' rel='stylesheet' type='text/css' />



    <!-- Style Sheet : START -->
</head>
<body class="cnt-home">
    <form method="post" action="#" id="form1">
<div class="aspNetHidden">

</div>

<div class="aspNetHidden">

    <input type="hidden" name="__VIEWSTATEGENERATOR" id="__VIEWSTATEGENERATOR" value="29D20F7E" />
</div>
        <!-- Header : START -->
        

<header class="header-style-1">
    <!-- ============================================== TOP MENU ============================================== -->
    <div class="top-bar animate-dropdown">
        <div class="container">
            <div class="header-top-inner">
                <div class="cnt-account" style="color: darkblue;">
                    
                    <script>
                        var blink_speed = 0;
                        var t = setInterval(function () {
                            var ele = document.getElementById('blinker');
                            ele.style.visibility = (ele.style.visibility == 'hidden' ? '' : 'hidden');
                        }, blink_speed);
                    </script>

                    
                </div>
                <!-- /.cnt-account -->

                
                <!-- /.cnt-cart -->
                <div class="clearfix"></div>
            </div>
            <!-- /.header-top-inner -->
        </div>
        <!-- /.container -->
    </div>
    <!-- /.header-top -->
    <!-- ============================================== TOP MENU : END ============================================== -->
    <div class="main-header">
        <div class="container">
            <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-9 logo-holder">
                    <div class="logo">
                        <a href="index.php">
                             <p><font size="6"> E-Gram Panchayat</font></p>
                        </a>
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-3 social">
                    <ul class="link" style="margin-top: 20px;">
                        <li class="instagram pull-right"><a target="_blank" rel="nofollow" href="https://www.instagram.com/" title="Instagram"></a></li>
                        <li class="tw pull-right"><a target="_blank" rel="nofollow" href="https://twitter.com/" title="Twitter"></a></li>
                        <li class="fb pull-right"><a target="_blank" rel="nofollow" href="https://www.facebook.com/" title="Facebook"></a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>

    <div class="header-nav animate-dropdown">
        <div class="container">
            <div class="yamm navbar navbar-default" role="navigation">
                <div class="navbar-header">
                    <button data-target="#mc-horizontal-menu-collapse" data-toggle="collapse" class="navbar-toggle collapsed" type="button">
                        <span class="sr-only">Toggle navigation</span> <span class="icon-bar"></span><span class="icon-bar"></span><span class="icon-bar"></span>
                    </button>
                </div>
                <div class="nav-bg-class">
                    <div class="navbar-collapse collapse" id="mc-horizontal-menu-collapse">
                        <div class="nav-outer">
                            <ul class="nav navbar-nav">
                                <li id="Header_A1" class="dropdown "><a href="index.php">home</a></li>
                                <li id="Header_A2" class="dropdown"><a href="history.php">history</a></li>
                                <li id="Header_A3" class="dropdown"><a href="dharohar.php">Heritage</a></li>
                                <li id="Header_A4" class="active"><a href="activities.php">activities</a></li>
                                <li id="Header_A13" class="dropdown"><a href="achievements.php">achievements</a> </li>
                                <li id="Header_A5" class="dropdown"><a href="javascript:void(0);" class="dropdown-toggle" data-hover="dropdown" data-toggle="dropdown">Officials</a>
                                    <ul class="dropdown-menu pages">
                                        <li>
                                            <div class="yamm-content">
                                                <div class="row">
                                                    <div class="col-xs-12 col-menu">
                                                        <ul class="links">
                                                            <li><a href="sabhya.php">panchayat</a></li>
                                                            <li><a href="javascript:void(0);">public Institutions</a></li>
                                                        </ul>
                                                    </div>
                                                </div>
                                            </div>
                                        </li>
                                    </ul>
                                </li>
                                <li id="Header_A6" class="dropdown"><a href="govproject.php">Services and Schemes</a></li>
                            <li id="Header_A7" class="dropdown"><a href="development.php">Development Works</a></li>
                            <li id="Header_A8" class="dropdown"><a href="bloodgroup.php">Blood Group Info</a></li>
                            <li id="Header_A8" class="dropdown"><a href="complaint.php">complaint</a> </li>
                            <li id="Header_A10" class="dropdown"><a href="feedback.php">Feedback</a></li>
                            <li id="Header_A12" class="dropdown"><a href="contact.php">Contact</a></li>
                            </ul>
                            <div class="clearfix"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</header>

        <!-- Header : END -->
        
<div class="breadcrumb">
    <div class="container">
        <div class="breadcrumb-inner">
            <ul class="list-inline list-unstyled">
                
            </ul>
        </div>
    </div>
</div>

        <!-- Content : START -->
        <div class="body-content outer-top-xs">
            <div class="container">
                <div class="single-product">
                    
                                <?php
                                                if (!empty($activity_data)) {
                                        foreach ($activity_data as $val) {
                                                        ?>
          
                                <div class="detail-block outer-bottom-xs" style="background-color: antiquewhite;">
                                
                                    <div class="row wow fadeInUp">
                                        
                                        <div class="col-sm-12 col-md-12 ">
                                        
                                            <div class="product-info">
                                                <h4 class="name"><?php echo $val['activity_name']; ?></h4>
                                                <div class="description-container ">
                                                   <?php echo $val['activity_detail']; ?>
                                                   </div>
                                            </div><br><br><br><br><br><br><br><br>
                                            
                                        </div>
                                    
                                    </div>
                                        
                                </div>
                
                    <?php
                                        }
                                }
                                                        ?>

 
                </div>
            </div>
        </div>
        <!-- Content : END -->

       <!-- Footer : START -->

<footer id="footer
