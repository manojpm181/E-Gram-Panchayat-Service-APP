<?php
session_start();
include 'commonincludefiles.php';
global $conn;
include 'header.php';
include 'sidebar.php';
?>
<?php
if (isset($_POST['submitdata']) && $_POST['submitdata'] == 'Save') {      
    $tQuestion = $_POST['tQuestion'];
    $tAnswer = $_POST['tAnswer'];
    $addfaq = addFaq($tQuestion,$tAnswer);
    if ($addfaq > 0 && $addfaq != '') {
        $message = "<div class='alert alert-success' style='padding: 10px;'><button type='button' class='close' data-dismiss='alert'>&times;</button><strong>Success!</strong> Faq added successfully.<div class='alert alert-success' style='display:none'>
                                        <button type='button' class='close' data-dismiss='alert'>&times;</button>
                                        <strong>Success!</strong> Faq added successfully.
                                </div></div>";
    } else {
        $message = "<div class='alert alert-error' style='padding: 10px;'><button type='button' class='close' data-dismiss='alert'>&times;</button><strong>Error!</strong> problem in adding Faq.<div class='alert alert-success' style='display:none'>
                                        <button type='button' class='close' data-dismiss='alert'>&times;</button>
                                        <strong>Error!</strong> problem in adding Faq.
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
            Add Faq        
        </h1>        
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="row">
            <!-- left column -->
            <form role="form" method="post" id="addfaq" name="faqform">
                <div class="col-md-12">
                    <div class="box box-primary">
                        <div class="box-header">
                            <h3 class="box-title">Faq Details</h3>
                        </div>

                        <div class="box-body classpagedata">
                            <?php echo $message; ?>
                            <div class="col-md-4">                                
                                <div class="form-group">
                                    <label>Question*</label>
                                    <textarea class="form-control" rows="3" name="tQuestion" id="tQuestion" placeholder="Enter Question" required onkeypress="return spacerestri(event, this);"></textarea>
                                </div>   
                                <div class="form-group">
                                    <label>Answer*</label>
                                    <textarea class="form-control" rows="4" name="tAnswer" id="tAnswer" placeholder="Enter Answer" required onkeypress="return spacerestri(event, this);"></textarea>
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
</body>
</html>


