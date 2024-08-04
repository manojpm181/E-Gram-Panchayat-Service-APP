<?php
session_start();
include 'commonincludefiles.php';
global $conn;
include 'header.php';
include 'sidebar.php';
?>
<html>
<?php
if (isset($_POST['submitdata']) && $_POST['submitdata'] == 'Update') {
    $iCategoryID = $_POST['iCategoryID'];
	$public_name = $_POST['public_name'];
	$public_bus = $_POST['public_bus'];
	$public_bus_type = $_POST['public_bus_type'];
	$public_gender = $_POST['public_gender'];
	$public_blood_grp_name = $_POST['public_blood_grp_name'];
	$public_vord_no = $_POST['public_vord_no'];
	$public_mo_no = $_POST['public_mo_no'];
	$public_bdate = $_POST['public_bdate'];

//        $resizeObj = new resize($EVENT_IMAGE_PATH . $newfilename);
//        $resizeObj->resizeImage(360, 263, 'auto');
//        $resizeObj->saveImage($EVENT_IMAGE_THUMB_PATH . $newfilename, 100);
//    
	$updatecategory = updatepublic($iCategoryID,$public_name,$public_bus,$public_bus_type,$public_gender,$public_blood_grp_name,$public_vord_no,$public_mo_no,$public_bdate);
    
    if ($updatecategory) {
        $message = "<div class='alert alert-success' style='padding: 10px;'><button type='button' class='close' data-dismiss='alert'>&times;</button><strong>Success!</strong> Category data updated successfully.<div class='alert alert-success' style='display:none'>
                                        <button type='button' class='close' data-dismiss='alert'>&times;</button>
                                        <strong>Success!</strong> Category data updated successfully.
                                </div></div>";
    } else {
        $message = "<div class='alert alert-error' style='padding: 10px;'><button type='button' class='close' data-dismiss='alert'>&times;</button><strong>Error!</strong> problem in updating Category data.<div class='alert alert-success' style='display:none'>
                                        <button type='button' class='close' data-dismiss='alert'>&times;</button>
                                        <strong>Error!</strong> problem in updating Category data.
                                </div></div>";
    }
}
?>
<style>
    .product input[type="file"]{
        position: absolute;
        bottom: 0;
        left: 10px;
        max-width: 30%;
        min-height: 30%;
        font-size: 25px;
        opacity: 0;   
        outline: none;
        background: white;
        cursor: inherit;
        display: block;
    }
    .imgdisplay{
        margin-bottom: 15px;
    }
</style>
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Edit Category        
        </h1>        
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="row">
            <!-- left column -->
            <form role="form" method="post" id="addevent" name="eventform" enctype="multipart/form-data">
                <?php
                if (isset($_REQUEST['cid']) && $_REQUEST['cid'] != '') {
                    $categorydata = getpublicDataByID($_REQUEST['cid']);
                    echo "<input type='hidden' name='iCategoryID' value='" . $_REQUEST['cid'] . "' />";
                }
                ?>    
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
                                    <input type="text" class="form-control" id="public_name" name="public_name" required value="<?php echo (isset($categorydata['public_name']) && $categorydata['public_name'] != '') ? $categorydata['public_name'] : '' ?>" onkeypress="return spacerestri(event, this);">                                
                                </div>
								<div class="form-group">
                                    <label>Bussiness Name/Job Name*</label>                                
                                    <input type="text" class="form-control" id="public_bus" name="public_bus" required value="<?php echo (isset($categorydata['public_bus']) && $categorydata['public_bus'] != '') ? $categorydata['public_bus'] : '' ?>" onkeypress="return spacerestri(event, this);">                                
                                </div>
								<div class="form-group">
                                    <label>Bussiness Type/Job Type*</label>                                
                                    <input type="text" class="form-control" id="public_bus_type" name="public_bus_type" required value="<?php echo (isset($categorydata['public_bus_type']) && $categorydata['public_bus_type'] != '') ? $categorydata['public_bus_type'] : '' ?>" onkeypress="return spacerestri(event, this);">                                
                                </div>
								<div class="form-group">
                                    <label>Gender*</label> 
										<select id="public_gender" name="public_gender" class="selectpicker" value="<?php echo (isset($categorydata['public_gender']) && $categorydata['public_gender'] != '') ? $categorydata['public_gender'] : '' ?>">
                                            <option value="male" >Male</option>
                                            <option value="female" >Female</option>
                                        </select>
								</div>
								<div class="form-group">
										<label>Blood Group*</label>                                
										<select id="public_blood_grp_name" name="public_blood_grp_name" class="selectpicker" value="<?php echo (isset($categorydata['public_blood_grp_name']) && $categorydata['public_blood_grp_name'] != '') ? $categorydata['public_blood_grp_name'] : '' ?>">
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
										<select name="public_vord_no" id="public_vord_no" class="selectpicker" value="<?php echo (isset($categorydata['public_vord_no']) && $categorydata['public_vord_no'] != '') ? $categorydata['public_vord_no'] : '' ?>"	>
                                            
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
                                    <input type="text" class="form-control" id="public_mo_no" name="public_mo_no" required value="<?php echo (isset($categorydata['public_mo_no']) && $categorydata['public_mo_no'] != '') ? $categorydata['public_mo_no'] : '' ?>" onkeypress="return spacerestri(event, this);">                                
                                </div>
								<div class="form-group">
                                    <label>Birth date*</label>                                
                                    <input type="text" class="form-control" id="public_bdate" name="public_bdate" required value="<?php echo (isset($categorydata['public_bdate']) && $categorydata['public_bdate'] != '') ? $categorydata['public_bdate'] : '' ?>" onkeypress="return spacerestri(event, this);">                                
                                </div>
							</div>

                        </div> 
                        <div class="box-footer">
                            <div class="col-md-12">
                                <input type="submit" class="btn btn-primary" value="Update" name="submitdata">
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
<?php
include 'footer.php';
?>
<script type="text/javascript">
    $('.userpic').on("change", ".productimg", function (e) {
        var fname = e.target.files[0].name;
        var imgsrc = $("#tImage").attr("src");
        var extension = fname.substr((fname.lastIndexOf('.') + 1));
        if (extension != 'gif' && extension != 'jpg' && extension != 'png' && extension != 'jpeg') {
            //$("#tImage1").attr('src', imgsrc);
            alert('Image file type must be PNG, JPG, JPEG or GIF');
            return false;
        }
        if ((this.files[0].size) > 2048000) {
            // $("#tImage1").attr('src', imgsrc);
            alert('File size must be less than or equal to 2 MB');
            return false;
        }
        if (this.files && this.files[0]) {
            var reader = new FileReader();

            reader.onload = function (e) {
                $('#tImage')
                        .attr('src', e.target.result)
                        .width(150)
                        .height(150);
            };
            reader.readAsDataURL(this.files[0]);
        }
    });
</script>
</body>
</html>

