<?php

include './../settings/config.php';


$userID = $_SESSION['UserID'];
$userRole = $_SESSION['UserRole'];
$coursesTaught = array();

if ($userRole === 'faculty') {
    $sql = "SELECT * FROM courses WHERE FacultyID = $userID";

    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $coursesTaught[] = $row;
        }
    } 
}