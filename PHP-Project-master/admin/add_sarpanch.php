<?php
session_start();
include 'commonincludefiles.php';
global $conn;
include 'header.php';
include 'sidebar.php';

if (isset($_POST['submitdata']) && $_POST['submitdata'] == 'Save') {
    $sarpanch_name = $_POST['sarpanch_name'];   
    $mobile_no = $_POST['mobile_no'];
    $fb_id = $_POST['fb_id'];
    $email_id = $_POST['email_id'];
    $insta_id = $_POST['insta_id'];
    $twitter_id = $_POST['twitter_id'];
    
    $addcategory = addsarpanch($sarpanch_name, $mobile_no, $fb_id, $email_id, $insta_id, $twitter_id, null);
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
                                    <label>Name*</label>                                
                                    <input type="text" class="form-control" id="sarpanch_name" name="sarpanch_name" required onkeypress="return spacerestri(event, this);">                                
                                </div>                               
                                <div class="form-group">
                                    <label>Mobile No.*</label>                                
                                    <input type="text" class="form-control" id="mobile_no" name="mobile_no" required onkeypress="return spacerestri(event, this);">                                
                                </div>                               
                                <div class="form-group">
                                    <label>Facebook link*</label>                                
                                    <input type="text" class="form-control" id="fb_id" name="fb_id" required onkeypress="return spacerestri(event, this);">                                
                                </div>                               
                                <div class="form-group">
                                    <label>Email*</label>                                
                                    <input type="text" class="form-control" id="email_id" name="email_id" required onkeypress="return spacerestri(event, this);">                                
                                </div>                               
                                <div class="form-group">
                                    <label>Instagram Link*</label>                                
                                    <input type="text" class="form-control" id="insta_id" name="insta_id" required onkeypress="return spacerestri(event, this);">                                
                                </div>                               
                                <div class="form-group">
                                    <label>Twitter Link*</label>                                
                                    <input type="text" class="form-control" id="twitter_id" name="twitter_id" required onkeypress="return spacerestri(event, this);">                                
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
    function spacerestri(evt, element) {
        var charCode = (evt.which) ? evt.which : event.keyCode;
        if (charCode == 32 && element.value.length == 0) {
            return false;
        }
        return true;
    }
</script>
</body>
</html>
