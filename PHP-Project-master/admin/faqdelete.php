<?php
include 'commonincludefiles.php';

if (isset($_REQUEST['faqId']) && $_REQUEST['faqId'] != '') {
    $delete_query = "DELETE FROM tbl_faq WHERE iFaqID = " . $_REQUEST['faqId'];        
    $delete_res = mysqli_query($conn, $delete_query);                    
    if ($delete_res) {
        $success = "1";
    } else {
        $success = "0";
    }    
    echo json_encode($success);
}else{
     echo "<script>window.location='index.php'</script>";
}
?>
