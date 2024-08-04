<?php
session_start();
include 'commonincludefiles.php';
global $conn;
include 'header.php';
include 'sidebar.php';

if (isset($_POST['submitdata']) && $_POST['submitdata'] == 'Save') {
    $vSubCategoryName = $_POST['vSubCategoryName'];
    $iCategoryID = $_POST['iCategoryID'];
    $tSubCatDetail = $_POST['tSubCatDetail'];

    $fileName = '';
    $fileName = $_FILES['tImage']['name'];
    $fileTmpLoc = $_FILES['tImage']['tmp_name'];
    if (!empty($_FILES['tImage']) && is_array($_FILES['tImage']) && $_FILES['tImage']['error'] == 0) {
        $ext = pathinfo($fileName, PATHINFO_EXTENSION);
        $ext = strtolower($ext);

        $filepath = $SUBCATEGORY_IMAGE_PATH . $fileName;

        if (!$fileTmpLoc) { // if file not chosen
            $message = "<div class='alert alert-error'><button type='button' class='close' data-dismiss='alert'>&times;</button><strong>Error!</strong> ERROR: Please browse for a file before clicking the upload button.<div class='alert alert-success' style='display:none'>
                                    <button type='button' class='close' data-dismiss='alert'>&times;</button>
                                    <strong>Error!</strong> ERROR: Please browse for a file before clicking the upload button.
                            </div></div>";
            exit;
        } else if (!preg_match("/.(gif|jpg|png|JPG|PNG|GIF)$/i", $fileName)) {
            // This condition is only if you wish to allow uploading of specific file types    
            $message = "<div class='alert alert-error'><button type='button' class='close' data-dismiss='alert'>&times;</button><strong>Error!</strong> ERROR:Your image was not .gif, .jpg, .png !<div class='alert alert-success' style='display:none'>
                                    <button type='button' class='close' data-dismiss='alert'>&times;</button>
                                    <strong>Error!</strong> ERROR: Your image was not .gif, .jpg, .png !
                            </div></div>";
            unlink($fileTmpLoc);
            exit;
        }

        $temp = explode(".", $_FILES["tImage"]["name"]);
        $newfilename = rand(1, 99999) . time() . '.' . $ext;

        move_uploaded_file($fileTmpLoc, $SUBCATEGORY_IMAGE_PATH . $newfilename);
        chmod($SUBCATEGORY_IMAGE_PATH . $newfilename, 0777);

//        $resizeObj = new resize($SUBCATEGORY_IMAGE_PATH . $newfilename);
//        $resizeObj->resizeImage(360, 263, 'auto');
//        $resizeObj->saveImage($EVENT_IMAGE_THUMB_PATH . $newfilename, 100);
//        chmod($EVENT_IMAGE_THUMB_PATH . $newfilename, 0777);
        $filepathnew = $SUBCATEGORY_IMAGE_PATH . $newfilename;

        if (!file_exists($filepathnew)) {

            $message = "<div class='alert alert-error'><button type='button' class='close' data-dismiss='alert'>&times;</button><strong>Error!</strong> ERROR: File not uploaded! <div class='alert alert-success' style='display:none'>
                                    <button type='button' class='close' data-dismiss='alert'>&times;</button>
                                    <strong>Error!</strong> ERROR: File not uploaded!
                            </div></div>";
            unlink($fileTmpLoc);
            //exit();
        }
    }

    $addcategory = addSubCategory($iCategoryID, $vSubCategoryName, $newfilename, $tSubCatDetail);
    if ($addcategory > 0 && $addcategory != '') {
        $message = "<div class='alert alert-success' style='padding: 10px;'><button type='button' class='close' data-dismiss='alert'>&times;</button><strong>Success!</strong> Subcategory data added successfully.<div class='alert alert-success' style='display:none'>
                                        <button type='button' class='close' data-dismiss='alert'>&times;</button>
                                        <strong>Success!</strong> Subcategory data added successfully.
                                </div></div>";
    } else {
        $message = "<div class='alert alert-error' style='padding: 10px;'><button type='button' class='close' data-dismiss='alert'>&times;</button><strong>Error!</strong> problem in adding subcategory data.<div class='alert alert-success' style='display:none'>
                                        <button type='button' class='close' data-dismiss='alert'>&times;</button>
                                        <strong>Error!</strong> problem in adding subcategory data.
                                </div></div>";
    }
}
?>
<style>
    .dataedit {
        resize: none;
        width: 100%; 
        height: 200px; 
        font-size: 14px; 
        line-height: 18px; 
        border: 1px solid #dddddd; 
        padding: 10px;
    }
</style>
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Add Sub Category        
        </h1>        
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="row">
            <!-- left column -->
            <form role="form" method="post" id="addsubcategory" name="subcategoryform" enctype="multipart/form-data">
                <div class="col-md-12">
                    <div class="box box-primary">
                        <div class="box-header">
                            <h3 class="box-title">Sub Category Details</h3>
                        </div>                         	
                        <div class="box-body">
                            <?php echo $message; ?>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Category List*</label>
                                    <select class="form-control select2 select2-hidden-accessible" name="iCategoryID" style="width: 100%;" tabindex="-1" aria-hidden="true" required>
                                        <option value="" disabled="" selected="">Please Select Category</option>
                                        <?php
                                        $categorylist = getAllCategoryData();
                                        foreach ($categorylist as $val) {
                                            ?>
                                            <option value="<?= $val['iCategoryID']; ?>"><?= $val['vCategoryName']; ?></option>
                                        <?php } ?>                                        
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label>Sub Category Name*</label>                                
                                    <input type="text" class="form-control" id="vSubCategoryName" name="vSubCategoryName" required onkeypress="return spacerestri(event, this);">                                
                                </div>                               
                                <div class="form-group subcategorypic">
                                    <label for="tImage">Image* (Size must be 385*500 pixels)</label>
                                    <input type="file" id="tImage" name="tImage" required class="productimg">                               
                                </div>                                
                            </div>
                            <div class="form-group col-md-9" style="float: left;">
                                    <label class="datacontent">Description* </label>                                               
                                    <textarea id="textarea" class="dataedit" name="tSubCatDetail" required></textarea>
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
<script type="text/javascript">
    $(function () {
        $(".select2").select2();
        $("#textarea").wysihtml5();
    });
    $('.subcategorypic').on('change', '#tImage', function (e) {
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

