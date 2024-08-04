<?php
session_start();
include 'commonincludefiles.php';
global $conn;
include 'header.php';
include 'sidebar.php';
$subcategory_data = array();
$subcategory_data = getAllsubcategoryData();
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
                        <p>Are you sure want to delete this Sub Category data?</p>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-outline pull-left" data-dismiss="modal">No</button>
                        <button type="button" class="btn btn-outline" iSubCategoryID="" id="delete_yes">Yes</button>
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
            Sub Category List          
        </h1>        
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-xs-12">
                <div class="alert alert-success alert-dismissible" id="event-true" style="display: none;">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                    <h4 style="margin-bottom: 0px;"><i class="icon fa fa-check"></i> Success! Sub Category data successfully deleted.</h4>

                </div>
                <div class="alert alert-danger alert-dismissible" id="event-false" style="display: none;">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                    <h4 style="margin-bottom: 0px;"><i class="icon fa fa-ban"></i> Error! problem in deleting Sub Category data.</h4>                    
                </div>
                <div class="box">                    
                    <!-- /.box-header -->
                    <div class="box-body">
                        <table id="subcategorydata" class="table table-bordered table-striped">
                            <thead>
                                <tr>                                                              
                                    <th>Category Name</th>                                   
                                    <th>Sub Category Name</th>                                   
                                    <th>Image</th>   
                                    <th>Service Details</th>   
                                    <th>Action</th>                                   
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                if (!empty($subcategory_data)) {
                                    foreach ($subcategory_data as $val) {
                                        echo "<tr id='row_" . $val['iSubCategoryID'] . "'>";
                                        echo "<td>" . $val['vCategoryName'] . "</td>";                                       
                                        echo "<td>" . $val['vSubCategoryName'] . "</td>";                                       
                                        echo "<td><img style= 'width:200px; height:100px !important;' src=";
                                        echo (isset($val['tImage']) && $val['tImage'] != '') ? '../' . $SUBCATEGORY_IMAGE_URL . $val['tImage'] : '../images/default.gif';
                                        echo "> </td>";
                                         echo "<td>" . $val['tSubCatDetail'] . "</td>";    
                                        echo "<td><a href='edit_subcategory.php?scid=".$val['iSubCategoryID']."' role='button' class='btn btn btn-primary editsubcategory' data-toggle='modal'>Edit</a><br><a  style='margin-top:5px;' href='#deletemodal' id='deletesubcategory" . $val['iSubCategoryID'] . "' iSubCategoryID='" . $val['iSubCategoryID'] . "' role='button' class='deletesubcategory btn btn btn-danger' data-toggle='modal'>Remove</a> </td>";
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
        $("#subcategorydata").DataTable({
            "ordering": false
        });

        $(document).delegate('.deletesubcategory', 'click', function () {
            $('#delete_yes').attr('iSubCategoryID', $(this).attr('iSubCategoryID'));
        });

        $('#delete_yes').on('click', function ()
        {
            var scatid = $(this).attr('iSubCategoryID');
            var data = {"scatid": scatid};
            $.ajax({
                url: "subcategorydelete.php",
                data: data,
                method: "POST",
                dataType: 'json',
                success: function (data) {
                    $('#deletemodal').modal('hide');
                    if (data == 1) {
                        $('#row_' + scatid).remove();
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

