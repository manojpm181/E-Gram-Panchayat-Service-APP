<?php
include 'commonincludefiles.php';
require '../config/constant.php';

if (isset($_REQUEST['scdtid']) && $_REQUEST['scdtid'] != '') {
        
    $update_query = "UPDATE tbl_subcategory_detail SET eDelete = '1',tModifyDate=NOW() WHERE iSubCategoryDetailID = " . $_REQUEST['scdtid'];        
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
