<?php
session_start();
include 'commonincludefiles.php';
global $conn;
include 'header.php';
include 'sidebar.php';
$contact_data = array();
$contact_data = getAllContactData();
?>
<div class="content-wrapper">
    <div class="example-modal">
        <div class="modal modal-primary" id="deletemodal">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title">Confirm</h4>
                    </div>
                    <div class="modal-body">
                        <p>Are you sure want to delete this user data?</p>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-outline pull-left" data-dismiss="modal">No</button>
                        <button type="button" class="btn btn-outline" iContactID="" id="delete_yes">Yes</button>
                    </div>
                </div>
                <!-- /.modal-content -->
            </div>
            <!-- /.modal-dialog -->
        </div>
        <!-- /.modal -->
    </div>
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Contact List          
        </h1>        
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-xs-12">
                <div class="alert alert-success alert-dismissible" id="event-true" style="display: none;">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                    <h4 style="margin-bottom: 0px;"><i class="icon fa fa-check"></i> Success! User data successfully deleted.</h4>

                </div>
                <div class="alert alert-danger alert-dismissible" id="event-false" style="display: none;">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                    <h4 style="margin-bottom: 0px;"><i class="icon fa fa-ban"></i> Error! problem in deleting user data.</h4>                    
                </div>
                <div class="box">                    
                    <!-- /.box-header -->
                    <div class="box-body" style="overflow-x: scroll;">
                        <table id="contactdata" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>Name</th>                                   
                                    <th>Phone No.</th>                                   
                                    <th>Email</th>                                   
                                    <th>Best time to call </th>                                   
                                    <th>Contact Way</th>                                   
                                    <th>Reason for contact</th>                                   
                                    <th>Enquiry Type</th>                                   
                                    <th>Service Type</th>                                   
                                    <th>Sub Service Type</th>                                   
                                    <th>Postcode</th>                                   
                                    <th>Promocode</th>                                                                                                        
                                    <th>Note</th>                                   
                                    <th>Action</th>                                   
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                if (!empty($contact_data)) {
                                    foreach ($contact_data as $val) {
                                        echo "<tr id='row_" . $val['iContactID'] . "'>";
                                        echo "<td>" . $val['vName'] . "</td>";
                                        echo "<td>" . $val['vPhone'] . "</td>";
                                        echo "<td>" . $val['vEmail'] . "</td>";
                                        echo "<td>" . $val['vCallTime'] . "</td>";
                                        echo "<td>" . $val['eContactWay'] . "</td>";
                                        echo "<td>" . $val['vReasonForContact'] . "</td>";
                                        echo "<td>" . $val['eEnquiryType'] . "</td>";
                                        echo "<td>" . $val['vServiceType'] . "</td>";
                                        echo "<td>" . $val['vSubServiceType'] . "</td>";
                                        echo "<td>" . $val['vPostcode'] . "</td>";
                                        echo "<td>" . $val['vPromocode'] . "</td>";
                                        echo "<td>" . $val['tNote'] . "</td>";                                       
                                        echo "<td><a href='#deletemodal' id='deletecontact" . $val['iContactID'] . "' iContactID='" . $val['iContactID'] . "' role='button' class='deletecontact btn btn btn-danger' data-toggle='modal'>Remove</a> </td>";
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
        $("#contactdata").DataTable();

        $(document).delegate('.deletecontact', 'click', function () {
            $('#delete_yes').attr('iContactID', $(this).attr('iContactID'));
        });

        $('#delete_yes').on('click', function ()
        {
            var iContactID = $(this).attr('iContactID');
            var data = {"contactId": iContactID};
            $.ajax({
                url: "contactdelete.php",
                data: data,
                method: "POST",
                dataType: 'json',
                success: function (data) {
                    $('#deletemodal').modal('hide');
                    if (data == 1) {
                        $('#row_' + iContactID).remove();
                        $('#event-true').show().delay(5000).fadeOut();
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

