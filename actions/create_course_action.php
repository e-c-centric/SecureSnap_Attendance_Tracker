<?php
error_reporting(E_ERROR | E_PARSE);

include '../settings/config.php';
include '../settings/core.php';
include '../settings/functions.php';

if (!is_post_request()) {
    exit();
}
if (!is_logged_in()) {
    header('Location: ../index.php');
}
$response = "";
$userID = $_SESSION['UserID'];
$userRole = $_SESSION['UserRole'];

if ($userRole === 'faculty') {
    $courseCode = $courseName = $cohort = $semester = $academicYear = $classDays = $classTimes = "";

    $courseCode = $_POST["courseCode"];
    $courseName = $_POST["courseName"];
    $cohort = $_POST["cohort"];
    $semester = $_POST["semester"];
    $academicYear = $_POST["academicYear"];
    $classDays = implode(",", $_POST['classDays']);
    $classTimes = implode(",", $_POST['classTimes']);
    $facultyID = $userID;

    $sql = "INSERT IGNORE INTO courses (CourseCode, CourseName, FacultyID, Cohort, Semester, AcademicYear, ClassDays, ClassTimes) 
            VALUES (?, ?, ?, ?, ?, ?, ?, ?)";

    if ($stmt = $conn->prepare($sql)) {
        $stmt->bind_param("ssississ", $courseCode, $courseName, $facultyID, $cohort, $semester, $academicYear, $classDays, $classTimes);

        if ($stmt->execute()) {
            $courseID = $conn->insert_id;
            $sql_2 = "INSERT IGNORE INTO attendancepin (CourseID) VALUES ('$courseID')";
            mysqli_query($conn, $sql_2);
            echo "success";
            exit();
        } else {
            echo "Oops! Something went wrong. Please try again later.";
        }

        $stmt->close();
    }

    $conn->close();
} else {
    echo "You are not authorized to create a course";
}

