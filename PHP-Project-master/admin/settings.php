<?php
session_start();
include 'commonincludefiles.php';
global $conn;

if (isset($_REQUEST['submit'])) {
    $response = changeSettings($_REQUEST);
    if ($response == 1) {
        $msg = '<p style="color:green;">Settings save successfully</p>';
    } else {
        $msg = '<p style="color:maroon;">Something went wrong, Please try again</p>';
    }
}

$currentSettings = getCurrentSettings();
extract($currentSettings);
$timezonelist = getAllTimeZone();
include 'header.php';
include 'sidebar.php';
?>
<div class="content-wrapper">
    <section class="content-header">
        <h1>
            System Settings
        </h1>
        <ol class="breadcrumb">
            <li><i class="fa fa-dashboard"></i> Home</li>
            <li>System Settings</li>
        </ol>
    </section>
    <section class="content">
        <div class="row">
            <div class="col-md-12">
                <div class="box box-primary">
                    <div class="box-header" style="margin: 15px 0;">
                        <a href="settings.php"><button type="button" class="btn btn-primary">System Settings</button></a>
                        <a style="float: right;" href="changepassword.php"><button type="button" class="btn btn-primary">Change Password</button></a>
                    </div>
                    <?php
                    if (isset($msg)) {
                        echo $msg;
                    }
                    ?>
                    <form role="form" name="systemsetting" id="systemsetting" method="post" action="#">
                        <div class="box-body">
                            <h3 class="box-title">SMTP Settings</h3>
                            <div class="form-group col-md-4">
                                <label>Host Name</label>
                                <input type="text" class="form-control" id="vHost" name="vHost" value="<?php echo (isset($vHost) && $vHost != '') ? $vHost : ''; ?>" required placeholder="Enter SMTP Host Name" />
                            </div>
                            <div class="form-group col-md-4">
                                <label>Port</label>
                                <input type="text" class="form-control" id="vPort" name="vPort" value="<?php echo (isset($vPort) && $vPort != '') ? $vPort : ''; ?>" required placeholder="Enter SMTP port number" />                
                            </div>
                            <div class="form-group col-md-4">
                                <label>Username</label>
                                <input type="text" class="form-control" id="vUsername" name="vUsername" value="<?php echo (isset($vUsername) && $vUsername != '') ? $vUsername : ''; ?>" required placeholder="Enter SMTP Username" />           
                            </div>
                            <div class="form-group col-md-4">
                                <label>Password</label>
                                <input type="text" class="form-control" id="vPassword" name="vPassword" value="<?php echo (isset($vPassword) && $vPassword != '') ? $vPassword : ''; ?>" required placeholder="Enter SMTP Password" />
                            </div>
                            <div class="form-group col-md-4">
                                <label>Email Subject</label>
                                <input type="text" class="form-control" id="vSubject" name="vSubject" value="<?php echo (isset($vSubject) && $vSubject != '') ? $vSubject : ''; ?>" required placeholder="Enter SMTP Email Subject" />
                            </div>
                            <div class="form-group col-md-4">
                                <label>From Email</label>
                                <input type="text" class="form-control" id="vFromEmail" name="vFromEmail" value="<?php echo (isset($vFromEmail) && $vFromEmail != '') ? $vFromEmail : ''; ?>" required placeholder="Enter SMTP from email" />
                            </div>
                            <div class="form-group col-md-4">
                                <label>From Name</label>
                                <input type="text" class="form-control" id="vFromName" name="vFromName" value="<?php echo (isset($vFromName) && $vFromName != '') ? $vFromName : ''; ?>" required placeholder="Enter SMTP from name" />
                            </div>
                        </div>
                        <div class="box-body">
                            <h3 class="box-title">Time Zone Settings</h3>
                            <div class="form-group col-md-4">
                                <label>Select Time Zone</label>
                                <select class="form-control" name="tTimeZone" id="tTimeZone" required>
                                    <option value="">Select Time Zone</option>
                                    <?php
                                    if (isset($timezonelist) && !empty($timezonelist)) {
                                        foreach ($timezonelist as $val) {
                                            if (isset($val) && $val == $tTimeZone) {
                                                echo '<option value="' . $val . '" selected>' . $val . '</option>';
                                            } else {
                                                echo '<option value="' . $val . '">' . $val . '</option>';
                                            }
                                        }
                                    }
                                    ?>
                                </select>
                            </div>                         
                        </div>
                        <div class="box-footer">
                            <button type="submit" name="submit" class="btn btn-primary">Submit</button>
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
        $('#systemsetting').validate({
            rules: {
                vHost: {
                    required: true,
                },
                vPort: {
                    required: true,
                    number:true
                },
                vUsername: {
                    required: true,
                },
                vPassword: {
                    required: true,
                },
                vSubject: {
                    required: true,
                },
                vFromEmail: {
                    required: true,
                    email:true
                },
                vFromName: {
                    required: true,
                },
                tTimeZone: {
                    required: true,
                }
            }
        });

    });
</script>