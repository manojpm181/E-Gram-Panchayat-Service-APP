<?php
include 'db.php';

$data = json_decode(file_get_contents("php://input"));

$user_id = $data->user_id;
$complaint_text = $data->complaint_text;

$sql = "INSERT INTO Complaints (user_id, complaint_text) VALUES ('$user_id', '$complaint_text')";
if ($conn->query($sql) === TRUE) {
    echo json_encode(["message" => "Complaint added successfully"]);
} else {
    echo json_encode(["error" => $conn->error]);
}

$conn->close();
?>
