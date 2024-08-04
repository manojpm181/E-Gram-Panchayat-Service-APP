<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Add News</title>
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cloud.tinymce.com/stable/tinymce.min.js?apiKey=ifhrees9uwhkz3o0pq5q83ppykpkivilqb6ckxuaa6g5b995"></script>
    <script>
        tinymce.init({ selector: 'textarea' });
    </script>
    <style>
        body {
            background-color: #f8f9fa;
        }
        .content-wrapper {
            margin-top: 20px;
        }
        .box {
            border: 1px solid #dee2e6;
            border-radius: 5px;
            background-color: #ffffff;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
            padding: 20px;
        }
        .box-header {
            border-bottom: 1px solid #dee2e6;
            padding-bottom: 10px;
            margin-bottom: 20px;
        }
        .box-footer {
            border-top: 1px solid #dee2e6;
            padding-top: 10px;
            margin-top: 20px;
        }
        .navbar {
            margin-bottom: 20px;
        }
    </style>
</head>
<body>
<?php
session_start();
include 'commonincludefiles.php';
global $conn;

// Initialize message variable
$message = '';

if (isset($_POST['submitdata']) && $_POST['submitdata'] == 'Save') {
    $news_name = $_POST['news_name'];

    // Check if news_name is empty
    if (empty($news_name)) {
        $message = "<div class='alert alert-danger'><strong>Error!</strong> News name is required.</div>";
    } else {
        // Add the news to the database
        $stmt = $conn->prepare("INSERT INTO latest_news (news_name) VALUES (?)");
        $stmt->bind_param("s", $news_name);
        $addnews = $stmt->execute();
        $stmt->close();

        if ($addnews) {
            $message = "<div class='alert alert-success'><strong>Success!</strong> News added successfully.</div>";
        } else {
            $message = "<div class='alert alert-danger'><strong>Error!</strong> Problem adding news.</div>";
        }
    }
}
?>
<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <a class="navbar-brand" href="#">E-Gram Panchayat News Page</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav">
            <li class="nav-item">
                <a class="nav-link" href="dashboard.php">Back to Main Page</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="news_list.php">Admin List Page</a>
            </li>
        </ul>
    </div>
</nav>

<div class="container content-wrapper">
    <div class="row">
        <div class="col-md-8 offset-md-2">
            <div class="box">
                <div class="box-header">
                    <h3 class="box-title">Add News</h3>
                </div>
                <form role="form" method="post" id="addnews" name="newsform" enctype="multipart/form-data">
                    <div class="box-body">
                        <?php echo $message; ?>
                        <div class="form-group">
                            <label for="news_name">News Name*</label>
                            <input type="text" class="form-control" id="news_name" name="news_name" required>
                        </div>
                    </div>
                    <div class="box-footer">
                        <button type="submit" class="btn btn-primary" name="submitdata" value="Save">Save</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
