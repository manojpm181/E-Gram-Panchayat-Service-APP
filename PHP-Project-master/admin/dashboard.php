<?php
session_start();
include 'commonincludefiles.php';
global $conn;
include 'header.php';
include 'sidebar.php';
?>
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Dashboard        
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Dashboard</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <!-- Small boxes (Stat box) -->
      <div class="row">
          <style>
              .rainbow-text {
                  font-size: 4em;
                  font-weight: bold;
                  background: linear-gradient(45deg, red, orange, yellow, green, blue, indigo, violet);
                  background-size: 400%;
                  -webkit-background-clip: text;
                  -webkit-text-fill-color: transparent;
                  animation: rainbow 5s ease-in-out infinite;
                  text-align: center;
                  margin: auto;
              }

              @keyframes rainbow {
                  0% { background-position: 0% 50%; }
                  50% { background-position: 100% 50%; }
                  100% { background-position: 0% 50%; }
              }
          </style>
          <div class="col-md-12">
            <br><br><br><br><br><br><br><br><br><br>
              <h1 class="rainbow-text">E-Gram Panchayat</h1>
          </div>
      </div>
      <!-- /.row -->      

    </section>
    <!-- /.content -->
  </div>
<?php
include 'footer.php';
?>
