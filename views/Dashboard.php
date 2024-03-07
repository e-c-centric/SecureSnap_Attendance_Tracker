<?php
include_once './../settings/core.php';

if (!is_logged_in()) {
  header('Location: ./../index.php');
}

if ($_SESSION['UserRole'] === 'admin') {
  header('Location: ./admin_dashboard.php');
}
?>

<!DOCTYPE html>
<html>

<head>
  <title>Dashboard</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="Dashboard">

  <link href="./../css/boxicons.min.css" rel="stylesheet">

  
  <link rel="stylesheet" href="../css/bootstrap.min.css">
  <script type="text/javascript" src="./../js/jquery-3.4.1.min.js"></script>
  <script src="./../js/bootstrap.min.js"></script>

  
  <link rel="stylesheet" href="../fontawesome/css/all.css">

  
  <style type="text/css" media="screen">
    a:link {
      color: white;
      text-decoration: none;
    }

    a:visited {
      color: white;
      text-decoration: none;
    }

    a:hover {
      color: white;
      text-decoration: none;
    }

    a:active {
      color: white;
      text-decoration: none;
    }

    * {
      box-sizing: border-box;
    }

    body {
      font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, 'Open Sans', 'Helvetica Neue', sans-serif;
    }

    /* Float five columns side by side */
    .column {
      float: left;
      /*change the width to change the number of apps per row (20, 25, 40)*/
      width: 20%;
      padding: 10px;
    }

    /* Remove extra left and right margins, due to padding */
    .row {
      margin: 0 -5px;
    }

    /* Clear floats after the columns */
    .row:after {
      content: "";
      display: table;
      clear: both;
    }

    /* Style the counter cards */
    .card {
      box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2);
      padding: 10px;
      text-align: center;
      background-color: #f1f1f1;
      text-decoration: none;
      border-radius: 15px;
      color: white;
      transform: scale(0.95);
      border: none;
      /*height:15rem;*/
    }

    h3 {
      font-size: 1.17em;
    }

    .bx {
      font-size: 20pt;
      margin-top: 10px;
    }

    footer {
      margin: 10px;
      width: 100%;
      height: 20px;
      text-align: center;
      color: #923D41;
      font-size: small;
    }

    .topnav {
      overflow: hidden;
    }


    .topnav input[type=text] {
      float: right;
      padding: 8px;
      border: none;
      outline: none;
      margin-top: 8px;
      margin-right: 16px;
      font-size: 15px;
      background-color: #F1F1F1;
      border-radius: 8px;
      color: #898989;
      width: 20%;
      -webkit-transition: width 0.15s ease-in-out;
      transition: width 0.15s ease-in-out;
    }
  </style>
</head>

<body>

  

  
  

  
  <?php
  include 'head.php';
  ?>


  
  <div class="container">
    <div class="row">

      <?php
      if ($_SESSION['UserRole'] === 'student') {
        include './../actions/get_enrolled_courses.php';

        if (!empty($enrolledCourses)) {
          foreach ($enrolledCourses as $course) {
            echo "<div class='col-lg-3 col-md-4 col-sm-6'>";
            echo "<div class='card h-100' style='background-color:#5F9EA0'>";
            echo "<a href='student_attendance.php?courseID=" . $course['CourseID'] . "'>";
            echo "<i class='bx bx-badge-check'></i>";
            echo "<h5>" . $course['CourseCode'] . "</h5>";
            echo "<h3><b>" . $course['CourseName'] . "</b></h3>";
            echo "<h5>" . $course['Semester'] . "</h5>";
            echo "<h6>" . $course['AcademicYear'] . "</h6>";
            echo "<h6>Cohort " . $course['Cohort'] . "</h6></a>";
            echo "</div>";
            echo "</div>";
          }
        } else {
          echo "<div class='col-lg-3 col-md-4 col-sm-6'>";
          echo "<div class='card h-100' style='background-color:#5F9EA0'>";
          echo "<h3>No courses enrolled.</h3>";
          echo "</div>";
          echo "</div>";
        }
      } else {

        echo "<div class='col-lg-3 col-md-4 col-sm-6'>";
        echo "<div class='card h-100' style='background-color:#5F9EA0'>";
        echo "<a href='create_course.php'>";
        echo "<i class='bx bx-cog'></i>";
        echo "<h5> </h5>";
        echo "<h5> </h5>";
        echo "<h6> </h6>";
        echo "<h3><b>Create A New Course</b></h3>";
        echo "<h6> </h6></a>";
        echo "</div>";
        echo "</div>";

        include './../actions/get_courses_taught_action.php';
        if (!empty($coursesTaught)) {
          foreach ($coursesTaught as $course) {
            echo "<div class='col-lg-3 col-md-4 col-sm-6'>";
            echo "<div class='card h-100' style='background-color:#5F9EA0'>";
            echo "<a href='faculty_attendance.php?courseID=" . $course['CourseID'] . "'>";
            echo "<i class='bx bx-badge-check'></i>";
            echo "<h5>" . $course['CourseCode'] . "</h5>";
            echo "<h3><b>" . $course['CourseName'] . "</b></h3>";
            echo "<h5>" . $course['Semester'] . "</h5>";
            echo "<h6>" . $course['AcademicYear'] . "</h6>";
            echo "<h6>Cohort " . $course['Cohort'] . "</h6></a>";
            echo "</div>";
            echo "</div>";
          }
        } else {
          echo "<div class='col-lg-3 col-md-4 col-sm-6'>";
          echo "<div class='card h-100' style='background-color:#5F9EA0'>";
          echo "<h3>No courses taught.</h3>";
          echo "</div>";
          echo "</div>";
        }
      }

      ?>
    </div>

  </div>

</body>


</html>