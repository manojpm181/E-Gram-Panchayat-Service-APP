<?php 
$filename = '';
$current_file_name = basename($_SERVER['PHP_SELF']);
$filename = explode('.', $current_file_name);
$filename = $filename[0];
?>
<!-- Left side column. contains the logo and sidebar -->
<aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
        <!-- Sidebar user panel -->
        <div class="user-panel">
            <div class="pull-left image">
                <img src="dist/img/user-default.png" class="img-circle" alt="User Image">
            </div>
            <div class="pull-left info">
                <p>
                    <?php
                    if (isset($_SESSION['name'])) {
                        echo $_SESSION['name'];
                    }
                    ?>   
                </p>               
            </div>
        </div>

        <!-- sidebar menu: : style can be found in sidebar.less -->
        <ul class="sidebar-menu">
            <li class="header">MAIN NAVIGATION</li>            
            <li class="<?= (isset($filename) && $filename == 'dashboard') ? 'active' : '' ?>">
                <a href="dashboard.php">
                    <i class="fa fa-dashboard"></i>
                    <span>Dashboard</span>
                </a>
            </li>                       
            <!-- <li class="treeview <?= (isset($filename) && ($filename == 'add_banner') || ($filename == 'banner_list') || ($filename == 'edit_banner')) ? 'active' : '' ?>">
                <a href="#">
                    <i class="fa fa-list" aria-hidden="true"></i>
                    <span>Banner</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    <li class="<?= (isset($filename) && $filename == 'add_banner') ? 'active' : '' ?>">
                        <a href="add_banner.php"><i class="fa fa-circle-o"></i> Add</a>
                    </li>
                    <li class="<?= (isset($filename) && $filename == 'banner_list') ? 'active' : '' ?>">
                        <a href="banner_list.php"><i class="fa fa-circle-o"></i> List</a>
                    </li>                    
                </ul>
            </li> -->
			
			    <li class="treeview <?= (isset($filename) && ($filename == 'add_sarpanch') || ($filename == 'sarpanch_list') || ($filename == 'edit_sarpanch')) ? 'active' : '' ?>">
                <a href="#">
                    <i class="fa fa-list" aria-hidden="true"></i>
                    <span>Village Head</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    <li class="<?= (isset($filename) && $filename == 'add_sarpanch') ? 'active' : '' ?>">
                        <a href="add_sarpanch.php"><i class="fa fa-circle-o"></i> Add</a>
                    </li>
                    <li class="<?= (isset($filename) && $filename == 'sarpanch_list') ? 'active' : '' ?>">
                        <a href="sarpanch_list.php"><i class="fa fa-circle-o"></i> List</a>
                    </li>                    
                </ul>
            </li>
			<li class="treeview <?= (isset($filename) && ($filename == 'add_d_sarpanch') || ($filename == 'd_sarpanch_list') || ($filename == 'edit_d_sarpanch')) ? 'active' : '' ?>">
                <a href="#">
                    <i class="fa fa-list" aria-hidden="true"></i>
                    <span>Deputy Head of the Village</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    <li class="<?= (isset($filename) && $filename == 'add_d_sarpanch') ? 'active' : '' ?>">
                        <a href="d_add_sarpanch.php"><i class="fa fa-circle-o"></i> Add</a>
                    </li>
                    <li class="<?= (isset($filename) && $filename == 'd_sarpanch_list') ? 'active' : '' ?>">
                        <a href="d_sarpanch_list.php"><i class="fa fa-circle-o"></i> List</a>
                    </li>                    
                </ul>
            </li>
			<li class="treeview <?= (isset($filename) && ($filename == 'add_talati') || ($filename == 'talati_list') || ($filename == 'edit_talati')) ? 'active' : '' ?>">
                <a href="#">
                    <i class="fa fa-list" aria-hidden="true"></i>
                    <span>Village Officer</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    <li class="<?= (isset($filename) && $filename == 'add_d_sarpanch') ? 'active' : '' ?>">
                        <a href="add_talati.php"><i class="fa fa-circle-o"></i> Add</a>
                    </li>
                    <li class="<?= (isset($filename) && $filename == 'd_sarpanch_list') ? 'active' : '' ?>">
                        <a href="talati_list.php"><i class="fa fa-circle-o"></i> List</a>
                    </li>                    
                </ul>
            </li>
			<li class="treeview <?= (isset($filename) && ($filename == 'add_talati') || ($filename == 'talati_list') || ($filename == 'edit_talati')) ? 'active' : '' ?>">
                <a href="#">
                    <i class="fa fa-list" aria-hidden="true"></i>
                    <span>Village Development Officer</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    <li class="<?= (isset($filename) && $filename == 'add_d_sarpanch') ? 'active' : '' ?>">
                        <a href="add_gram_sevak.php"><i class="fa fa-circle-o"></i> Add</a>
                    </li>
                    <li class="<?= (isset($filename) && $filename == 'd_sarpanch_list') ? 'active' : '' ?>">
                        <a href="gram_sevak_list.php"><i class="fa fa-circle-o"></i> List</a>
                    </li>                    
                </ul>
            </li>
			<li class="treeview <?= (isset($filename) && ($filename == 'add_history') || ($filename == 'history_list') || ($filename == 'edit_history')) ? 'active' : '' ?>">
                <a href="#">
                    <i class="fa fa-list" aria-hidden="true"></i>
                    <span>History</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    <li class="<?= (isset($filename) && $filename == 'add_d_sarpanch') ? 'active' : '' ?>">
                        <a href="add_history.php"><i class="fa fa-circle-o"></i> Add</a>
                    </li>
                    <li class="<?= (isset($filename) && $filename == 'd_sarpanch_list') ? 'active' : '' ?>">
                        <a href="history_list.php"><i class="fa fa-circle-o"></i> List</a>
                    </li>                    
                </ul>
            </li>
			<li class="treeview <?= (isset($filename) && ($filename == 'add_news') || ($filename == 'news_list') || ($filename == 'edit_news')) ? 'active' : '' ?>">
                <a href="#">
                    <i class="fa fa-list" aria-hidden="true"></i>
                    <span>News add</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    <li class="<?= (isset($filename) && $filename == 'news') ? 'active' : '' ?>">
                        <a href="add_news.php"><i class="fa fa-circle-o"></i> Add</a>
                    </li>
                    <li class="<?= (isset($filename) && $filename == 'news') ? 'active' : '' ?>">
                        <a href="news_list.php"><i class="fa fa-circle-o"></i> List</a>
                    </li>                    
                </ul>
            </li>
            
            <li class="treeview <?= (isset($filename) && ($filename == 'add_minister') || ($filename == 'minister_list') || ($filename == 'edit_minister')) ? 'active' : '' ?>">
                <a href="#">
                    <i class="fa fa-list" aria-hidden="true"></i>
                    <span>Minister</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    <li class="<?= (isset($filename) && $filename == 'minister') ? 'active' : '' ?>">
                        <a href="add_minister.php"><i class="fa fa-circle-o"></i> Add</a>
                    </li>
                    <li class="<?= (isset($filename) && $filename == 'minister') ? 'active' : '' ?>">
                        <a href="minister_list.php"><i class="fa fa-circle-o"></i> List</a>
                    </li>                    
                </ul>
            </li> 

			<li class="treeview <?= (isset($filename) && ($filename == 'add_place') || ($filename == 'place_list') || ($filename == 'edit_place')) ? 'active' : '' ?>">
                <a href="#">
                    <i class="fa fa-list" aria-hidden="true"></i>
                    <span>Place Details</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    <li class="<?= (isset($filename) && $filename == 'activity') ? 'active' : '' ?>">
                        <a href="add_place.php"><i class="fa fa-circle-o"></i> Add</a>
                    </li>
                    <li class="<?= (isset($filename) && $filename == 'activity') ? 'active' : '' ?>">
                        <a href="place_list.php"><i class="fa fa-circle-o"></i> List</a>
                    </li>                    
                </ul>
            </li>
            <li class="treeview <?= (isset($filename) && ($filename == 'add_activity') || ($filename == 'activity_list') || ($filename == 'edit_activity')) ? 'active' : '' ?>">
                <a href="#">
                    <i class="fa fa-list" aria-hidden="true"></i>
                    <span>Activity</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    <li class="<?= (isset($filename) && $filename == 'activity') ? 'active' : '' ?>">
                        <a href="add_activity.php"><i class="fa fa-circle-o"></i> Add</a>
                    </li>
                    <li class="<?= (isset($filename) && $filename == 'activity') ? 'active' : '' ?>">
                        <a href="activity_list.php"><i class="fa fa-circle-o"></i> List</a>
                    </li>                    
                </ul>
            </li>
			<li class="treeview <?= (isset($filename) && ($filename == 'add_achievment') || ($filename == 'achievment_list') || ($filename == 'edit_achievment')) ? 'active' : '' ?>">
                <a href="#">
                    <i class="fa fa-list" aria-hidden="true"></i>
                    <span>Achievment</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    <li class="<?= (isset($filename) && $filename == 'achievment') ? 'active' : '' ?>">
                        <a href="add_achievment.php"><i class="fa fa-circle-o"></i> Add</a>
                    </li>
                    <li class="<?= (isset($filename) && $filename == 'achievment') ? 'active' : '' ?>">
                        <a href="achievment_list.php"><i class="fa fa-circle-o"></i> List</a>
                    </li>                    
                </ul>
            </li>
			<li class="treeview <?= (isset($filename) && ($filename == 'add_committe') || ($filename == 'committe_list') || ($filename == 'edit_committe')) ? 'active' : '' ?>">
                <a href="#">
                    <i class="fa fa-list" aria-hidden="true"></i>
                    <span>Committe</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    <li class="<?= (isset($filename) && $filename == 'committe') ? 'active' : '' ?>">
                        <a href="add_committe.php"><i class="fa fa-circle-o"></i> Add</a>
                    </li>
                    <li class="<?= (isset($filename) && $filename == 'committe') ? 'active' : '' ?>">
                        <a href="committe_list.php"><i class="fa fa-circle-o"></i> List</a>
                    </li>                    
                </ul>
            </li>
			<li class="treeview <?= (isset($filename) && ($filename == 'add_document') || ($filename == 'document_list') || ($filename == 'edit_document')) ? 'active' : '' ?>">
                <a href="#">
                    <i class="fa fa-list" aria-hidden="true"></i>
                    <span>document</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    <li class="<?= (isset($filename) && $filename == 'document') ? 'active' : '' ?>">
                        <a href="add_document.php"><i class="fa fa-circle-o"></i> Add</a>
                    </li>
                    <li class="<?= (isset($filename) && $filename == 'document') ? 'active' : '' ?>">
                        <a href="document_list.php"><i class="fa fa-circle-o"></i> List</a>
                    </li>                    
                </ul>
            </li>
			<li class="treeview <?= (isset($filename) && ($filename == 'add_yojna') || ($filename == 'yojna_list') || ($filename == 'edit_yojna')) ? 'active' : '' ?>">
                <a href="#">
                    <i class="fa fa-list" aria-hidden="true"></i>
                    <span>yojna</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    <li class="<?= (isset($filename) && $filename == 'yojna') ? 'active' : '' ?>">
                        <a href="add_yojna.php"><i class="fa fa-circle-o"></i> Add</a>
                    </li>
                    <li class="<?= (isset($filename) && $filename == 'yojna') ? 'active' : '' ?>">
                        <a href="yojna_list.php"><i class="fa fa-circle-o"></i> List</a>
                    </li>                    
                </ul>
            </li>
			<li class="treeview <?= (isset($filename) && ($filename == 'add_valid') || ($filename == 'valid_list') || ($filename == 'edit_valid')) ? 'active' : '' ?>">
                <a href="#">
                    <i class="fa fa-list" aria-hidden="true"></i>
                    <span>Valid date</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    <li class="<?= (isset($filename) && $filename == 'valid') ? 'active' : '' ?>">
                        <a href="add_valid.php"><i class="fa fa-circle-o"></i> Add</a>
                    </li>
                    <li class="<?= (isset($filename) && $filename == 'valid') ? 'active' : '' ?>">
                        <a href="valid_list.php"><i class="fa fa-circle-o"></i> List</a>
                    </li>                    
                </ul>
            </li>
			<li class="treeview <?= (isset($filename) && ($filename == 'add_vikas') || ($filename == 'vikas_list') || ($filename == 'edit_vikas')) ? 'active' : '' ?>">
                <a href="#">
                    <i class="fa fa-list" aria-hidden="true"></i>
                    <span>vikas na kam</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    <li class="<?= (isset($filename) && $filename == 'valid') ? 'active' : '' ?>">
                        <a href="add_vikas.php"><i class="fa fa-circle-o"></i> Add</a>
                    </li>
                    <li class="<?= (isset($filename) && $filename == 'valid') ? 'active' : '' ?>">
                        <a href="vikas_list.php"><i class="fa fa-circle-o"></i> List</a>
                    </li>                    
                </ul>
            </li>
            <li class="treeview <?= (isset($filename) && ($filename == 'add_public') || ($filename == 'public_list') || ($filename == 'edit_public')) ? 'active' : '' ?>">
                <a href="#">
                    <i class="fa fa-sliders" aria-hidden="true"></i>
                    <span>Public</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    <li class="<?= (isset($filename) && $filename == 'add_public') ? 'active' : '' ?>">
                        <a href="add_public.php"><i class="fa fa-circle-o"></i> Add</a>
                    </li>
                    <li class="<?= (isset($filename) && $filename == 'public_list') ? 'active' : '' ?>">
                        <a href="public_list.php"><i class="fa fa-circle-o"></i> List</a>
                    </li>                    
                </ul>
            </li>
            
            <!-- <li class="treeview <?= (isset($filename) && ($filename == 'add_slider') || ($filename == 'slider_list') || ($filename == 'edit_slider')) ? 'active' : '' ?>">
                <a href="#">
                    <i class="fa fa-sliders" aria-hidden="true"></i>
                    <span>Slider</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    <li class="<?= (isset($filename) && $filename == 'add_slider') ? 'active' : '' ?>">
                        <a href="add_slider.php"><i class="fa fa-circle-o"></i> Add</a>
                    </li>
                    <li class="<?= (isset($filename) && $filename == 'slider_list') ? 'active' : '' ?>">
                        <a href="slider_list.php"><i class="fa fa-circle-o"></i> List</a>
                    </li>                    
                </ul>
            </li> -->
            
            <li class="treeview <?= (isset($filename) && $filename == 'user_list') ? 'active' : '' ?>">
                <a href="public_list.php">
                    <i class="fa fa-users"></i>
                    <span>User List</span>                   
                </a>                
            </li>
             <!-- <li class="treeview <?= (isset($filename) && ($filename == 'add_faq') || ($filename == 'faq_list') || ($filename == 'edit_faq')) ? 'active' : '' ?>">
                <a href="#">
                    <i class="fa fa-question" aria-hidden="true"></i>
                    <span>Faqs</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    <li class="<?= (isset($filename) && $filename == 'add_faq') ? 'active' : '' ?>">
                        <a href="add_faq.php"><i class="fa fa-circle-o"></i> Add Faq</a>
                    </li>
                    <li class="<?= (isset($filename) && $filename == 'faq_list') ? 'active' : '' ?>">
                        <a href="faq_list.php"><i class="fa fa-circle-o"></i> Faq List</a>
                    </li>                    
                </ul>
            </li> -->
            
            <!-- <li class="treeview <?= (isset($filename) && $filename == 'contact_list') ? 'active' : '' ?>">
                <a href="contact_list.php">
                    <i class="fa fa-list"></i>
                    <span>Contact List</span>                   
                </a>                
            </li>
            
            <li class="treeview <?= (isset($filename) && $filename == 'reg_service_list') ? 'active' : '' ?>">
                <a href="reg_service_list.php">
                    <i class="fa fa-list"></i>
                    <span>Regular Cleaning List</span>                   
                </a>                
            </li> -->
        </ul>
    </section>
    <!-- /.sidebar -->
</aside>