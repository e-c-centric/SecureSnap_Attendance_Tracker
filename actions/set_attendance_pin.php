<?php

include './../settings/config.php';
include './../settings/core.php';

$courseID = $_GET['courseID'];
$newPin = $_GET['pin'];

$query = "UPDATE attendancepin SET CurrentPin = '$newPin' WHERE courseID = '$courseID'";
$query_1 = "UPDATE courses SET isAttendanceActive = 1 WHERE courseID = '$courseID'";

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
?>