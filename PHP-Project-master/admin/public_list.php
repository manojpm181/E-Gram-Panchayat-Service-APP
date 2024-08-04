<?php
session_start();
include 'commonincludefiles.php';
global $conn;
include 'header.php';
include 'sidebar.php';
$category_data = array();
$category_data = getAllpublicData();
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
                        <p>Are you sure want to delete this Category data?</p>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-outline pull-left" data-dismiss="modal">No</button>
                        <button type="submit" class="btn btn-outline" iCategoryID="" id="delete_yes">Yes</button>
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
                    <h4 style="margin-bottom: 0px;"><i class="icon fa fa-ban"></i> Error! problem in deleting Category data.</h4>                    
                </div>
                <div class="box">                    
                    <!-- /.box-header -->
                    <div class="box-body" style="overflow-x: scroll;">
                        <table id="mytbl" class="table table-bordered table-striped">
                            <thead>
                                <tr>                                                              
                                    <th>Name</th>
									<th>Bussiness/Job Name</th>
									<th>Bussiness/Job Type</th>
									<th>Gender</th>
									<th>Blood Group</th>
									<th>Vord No.</th>
									<th>Mobile No.</th>
									<th>Birth date</th>
                                    <th>Action</th>                                   
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                if (!empty($category_data)) {
                                    foreach ($category_data as $val) {
                                        echo "<tr id='row_" . $val['iCategoryID'] . "'>";
                                        echo "<td>" . $val['public_name'] . "</td>";                                       
                                        echo "<td>" . $val['public_bus'] . "</td>";                                       
                                        echo "<td>" . $val['public_bus_type'] . "</td>";                                       
                                        echo "<td>" . $val['public_gender'] . "</td>";                                       
                                        echo "<td>" . $val['public_blood_grp_name'] . "</td>";                                       
                                        echo "<td>" . $val['public_vord_no'] . "</td>";                                       
                                        echo "<td>" . $val['public_mo_no'] . "</td>";                                       
                                        echo "<td>" . $val['public_bdate'] . "</td>";                                       
										echo "<td><a href='edit_public.php?cid=".$val['iCategoryID']."' role='button' class='btn btn btn-primary editcategory' data-toggle='modal'>Edit</a></td>&nbsp;&nbsp;";//<a href='#deletemodal' id='deletecategory" . $val['iCategoryID'] . "' iCategoryID='" . $val['iCategoryID'] . "' role='button' class='deletecategory btn btn btn-danger' data-toggle='modal'>Remove</a> </td>";
										echo "<td><a href='publicdelete.php?catid=".$val['iCategoryID']."' role='button' class='btn btn btn-primary editcategory' data-toggle='modal'>Remove</a></td>&nbsp;&nbsp;";//<a href='#deletemodal' id='deletecategory" . $val['iCategoryID'] . "' iCategoryID='" . $val['iCategoryID'] . "' role='button' class='deletecategory btn btn btn-danger' data-toggle='modal'>Remove</a> </td>";
										
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
        $("#mytbl").DataTable({
        });
    });
</script> 
</body>
</html>

