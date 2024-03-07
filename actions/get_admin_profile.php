<?php

include './../settings/core.php';
if (!is_logged_in()) {
    header('Location: ./../login/login.php');
}

$adminID = $_SESSION['UserID'];

$sql = "SELECT * FROM users WHERE UserID = $adminID";
$result = $conn->query($sql);

$sql_3 = "SELECT COUNT(*) AS total FROM courses";
$result_3 = $conn->query($sql_3);

if ($result->num_rows > 0) {
    $query_2 = "SELECT COUNT(*) AS total FROM students";
    $result_2 = $conn->query($query_2);
    $row = $result->fetch_assoc();
    $adminProfile = array(
        'Name' => $row['Name'],
        'Email' => $row['Email'],
        'ID' => $adminID,
        'NumberOfStudents' => $result_2->fetch_assoc()['total'],
        'NumberOfCourses' => $result_3->fetch_assoc()['total']
    );
    header('Content-Type: application/json');
    echo json_encode($adminProfile);
}
