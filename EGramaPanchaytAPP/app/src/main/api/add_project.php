<?php
include 'db.php';

$data = json_decode(file_get_contents("php://input"));

$project_name = $data->project_name;
$status = $data->status;

$sql = "INSERT INTO Projects (project_name, status) VALUES ('$project_name', '$status')";
if ($conn->query($sql) === TRUE) {
    echo json_encode(["message" => "Project added successfully"]);
} else {
    echo json_encode(["error" => $conn->error]);
}

$conn->close();
?>
