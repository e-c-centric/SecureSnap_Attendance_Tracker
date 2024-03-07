<?php
$courseID = $_GET['courseID'];
$studentID = $_GET['studentID'];
include './../settings/config.php';
include './../settings/core.php';
?>

<!DOCTYPE html>
<html>

<head>
    <title>Student Attendance Record</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">


    <!--CDN Bootstrap and Jquery-->
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <script type="text/javascript" src="../js/jquery-3.4.1.min.js"></script>
    <script type="text/javascript" src="../js/bootstrap.bundle.min.js"></script>
    <!-- <script src="../js/bootstrap.min.js"></script> -->

    <!--Font awesome for icons-->
    <link rel="stylesheet" href="../fontawesome/css/all.css">

    <!--Sweet alert-->
    <script src="../js/sweetalert.min.js"></script>

    <!--Custom js and spinner-->
    <script type="text/javascript" src="../js/loader.js"></script>
    <script type="text/javascript" src="../js/jsfunctions.js"></script>

    <!--Custom CSS-->
    <style type="text/css" media="screen">
        a:link {
            color: black;
            text-decoration: none;
        }

        a:visited {
            color: black;
            text-decoration: none;
        }

        a:hover {
            color: #923D41;
            text-decoration: none;
        }

        a:active {
            color: #923D41;
            text-decoration: none;
        }

        /*menu dropdown link color*/
        a.dropdown-item:link {
            color: white;
            text-decoration: none;
        }

        a.dropdown-item:visited {
            color: white;
            text-decoration: none;
        }

        a.dropdown-item:hover {
            color: black;
            text-decoration: none;
        }

        a.dropdown-item:active {
            color: white;
            text-decoration: none;
        }

        /*sweet alert button color*/
        .swal-button {
            background-color: #923D41;
            padding: 7px 19px;
            box-shadow: none !important;
        }

        .swal-button:not([disabled]):hover {
            background-color: #923D41;
        }

        /*tool tip flicker ussie resolve*/
        .tooltip {
            pointer-events: none;
        }

        /*tab manu style*/
        .nav-tabs .nav-link.active {
            background-color: #923D41;
            color: white;
        }

        /*scrollable list*/
        .list-group {
            max-height: 350px;
            margin-bottom: 5px;
            overflow: auto;
            -webkit-overflow-scrolling: touch;
        }
    </style>
</head>

<body>

    <!--Core and setting-->

    <!--Top Navigation-->
    <!-- get active page from the main page calling the header -->

    <!--Top Navigation-->
    <?php
    include 'head.php';
    ?>
    <!--Main Body Content-->

    <div class="container mt-1">

        <h2 style="color: #923D41;" id="courseName"><span class="fa fa-users"></span>
            loading</h2>
        <br>

        <!-- Nav tabs -->
        <ul class="nav nav-tabs" role="tablist">
            <li class="nav-item">
                <a class="nav-link active" data-toggle="tab" href="#pastview" id="pastView"><span class="fa fa-eye"></span>Attendance Records</a>
            </li>
        </ul>

        <!-- Tab pane -->
        <div class="tab-content">
            <!-- past pane -->
            <div class="container tab-pane active" id="pastview">
                <br>

                <div class="text-center">Total Statistics
                    <p>
                        <span>Total - </span><span id="totalStats" class="badge badge-pill badge-primary">0</span>
                        <span>Present - </span><span id="presentStats" class="badge badge-pill badge-success">0</span>
                        <span>Late - </span><span id="lateStats" class="badge badge-pill badge-warning">0</span>
                        <span>Absent - </span><span id="absentStats" class="badge badge-pill badge-danger">0</span>
                    </p>
                </div>

                <ul class="list-group list-group-flush list-group-hover" id="pastSchedules">
                </ul>

            </div>
        </div>



    </div>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            var course_id = <?php echo $courseID; ?>;
            var userName = "<?php
                            $query = "SELECT Name FROM users WHERE UserID = $studentID";
                            $result = mysqli_query($conn, $query);
                            $row = mysqli_fetch_assoc($result);
                            echo $row['Name'];
                            ?>";
            $.ajax({
                url: './../actions/get_course_details.php?course_id=' + course_id,
                type: 'GET',
                success: function(data) {
                    var parsedData = JSON.parse(data);
                    var courseCode = parsedData[0].CourseCode;
                    var courseName = parsedData[0].CourseName;
                    document.getElementById('courseName').innerText = courseCode + ": " + courseName + " Attendance Tracking: " + userName;

                },

                error: function() {
                    alert('Error fetching data.');
                }

            });
        });

        document.addEventListener('DOMContentLoaded', pastRecords);

        function pastRecords() {
            var course_id = <?php echo $courseID; ?>;
            var student_id = <?php echo $studentID; ?>;
            $.ajax({
                url: './../actions/get_student_attendance_records.php?course_id=' + course_id + '&student_id=' + student_id,
                type: 'GET',
                success: function(data) {
                    console.log(data["StatisticsData"]);
                    var list = $('#pastSchedules');
                    list.empty();

                    $.each(data["attendanceRecords"], function(index, record) {
                        if (record.Status == 'present') {
                            var listItem = "<li class='list-group-item d-flex justify-content-between align-items-center'>" +
                                record.AttendanceDateTime +
                                "<span class='badge badge-pill badge-success'>" +
                                record.Status +
                                "</span></li>";
                        } else if (record.Status == 'Late') {
                            var listItem = "<li class='list-group-item d-flex justify-content-between align-items-center'>" +
                                record.AttendanceDateTime +
                                "<span class='badge badge-pill badge-warning'>" +
                                record.Status +
                                "</span></li>";
                        } else {
                            var listItem = "<li class='list-group-item d-flex justify-content-between align-items-center'>" +
                                record.AttendanceDateTime +
                                "<span class='badge badge-pill badge-danger'>" +
                                record.Status +
                                "</span></li>";
                        }

                        list.append(listItem);
                    });
                    document.getElementById('totalStats').innerText = data["StatisticsData"].total;
                    document.getElementById('presentStats').innerText = data["StatisticsData"].present;
                    document.getElementById('lateStats').innerText = data["StatisticsData"].late;
                    document.getElementById('absentStats').innerText = data["StatisticsData"].absent;
                },
                error: function() {
                    alert('Error fetching data.');
                }
            });
        }
    </script>
</body>

</html>