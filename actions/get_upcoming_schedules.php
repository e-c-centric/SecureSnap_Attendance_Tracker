<?php

$courseID = $_GET['courseID'];


include './../settings/config.php';
include './../settings/core.php';
include './../functions/time_funx.php';



$today = "Tuesday";
$currentHour = 12;
$currentMinute = 40;


$days = array();
$timeperiods = array();

$query = "SELECT ClassDays, ClassTimes FROM courses WHERE courseID = '$courseID'";
$result = mysqli_query($conn, $query);

if (mysqli_num_rows($result) > 0) {
    $row = mysqli_fetch_assoc($result);
    $days = explode(",", $row['ClassDays']);
    $timeperiods = explode(",", $row['ClassTimes']);
}

$upcomingSchedules = array();


$dayIndex = array_search($today, $days);

if ($dayIndex === false) {
    echo json_encode(array("success" => false, "message" => "No upcoming schedules."));
} else {
    $time = explode("-", $timeperiods[$dayIndex]);
    $startTime = $time[0];
    $endTime = $time[1];
    $startTime = explode(":", $startTime);
    $endTime = explode(":", $endTime);

    $startHour = $startTime[0];
    $endHour = $endTime[0];

    $startMinute = $startTime[1];
    $endMinute = $endTime[1];

    $startTimeInMinutes = ($startHour * 60) + $startMinute;
    $currentTimeInMinutes = ($currentHour * 60) + $currentMinute;


    if ($currentTimeInMinutes < $startTimeInMinutes && ($currentTimeInMinutes - $startTimeInMinutes) <= 15) {
        $upcomingSchedules[] = array(
            "success" => true,
            "day" => $today,
            "time" => $timeperiods[$dayIndex]
        );
        echo json_encode($upcomingSchedules);
    } else {
        echo json_encode(array("success" => false, "message" => "No upcoming schedules.","time"=>$timeperiods[$dayIndex],"day"=>$today,"current"=>$currentTimeInMinutes,"start"=>$startTimeInMinutes,"diff"=>($currentTimeInMinutes - $startTimeInMinutes),"courseID"=>$courseID,"query"=>$query));
    }
}
