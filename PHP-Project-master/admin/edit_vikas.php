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
	$vikas_name = $_POST['vikas_name'];
    $vikas_grant_amount = $_POST['vikas_grant_amount'];    
    $vikas_detail = $_POST['vikas_detail'];
	$vikas_com_year = $_POST['vikas_com_year'];
    
//        $resizeObj = new resize($EVENT_IMAGE_PATH . $newfilename);
//        $resizeObj->resizeImage(360, 263, 'auto');
//        $resizeObj->saveImage($EVENT_IMAGE_THUMB_PATH . $newfilename, 100);
//    
	$updatecategory = updatevikas($iCategoryID,$vikas_name,$vikas_grant_amount,$vikas_detail,$vikas_com_year);
    
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
                    $categorydata = getvikasDataByID($_REQUEST['cid']);
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
                                    <label>vikas_name*</label>
									<input type="text" class="form-control" id="vikas_name" name="vikas_name" required value="<?php echo (isset($categorydata['vikas_name']) && $categorydata['vikas_name'] != '') ? $categorydata['vikas_name'] : '' ?>" onkeypress="return spacerestri(event, this);">                                
                                </div>
								<div class="form-group">
                                    <label>vikas_grant_amount*</label>
									<input type="text" class="form-control" id="vikas_grant_amount" name="vikas_grant_amount" required value="<?php echo (isset($categorydata['vikas_grant_amount']) && $categorydata['vikas_grant_amount'] != '') ? $categorydata['vikas_grant_amount'] : '' ?>" onkeypress="return spacerestri(event, this);">                                
                                </div>
								<div class="form-group">
                                    <label>vikas_detail*</label>
									<input type="text" class="form-control" id="vikas_detail" name="vikas_detail" required value="<?php echo (isset($categorydata['vikas_detail']) && $categorydata['vikas_detail'] != '') ? $categorydata['vikas_detail'] : '' ?>" onkeypress="return spacerestri(event, this);">                                
                                </div>
								<div class="form-group">
                                    <label>vikas_com_year*</label>
									<input type="date" class="form-control" id="vikas_com_year" name="vikas_com_year" required value="<?php echo (isset($categorydata['vikas_com_year']) && $categorydata['vikas_com_year'] != '') ? $categorydata['vikas_com_year'] : '' ?>" onkeypress="return spacerestri(event, this);">                                
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

