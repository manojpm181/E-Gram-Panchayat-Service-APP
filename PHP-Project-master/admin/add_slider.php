<?php
session_start();
include 'commonincludefiles.php';
global $conn;
include 'header.php';
include 'sidebar.php';
?>
<?php
if (isset($_POST['submitdata']) && $_POST['submitdata'] == 'Save') {
    $tDetail = $_POST['tDetail'];
    $iSubCategoryID = $_POST['iSubCategoryID'];


    $validextensions = array("jpeg", "jpg", "png", "gif");      // Extensions which are allowed.
    $ext = explode('.', basename($_FILES['tImage']['name']));   // Explode file name from dot(.)
    $file_extension = end($ext); // Store extensions in the variable.
    $tImage = md5(uniqid()) . "." . $file_extension;
    $target_path = $SLIDER_DATA_IMAGE_PATH . $tImage;     // Set the target path with a new name of image.         
    if (($_FILES["tImage"]["size"] < 1000000) && in_array($file_extension, $validextensions)) {
        if (move_uploaded_file($_FILES['tImage']['tmp_name'], $target_path)) {
            chmod($target_path, 0777);
            $addsliderdata = addSliderData($tImage, $tDetail, $iSubCategoryID);
            // If file moved to uploads folder.                
        } else {     //  If File Was Not Moved.
            $message = $j . '<span id="error">please try again!.</span><br/><br/>';
        }
    } else {     //   If File Size And File Type Was Incorrect.
        $message = $j . '<span id="error">***Invalid file Size or Type***</span><br/><br/>';
    }


    if ($addsliderdata > 0 && $addsliderdata != '') {
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
    .scheradiobtns label{
        padding-left: 5px;
        padding-right: 5px;
    }
    /*    .contentdiv,
        .moreitemslink{
            display: none;
        }*/
    .subcategorydetails {
        float: left;
        width: 100%;
    }
    /*    .datacontent{
            padding-left: 15px;
        }*/

</style>
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Add Slider Details     
        </h1>        
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="row">
            <!-- left column -->
            <form role="form" method="post" id="addsliderdetails" name="addsliderdetails" enctype="multipart/form-data">
                <div class="col-md-12">
                    <div class="box box-primary">
                        <div class="box-header">
                            <h3 class="box-title">Slider Details</h3>
                        </div>

                        <div class="box-body classpagedata">
                            <?php echo $message; ?>                            
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>Slider List*</label>
                                        <select class="form-control select2 select2-hidden-accessible" name="iSubCategoryID" style="width: 100%;" tabindex="-1" aria-hidden="true" required>
                                            <option value="" disabled="" selected="">Please Select Sub Category</option>
                                            <?php
                                            $subcategorylist = getAllSubcategoryDataList();
                                            foreach ($subcategorylist as $val) {
                                                ?>
                                                <option value="<?= $val['iSubCategoryID']; ?>"><?= $val['vSubCategoryName']; ?></option>
                                            <?php } ?>                                        
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-12">                                    
                                    <div class="contentdiv">                                        
                                        <div class="subcategorydetails" id="subcategorydetails_0">                                                                                       
                                            <div class="form-group contentpic col-md-3">
                                                <label for="tImage">Image* </label>
                                                <input type="file" class="tImage" name="tImage" required class="productimg form-control">                     
                                            </div>

                                            <div class="form-group col-md-7">
                                                <label class="datacontent">Description* </label>                                               
                                                <textarea id="textarea" class="dataedit" name="tDetail" required></textarea>
                                            </div>                                                                                        
                                        </div>                                        
                                    </div>                                    
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

</script>
</body>
</html>


