<?php

include './../settings/config.php';
include './../settings/core.php';

$response = "success";

$user_id = $_SESSION['UserID'];

$sql_0 = "SELECT * FROM students WHERE StudentID = ?";
$stmt = $conn->prepare($sql_0);
$stmt->bind_param("i", $user_id);
$stmt->execute();


$result = $stmt->get_result();
$row = $result->fetch_assoc();

$new_name = $_POST['name'];
$new_year_group = $_POST['yearGroup'];
$new_major = $_POST['major'];

$sql_1 = "UPDATE users SET Name = ? WHERE UserID = ?";
$stmt = $conn->prepare($sql_1);
$stmt->bind_param("si", $new_name, $user_id);
$success1 = $stmt->execute();

$sql_2 = "UPDATE students SET Major = ?, YearGroup = ? WHERE StudentID = ?";
$stmt = $conn->prepare($sql_2);
$stmt->bind_param("sii", $new_major, $new_year_group, $user_id);
$success2 = $stmt->execute();

if ($success1 && $success2) {
    echo $response;
} else {
    $response = "Error updating record: " . $conn->error;
    echo $response;
}
