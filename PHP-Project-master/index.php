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
$banner_data = array();
$banner_data = getAllcategoryData();
?>
<!DOCTYPE html>

<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <!-- Meta -->
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no" />
    <meta name="description" />
    <meta name="author" />
    <meta name="keywords" content="Jepur Gram Panchayat Vijapur, Gram Panchayat Jepur, Online Jepur Panchayat, Jepur Vijapur, Gram Panchayat Vijapur, Gram Panchayat Software, Jepur Vijapur Mehsana, Gujarat" />
    <meta name="robots" content="all" />
    <title>
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

    <!-- Style Sheet : END -->

  
</head>
<body class="cnt-home">
    <form method="post" action="#" id="form1">
        <!-- Header : START -->

        <header class="header-style-1">
            <!-- ============================================== TOP MENU ============================================== -->
            <div class="top-bar animate-dropdown">
                <div class="container">
                    <div class="header-top-inner">
                        <div class="cnt-account" style="color: darkblue;">
                            
                            <script>
                                var blink_speed = 50;
                                var t = setInterval(function () {
                                    var ele = document.getElementById('blinker');
                                    ele.style.visibility = (ele.style.visibility == 'hidden' ? '' : 'hidden');
                                }, blink_speed);
                            </script>
                            <script>
                                var blink_speed = 50;
                                var t = setInterval(function () {
                                    var ele = document.getElementById('blinker1');
                                    ele.style.visibility = (ele.style.visibility == 'hidden' ? '' : 'hidden');
                                }, blink_speed);
                            </script>
                            
                        </div>
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
                    <button id="Header_A1" class="index.php" href=" admin/index.php"style="background-color: #FF1493; color: white; border: none; padding: 10px 20px; font-size: 16px; border-radius: 5px; cursor: pointer;"   style="color: white; text-decoration: none;">
   <a href="admin/index.php" style="color:white"> Admin Login</a>
</button>

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
                            <li id="Header_A1" class="active"><a href="index.php">Home</a></li>
                            <li id="Header_A2" class="dropdown"><a href="history.php">History</a></li>
                            <li id="Header_A3" class="dropdown"><a href="dharohar.php">Heritage</a></li>
                            <li id="Header_A4" class="dropdown"><a href="activities.php">Activities</a></li>
                            <li id="Header_A13" class="dropdown"><a href="achievements.php">Achievements</a></li>
                            <li id="Header_A5" class="dropdown"><a href="javascript:void(0);" class="dropdown-toggle" data-hover="dropdown" data-toggle="dropdown">Officials</a>
                                <ul class="dropdown-menu pages">
                                    <li>
                                        <div class="yamm-content">
                                            <div class="row">
                                                <div class="col-xs-12 col-menu">
                                                    <ul class="links">
                                                        <li><a href="sabhya.php">Panchayat</a></li>
                                                        <li><a href="javascript:void(0);">Public Institutions</a></li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                    </li>
                                </ul>
                            </li>
                            <li id="Header_A6" class="dropdown"><a href="govproject.php">Services and Schems </a></li>
                            <li id="Header_A7" class="dropdown"><a href="development.php">Development Works</a></li>
                            <li id="Header_A8" class="dropdown"><a href="bloodgroup.php">Blood Grop Details </a></li>
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
                <!-- Breadcrumb items go here -->
            </ul>
        </div>
    </div>
</div>

