<?php

$courseID = $_GET['courseID'];

include './../settings/config.php';
include './../settings/core.php';

$query = "SELECT DISTINCT StudentID FROM studentcourses WHERE courseID = '$courseID'";
$result = mysqli_query($conn, $query);

$studentIDs = array();
if (mysqli_num_rows($result) > 0) {
    while ($row = mysqli_fetch_assoc($result)) {
        $studentIDs[] = $row['StudentID'];
    }
}

$students = array();
foreach ($studentIDs as $studentID) {
    $query = "SELECT UserID, Name FROM users WHERE UserID = '$studentID'";
    $result = mysqli_query($conn, $query);

    if (mysqli_num_rows($result) > 0) {
        while ($row = mysqli_fetch_assoc($result)) {
            $students[] = $row;
        }
    }
}

if (!empty($students)) {
    echo json_encode($students);
} else {
    echo json_encode(array("message" => "No students found."));
}
?>