<?php
include 'db.php';

$data = json_decode(file_get_contents("php://input"));

$event_title = $data->event_title;
$event_date = $data->event_date;
$description = $data->description;

$sql = "INSERT INTO Events (event_title, event_date, description) VALUES ('$event_title', '$event_date', '$description')";
if ($conn->query($sql) === TRUE) {
    echo json_encode(["message" => "Event added successfully"]);
} else {
    echo json_encode(["error" => $conn->error]);
}

$conn->close();
?>
