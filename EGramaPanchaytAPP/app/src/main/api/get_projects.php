<?php
include 'db.php';

$sql = "SELECT * FROM Projects";
$result = $conn->query($sql);
$projects = [];
while ($row = $result->fetch_assoc()) {
    $projects[] = $row;
}
echo json_encode($projects);

$conn->close();
?>
