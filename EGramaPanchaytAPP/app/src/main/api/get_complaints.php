<?php
include 'db.php';

$sql = "SELECT Complaints.*, Users.username FROM Complaints JOIN Users ON Complaints.user_id = Users.id";
$result = $conn->query($sql);
$complaints = [];
while ($row = $result->fetch_assoc()) {
    $complaints[] = $row;
}
echo json_encode($complaints);

$conn->close();
?>
