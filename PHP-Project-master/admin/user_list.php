<?php
session_start();
include 'commonincludefiles.php';
global $conn;
include 'header.php';
include 'sidebar.php';
$user_data = array();
$user_data = getAllUserData();
?>
<div class="content-wrapper">   
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            User List          
        </h1>        
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-xs-12">
                <div class="alert alert-success alert-dismissible" id="event-true" style="display: none;">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                    <h4 style="margin-bottom: 0px;"><i class="icon fa fa-check"></i> Success! User successfully deleted.</h4>

                </div>
                <div class="alert alert-danger alert-dismissible" id="event-false" style="display: none;">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                    <h4 style="margin-bottom: 0px;"><i class="icon fa fa-ban"></i> Error! problem in deleting User.</h4>                    
                </div>
                <div class="box">                    
                    <!-- /.box-header -->
                    <div class="box-body" style="overflow-x: scroll;">
                        <table id="orderdata" class="table table-bordered table-striped">
                            <thead>
                                <tr>                                                              
                                    <th>Name</th>
                                    <th>Email</th>                                                                             
                                    <th>Phone no.</th>
                                    <th>Address</th>   
                                    <th>City</th>                                   
                                    <th>Postcode</th>                                   
                                    <th>Referral Code</th>                                   
                                    <th>Image</th>                                   
                                    <th>Action</th>                                   
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                if (!empty($user_data)) {
                                    foreach ($user_data as $val) {
                                        echo "<tr id='row_" . $val['iUserID'] . "'>";
                                        echo "<td>" . $val['vFirstName'].' '.$val['vLastName']. "</td>";
                                        echo "<td>" . $val['vEmail'] . "</td>";                                        
                                        echo "<td>" . $val['vPhone'] . "</td>";
                                        echo "<td>" . $val['tAddress'] . "</td>";
                                        echo "<td>" . $val['vCity'] . "</td>";                                        
                                        echo "<td>" . $val['vPostcode']. "</td>";
                                        echo "<td>" . $val['vReferralCode'] . "</td>";
                                        echo "<td><img style= 'width:100px; height:100px !important;' src=";
                                        echo (isset($val['tImage']) && $val['tImage'] != '') ? '../' . $USER_IMAGE_URL . $val['tImage'] : '../images/default.gif';
                                        echo "> </td>";                                       
                                        echo "<td><a href='#deletemodal' id='deletesubcategory" . $val['iSubCategoryID'] . "' iSubCategoryID='" . $val['iSubCategoryID'] . "' role='button' class='deletesubcategory btn btn btn-danger' data-toggle='modal'>Remove</a> </td>";
                                        echo "</tr>";
                                    }
                                }
                                ?>
                            </tbody>                        
                        </table>
                    </div>
                    <!-- /.box-body -->
                </div>
                <!-- /.box -->
            </div>
            <!-- /.col -->
        </div>
        <!-- /.row -->
    </section>
    <!-- /.content -->
</div>


<?php include 'footer.php'; ?>
<script type="text/javascript">
    $(document).ready(function () {
        $("#orderdata").DataTable({
            "ordering": false
        });
        
        $('.orderinfo').on('click', function ()
        {
            var iOrderID = $(this).attr('iOrderID');
            var data = {"iOrderID": iOrderID};
            $.ajax({
                url: "order_details.php",
                data: data,
                method: "POST",
                dataType: 'json',
                success: function (data) {                   
                    if (data != '') {                       
                        $('.modal-body').html(data);
                    } else {
                        $('#event-false').show().delay(5000).fadeOut();
                    }
                }
            });
        });
    });
</script> 
</body>
</html>

