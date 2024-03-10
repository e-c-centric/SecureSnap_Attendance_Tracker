<?php

include '../settings/core.php';



if ($_SESSION['UserRole'] == "student") {
  include 'student_profile_view.php';
} else if ($_SESSION['UserRole'] == "faculty") {
  include 'faculty_profile_view.php';
} else {
  header('Location: ../login/login.php');
}
