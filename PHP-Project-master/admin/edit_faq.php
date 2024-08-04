<?php
session_start();
include 'commonincludefiles.php';
global $conn;
include 'header.php';
include 'sidebar.php';
?>
<?php
if (isset($_POST['submitdata']) && $_POST['submitdata'] == 'Update') {
    $iFaqID = $_POST['iFaqID'];
    $tQuestion = $_POST['tQuestion'];
    $tAnswer = $_POST['tAnswer'];   

    $updatefaq = updateFaq($iFaqID, $tQuestion, $tAnswer);
    if ($updatefaq) {
        $message = "<div class='alert alert-success' style='padding: 10px;'><button type='button' class='close' data-dismiss='alert'>&times;</button><strong>Success!</strong> Faq data updated successfully.<div class='alert alert-success' style='display:none'>
                                        <button type='button' class='close' data-dismiss='alert'>&times;</button>
                                        <strong>Success!</strong> Faq data updated successfully.
                                </div></div>";
    } else {
        $message = "<div class='alert alert-error' style='padding: 10px;'><button type='button' class='close' data-dismiss='alert'>&times;</button><strong>Error!</strong> problem in updating Faq data.<div class='alert alert-success' style='display:none'>
                                        <button type='button' class='close' data-dismiss='alert'>&times;</button>
                                        <strong>Error!</strong> problem in updating Faq data.
                                </div></div>";
    }
}
?>
<style>
    textarea {
        resize: none;
    }
</style>
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Edit Class        
        </h1>        
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="row">
            <!-- left column -->
            <form role="form" method="post" id="addservices" name="servicesform">
                <?php
                if (isset($_REQUEST['fid']) && $_REQUEST['fid'] != '') {
                    $faqdata = getFaqByID($_REQUEST['fid']);                    
                    echo "<input type='hidden' name='iFaqID' value='" . $_REQUEST['fid'] . "' />";
                }
                ?>    
                <div class="col-md-12">
                    <div class="box box-primary">
                        <div class="box-header">
                            <h3 class="box-title">Faq Details</h3>
                        </div>                         	
                        <div class="box-body">
                            <?php echo $message; ?>
                            <div class="col-md-4">                                                               
                                <div class="form-group">
                                    <label>Question*</label>
                                    <textarea class="form-control" rows="3" name="tQuestion" id="tQuestion" placeholder="Enter Question" required onkeypress="return spacerestri(event, this);"><?php echo (isset($faqdata['tQuestion']) && $faqdata['tQuestion'] != '') ? $faqdata['tQuestion'] : '' ?></textarea>
                                </div>
                                <div class="form-group">
                                    <label>Answer*</label>
                                    <textarea class="form-control" rows="4" name="tAnswer" id="tAnswer" placeholder="Enter Answer" onkeypress="return spacerestri(event, this);"><?php echo (isset($faqdata['tAnswer']) && $faqdata['tAnswer'] != '') ? $faqdata['tAnswer'] : '' ?></textarea>
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
</body>
</html>

