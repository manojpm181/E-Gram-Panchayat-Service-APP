<?php
session_start();
include 'commonincludefiles.php';
global $conn;
include 'header.php';
include 'sidebar.php';
?>
<?php
if (isset($_POST['submitdata']) && $_POST['submitdata'] == 'Update') {
    $iCategoryID = $_POST['iCategoryID'];
	$talati_name = $_POST['talati_name'];   
	$mobile_no = $_POST['mobile_no'];
	$fb_id = $_POST['fb_id'];
	$email_id = $_POST['email_id'];
	$insta_id = $_POST['insta_id'];
	$twitter_id = $_POST['twitter_id'];
	
    $fileName = '';
    $fileName = $_FILES['tImage']['name'];
    $fileTmpLoc = $_FILES['tImage']['tmp_name'];
    if (!empty($_FILES['tImage']) && is_array($_FILES['tImage']) && $_FILES['tImage']['error'] == 0) {
        $ext = pathinfo($fileName, PATHINFO_EXTENSION);
        $ext = strtolower($ext);

        $filepath = $CATEGORY_IMAGE_PATH . $fileName;

        if (!$fileTmpLoc) { // if file not chosen
            $message = "<div class='alert alert-error'><button type='button' class='close' data-dismiss='alert'>&times;</button><strong>Error!</strong> ERROR: Please browse for a file before clicking the upload button.<div class='alert alert-success' style='display:none'>
                                    <button type='button' class='close' data-dismiss='alert'>&times;</button>
                                    <strong>Error!</strong> ERROR: Please browse for a file before clicking the upload button.
                            </div></div>";
        } else if (!preg_match("/.(gif|jpg|png|JPG|PNG|GIF)$/i", $fileName)) {
            // This condition is only if you wish to allow uploading of specific file types    
            $message = "<div class='alert alert-error'><button type='button' class='close' data-dismiss='alert'>&times;</button><strong>Error!</strong> ERROR:Your image was not .gif, .jpg, .png !<div class='alert alert-success' style='display:none'>
                                    <button type='button' class='close' data-dismiss='alert'>&times;</button>
                                    <strong>Error!</strong> ERROR: Your image was not .gif, .jpg, .png !
                            </div></div>";
            unlink($fileTmpLoc);
        }

        $temp = explode(".", $_FILES["tImage"]["name"]);
        $newfilename = rand(1, 99999) . time() . '.' . $ext;

        move_uploaded_file($fileTmpLoc, $CATEGORY_IMAGE_PATH . $newfilename);
        chmod($CATEGORY_IMAGE_PATH . $newfilename, 0777);

//        $resizeObj = new resize($EVENT_IMAGE_PATH . $newfilename);
//        $resizeObj->resizeImage(360, 263, 'auto');
//        $resizeObj->saveImage($EVENT_IMAGE_THUMB_PATH . $newfilename, 100);
//        chmod($EVENT_IMAGE_THUMB_PATH . $newfilename, 0777);
        $filepathnew = $CATEGORY_IMAGE_PATH . $newfilename;


        if (!file_exists($filepathnew)) {
            $message = "<div class='alert alert-error'><button type='button' class='close' data-dismiss='alert'>&times;</button><strong>Error!</strong> ERROR: File not uploaded! <div class='alert alert-success' style='display:none'>
                                    <button type='button' class='close' data-dismiss='alert'>&times;</button>
                                    <strong>Error!</strong> ERROR: File not uploaded!
                            </div></div>";
            unlink($fileTmpLoc);
        }
    }
	$updatecategory = updatetalati($iCategoryID,$talati_name,$mobile_no,$fb_id,$email_id,$insta_id,$twitter_id,$newfilename);
    
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
                    $categorydata = gettalatiDataByID($_REQUEST['cid']);
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
                                    <label>Name*</label>                                
                                    <input type="text" class="form-control" id="talati_name" name="talati_name" required value="<?php echo (isset($categorydata['talati_name']) && $categorydata['talati_name'] != '') ? $categorydata['talati_name'] : '' ?>" onkeypress="return spacerestri(event, this);">                                
                                </div>                              
								<div class="form-group">
                                    <label>Mobile No.*</label>                                
                                    <input type="text" class="form-control" id="mobile_no" name="mobile_no" required value="<?php echo (isset($categorydata['talati_no']) && $categorydata['talati_no'] != '') ? $categorydata['talati_no'] : '' ?>" onkeypress="return spacerestri(event, this);">                                
                                </div>                              
								<div class="form-group">
                                    <label>Facebook link*</label>                                
                                    <input type="text" class="form-control" id="fb_id" name="fb_id" required value="<?php echo (isset($categorydata['talati_fb']) && $categorydata['talati_fb'] != '') ? $categorydata['talati_fb'] : '' ?>" onkeypress="return spacerestri(event, this);">                                
                                </div>                              
								<div class="form-group">
                                    <label>Email*</label>                                
                                    <input type="text" class="form-control" id="email_id" name="email_id" required value="<?php echo (isset($categorydata['talati_email']) && $categorydata['talati_email'] != '') ? $categorydata['talati_email'] : '' ?>" onkeypress="return spacerestri(event, this);">                                
                                </div>                              
								<div class="form-group">
                                    <label>Instagram Link*</label>                                
                                    <input type="text" class="form-control" id="insta_id" name="insta_id" required value="<?php echo (isset($categorydata['talati_insta']) && $categorydata['talati_insta'] != '') ? $categorydata['talati_insta'] : '' ?>" onkeypress="return spacerestri(event, this);">                                
                                </div>
								<div class="form-group">
                                    <label>Twitter Link*</label>                                
                                    <input type="text" class="form-control" id="twitter_id" name="twitter_id" required value="<?php echo (isset($categorydata['talati_twitter']) && $categorydata['talati_twitter'] != '') ? $categorydata['talati_twitter'] : '' ?>" onkeypress="return spacerestri(event, this);">                                
                                </div>
                                <div class="form-group product">
                                    <label style="float: left;width: 100%;">Image* (Size must be 210*210 pixels)</label>

                                    <div class="fileinput fileinput-new col-sm-3 no-padding" data-provides="fileinput">
                                        <div class="imgdisplay">
                                            <?php if ($categorydata['talati_image'] != '') { ?>
                                                <img src="<?php echo "../" . $CATEGORY_IMAGE_URL . $categorydata['talati_image']; ?>" id="tImage" height='150' width='150'>
                                            <?php } else { ?>
                                                <img src="../images/user-default.png" id="tImage">
                                            <?php } ?>
                                        </div>
                                        <div>
                                            <?php if ($categorydata['talati_image'] != '') { ?>
                                                <span class="btn btn-danger btn-file userpic">
                                                    <span class="fileinput-new">Change image</span>                                           
                                                    <input type="file" name="tImage"  title="Select Image" class="productimg" id="tImage1" data-img="<?php echo $categorydata['talati_id']; ?>" >
                                                </span>                                            
                                            <?php } else { ?>
                                                <span class="btn btn-danger btn-file userpic">
                                                    <span class="fileinput-new">Select image</span>                                           
                                                    <input type="file" name="tImage"  title="Select Image" class="productimg" id="tImage1" data-img="<?php echo $categorydata['talati_id']; ?>" >
                                                </span>
                                            <?php } ?>
                                        </div>
                                    </div>
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

