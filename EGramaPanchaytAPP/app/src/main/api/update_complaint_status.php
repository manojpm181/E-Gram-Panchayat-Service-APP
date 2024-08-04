<?php
include 'db.php';

$data = json_decode(file_get_contents("php://input"));

$complaint_id = $data->complaint_id;
$status = $data->status;

$sql = "UPDATE Complaints SET status='$status' WHERE id='$complaint_id'";
if ($conn->query($sql) === TRUE) {
    echo json_encode(["message" => "Complaint status updated successfully"]);
} else {
    echo json_encode(["error" => $conn->error]);
}

$conn->close();
?>
