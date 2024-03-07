<?php

if (isset($_SESSION['UserID'])) {
    if ($_SESSION['UserRole'] == "student") {
        header("Location: ./../views/student_dashboard.php");
    } else if ($_SESSION['UserRole'] == "faculty") {
        header("Location: ./../views/faculty_dashboard.php");
    } else if ($_SESSION['UserRole'] == "admin") {
        header("Location: ./../views/admin_dashboard.php");
    }
} else {
    header("Location: ./../login/login.php");
}