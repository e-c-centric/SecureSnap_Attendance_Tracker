<?php

$courseID = $_GET['courseID'];

include './../settings/config.php';
include './../settings/core.php';

$query = "UPDATE attendancepin SET CurrentPin = '' WHERE courseID = '$courseID'";
$query_1 = "UPDATE courses SET isAttendanceActive = 0 WHERE courseID = '$courseID'";

$result = mysqli_query($conn, $query);

if ($result) {
    $res_2 = mysqli_query($conn, $query_1);
    if ($res_2) {
        echo "success";
    } else {
        echo "failed";
    }
} else {
    echo "failed";
}
