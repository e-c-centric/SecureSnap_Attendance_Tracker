<?php

$courseID = $_GET['course_id'];
$studentID = $_GET['student_id'];

include './../settings/config.php';

$query = "SELECT Picture FROM attendance WHERE CourseID = ? AND StudentID = ? ORDER BY AttendanceDateTime DESC LIMIT 5";
$stmt = $conn->prepare($query);
$stmt->bind_param("ii", $courseID, $studentID);
$stmt->execute();

$result = $stmt->get_result();
$data = array();

while ($row = $result->fetch_assoc()) {
    $binaryData = $row['Picture'];
    $base64String = base64_encode($binaryData);
    $data[] = array('ImageData' => $base64String);
}

header('Content-Type: application/json');
echo json_encode($data);