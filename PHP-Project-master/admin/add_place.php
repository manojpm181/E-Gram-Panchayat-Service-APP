<?php
session_start();
include 'commonincludefiles.php';
global $conn;
include 'header.php';
include 'sidebar.php';

if (isset($_POST['submitdata']) && $_POST['submitdata'] == 'Save') {
    $place_name = $_POST['place_name'];   
    $place_detail = $_POST['place_detail'];
    $place_date = $_POST['place_date'];

    // File handling code removed

    // Call function without the image parameter
    $addcategory = addplace($place_name, $place_detail, $place_date, '');
    if ($addcategory > 0 && $addcategory != '') {
        $message = "<div class='alert alert-success' style='padding: 10px;'><button type='button' class='close' data-dismiss='alert'>&times;</button><strong>Success!</strong> Category data added successfully.<div class='alert alert-success' style='display:none'>
                                        <button type='button' class='close' data-dismiss='alert'>&times;</button>
                                        <strong>Success!</strong> Category data added successfully.
                                </div></div>";
    } else {
        $message = "<div class='alert alert-error' style='padding: 10px;'><button type='button' class='close' data-dismiss='alert'>&times;</button><strong>Error!</strong> Problem in adding category data.<div class='alert alert-success' style='display:none'>
                                        <button type='button' class='close' data-dismiss='alert'>&times;</button>
                                        <strong>Error!</strong> Problem in adding category data.
                                </div></div>";
    }
}
?>
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Add Category        
        </h1>        
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="row">
            <!-- left column -->
            <form role="form" method="post" id="addcategory" name="categoryform">
                <div class="col-md-12">
                    <div class="box box-primary">
                        <div class="box-header">
                            <h3 class="box-title">Category Details</h3>
                        </div>                         
                        <div class="box-body">
                            <?php echo $message; ?>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Place Name*</label>                                
                                    <input type="text" class="form-control" id="place_name" name="place_name" required onkeypress="return spacerestri(event, this);">                                
                                </div>                               
                                <div class="form-group">
                                    <label>Place Detail*</label>                                
                                    <input type="text" class="form-control" id="place_detail" name="place_detail" required onkeypress="return spacerestri(event, this);">                                
                                </div>                               
                                <div class="form-group">
                                    <label>Place Date*</label>                                
                                    <input type="date" class="form-control" id="place_date" name="place_date" required>                                
                                </div>
                            </div>
                        </div> 
                        <div class="box-footer">
                            <div class="col-md-12">
                                <input type="submit" class="btn btn-primary" value="Save" name="submitdata">
                            </div>
                        </div>
                    </div>                    
                </div>
            </form>
        </div>
        <!-- /.row -->
    </section>
    <!-- /.content -->
</div>
<?php include 'footer.php'; ?>
</body>
</html>
