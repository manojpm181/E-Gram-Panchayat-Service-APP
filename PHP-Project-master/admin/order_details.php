<?php

include 'commonincludefiles.php';

if (isset($_REQUEST['iOrderID']) && $_REQUEST['iOrderID'] != '') {
    $select_query = "SELECT co.*, t.*, c.ClassName, c.CourseCode FROM customerorders as co JOIN tutorials as t ON  t.TutorialId = co.TutorialId JOIN classes as c ON c.ClassId = co.ClassId WHERE co.iOrderID = " . $_REQUEST['iOrderID'];
    $select_res = mysqli_query($conn, $select_query);
    $popupdata = '';
    $popupdata .= '<div class="shopheading">';
    $popupdata .= '<div class="col-md-7 col-sm-7 col-xs-7 productdetails">';
    $popupdata .= '<h4 class="shoppingtitle">Course Name</h4>';
    $popupdata .= '</div>';
    $popupdata .= '<div class="col-md-2 col-sm-2 col-xs-2 pricedetail">';
    $popupdata .= '<h4>Price</h4>';
    $popupdata .= '</div>';
    $popupdata .= '<div class="col-md-1 col-sm-1 col-xs-1 qtydetail">';
    $popupdata .= '<h4>Qty</h4>';
    $popupdata .= '</div>';
    $popupdata .= '<div class="col-md-2 col-sm-2 col-xs-2 totaldetail">';
    $popupdata .= '<h4>Total</h4>';
    $popupdata .= '</div>';
    $popupdata .= '</div>';
   
    while ($orderdetaildata = mysqli_fetch_assoc($select_res)) {
        if ($orderdetaildata['eEachSchedulePrice'] == 1) {
            $select = "SELECT * FROM schedule where IsActive=1 and IsDelete=0 and ScheduleId=" . $orderdetaildata['ScheduleId'];
            $select_result = mysqli_query($conn, $select);
            while ($scheduledata = mysqli_fetch_assoc($select_result)) {               
                $popupdata .= '<div class="col-md-7 col-sm-7 col-xs-7 productnamesss">';               
                $popupdata .= '<p>' . $orderdetaildata["ClassName"] . ' ' . $orderdetaildata["TutorialName"] . ' ( ' . $scheduledata['TopicTitle'] . ' )</p>';               
                $popupdata .= '</div>';
                $popupdata .= '<div class="col-md-2 col-sm-2 col-xs-2 pricedetail">';
                $popupdata .= '<p>$' . $orderdetaildata['Price'] . '</p>';
                $popupdata .= '</div>';
                $popupdata .= '<div class="col-md-1 col-sm-1 col-xs-1 qtydetail">';
                $popupdata .= '<p>' . $orderdetaildata['vQuantity'] . '</p>';
                $popupdata .= '</div>';
                $popupdata .= '<div class="col-md-2 col-sm-2 col-xs-2 totaldetail">';
                $popupdata .= '<p>$' . $orderdetaildata['vPrice'] . '</p>';
                $popupdata .= '</div>';
            }
        }else{                
                $popupdata .= '<div class="col-md-7 col-sm-7 col-xs-7 productname">';               
                $popupdata .= '<p>' . $orderdetaildata["ClassName"] . ' ' . $orderdetaildata["TutorialName"] . '</p>';                
                $popupdata .= '</div>';
                $popupdata .= '<div class="col-md-2 col-sm-2 col-xs-2 pricedetail">';
                $popupdata .= '<p>$' . $orderdetaildata['Price'] . '</p>';
                $popupdata .= '</div>';
                $popupdata .= '<div class="col-md-1 col-sm-1 col-xs-1 qtydetail">';
                $popupdata .= '<p>' . $orderdetaildata['vQuantity'] . '</p>';
                $popupdata .= '</div>';
                $popupdata .= '<div class="col-md-2 col-sm-2 col-xs-2 totaldetail">';
                $popupdata .= '<p>$' . $orderdetaildata['vPrice'] . '</p>';
                $popupdata .= '</div>';
        }
    }
    echo json_encode($popupdata);
} else {
    echo "<script>window.location='index.php'</script>";
}
?>
