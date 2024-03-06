<?php
$courseID = $_GET['course_id'];
include './../settings/config.php';

$sql = "SELECT * FROM courses WHERE CourseID = $courseID";
$result = $conn->query($sql);

$courses = array();

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $courses[] = $row;
    }
    echo json_encode($courses);
} else {
    echo "No courses found.";
}
