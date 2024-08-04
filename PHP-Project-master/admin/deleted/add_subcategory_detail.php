<?php
session_start();
include 'commonincludefiles.php';
global $conn;
include 'header.php';
include 'sidebar.php';
?>
<?php
if (isset($_POST['submitdata']) && $_POST['submitdata'] == 'Save') {
    $tContent = $_POST['tContent'];
    $iSubCategoryID = $_POST['iSubCategoryID'];

    $j = 0;     // Variable for indexing uploaded image.   
    for ($i = 0; $i < count($_FILES['tImage']['name']); $i++) {
        // Loop to get individual element from the array
        $validextensions = array("jpeg", "jpg", "png" , "gif");      // Extensions which are allowed.
        $ext = explode('.', basename($_FILES['tImage']['name'][$i]));   // Explode file name from dot(.)
        $file_extension = end($ext); // Store extensions in the variable.
        $tImage = md5(uniqid()) . "." . $ext[count($ext) - 1];
        $target_path = $SUBCATEGORY_DATA_IMAGE_PATH . $tImage;     // Set the target path with a new name of image.      
        $j = $j + 1;      // Increment the number of uploaded images according to the files in array.
        if (($_FILES["tImage"]["size"][$i] < 400000) && in_array($file_extension, $validextensions)) {
            if (move_uploaded_file($_FILES['tImage']['tmp_name'][$i], $target_path)) {
                chmod($target_path, 0777);
                $addsubcategorydata = addSubCategoryData($tImage, $tContent[$i],$iSubCategoryID);
                // If file moved to uploads folder.                
            } else {     //  If File Was Not Moved.
                $message = $j . '<span id="error">please try again!.</span><br/><br/>';
            }
        } else {     //   If File Size And File Type Was Incorrect.
            $message = $j . '<span id="error">***Invalid file Size or Type***</span><br/><br/>';
        }
    }

    if ($addsubcategorydata > 0 && $addsubcategorydata != '') {
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
            Add Sub Category Details     
        </h1>        
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="row">
            <!-- left column -->
            <form role="form" method="post" id="addsubcategorydetails" name="addsubcategorydetails" enctype="multipart/form-data">
                <div class="col-md-12">
                    <div class="box box-primary">
                        <div class="box-header">
                            <h3 class="box-title">Sub Category Details</h3>
                        </div>

                        <div class="box-body classpagedata">
                            <?php echo $message; ?>                            
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>Sub Category List*</label>
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
                                                <input type="file" class="tImage" name="tImage[]" required class="productimg form-control">                     
                                            </div>

                                            <div class="form-group col-md-7">
                                                <label class="datacontent">Description* </label>                                               
                                                <textarea id="textarea" class="dataedit" name="tContent[]" required></textarea>
                                            </div>
                                            
                                            
                                        </div>                                        
                                    </div>
                                    <div class="moreitemslink">
                                        <span class="addiconforitem"><i class="fa fa-plus-circle" aria-hidden="true"></i></span>
                                        <a href="javascript:void(0);" admorecnt="0" id="addmoreitems">Add More Data</a>
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
    $(document).on('click', '#addmoreitems', function () {
        var cnt = parseInt($(this).attr('admorecnt')) + 1;
        var htmlappend = '<div class="subcategorydetails" id="subcategorydetails_' + cnt + '"><div class="form-group contentpic col-md-3"> <input type="file" class="tImage"  name="tImage[]" required class="productimg form-control"></div>';
        htmlappend += '<div class="form-group col-md-7"><textarea id="textarea_' + cnt + '" class="dataedit" name="tContent[]" required></textarea></div>';
        htmlappend += '<div class="form-group col-md-1"><span class="removeitem" removecnt="' + cnt + '"><i class="fa fa-times" aria-hidden="true"></i></span></div></div>';
        $('.contentdiv').append(htmlappend);
        $('#addmoreitems').attr('admorecnt', cnt);
        $("#textarea_" + cnt).wysihtml5();
    });
    $(function () {
        $(".select2").select2();
        $("#textarea").wysihtml5();
    });


    $(document).on('click', '.removeitem', function () {
        var cnt = $(this).attr('removecnt');
        $('#subcategorydetails_' + cnt).remove();
    });

</script>
</body>
</html>


