<?php

$pin = $_POST['pin'];
$courseID = $_POST['courseID'];
$times = $_POST['times'];
$imageData = $_POST['image'];

$imageData = str_replace('data:image/png;base64,', '', $imageData);
$imageData = base64_decode($imageData);



include './../settings/config.php';
include './../settings/core.php';
include './../functions/time_funx.php';

$userID = $_SESSION['UserID'];

$query_1 = "SELECT * FROM attendancepin WHERE courseID = '$courseID'";

$currentHour = Hour();
$currentMinute = Minute();

$time = explode(" - ", $times);
$startTime = explode(":", $time[0]);
$endTime = explode(":", $time[1]);

$startHour = (int)$startTime[0];
$endHour = (int)$endTime[0];

$startMinute = (int)$startTime[1];
$endMinute = (int)$endTime[1];

$startTimeInMinutes = ($startHour * 60) + $startMinute;
$endTimeInMinutes = ($endHour * 60) + $endMinute;

$currentTime = ($currentHour * 60) + $currentMinute;

$present_state = "";


if ($currentTime >= $startTimeInMinutes && $currentTime <= $startTimeInMinutes + 5) { //5 minute rule
    $present_state = "present";
} else if ($currentTime > $startTimeInMinutes + 10 && $currentTime <= $endTimeInMinutes) {
    $present_state = "late";
} else {
    $present_state = "absent";
}

$todays_date_time = date("Y-m-d");
$todays_date_time = (string)$todays_date_time . $times;
$todays_date_time = (string)$todays_date_time;

$result_1 = mysqli_query($conn, $query_1);

if (mysqli_num_rows($result_1) > 0) {
    $row = mysqli_fetch_assoc($result_1);
    $pinInSystem = $row['CurrentPin'];
    if ($pinInSystem == $pin) {
        $query_2 = "INSERT INTO attendance (AttendanceDateTime, StudentID, Status, courseID, Picture) VALUES (?, ?, ?, ?, ?)";
        $stmt = $conn->prepare($query_2);
        $null = NULL;
        $stmt->bind_param("sisib", $todays_date_time, $userID, $present_state, $courseID, $null);
        $stmt->send_long_data(4, $imageData);
        $result_2 = $stmt->execute();
        if ($result_2) {
            echo "success";
        } else {
            echo "failed for some reason";
        }
    } else {
        echo "wrong pin";
    }
} else {
    echo "no pin set for this course yet. Please contact your instructor.";
}
