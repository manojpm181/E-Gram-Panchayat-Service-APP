<?php
session_start();
include 'commonincludefiles.php';
global $conn;
include 'header.php';
include 'sidebar.php';
$slider_data = array();
$slider_data = getSliderDataList();
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
                        <p>Are you sure want to delete this Slider data?</p>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-outline pull-left" data-dismiss="modal">No</button>
                        <button type="button" class="btn btn-outline" iSliderID="" id="delete_yes">Yes</button>
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
            Slider Data List          
        </h1>        
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-xs-12">
                <div class="alert alert-success alert-dismissible" id="event-true" style="display: none;">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                    <h4 style="margin-bottom: 0px;"><i class="icon fa fa-check"></i> Success! Slider successfully deleted.</h4>

                </div>
                <div class="alert alert-danger alert-dismissible" id="event-false" style="display: none;">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                    <h4 style="margin-bottom: 0px;"><i class="icon fa fa-ban"></i> Error! problem in deleting Slider data.</h4>                    
                </div>
                <div class="box">                    
                    <!-- /.box-header -->
                    <div class="box-body" style="overflow-x: scroll;">
                        <table id="sliderdata" class="table table-bordered table-striped">
                            <thead>
                                <tr>                                                                                                                                
                                    <th>Sub Category Name</th>                                   
                                    <th>Image</th>   
                                    <th>Content</th>   
                                    <th>Action</th>                                   
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                if (!empty($slider_data)) {
                                    foreach ($slider_data as $val) {
                                        echo "<tr id='row_" . $val['iSliderID'] . "'>";                                                                       
                                        echo "<td>" . $val['vSubCategoryName'] . "</td>";                                       
                                        echo "<td><img style= 'width:100px; height:100px !important;' src=";
                                        echo (isset($val['tImage']) && $val['tImage'] != '') ? '../' . $SLIDER_DATA_IMAGE_URL . $val['tImage'] : '../images/default.gif';
                                        echo "> </td>";
                                        echo "<td>" . $val['tDetail'] . "</td>";  
                                        echo "<td><a href='edit_slider.php?sid=".$val['iSliderID']."' role='button' class='btn btn btn-primary editsubcategory' data-toggle='modal'>Edit</a>&nbsp;&nbsp;<a href='#deletemodal' id='deletesliderdata" . $val['iSliderID'] . "' iSliderID='" . $val['iSliderID'] . "' role='button' class='deletesliderdata btn btn btn-danger' data-toggle='modal'>Remove</a> </td>";
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
        $("#sliderdata").DataTable({
            "ordering": false
        });

        $(document).delegate('.deletesliderdata', 'click', function () {
            $('#delete_yes').attr('iSliderID', $(this).attr('iSliderID'));
        });

        $('#delete_yes').on('click', function ()
        {
            var slid = $(this).attr('iSliderID');
            var data = {"slid": slid};
            $.ajax({
                url: "sliderdatadelete.php",
                data: data,
                method: "POST",
                dataType: 'json',
                success: function (data) {
                    $('#deletemodal').modal('hide');
                    if (data == 1) {
                        $('#row_' + slid).remove();
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

