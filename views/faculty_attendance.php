<?php
$courseID = $_GET['courseID'];
include './../settings/config.php';
include './../settings/core.php';
?>

<!DOCTYPE html>
<html>

<head>
    <title>Attendance Records</title>
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
                <a class="nav-link active" data-toggle="tab" href="#upview"><span class="fa fa-eye"></span> Upcoming Schedule</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" data-toggle="tab" href="#pastview" id="pastView"><span class="fa fa-eye"></span> Past Schedule</a>
            </li>
        </ul>

        <!-- Tab pane -->
        <div class="tab-content">

            <!-- upcoming pane -->
            <div class="container tab-pane active" id="upview"><br>

                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#setPinModal">Start Attendance</button>

                <ul class="list-group" id="upSchedules">
                    No Course schedule found
                </ul>

            </div>

            <!-- past pane -->
            <div class="container tab-pane fade" id="pastview">
                <br>

                <div class="text-center">Total Statistics
                    <p>
                        <span>Total - </span><span id="totalStats" class="badge badge-pill badge-primary">...</span>
                        <span>Present - </span><span id="presentStats" class="badge badge-pill badge-success">...</span>
                        <span>Late - </span><span id="lateStats" class="badge badge-pill badge-warning">...</span>
                        <span>Absent - </span><span id="absentStats" class="badge badge-pill badge-danger">...</span>
                    </p>
                </div>

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


        <!-- The add Modal -->
        <div class="modal fade" id="setPinModal">
            <div class="modal-dialog">
                <div class="modal-content">

                    <!-- Modal Header -->
                    <div class="modal-header">
                        <h4 class="modal-title">Set Attendance PIN</h4>
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                    </div>

                    <!--Add Error Messages-->
                    <div class="alert alert-danger fade collapse" id="pin_empty">
                        PIN cannot be empty
                    </div>
                    <div class="alert alert-danger fade collapse" id="pin_invalid">
                        <strong>Failed!</strong> PIN must be 4 numbers.
                    </div>

                    <!-- Modal body -->
                    <div class="modal-body">
                        <!--Set PIN Form-->
                        <div>
                            <form action="">

                                <div class="form-group">
                                    <input type="password" class="form-control" placeholder="Enter new 4-digit PIN" id="newPin" required="required" maxlength="4" pattern="\d{4}">
                                </div>

                                <div class="form-group">
                                    <button type="submit" class="btn btn-block btn-success" id="setPinButton" onclick="setPin()"><i class="fa fa-user-plus"></i> Set PIN</button>
                                </div>
                            </form>

                            <div class="d-flex justify-content-center">
                                <div id="setPinLoading" role="status">
                                </div>
                            </div>

                        </div>
                    </div>

                    <!-- Modal footer -->
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                    </div>

                </div>
            </div>
        </div>
        <!--End set PIN Modal-->


    </div>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            var course_id = <?php echo $courseID; ?>;
            $.ajax({
                url: './../actions/get_course_details.php?course_id=' + course_id,
                type: 'GET',
                success: function(data) {
                    var parsedData = JSON.parse(data);
                    var courseCode = parsedData[0].CourseCode;
                    var courseName = parsedData[0].CourseName;
                    document.getElementById('courseName').innerText = courseCode + ": " + courseName + " Attendance Tracking: ";

                },

                error: function() {
                    alert('Error fetching data.');
                }

            });
        });


        document.getElementById('pastView').addEventListener('click', pastRecords);

        function pastRecords() {
            var course_id = <?php echo $courseID; ?>;
            $.ajax({
                url: './../actions/get_attendance_records_by_course.php?courseID=' + course_id,
                type: 'GET',
                success: function(data) {
                    var parsedData = JSON.parse(data);
                    var attendanceRecords = parsedData.attendanceRecords;

                    var students = {};
                    for (var i = 0; i < attendanceRecords.length; i++) {
                        var record = attendanceRecords[i];
                        if (!students[record.StudentID]) {
                            students[record.StudentID] = {};
                        }
                        students[record.StudentID][record.AttendanceDateTime] = record.Status;
                    }

                    var tableHeader = "<tr><th>Student ID</th>";
                    var dates = Object.keys(students[Object.keys(students)[0]]);
                    for (var i = 0; i < dates.length; i++) {
                        tableHeader += "<th>" + dates[i] + "</th>";
                    }
                    tableHeader += "</tr>";

                    var tableBody = "";
                    for (var studentID in students) {
                        tableBody += "<tr><td>" + studentID + "</td>";
                        for (var i = 0; i < dates.length; i++) {
                            tableBody += "<td>" + (students[studentID][dates[i]] || 'Absent') + "</td>";
                        }
                        tableBody += "</tr>";
                    }

                    document.getElementById('tableheader').innerHTML = tableHeader;
                    document.getElementById('attendanceTableBody').innerHTML = tableBody;

                    // document.getElementById('totalClasses').innerHTML = parsedData.totalClasses;
                    // document.getElementById('totalStudents').innerHTML = parsedData.totalStudents;
                },
                error: function() {
                    alert("Error fetching data.");
                }
            });
        }

        function setPin() {
            var newPin = document.getElementById('newPin').value;
            if (newPin == "") {
                document.getElementById('pin_empty').classList.add('show');
                setTimeout(function() {
                    document.getElementById('pin_empty').classList.remove('show');
                }, 3000);
                return;
            }
            if (newPin.length != 4) {
                document.getElementById('pin_invalid').classList.add('show');
                setTimeout(function() {
                    document.getElementById('pin_invalid').classList.remove('show');
                }, 3000);
                return;
            }
            var course_id = <?php echo $courseID; ?>;
            $.ajax({
                url: './../actions/set_attendance_pin.php?courseID=' + course_id + '&pin=' + newPin,
                type: 'GET',
                success: function(data) {
                    if (data == "success") {
                        swal("PIN set successfully", {
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
    </script>
</body>

</html>