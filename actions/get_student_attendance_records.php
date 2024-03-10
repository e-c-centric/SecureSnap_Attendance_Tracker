<?php

include '../settings/config.php';

if (isset($_GET['course_id']) && isset($_GET['student_id'])) {
    $courseID = $_GET['course_id'];
    $studentID = $_GET['student_id'];

    $sql = "SELECT a.*, u.Name AS StudentName FROM attendance a
            INNER JOIN users u ON a.StudentID = u.UserID
            WHERE a.CourseID = $courseID AND a.StudentID = $studentID";

    $result = $conn->query($sql);

    $attendanceRecords = array();
    $StatisticsData = array();
    $total = 0;
    $present = 0;
    $absent = 0;
    $late = 0;

    if ($result->num_rows > 0) {
        $total = $result->num_rows;
        while ($row = $result->fetch_assoc()) {
            if ($row['Status'] == 'present') {
                $present++;
            } else if ($row['Status'] == 'absent') {
                $absent++;
            } else if ($row['Status'] == 'late') {
                $late++;
            }
            $attendanceRecords[] = array(
                'StudentID' => $row['StudentID'],
                'StudentName' => $row['StudentName'],
                'AttendanceDateTime' => $row['AttendanceDateTime'],
                'Status' => $row['Status']
            );
        }
    }

    $StatisticsData = array(
        'total' => $total,
        'present' => $present,
        'absent' => $absent,
        'late' => $late
    );

    $attendanceCombined = array(
        'attendanceRecords' => $attendanceRecords,
        'StatisticsData' => $StatisticsData
    );

    header('Content-Type: application/json');
    echo json_encode($attendanceCombined);
} else {
    echo "Error: Course ID is missing in the request.";
}
