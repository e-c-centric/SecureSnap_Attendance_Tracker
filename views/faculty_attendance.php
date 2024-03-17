<?php
include '../settings/core.php';
if (!is_logged_in()) {
    header('Location: ../login/login.php');
}
$courseID = $_GET['courseID'];
?>
<!DOCTYPE html>
<html>

<head>
    <title>Attendance Records</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">


    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <script type="text/javascript" src="../js/jquery-3.4.1.min.js"></script>
    <script type="text/javascript" src="../js/bootstrap.bundle.min.js"></script>

    <link rel="stylesheet" href="../fontawesome/css/all.css">

    <script src="../js/sweetalert.min.js"></script>

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
    <?php
    include 'head.php';
    ?>

    <div class="container mt-1">

        <h2 style="color: #923D41;" id="courseName"><span class="fa fa-users"></span>
            loading</h2>
        <br>


        <ul class="nav nav-tabs" role="tablist">
            <li class="nav-item">
                <a class="nav-link active" data-toggle="tab" href="#upview"><span class="fa fa-eye"></span> Upcoming Schedule</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" data-toggle="tab" href="#pastview" id="pastView"><span class="fa fa-eye"></span> Past Schedule</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="../admin/enrol_students_in_course.php?courseID=<?php echo $courseID; ?>"><span class="fa fa-eye"></span>Register Students In Course</a>
            </li>
        </ul>


        <div class="tab-content">


            <div class="container tab-pane active" id="upview"><br>


                <ul class="list-group" id="upSchedules">
                    No Course schedule found
                </ul>

            </div>


            <div class="container tab-pane fade" id="pastview">
                <br>


                <div class="table-responsive">
                    <table class="table table-bordered">
                        <thead id="tableheader">
                        </thead>
                        <tbody id="attendanceTableBody">
                        </tbody>
                    </table>
                </div>

            </div>
        </div>



        <div class="modal fade" id="setPinModal">
            <div class="modal-dialog">
                <div class="modal-content">


                    <div class="modal-header">
                        <h4 class="modal-title">Set Attendance PIN</h4>
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                    </div>


                    <div class="alert alert-danger fade collapse" id="pin_empty">
                        PIN cannot be empty
                    </div>
                    <div class="alert alert-danger fade collapse" id="pin_invalid">
                        <strong>Failed!</strong> PIN must be 4 numbers.
                    </div>


                    <div class="modal-body">

                        <div>
                            <form action="">
                                <!-- 
                                <div class="form-group">
                                    <input type="text" class="form-control" placeholder="Enter new 4-digit PIN" id="newPin" required="required" maxlength="4" pattern="\d{4}">
                                </div> -->

                                <div class="form-group">
                                    <button type="submit" class="btn btn-block btn-success" id="setPinButton" onclick="setPin(event)"><i class="fa fa-user-plus"></i> Set PIN</button>
                                </div>
                            </form>

                            <div class="d-flex justify-content-center">
                                <div id="setPinLoading" role="status">
                                </div>
                            </div>

                        </div>
                    </div>


                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                    </div>

                </div>
            </div>
        </div>



    </div>
    <script>
        var courseID = <?php echo $courseID; ?>;

        document.addEventListener('DOMContentLoaded', function() {
            var course_id = courseID;
            $.ajax({
                url: '../actions/get_course_details.php?course_id=' + course_id,
                type: 'GET',
                success: function(data) {
                    var parsedData = JSON.parse(data);
                    var courseCode = parsedData[0].CourseCode;
                    var courseName = parsedData[0].CourseName;
                    document.getElementById('courseName').innerText = courseCode + ": " + courseName + " Attendance Tracking";

                },

                error: function() {
                    alert('Error fetching data.');
                }

            });
            upcomingSchedules();
        });

        function upcomingSchedules() {
            var course_id = courseID;
            $.ajax({
                url: '../actions/get_upcoming_schedules.php?courseID=' + course_id,
                type: 'GET',
                success: function(data) {
                    var parsedData = JSON.parse(data);
                    if (parsedData[0]["success"]) {
                        var day = parsedData[0]["day"];
                        var time = parsedData[0]["time"];
                        var schedules = "<li class='list-group-item d-flex justify-content-between align-items-center'>Today: " + day + " Time " + time + "<button type='button' class='btn btn - primary' data-toggle='modal' id = 'setPinTrigger' data-target='#setPinModal'>Start Attendance</button></li >";
                        document.getElementById('upSchedules').innerHTML = schedules;
                    } else {
                        document.getElementById('upSchedules').innerHTML = "<li class='list-group-item d-flex justify-content-between align-items-center'>No upcoming schedules</li>";
                    }
                },
                error: function() {
                    alert("Error fetching data.");
                }
            });
        };


        document.getElementById('pastView').addEventListener('click', pastRecords);

        function pastRecords() {
            var course_id = courseID;
            $.ajax({
                url: '../actions/get_attendance_records_by_course.php?courseID=' + course_id,
                type: 'GET',
                success: function(data) {
                    var cop = JSON.parse(data);
                    var tableHeader = "<tr><th>Students Enrolled</th>";
                    tableHeader += "</tr>";

                    var tableBody = "";
                    for (var i = 0; i < cop.length; i++) {
                        var id = cop[i].UserID;
                        var name = cop[i].Name;
                        tableBody += "<tr><td><a href = '../views/course_student_attendance_view.php?courseID=" + course_id + "&studentID=" + id + "'>" + name + "</a></td>";
                        tableBody += "</tr>";
                    }


                    document.getElementById('tableheader').innerHTML = tableHeader;
                    document.getElementById('attendanceTableBody').innerHTML = tableBody;
                },
                error: function() {
                    alert("Error fetching data.");
                }
            });
        }

        function setPin(event) {
            event.preventDefault();
            var newPin = generatePin();
            console.log(newPin);

            $.ajax({
                url: '../actions/set_attendance_pin.php?courseID=' + courseID + '&pin=' + newPin,
                type: 'GET',
                success: function(data) {
                    if (data == "success") {
                        swal("PIN set successfully\nPin is " + newPin + "\nPlease share with students to enable them to mark attendance.", {
                            icon: "success",
                        });
                        $('#setPinModal').modal('hide');
                    } else {
                        swal("Failed to set PIN", {
                            icon: "error",
                        });
                    }
                },
                error: function() {
                    alert("Error setting PIN.");
                }
            });


        }

        function generatePin() {
            var pin = Math.floor(1000 + Math.random() * 9000);
            return pin;
        }
    </script>
</body>

</html>