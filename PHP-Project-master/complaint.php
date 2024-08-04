<?php
session_start();
include 'commonincludefiles.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['send_otp'])) {
        $mobile = $_POST['mobile'];
        $otp = rand(1000, 9999);
        $_SESSION['otp'] = $otp;
        $_SESSION['mobile'] = $mobile;

        // Simulate OTP sending process (In real implementation, use an SMS API)
        echo json_encode(['status' => 'success', 'message' => 'OTP Sent']);
        exit();
    } elseif (isset($_POST['verify_otp'])) {
        $entered_otp = $_POST['otp'];
        if ($entered_otp == $_SESSION['otp']) {
            // OTP is correct
            echo json_encode(['status' => 'success', 'redirect' => 'nextpage.php']);
        } else {
            // OTP is incorrect
            echo json_encode(['status' => 'error', 'message' => 'Invalid OTP. Please try again.']);
        }
        exit();
    }
}
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
    <title>E - Gram Panchayat</title>

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
<body>
    <form method="post" action="#" id="form1" class="register-form">
        <!-- Header : START -->
        <header class="header-style-1">
            <!-- ============================================== TOP MENU ============================================== -->
            <div class="top-bar animate-dropdown">
                <div class="container">
                    <div class="header-top-inner">
                        <div class="cnt-account" style="color: darkblue;">
                            <script>
                                var blink_speed = 500;
                                var t = setInterval(function () {
                                    var ele = document.getElementById('blinker');
                                    ele.style.visibility = (ele.style.visibility == 'hidden' ? '' : 'hidden');
                                }, blink_speed);
                            </script>
                            <a id="blinker" href="https://www.karnataka.gov.in/" target="_blank" style="color:blue">Click here to get 7/12 extract. </a>&nbsp&nbsp&nbsp&nbsp
                            <a id="blinker" href="https://www.vijaykarnatakaepaper.com/" target="_blank">Please click here to view the newspaper </a>
                        </div>
                        <!-- /.cnt-account -->
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
                                        <li id="Header_A1" class="dropdown "><a href="index.php">Home</a></li>
                                        <li id="Header_A2" class="dropdown"><a href="history.php">History</a></li>
                                        <li id="Header_A3" class="dropdown"><a href="dharohar.php">Heritage</a></li>
                                        <li id="Header_A4" class="dropdown"><a href="activities.php">Activities</a></li>
                                        <li id="Header_A13" class="dropdown"><a href="achievements.php">Achievements</a> </li>
                                        <li id="Header_A5" class="dropdown"><a href="javascript:void(0);" class="dropdown-toggle" data-hover="dropdown" data-toggle="dropdown">Officials</a>
                                            <ul class="dropdown-menu pages">
                                                <li>
                                                    <div class="yamm-content">
                                                        <div class="row">
                                                            <div class="col-xs-12 col-menu">
                                                                <ul class="links">
                                                                    <li><a href="sabhya.php">Panchayat</a></li>
                                                                    <li><a href="javascript:void(0);">Public Institution</a></li>
                                                                </ul>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </li>
                                            </ul>
                                        </li>
                                        <li id="Header_A6" class="dropdown"><a href="govproject.php">Services and Schemes</a> </li>
                                        <li id="Header_A7" class="dropdown"><a href="development.php">Development Works</a> </li>
                                        <li id="Header_A8" class="dropdown"><a href="bloodgroup.php">Blood Group Info</a> </li>
                                        <li id="Header_A10" class="dropdown"><a href="feedback.php">Feedback</a> </li>
                                        <li id="Header_A11" class="active"><a href="complaint.php">Complaint</a> </li>
                                        <li id="Header_A12" class="dropdown"><a href="contact.php">Contact</a> </li>
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
                    <ul class="list-inline list-unstyled"></ul>
                </div>
            </div>
        </div>

        <!-- Content : START -->
        <div class="body-content">
            <div class="container">
                <div class="row">
                    <div id="UpdatePanel1">
                        <div class="col-md-9">
                            <div class="wow fadeInUp">
                                <div class="col-md-4 m-t-20" style="padding-left: 10px;">
                                    <h3 class="section-title">Mobile Number</h3>
                                </div>
                            </div>
                            <form method="post" id="complaint-form">
                                <div class="form-group">
                                    <label for="mobile"></label>
                                    <input type="text" class="form-control" name="mobile" id="mobile" required />
                                    <small id="mobileHelp" class="form-text text-muted">Enter your mobile number for OTP verification.</small>
                                </div>
                                <button type="button" id="sendOtpButton" class="btn btn-primary">Send OTP</button>
                                <div id="otp-section" style="display: none;">
                                    <div class="form-group">
                                        <label for="otp">Enter OTP:</label>
                                        <input type="text" class="form-control" name="otp" id="otp" required />
                                    </div>
                                    <button type="button" id="verifyOtpButton" class="btn btn-success">Verify OTP</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Content : END -->

        <br>
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
                            <li class="first"><a title="Panchayat Department" href="https://panchayat.gujarat.gov.in/panchayatvibhag/" target="_blank">Panchayat Department</a></li>
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

        <!-- JavaScript Files -->
        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
        <script src="assets/js/bootstrap.min.js"></script>
        <script src="assets/js/owl.carousel.min.js"></script>
        <script src="assets/js/jquery.flexslider.js"></script>
        <script src="assets/js/jquery.easing-1.3.min.js"></script>
        <script src="assets/js/jquery.waypoints.min.js"></script>
        <script src="assets/js/jquery.countTo.js"></script>
        <script src="assets/js/lightbox.min.js"></script>
        <script src="assets/js/jquery.placeholder.js"></script>
        <script src="assets/js/wow.min.js"></script>
        <script src="assets/js/main.js"></script>
        <script src="assets/js/modernizr.custom.js"></script>
        <script src="assets/js/bootstrap-select.min.js"></script>

        <script>
            $(document).ready(function() {
                $('#sendOtpButton').click(function() {
                    const mobile = $('#mobile').val();
                    if (mobile) {
                        $.ajax({
                            url: '',
                            type: 'POST',
                            data: {
                                send_otp: true,
                                mobile: mobile
                            },
                            success: function(response) {
                                const data = JSON.parse(response);
                                if (data.status === 'success') {
                                    $('#otp-section').show();
                                    $('#sendOtpButton').prop('disabled', true);
                                    $('#mobile').prop('disabled', true);
                                    alert(data.message);
                                } else {
                                    alert('Failed to send OTP. Please try again.');
                                }
                            }
                        });
                    } else {
                        alert('Please enter your mobile number.');
                    }
                });

                $('#verifyOtpButton').click(function() {
                    const otp = $('#otp').val();
                    if (otp) {
                        $.ajax({
                            url: '',
                            type: 'POST',
                            data: {
                                verify_otp: true,
                                otp: otp
                            },
                            success: function(response) {
                                const data = JSON.parse(response);
                                if (data.status === 'success') {
                                    window.location.href = data.redirect;
                                } else {
                                    alert(data.message);
                                }
                            }
                        });
                    } else {
                        alert('Please enter the OTP.');
                    }
                });
            });
        </script>
    </form>
</body>
</html>
