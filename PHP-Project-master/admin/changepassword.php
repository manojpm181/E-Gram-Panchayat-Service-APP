<?php
session_start();
include 'commonincludefiles.php';
global $conn;

if(isset($_REQUEST['submit'])){
    $response = changePassword($_REQUEST);
    if($response == 1){
        $msg = '<p style="color:green;">Password has been changed successfully</p>';
    }else if($response == 2){
        $msg = '<p style="color:maroon;">You have enter wrong old password</p>';
    }else{
        $msg = '<p style="color:maroon;">Something went wrong, Please try again</p>';
    }
}

include 'header.php';
include 'sidebar.php';
?>
<div class="content-wrapper">
    <section class="content-header">
        <h1>
            Change Password
        </h1>
        <ol class="breadcrumb">
            <li><i class="fa fa-dashboard"></i> Home</li>
            <li>Change Password</li>
        </ol>
    </section>
    <section class="content">
        <div class="row">
            <!-- left column -->
            <div class="col-md-12">
                <div class="box box-primary">                    
                    <?php
                        if(isset($msg)){
                            echo $msg;
                        }
                    ?>
                    <form role="form" name="changepass" id="changepass" method="post" action="#">
                        <div class="box-body">
                            <div class="form-group col-md-4">
                                <label>Old Password</label>
                                <input type="password" class="form-control" id="password" name="password" required placeholder="Old Password" />
                            </div>
                            <div class="form-group col-md-4">
                                <label>New Password</label>
                                <input type="password" class="form-control" id="newpassword" name="newpassword" required placeholder="New Password" />                
                            </div>
                            <div class="form-group col-md-4">
                                <label>Confirm Password</label>
                                <input type="password" class="form-control" id="confirmpassword" name="confirmpassword" required placeholder="Confirm Password" />           
                            </div>
                            <div class="box-footer">
                                <button type="submit" name="submit" class="btn btn-primary">Submit</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
</div>
<?php
include 'footer.php';
?>
<style>
    .error{color:maroon;}
</style>
<script>
    $(document).ready(function () {
        $('#changepass').validate({
            rules: {
                password: {
                    required: true,
                },
                newpassword: {
                    required: true,
                },
                confirmpassword: {
                    required: true,
                    equalTo: "#newpassword"
                }
            }
        });

    });
</script>