<?php
session_start();
include 'commonincludefiles.php';
global $conn;
include 'header.php';
include 'sidebar.php';
?>
<?php
if (isset($_POST['submitdata']) && $_POST['submitdata'] == 'Update') {

    $tDetail = $_POST['tDetail'];
    $iSubCategoryID = $_POST['iSubCategoryID'];
    $iSliderID = $_POST['iSliderID'];

    // Loop to get individual element from the array
    $validextensions = array("jpeg", "jpg", "png", "gif");      // Extensions which are allowed.
    $ext = explode('.', basename($_FILES['tImage']['name']));   // Explode file name from dot(.)
    $file_extension = end($ext); // Store extensions in the variable.
    if ($_FILES['tImage']['name'][0] != '') {
        $tImage = md5(uniqid()) . "." . $file_extension;
        $target_path = $SLIDER_DATA_IMAGE_PATH . $tImage;     // Set the target path with a new name of image.                
        if (($_FILES["tImage"]["size"] < 1000000) && in_array($file_extension, $validextensions)) {
            if (move_uploaded_file($_FILES['tImage']['tmp_name'], $target_path)) {
                chmod($target_path, 0777);

                // If file moved to uploads folder.                
            } else {     //  If File Was Not Moved.
                $message = '<span id="error">please try again!.</span><br/><br/>';
            }
        } else {     //   If File Size And File Type Was Incorrect.
            $message = '<span id="error">***Invalid file Size or Type***</span><br/><br/>';
        }
    }

    $updatesliderdata = updateSliderData($iSliderID, $tImage, $tDetail, $iSubCategoryID);
    if ($updatesliderdata) {
        $message = "<div class='alert alert-success' style='padding: 10px;'><button type='button' class='close' data-dismiss='alert'>&times;</button><strong>Success!</strong> Slider data updated successfully.<div class='alert alert-success' style='display:none'>
                                        <button type='button' class='close' data-dismiss='alert'>&times;</button>
                                        <strong>Success!</strong> Slider data updated successfully.
                                </div></div>";
    } else {
        $message = "<div class='alert alert-error' style='padding: 10px;'><button type='button' class='close' data-dismiss='alert'>&times;</button><strong>Error!</strong> problem in updating Slider data.<div class='alert alert-success' style='display:none'>
                                        <button type='button' class='close' data-dismiss='alert'>&times;</button>
                                        <strong>Error!</strong> problem in updating Slider data.
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
    .dataedit {
        resize: none;
        width: 100%; 
        height: 200px; 
        font-size: 14px; 
        line-height: 18px; 
        border: 1px solid #dddddd; 
        padding: 10px;
    }
    .imgdisplay{
        margin-bottom: 15px;
    }
    .contentdiv{
        float: left;
        width: 100%;
    }
</style>
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Edit Slider Details       
        </h1>        
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="row">
            <!-- left column -->
            <form role="form" method="post" id="addevent" name="eventform" enctype="multipart/form-data">
                <?php
                if (isset($_REQUEST['sid']) && $_REQUEST['sid'] != '') {
                    $sliderdata = getSliderDetailByID($_REQUEST['sid']);

                    echo "<input type='hidden' name='iSliderID' value='" . $_REQUEST['sid'] . "' />";
                }
                ?>    
                <div class="col-md-12">
                    <div class="box box-primary">
                        <div class="box-header">
                            <h3 class="box-title">Slider Details</h3>
                        </div>                         	
                        <div class="box-body">
                            <?php echo $message; ?>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Slider List*</label>
                                    <select class="form-control select2 select2-hidden-accessible" name="iSubCategoryID" style="width: 100%;" tabindex="-1" aria-hidden="true" required>
                                        <option value="" disabled="" selected="">Please Select Sub Category</option>
                                        <?php
                                        $subcategorylist = getAllSubcategoryDataList();
                                        foreach ($subcategorylist as $val) {
                                            if ($val['iSubCategoryID'] == $sliderdata['iSubCategoryID']) {
                                                echo "<option value='" . $val['iSubCategoryID'] . "' selected>" . $val['vSubCategoryName'] . "</option>";
                                            } else {
                                                echo "<option value='" . $val['iSubCategoryID'] . "'>" . $val['vSubCategoryName'] . "</option>";
                                            }
                                        }
                                        ?>                                        
                                    </select>
                                </div>
                            </div>                                                                

                            <div class="form-group product col-md-12">                              
                                <div class="fileinput fileinput-new col-sm-3 no-padding" data-provides="fileinput">
                                     <label>Image*</label>
                                    <div class="imgdisplay">
                                        <?php if ($sliderdata['tImage'] != '') { ?>
                                            <img src="<?php echo "../" . $SLIDER_DATA_IMAGE_URL . $sliderdata['tImage']; ?>" id="tImage" height='150' width='150'>
                                        <?php } else { ?>
                                            <img src="../images/user-default.png" id="tImage">
                                        <?php } ?>
                                    </div>
                                    <div>
                                        <?php if ($sliderdata['tImage'] != '') { ?>
                                            <span class="btn btn-danger btn-file userpic">
                                                <span class="fileinput-new">Change image</span>                                           
                                                <input type="file" name="tImage"  title="Select Image" class="productimg" id="tImage1" data-img="<?php echo $sliderdata['iSliderID']; ?>" >
                                            </span>                                            
                                        <?php } else { ?>
                                            <span class="btn btn-danger btn-file userpic">
                                                <span class="fileinput-new">Select image</span>                                           
                                                <input type="file" name="tImage"  title="Select Image" class="productimg" id="tImage1" data-img="<?php echo $sliderdata['iSliderID']; ?>" >
                                            </span>
                                        <?php } ?>
                                    </div>
                                </div>
                                <div class="form-group col-md-7">
                                    <label class="datacontent">Description* </label>                                               
                                    <textarea id="textarea" class="dataedit" name="tDetail" required><?php echo (isset($sliderdata['tDetail']) && $sliderdata['tDetail'] != '') ? $sliderdata['tDetail'] : '' ?></textarea>
                                </div>
                            </div>

                        </div>                                    

                        <div class="box-footer">
                            <div class="col-md-12">
                                <input type="submit" class="btn btn-primary" value="Update" name="submitdata">
                                <a href="slider_list.php"><input type="button" class="btn btn-danger" value="Cancel" name="canceldata"></a>
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

    $(function () {
        $(".select2").select2();
        $("#textarea").wysihtml5();
    });

    $('.userpic').on("change", ".productimg", function (e) {
        var fname = e.target.files[0].name;
        var imgsrc = $("#tImage").attr("src");
        var extension = fname.substr((fname.lastIndexOf('.') + 1));
        if (extension != 'gif' && extension != 'jpg' && extension != 'png' && extension != 'jpeg') {
            //$("#tImage1").attr('src', imgsrc);
            alert('Image file type must be PNG, JPG, JPEG or GIF');
            return false;
        }
        if ((this.files[0].size) > 400000) {
            // $("#tImage1").attr('src', imgsrc);
            alert('File size must be less than or equal to 400 kb');
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

