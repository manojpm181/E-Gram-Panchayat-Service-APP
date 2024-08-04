<?php
include 'commonincludefiles.php';
require '../config/constant.php';

if (isset($_REQUEST['slid']) && $_REQUEST['slid'] != '') {
        
    $update_query = "UPDATE tbl_slider_data SET eDelete = '1' WHERE iSliderID = " . $_REQUEST['slid'];        
    $update_res = mysqli_query($conn, $update_query);
                            
    if ($update_res) {
        $success = "1";
    } else {
        $success = "0";
    }    
    echo json_encode($success);
}else{
     echo "<script>window.location='index.php'</script>";
}
?>
