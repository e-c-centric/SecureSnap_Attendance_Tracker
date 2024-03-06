<?php


$userID = $_SESSION['UserID'];

$sql = "SELECT StudentID FROM students WHERE StudentID = $userID";

$result = $conn->query($sql);

if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    $studentID = $row['StudentID'];

    $sql = "SELECT * 
            FROM courses 
            INNER JOIN studentcourses ON courses.CourseID = studentcourses.CourseID 
            WHERE studentcourses.StudentID = $studentID";

    $result = $conn->query($sql);

    $enrolledCourses = array();

    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $enrolledCourses[] = $row;
        }
    }
} else {
    echo "Student ID not found for the given UserID.";
}
