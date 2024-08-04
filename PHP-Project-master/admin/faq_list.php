<?php
session_start();
include 'commonincludefiles.php';
global $conn;
include 'header.php';
include 'sidebar.php';
$faq_data = array();
$faq_data = getAllFaqData();
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
                        <p>Are you sure want to delete this Faq?</p>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-outline pull-left" data-dismiss="modal">No</button>
                        <button type="button" class="btn btn-outline" iFaqID="" id="delete_yes">Yes</button>
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
            Faq List          
        </h1>        
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-xs-12">
                <div class="alert alert-success alert-dismissible" id="event-true" style="display: none;">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                    <h4 style="margin-bottom: 0px;"><i class="icon fa fa-check"></i> Success! Faq successfully deleted.</h4>

                </div>
                <div class="alert alert-danger alert-dismissible" id="event-false" style="display: none;">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                    <h4 style="margin-bottom: 0px;"><i class="icon fa fa-ban"></i> Error! problem in deleting Faq.</h4>                    
                </div>
                <div class="box">                    
                    <!-- /.box-header -->
                    <div class="box-body">
                        <table id="faqdata" class="table table-bordered table-striped">
                            <thead>
                                <tr>                                                              
                                    <th>Question</th>
                                    <th style="width: 50%;">Answer</th>                                                                                                                  
                                    <th>Action</th>                                   
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                if (!empty($faq_data)) {
                                    foreach ($faq_data as $val) {
                                        echo "<tr id='row_" . $val['iFaqID'] . "'>";
                                        echo "<td>" . $val['tQuestion'] . "</td>";
                                        echo "<td>" . $val['tAnswer'] . "</td>";                                                                              
                                        echo "<td><a href='edit_faq.php?fid=".$val['iFaqID']."' role='button' class='btn btn btn-primary editfaqbutton' data-toggle='modal'>Edit</a>&nbsp;<a href='#deletemodal' id='deletefaq" . $val['iFaqID'] . "' iFaqID='" . $val['iFaqID'] . "' role='button' class='deletefaq btn btn btn-danger' data-toggle='modal'>Remove</a> </td>";
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
        $("#faqdata").DataTable({
            "ordering": false
        });

        $(document).delegate('.deletefaq', 'click', function () {
            $('#delete_yes').attr('iFaqID', $(this).attr('iFaqID'));
        });

        $('#delete_yes').on('click', function ()
        {
            var iFaqID = $(this).attr('iFaqID');
            var data = {"faqId": iFaqID};
            $.ajax({
                url: "faqdelete.php",
                data: data,
                method: "POST",
                dataType: 'json',
                success: function (data) {
                    $('#deletemodal').modal('hide');
                    if (data == 1) {
                        $('#row_' + iFaqID).remove();
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

