<?php
session_start();
include 'commonincludefiles.php';
global $conn;
include 'header.php';
include 'sidebar.php';
$category_data = array();
$category_data = getAllachievmentData();
?>
<style>
    .editteacher, deleteteacher{
        margin-bottom: 10px;
    }
</style>
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
                        <p>Are you sure you want to delete this Category data?</p>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-outline pull-left" data-dismiss="modal">No</button>
                        <button type="submit" class="btn btn-outline" iCategoryID=" " id="delete_yes">Yes</button>
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
            Category List          
        </h1>        
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-xs-12">
                <div class="alert alert-success alert-dismissible" id="event-true" style="display: none;">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                    <h4 style="margin-bottom: 0px;"><i class="icon fa fa-check"></i> Success! Category data successfully deleted.</h4>
                </div>
                <div class="alert alert-danger alert-dismissible" id="event-false" style="display: none;">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                    <h4 style="margin-bottom: 0px;"><i class="icon fa fa-ban"></i> Error! Problem in deleting Category data.</h4>                    
                </div>
                <div class="box">                    
                    <!-- /.box-header -->
                    <div class="box-body">
                        <table id="categorydata" class="table table-bordered table-striped">
                            <thead>
                                <tr>                                                              
                                    <th>achievment_name</th>       
                                    <th>achievment_detail</th>
                                    <th>achievment_type</th>
                                    <th>achievment_year</th>
                                    <!-- Removed Image header -->
                                    <th>Actions</th> <!-- Added Actions header -->
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                if (!empty($category_data)) {
                                    foreach ($category_data as $val) {
                                        echo "<tr id='row_" . $val['iCategoryID'] . "'>";
                                        echo "<td>" . $val['achievment_username'] . "</td>";
                                        echo "<td>" . $val['achievment_detail'] . "</td>";
                                        echo "<td>" . $val['achievment_type'] . "</td>";
                                        echo "<td>" . $val['achievment_year'] . "</td>";
                                        // Removed image-related <td> element
                                        echo "<td><a href='edit_achievment.php?cid=".$val['iCategoryID']."' role='button' class='btn btn-primary editcategory' data-toggle='modal'>Edit</a></td>&nbsp;&nbsp;";
                                        echo "<td><a href='achievmentdelete.php?catid=".$val['iCategoryID']."' role='button' class='btn btn-danger deletecategory' data-toggle='modal'>Remove</a></td>&nbsp;&nbsp;";
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
        $("#categorydata").DataTable({
            "ordering": false
        });

        $(document).delegate('.deletecategory', 'click', function () {
            $('#delete_yes').attr('iCategoryID', $(this).attr('iCategoryID'));
        });

        $('#delete_yes').on('click', function ()
        {
            var catid = $(this).attr('iCategoryID');
            var data = {"catid": catid};
            $.ajax({
                url: "sarpanchdelete.php",
                data: data,
                method: "POST",
                dataType: 'json',
                success: function (data) {
                    $('#deletemodal').modal('hide');
                    if (data == 1) {
                        $('#row_' + catid).remove();
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
