<?php

include '../settings/config.php';
include '../settings/core.php';
include '../settings/functions.php';

if (!is_logged_in()) {
    header('Location: ../login/login.php');
    exit();
}

$userID = $_SESSION['UserID'];

if ($_SESSION['UserRole'] === 'faculty') {
    $sql = "SELECT u.Name, u.UserID, u.Email, f.DepartmentID
            FROM users u
            JOIN faculty f ON u.UserID = f.FacultyID
            WHERE u.UserID = $userID";

    $sql_1 = "SELECT DepartmentName FROM departments WHERE DepartmentID = (SELECT DepartmentID FROM faculty WHERE FacultyID = $userID)";

    $sql_2 = "SELECT COUNT(*) FROM courses WHERE FacultyID = $userID";


    $result = $conn->query($sql);
    $result_1 = $conn->query($sql_1);
    $result_2 = $conn->query($sql_2);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $name = $row['Name'];
        $email = $row['Email'];
        $department = $result_1->fetch_assoc()['DepartmentName'];
        $facultyID = $userID;
        $courseCount = $result_2->fetch_assoc()['COUNT(*)'];

        $profileData = array(
            'name' => $name,
            'email' => $email,
            'major' => $department,
            'studentID' => $facultyID,
            'DepartmentID' => $row['DepartmentID'],
            'courseCount' => $courseCount
        );

        header('Content-Type: application/json');
        echo json_encode($profileData);
    } else {
        echo "Faculty ID not found for the given UserID.";
    }
    $conn->close();
} else {
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
}