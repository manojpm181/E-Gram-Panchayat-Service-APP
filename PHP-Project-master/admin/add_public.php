<head>
<script src="https://cloud.tinymce.com/stable/tinymce.min.js"></script>
  <script>tinymce.init({ selector:'textarea' });</script>
</head>
<?php
session_start();
include 'commonincludefiles.php';
global $conn;
include 'header.php';
include 'sidebar.php';

if (isset($_POST['submitdata']) && $_POST['submitdata'] == 'Save') {
    $public_name = $_POST['public_name'];
	$public_bus = $_POST['public_bus'];
	$public_bus_type = $_POST['public_bus_type'];
	$public_gender = $_POST['public_gender'];
	$public_blood_grp_name = $_POST['public_blood_grp_name'];
	$public_vord_no = $_POST['public_vord_no'];
	$public_mo_no = $_POST['public_mo_no'];
	$public_bdate = $_POST['public_bdate'];

    

//        $resizeObj = new resize($CATEGORY_IMAGE_PATH . $newfilename);
//        $resizeObj->resizeImage(360, 263, 'auto');
//        $resizeObj->saveImage($EVENT_IMAGE_THUMB_PATH . $newfilename, 100);
//        chmod($EVENT_IMAGE_THUMB_PATH . $newfilename, 0777);
       
    $addcategory = addpublic($public_name,$public_bus,$public_bus_type,$public_gender,$public_blood_grp_name,$public_vord_no,$public_mo_no,$public_bdate);
    if ($addcategory > 0 && $addcategory != '') {
        $message = "<div class='alert alert-success' style='padding: 10px;'><button type='button' class='close' data-dismiss='alert'>&times;</button><strong>Success!</strong> Category data added successfully.<div class='alert alert-success' style='display:none'>
                                        <button type='button' class='close' data-dismiss='alert'>&times;</button>
                                        <strong>Success!</strong> Category data added successfully.
                                </div></div>";
    } else {
        $message = "<div class='alert alert-error' style='padding: 10px;'><button type='button' class='close' data-dismiss='alert'>&times;</button><strong>Error!</strong> problem in adding category data.<div class='alert alert-success' style='display:none'>
                                        <button type='button' class='close' data-dismiss='alert'>&times;</button>
                                        <strong>Error!</strong> problem in adding category data.
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
            <form role="form" method="post" id="addcategory" name="categoryform" enctype="multipart/form-data">
                <div class="col-md-12">
                    <div class="box box-primary">
                        <div class="box-header">
                            <h3 class="box-title">Category Details</h3>
                        </div>                         	
                        <div class="box-body">
                            <?php echo $message; ?>
                            <div class="col-md-4">
                                <div class="form-group">
										<label>Public Name*</label>                                
										<input type="text" class="form-control" id="public_name" name="public_name" required onkeypress="return spacerestri(event, this);">                                
									</div>
								<div class="form-group">
										<label>Bussiness Name/Job Name*</label>                                
										<input type="text" class="form-control" id="public_bus" name="public_bus" required onkeypress="return spacerestri(event, this);">                                
									</div>
									<div class="form-group">
										<label>Bussiness Type/Job Type*</label>                                
										<input type="text" class="form-control" id="public_bus_type" name="public_bus_type" required onkeypress="return spacerestri(event, this);">                                
									</div>
									<div class="form-group">
										<label>Gender*</label> 
										<select name="public_gender" class="selectpicker">
                                            <option value="male" >Male</option>
                                            <option value="female" >Female</option>
                                        </select>
									</div>
									<div class="form-group">
										<label>Blood Group*</label>                                
										<select name="public_blood_grp_name" class="selectpicker">
                                            <option value="A+" >A+</option>
                                            <option value="A-" >A-</option>
											<option value="B+" >B+</option>
                                            <option value="B-" >B-</option>
											<option value="O+" >O+</option>
                                            <option value="O-" >O-</option>
											<option value="AB+" >AB+</option>
                                            <option value="AB-" >AB-</option>
                                        </select>
									
									</div>
									<div class="form-group">
										<label>Vord No*</label>                                
										<select name="public_vord_no" class="selectpicker">
                                            
											<option value="1" >1</option>
                                            <option value="2" >2</option>
											<option value="3" >3</option>
                                            <option value="4" >4</option>
											<option value="5" >5</option>
                                            <option value="6" >6</option>
											<option value="7" >7</option>
                                            <option value="8" >8</option>
                                        </select>
									</div>
									<div class="form-group">
										<label>Mobile No*</label>                                
										<input type="text" class="form-control" id="public_mo_no" name="public_mo_no" required onkeypress="return spacerestri(event, this);">                                
									</div>
									<div class="form-group">
										<label>Birth date*</label>                                
										<input type="date" class="form-control" id="public_bdate" name="public_bdate" required onkeypress="return spacerestri(event, this);">                                
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
<script type="text/javascript">
    $('.categorypic').on('change', '#tImage', function (e) {
        var fname = e.target.files[0].name;
        var fileExtension;
        fileExtension = fname.replace(/^.*\./, '');
        if (fileExtension != 'gif' && fileExtension != 'jpg' && fileExtension != 'png' && fileExtension != 'jpeg') {
            alert('Image file type must be PNG, JPG, JPEG or GIF');
            $('input[type=file]').val('');
            return false;
        }
        if ((this.files[0].size) > 2048000) {
            alert('File size must be less than or equal to 2 MB');
            $('input[type=file]').val('');
            return false;
        }
    });
</script>
</body>
</html>

