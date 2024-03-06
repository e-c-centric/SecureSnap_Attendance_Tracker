<?php

include './../settings/config.php';
include './../settings/core.php';
include './../settings/functions.php';

if (!is_logged_in()) {
    exit();
}

$userID = $_SESSION['UserID'];

$sql = "SELECT u.Name, u.UserID, u.Email, s.YearGroup, s.Major
        FROM users u
        JOIN students s ON u.UserID = s.StudentID
        WHERE u.UserID = $userID";

$sql_1 = "SELECT MajorName FROM majors WHERE MajorID = (SELECT Major FROM students WHERE StudentID = $userID)";

$result = $conn->query($sql);
$result_1 = $conn->query($sql_1);

if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    $name = $row['Name'];
    $email = $row['Email'];
    $yearGroup = $row['YearGroup'];
    $studentID = $userID;

    $profileData = array(
        'name' => $name,
        'email' => $email,
        'major' => $result_1->fetch_assoc()['MajorName'],
        'yearGroup' => $yearGroup,
        'studentID' => $studentID,
        'majorID' => $row['Major']
    );

    header('Content-Type: application/json');
    echo json_encode($profileData);
} else {
    echo "Student ID not found for the given UserID.";
}

$conn->close();
