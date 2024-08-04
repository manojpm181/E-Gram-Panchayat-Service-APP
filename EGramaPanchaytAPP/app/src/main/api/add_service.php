<?php
include 'db.php';

$data = json_decode(file_get_contents("php://input"));

$service_name = $data->service_name;
$description = $data->description;
$application_link = $data->application_link;
$image_url = $data->image_url;

$sql = "INSERT INTO Services (service_name, description, application_link, image_url) VALUES ('$service_name', '$description', '$application_link', '$image_url')";
if ($conn->query($sql) === TRUE) {
    echo json_encode(["message" => "Service added successfully"]);
} else {
    echo json_encode(["error" => $conn->error]);
}

$conn->close();
?>
