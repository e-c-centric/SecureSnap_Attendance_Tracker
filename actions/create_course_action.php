<?php

include './../settings/config.php';
include './../settings/core.php';
include './../settings/functions.php';

if (!is_post_request()) {
    exit();
}
if (!is_logged_in()) {
    session_destroy();
    header('Location: ./../index.php');
}

$userID = $_SESSION['UserID'];
$userRole = $_SESSION['UserRole'];

if ($userRole === 'faculty') {
    $courseCode = $courseName = $cohort = $semester = $academicYear = $classDays = $classTimes = "";

    $courseCode = $_POST["courseCode"];
    $courseName = $_POST["courseName"];
    $cohort = $_POST["cohort"];
    $semester = $_POST["semester"];
    $academicYear = $_POST["academicYear"];
    $classDays = $_POST["classDays"];
    $classTimes = $_POST["classTimes"];
    $facultyID = $userID;

    $sql = "INSERT INTO courses (CourseCode, CourseName, FacultyID, Cohort, Semester, AcademicYear, ClassDays, ClassTimes) 
            VALUES (?, ?, ?, ?, ?, ?, ?, ?)";

    if ($stmt = $conn->prepare($sql)) {
        $stmt->bind_param("ssississ", $courseCode, $courseName, $facultyID, $cohort, $semester, $academicYear, $classDays, $classTimes);

        if ($stmt->execute()) {
            echo "Course created successfully";
            exit();
        } else {
            echo "Oops! Something went wrong. Please try again later.";
        }

        $stmt->close();
    }

    $conn->close();
}
else {
    echo "You are not authorized to create a course";
}
