<?php
include 'commonincludefiles.php';
require '../config/constant.php';

if (isset($_REQUEST['scatid']) && $_REQUEST['scatid'] != '') {
        
    $update_query = "UPDATE tbl_subcategory SET eDelete = '1',tModifyDate=NOW() WHERE iSubCategoryID = " . $_REQUEST['scatid'];        
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
