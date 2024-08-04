<?php
include 'db.php';

$data = json_decode(file_get_contents("php://input"));

$username = $data->username;
$password = password_hash($data->password, PASSWORD_BCRYPT);
$role = $data->role;

$sql = "INSERT INTO Users (username, password, role) VALUES ('$username', '$password', '$role')";
if ($conn->query($sql) === TRUE) {
    echo json_encode(["message" => "User registered successfully"]);
} else {
    echo json_encode(["error" => $conn->error]);
}

$conn->close();
?>
