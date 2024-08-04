<?php
include 'commonincludefiles.php';

if (isset($_REQUEST['contactId']) && $_REQUEST['contactId'] != '') {
    $delete_query = "DELETE FROM contactus WHERE iContactID = " . $_REQUEST['contactId'];        
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
