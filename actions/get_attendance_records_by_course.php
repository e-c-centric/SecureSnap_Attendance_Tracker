<?php

$courseID = $_GET['courseID'];

include './../settings/config.php';
include './../settings/core.php';

// Query to get attendance records
$query = "SELECT * FROM attendance WHERE courseID = '$courseID' GROUP BY AttendanceDateTime, StudentID ORDER BY AttendanceDateTime DESC";

$query_2 = "SELECT COUNT(DISTINCT StudentID) as total FROM attendance WHERE courseID = '$courseID'";

$query_3 = "SELECT COUNT(DISTINCT AttendanceDateTime) as totalRecord FROM attendance WHERE courseID = '$courseID'";

$result = mysqli_query($conn, $query);
$result_2 = mysqli_query($conn, $query_2);
$result_3 = mysqli_query($conn, $query_3);

$attendanceRecords = array();
$statisticsData = array(
    "totalStudent" => 0,
    "totalRecord" => 0,
    "present" => 0,
    "late" => 0,
    "absent" => 0
);

if (mysqli_num_rows($result_2) > 0) {
    $row = mysqli_fetch_assoc($result_2);
    $statisticsData["totalStudent"] = $row['total'];
}

if (mysqli_num_rows($result_3) > 0) {
    $row = mysqli_fetch_assoc($result_3);
    $statisticsData["totalRecord"] = $row['totalRecord'];
}

if (mysqli_num_rows($result) > 0) {
    while ($row = mysqli_fetch_assoc($result)) {
        $attendanceRecords[] = $row;
        if ($row['Status'] == 'present') {
            $statisticsData["present"]++;
        } else if ($row['Status'] == 'late') {
            $statisticsData["late"]++;
        } else {
            $statisticsData["absent"]++;
        }
    }
    $data = array(
        "attendanceRecords" => $attendanceRecords,
        "StatisticsData" => $statisticsData
    );
    echo json_encode($data);
} else {
    echo json_encode(array("message" => "No records found."));
}