<!-- Content : START -->
<div class="body-content outer-top-xs" id="top-banner-and-menu">
    <div class="container">
        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-9 homebanner-holder">
                <div id="hero">
                    <div id="owl-main" class="owl-carousel owl-inner-nav owl-ui-sm">
                        <?php
                        if (!empty($banner_data)) {
                            foreach ($banner_data as $val) {
                                ?>
                                <div class="item">
                                    <div class="container-fluid">
                                        <div class="caption bg-color vertical-center text-left">
                                            <!-- Caption content -->
                                        </div>
                                    </div>
                                </div>
                                <?php
                            }
                        }
                        ?>
                    </div>
                </div><br><br>
                <div id="product-tabs-slider" class="scroll-tabs outer-top-vs wow fadeInUp">
                    <div class="more-info-tab clearfix">
                        <h3 class="new-product-title pull-left">Main Officials</h3>
                    </div>
                    <div class="tab-content outer-top-xs">
                        <div class="tab-pane in active" id="all">
                            <div class="product-slider">
                                <div class="owl-carousel home-owl-carousel custom-carousel owl-theme" data-item="4">
                                    <div class="item item-carousel">
                                        <div class="products">
                                            <?php
                                            if (!empty($sa_data)) {
                                                foreach ($sa_data as $val) {
                                                    ?>
                                                    <div class="product">
                                                        <div class="product-info text-left">
                                                            <h3 class="name"><a href="javascript:void(0);">Village Head</a></h3>
                                                            <div class="product-price"><span class="price"><?php echo $val['sarpanch_name']; ?></span></div>
                                                            <div class="description">+91-<?php echo $val['sarpanch_no']; ?></div>
                                                        </div>
                                                        <div class="cart clearfix animate-effect">
                                                            <div class="action">
                                                                <ul class="list-unstyled">
                                                                    <li class="lnk">
                                                                        <a class="add-to-cart" href="<?php echo $val['sarpanch_fb']; ?>" target="_blank" title="Facebook">
                                                                            <i class="fa fa-facebook"></i>
                                                                        </a>
                                                                    </li>
                                                                    <li class="lnk">
                                                                        <a class="add-to-cart" href="<?php echo $val['sarpanch_twitter']; ?>" target="_blank" title="Twitter">
                                                                            <i class="fa fa-twitter"></i>
                                                                        </a>
                                                                    </li>
                                                                    <li class="lnk">
                                                                        <a class="add-to-cart" href="<?php echo $val['sarpanch_insta']; ?>" target="_blank" title="Instagram">
                                                                            <i class="fa fa-instagram"></i>
                                                                        </a>
                                                                    </li>
                                                                </ul>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <?php
                                                }
                                            }
                                            ?>
                                        </div>
                                    </div>
                                    <div class="item item-carousel">
                                        <div class="products">
                                            <?php
                                            if (!empty($d_sa_data)) {
                                                foreach ($d_sa_data as $val) {
                                                    ?>
                                                    <div class="product">
                                                        <div class="product-info text-left">
                                                            <h3 class="name"><a href="javascript:void(0);">Deputy Head of the Village</a></h3>
                                                            <div class="product-price"><span class="price"><?php echo $val['sarpanch_name']; ?></span></div>
                                                            <div class="description">+91-<?php echo $val['sarpanch_no']; ?></div>
                                                        </div>
                                                        <div class="cart clearfix animate-effect">
                                                            <div class="action">
                                                                <ul class="list-unstyled">
                                                                    <li class="lnk">
                                                                        <a class="add-to-cart" href="<?php echo $val['sarpanch_fb']; ?>" target="_blank" title="Facebook">
                                                                            <i class="fa fa-facebook"></i>
                                                                        </a>
                                                                    </li>
                                                                    <li class="lnk">
                                                                        <a class="add-to-cart" href="<?php echo $val['sarpanch_twitter']; ?>" title="Twitter">
                                                                            <i class="fa fa-twitter"></i>
                                                                        </a>
                                                                    </li>
                                                                    <li class="lnk">
                                                                        <a class="add-to-cart" href="<?php echo $val['sarpanch_insta']; ?>" title="Instagram">
                                                                            <i class="fa fa-instagram"></i>
                                                                        </a>
                                                                    </li>
                                                                </ul>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <?php
                                                }
                                            }
                                            ?>
                                        </div>
                                    </div>
                                    <div class="item item-carousel">
                                        <div class="products">
                                            <?php
                                            if (!empty($talati_data)) {
                                                foreach ($talati_data as $val) {
                                                    ?>
                                                    <div class="product">
                                                        <div class="product-info text-left">
                                                            <h3 class="name">Village Officer<a href="#"> </a></h3>
                                                            <div class="product-price"><span class="price"><?php echo $val['sarpanch_name']; ?></span></div>
                                                            <div class="description">+91-<?php echo $val['sarpanch_no']; ?></div>
                                                        </div>
                                                        <div class="cart clearfix animate-effect">
                                                            <div class="action">
                                                                <ul class="list-unstyled">
                                                                    <li class="lnk">
                                                                        <a class="add-to-cart" href="<?php echo $val['sarpanch_fb']; ?>" target="_blank" title="Facebook">
                                                                            <i class="fa fa-facebook"></i>
                                                                        </a>
                                                                    </li>
                                                                    <li class="lnk">
                                                                        <a class="add-to-cart" href="<?php echo $val['sarpanch_twitter']; ?>" title="Twitter">
                                                                            <i class="fa fa-twitter"></i>
                                                                        </a>
                                                                    </li>
                                                                    <li class="lnk">
                                                                        <a class="add-to-cart" href="<?php echo $val['sarpanch_insta']; ?>" title="Instagram">
                                                                            <i class="fa fa-instagram"></i>
                                                                        </a>
                                                                    </li>
                                                                </ul>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <?php
                                                }
                                            }
                                            ?>
                                        </div>
                                    </div>
                                    <div class="item item-carousel">
                                        <div class="products">
                                            <?php
                                            if (!empty($gram_sevak_data)) {
                                                foreach ($gram_sevak_data as $val) {
                                                    ?>
                                                    <div class="product">
                                                        <div class="product-info text-left">
                                                            <h3 class="name"><a href="javascript:void(0);"> Village Development Officer</a></h3>
                                                            <div class="product-price"><span class="price"><?php echo $val['sarpanch_name']; ?></span></div>
                                                            <div class="description">+91-<?php echo $val['sarpanch_no']; ?></div>
                                                        </div>
                                                        <div class="cart clearfix animate-effect">
                                                            <div class="action">
                                                                <ul class="list-unstyled">
                                                                    <li class="lnk">
                                                                        <a class="add-to-cart" href="<?php echo $val['sarpanch_fb']; ?>" target="_blank" title="Facebook">
                                                                            <i class="fa fa-facebook"></i>
                                                                        </a>
                                                                    </li>
                                                                    <li class="lnk">
                                                                        <a class="add-to-cart" href="<?php echo $val['sarpanch_twitter']; ?>" title="Twitter">
                                                                            <i class="fa fa-twitter"></i>
                                                                        </a>
                                                                    </li>
                                                                    <li class="lnk">
                                                                        <a class="add-to-cart" href="<?php echo $val['sarpanch_insta']; ?>" title="Instagram">
                                                                            <i class="fa fa-instagram"></i>
                                                                        </a>
                                                                    </li>
                                                                </ul>
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
                            </div>
                        </div>
                    </div>
                </div>
                <?php
                if (!empty($history_data)) {
                    foreach ($history_data as $val) {
                        ?>
                        <div class="blog-page">
                            <div class="blog-post wow fadeInUp">
                                <h1>History of  Village</h1>
                                <p style="text-align: justify;"> <?php echo $val['history_story']; ?><a class="contact-form" href="javascript:void(0);">Mijar</a> .</p>
                            </div>
                        </div>
                        <?php
                    }
                }
                ?>
                <div class="clearfix blog-pagination filters-container wow fadeInUp" style="padding: 0px; background: none; box-shadow: none; margin-top: 15px; border: none">
                    <div class="text-right">
                        <div class="pagination-container">
                            <!-- Pagination content -->
                        </div>
                    </div>
                </div>
            </div>
            <!-- Sidebar : START -->

            <div class="col-xs-12 col-sm-12 col-md-3 sidebar">
                <div class="sidebar-widget hot-deals wow fadeInUp outer-bottom-xs" style="background-color: antiquewhite;">
                    <h3 class="section-title">Honorable</h3>
                    <div class="owl-carousel sidebar-carousel custom-carousel owl-theme outer-top-ss">
                        <?php
                        if (!empty($minister_data)) {
                            foreach ($minister_data as $val) {
                                ?>
                                <div class="item">
                                    <div class="products">
                                        <div class="hot-deal-wrapper">
                                            <div class="image">
                                             
                                            </div>
                                        </div>
                                        <div class="product-info text-left m-t-20">
                                            <p><?php echo $val['minister_category']; ?>,</p>
                                            <div class="product-price">
                                                <span class="price"><?php echo $val['minister_name']; ?></span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <?php
                            }
                        }
                        ?>
                    </div>
                </div>

                <div class="sidebar-widget product-tag wow fadeInUp outer-bottom-xs" style="background-color: antiquewhite;">
                    <h3 class="section-title">Latest News</h3>
                    <div class="sidebar-widget-body outer-top-xs">
                        <div class="tag-list">
                            <marquee id="scroll_news" behavior="scroll" direction="up" scrollamount="2">
                                <?php
                                if (!empty($news_data)) {
                                    foreach ($news_data as $val) {
                                        ?>
                                        <div onMouseOver="document.getElementById('scroll_news').stop();" onMouseOut="document.getElementById('scroll_news').start();">
                                            <a class="item" title="<?php echo $val['news_name']; ?>" href="govproject.php" target="_blank"><?php echo $val['news_name']; ?></a>
                                        </div>
                                        <?php
                                    }
                                }
                                ?>
                            </marquee>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Sidebar : END -->
        </div>
    </div>
</div>

</marquee>
</div>
</div>
</div>
<center>
    <b><a href="https://www.karnataka.gov.in/" target="_blank" style="font-size:21px; color: brown; text-decoration: none; display: inline-block; animation: blinker 1.5s linear infinite;" >Click here to get 7/12 extract.</a><br>
    &nbsp;&nbsp;
    <a href="https://www.vijaykarnatakaepaper.com/" target="_blank" style="font-size:21px; color: blue; text-decoration: none; display: inline-block; animation: blinker 1.5s linear infinite;">Please click here to view the newspaper</a>
</center></b>
<style>
    @keyframes blinker {
        0% { opacity: 1; }
        50% { opacity: 0; }
        100% { opacity: 1; }
    }
</style>


<!----------- Testimonials ------------->
<div class="sidebar-widget wow fadeInUp outer-top-vs outer-bottom-vs" style="background-color: antiquewhite;">
    <div id="testimonial" class="advertisement">
        <div class="item">
            <div class="testimonials" style="color: green"><em>"</em>ನಮ್ಮ ಗ್ರಾಮದ ಅಭಿವೃದ್ಧಿ ಮತ್ತು ತಂತ್ರಜ್ಞಾನವು ನಿಜವಾಗಿಯೂ ಅವಿಸ್ಮರಣೀಯವಾಗುತ್ತಿದೆ!<em>"</em></div>
            <div class="clients_author">Manoj<span>Mijar</span> </div>
        </div>
    </div>
</div>

<!-- Sidebar : END -->
</div>
<div id="brands-carousel" class="logo-slider wow fadeInUp">
    <div class="logo-slider-inner">
        <div id="brand-slider" class="owl-carousel brand-slider custom-carousel owl-theme">
            <div class="item">
                <img data-echo="assets/images/brands/brand5.png" src="assets/images/blank.gif" alt="" />
            </div>
            <div class="item m-t-15">
                <img data-echo="assets/images/brands/brand1.png" src="assets/images/blank.gif" alt="" />
            </div>
            <div class="item m-t-10">
                <img data-echo="assets/images/brands/brand2.png" src="assets/images/blank.gif" alt="" />
            </div>
            <div class="item">
                <img data-echo="assets/images/brands/brand3.png" src="assets/images/blank.gif" alt="" />
            </div>
            <div class="item">
                <img data-echo="assets/images/brands/brand6.png" src="assets/images/blank.gif" alt="" />
            </div>
            <div class="item">
                <img data-echo="assets/images/brands/brand4.png" src="assets/images/blank.gif" alt="" />
            </div>
        </div>
    </div>
</div>
</div>
</div>
<!-- Content : END -->
<!-- Footer : START -->

<footer id="footer" class="footer color-bg">
    <div class="footer-bottom">
        <div class="container">
            <div class="row">
                <div class="col-xs-12 col-sm-6 col-md-3">
                    <div class="module-heading">
                        <h4 class="module-title" style="color:#898989 ;">Donation for Development Work</h4>
                    </div>
                    <div class="module-body">
                        <ul class="toggle-footer" style="">
                            <li class="media">
                                <div class="media-body">
                                    <p style="color:#ffffff;"><b>BANK NAME : </b>BANK OF BARODA</p>
                                </div>
                            </li>
                            <li class="media">
                                <div class="media-body">
                                    <p style="color:#ffffff;"><b>A/C NO : </b>**************</p>
                                </div>
                            </li>
                            <li class="media">
                                <div class="media-body">
                                    <p style="color:#ffffff;"><b>IFSC CODE : </b>BARBORANCHH</p>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="col-xs-12 col-sm-6 col-md-4">
                    <div class="module-heading">
                        <h4 class="module-title" style="color:#898989;">Government Websites</h4>
                    </div>
                    <div class="module-body">
                        <ul class="list-unstyled">
                            <li class="first" ><a title="Panchayat Department" href="https://panchayat.gujarat.gov.in/panchayatvibhag/" target="_blank">Panchayat Department</a></li>
                            <li class="first"><a title="India Post" href="https://www.indiapost.gov.in/">India Post</a></li>
                            <li class="first"><a title="Narmada, Water Resources, Water Supply, and Kalpsar Department" href="https://guj-nwrws.gujarat.gov.in/" target="_blank">Karnataka Water Resources and Supply Department - Mangaluru</a></li>
                            <li class="first"><a title="Gujarat Energy Development Agency Limited" href="http://www.gseb.com/">Karnataka Energy Development Agency Limited</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-xs-12 col-sm-6 col-md-2">
                    <div class="module-heading">
                        <h4 class="module-title" style="color:#898989;">Government Websites</h4>
                    </div>
                    <div class="module-body">
                        <ul class="list-unstyled">
                            <li class="first"><a title="Online Voter ID" href="https://ceo.gujarat.gov.in/" target="_blank">Online Voter ID</a></li>
                            <li class="first"><a title="Online Aadhaar Card" href="https://ceo.gujarat.gov.in/" target="_blank">Online Aadhaar Card</a></li>
                            <li class="first"><a title="Any ROR" href="https://anyror.gujarat.gov.in/" target="_blank">Any ROR</a></li>
                            <li class="first"><a title="i-Farmer" href="https://ikhedut.gujarat.gov.in/" target="_blank">i-Farmer</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-xs-12 col-sm-6 col-md-3">
                    <div class="module-heading">
                        <h4 class="module-title" style="color:#898989;">Emergency Contact Numbers</h4>
                    </div>
                    <div class="module-body">
                        <ul class="list-unstyled">
                            <li class="first"><a href="javascript:void(0);" title="Vijapur Taluka Police Station" target="_blank">Police Station : (02763) 270401</a></li>
                            <li class="first"><a href="javascript:void(0);" title="Municipality Fire Station" target="_blank">Municipality Fire : (02763)270369</a></li>
                            <li class="first"><a href="javascript:void(0);" title="APMC Fire Station" target="_blank">APMC Fire : 02763 (272751)</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="copyright-bar">
        <div class="container">
            <div class="col-xs-12 col-sm-12 no-padding">
                <div class="clearfix">
                    <p style="color:white; text-align:center;">ALL RIGHTS RESERVED BY E - GRAM PANCHAYAT <sup style="color:white;">®</sup></a> <br/>
                    <script type="text/javascript" ></script></p>
                </div>
            </div>
        </div>
    </div>
</footer>

<!-- Footer : END -->
</form>

<script src="assets/js/jquery-1.11.1.min.js"></script>
<script src="assets/js/bootstrap.min.js"></script>
<script src="assets/js/bootstrap-hover-dropdown.min.js"></script>
<script src="assets/js/owl.carousel.min.js"></script>
<script src="assets/js/echo.min.js"></script>
<script src="assets/js/jquery.easing-1.3.min.js"></script>
<script src="assets/js/bootstrap-slider.min.js"></script>
<script src="assets/js/jquery.rateit.min.js"></script>
<script type="text/javascript" src="assets/js/lightbox.min.js"></script>
<script src="assets/js/bootstrap-select.min.js"></script>
<script src="assets/js/wow.min.js"></script>
<script src="assets/js/scripts.js"></script>

</body>

</html>
