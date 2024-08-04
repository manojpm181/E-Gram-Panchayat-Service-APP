<head>
    <!-- Include TinyMCE with the provided API key -->
    <script src="https://cloud.tinymce.com/stable/tinymce.min.js?apiKey=ifhrees9uwhkz3o0pq5q83ppykpkivilqb6ckxuaa6g5b995"></script>
    <script>
        tinymce.init({ selector: 'textarea' });
    </script>
</head>
<?php
session_start();
include 'commonincludefiles.php';
global $conn;
include 'header.php';
include 'sidebar.php';

$message = '';

if (isset($_POST['submitdata']) && $_POST['submitdata'] == 'Save') {
    $history = $_POST['history'];    

    // Assuming you have a function addhistory to handle database insertion
    $addcategory = addhistory($history);
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
                                    <label>Name*</label> 
                                    <textarea name="history">write here story!!!!!!!!S</textarea>
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
