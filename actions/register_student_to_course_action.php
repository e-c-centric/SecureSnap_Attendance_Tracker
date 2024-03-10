<?php

include '../settings/config.php';
include '../settings/core.php';

$courseID = $_GET['courseID'];

$query = "SELECT * FROM courses WHERE courseID = '$courseID'";
$result = mysqli_query($conn, $query);


if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_FILES['csvFile']) && $_FILES['csvFile']['error'] == UPLOAD_ERR_OK) {
    $csvFile = $_FILES['csvFile']['tmp_name'];

    if (($handle = fopen($csvFile, "r")) !== false) {
        $firstRow = true;
        while (($data = fgetcsv($handle, 1000, ",")) !== false) {
            if ($firstRow) {
                $firstRow = false;
                continue;
            }

            $studentID = $data[0];

            $checkQuery = "SELECT * FROM students WHERE studentID = '$studentID'";
            $checkResult = mysqli_query($conn, $checkQuery);

            if ($checkResult && mysqli_num_rows($checkResult) > 0) {
                $insertQuery = "INSERT IGNORE INTO studentcourses (studentID, courseID) VALUES ('$studentID', '$courseID')";
                mysqli_query($conn, $insertQuery);
            }
        }
        fclose($handle);
        echo "success";
    }
} else {
    echo "Error: No file uploaded.";
}
