<!DOCTYPE html>
<html>

<head>
    <title>Create A Course</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">


    <!--CDN Bootstrap and Jquery-->
    <script type="text/javascript" src="./../js/jquery-3.4.1.min.js"></script>
    <link rel="stylesheet" href="./../css/bootstrap.min.css">
    <script src="./../js/bootstrap.min.js"></script>

    <!--Font awesome for icons-->
    <link rel="stylesheet" href="../fontawesome/css/all.css">

    <!--Sweet alert-->
    <script src="../js/sweetalert.min.js"></script>

    <!--Custom js and spinner-->
    <script type="text/javascript" src="../js/jsfunctions.js"></script>
    <script type="text/javascript" src="../js/loader.js"></script>

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

        img {
            border-radius: 50%;
        }
    </style>
</head>

<body>

    <!--Core and setting-->

    <!--Top Navigation-->
    <!-- get active page from the main page calling the header -->

    <!--Top Navigation-->
    <?php include 'head.php'; ?>
    <!--Main Body Content-->

    <div class="container mt-1">

        <div class="jumbotron">

            <!--Action Buttons-->
            <div class="text-center"><br>
                <button class="btn btn-secondary" data-toggle="modal" data-target="#createcourse" id="createItem"><span class="fas fa-file"></span>Manually Enter Course Information</button>
                <a href=""><button class="btn btn-secondary"><span class="fas fa-upload"></span>Create Courses By Uploading A CSV File</button></a>
            </div>
        </div>
    </div>





    <!-- The edit user Modal -->
    <div class="modal fade" id="createcourse">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">

                <!-- Modal Header -->
                <div class="modal-header">
                    <h4 class="modal-title">Create A New Course</h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>

                <!-- Update Modal body -->
                <div class="modal-body">
                    <!--Update Form-->
                    <div>
                        <form action="">

                            <div class="row form-group">
                                <div class="col">
                                    <input type="text" class="form-control" placeholder="Course Code" id="coursecode" required maxlength="10" pattern="[A-Za-z0-9]{1,10}">
                                </div>
                                <div class="col">
                                    <input type="text" class="form-control" placeholder="Course Name" id="coursename" required maxlength="255" pattern="[A-Za-z0-9 ]{1,255}">
                                </div>
                            </div>

                            <div class="row form-group">
                                <div class="col">
                                    <input type="text" class="form-control" placeholder="Cohort Identifier" id="cohort" maxlength="1" pattern="[A-Za-z]{1}" required>
                                    <small class="form-text text-muted">
                                        Must be an alphabet (e.g. A, B, C)
                                    </small>
                                </div>

                                <div class="col">
                                    <select class="form-control" id="semester" requied>
                                        <option value="0">Select Semester</option>
                                        <option value="Spring">Spring</option>
                                        <option value="Summer">Summer</option>
                                        <option value="Fall">Fall</option>
                                    </select>
                                </div>

                                <div class="col">
                                    <input type="text" class="form-control" placeholder="Academic Year" id="academicyear" required="required" maxlength="4" pattern="[0-9]{4}">
                                    <small class="form-text text-muted">
                                        e.g. 2020
                                    </small>
                                </div>
                            </div>

                            <div class="row form-group">
                                <div class="col">
                                    <label>Select The Days Class Will Run and Enter Class Times</label><br>
                                    <input type="checkbox" id="Monday" name="classdays[]" value="Monday">
                                    <label for="Monday">Monday</label>
                                    <input type="text" id="MondayTime" name="MondayTime" placeholder="Enter class time" pattern="([01]?[0-9]|2[0-3]):[0-5][0-9] - ([01]?[0-9]|2[0-3]):[0-5][0-9]"><br>
                                    <input type="checkbox" id="Tuesday" name="classdays[]" value="Tuesday">
                                    <label for="Tuesday">Tuesday</label>
                                    <input type="text" id="TuesdayTime" name="TuesdayTime" placeholder="Enter class time" pattern="([01]?[0-9]|2[0-3]):[0-5][0-9] - ([01]?[0-9]|2[0-3]):[0-5][0-9]"><br>
                                    <input type="checkbox" id="Wednesday" name="classdays[]" value="Wednesday">
                                    <label for="Wednesday">Wednesday</label>
                                    <input type="text" id="WednesdayTime" name="WednesdayTime" placeholder="Enter class time" pattern="([01]?[0-9]|2[0-3]):[0-5][0-9] - ([01]?[0-9]|2[0-3]):[0-5][0-9]"><br>
                                    <input type="checkbox" id="Thursday" name="classdays[]" value="Thursday">
                                    <label for="Thursday">Thursday</label>
                                    <input type="text" id="ThursdayTime" name="ThursdayTime" placeholder="Enter class time" pattern="([01]?[0-9]|2[0-3]):[0-5][0-9] - ([01]?[0-9]|2[0-3]):[0-5][0-9]"><br>
                                    <input type="checkbox" id="Friday" name="classdays[]" value="Friday">
                                    <label for="Friday">Friday</label>
                                    <input type="text" id="FridayTime" name="FridayTime" placeholder="Enter class time" pattern="([01]?[0-9]|2[0-3]):[0-5][0-9] - ([01]?[0-9]|2[0-3]):[0-5][0-9]"><br>
                                </div>
                            </div>
                            <!-- 
                            <div class="alert alert-danger fade collapse" id="course_name_error">
                                Invalid course name.
                            </div>
                            <div class="alert alert-danger fade collapse" id="course_description_error">
                                Invalid course description.
                            </div>
                            <div class="alert alert-danger fade collapse" id="course_time_error">
                                Invalid course time - use 24 hour format: e.g. 12:30 - 13:30
                            </div>
                            <div class="alert alert-danger fade collapse" id="course_partial_error">
                                <strong>Partial Update!</strong> Some parts of the course could not be updated. Try again later
                            </div>
                            <div class="alert alert-danger fade collapse" id="course_update_fail">
                                <strong>Failed!</strong> Course update failed.
                            </div> -->
                            <div class="form-group">
                                <button type="button" class="btn btn-block btn-success" id="createbutton" onclick="createCourse()"><span class="fa fa-check-circle"></span> Create Course</button>
                            </div>
                        </form>

                        <div class="d-flex justify-content-center">
                            <div id="updateLoading" role="status">
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
    <!--End edit user Modal-->
    <br><br>

    <script>
        function createCourse() {
            var coursecode = document.getElementById('coursecode').value;
            var coursename = document.getElementById('coursename').value;
            var cohort = document.getElementById('cohort').value;
            var semester = document.getElementById('semester').value;
            var academicyear = document.getElementById('academicyear').value;
            var Monday = document.getElementById('Monday').checked;
            var MondayTime = document.getElementById('MondayTime').value;
            var Tuesday = document.getElementById('Tuesday').checked;
            var TuesdayTime = document.getElementById('TuesdayTime').value;
            var Wednesday = document.getElementById('Wednesday').checked;
            var WednesdayTime = document.getElementById('WednesdayTime').value;
            var Thursday = document.getElementById('Thursday').checked;
            var ThursdayTime = document.getElementById('ThursdayTime').value;
            var Friday = document.getElementById('Friday').checked;
            var FridayTime = document.getElementById('FridayTime').value;
            var classdays_tentative = [Monday, Tuesday, Wednesday, Thursday, Friday];
            var classdays = [];
            var listofdays = ["Monday", "Tuesday", "Wednesday", "Thursday", "Friday"];
            for (var i = 0; i < classdays_tentative.length; i++) {
                if (classdays_tentative[i] == true) {
                    classdays.push(listofdays[i]);
                }
            }
            var classtimes_tentative = [MondayTime, TuesdayTime, WednesdayTime, ThursdayTime, FridayTime];
            var classtimes = [];
            for (var i = 0; i < classtimes_tentative.length; i++) {
                if (classtimes_tentative[i] != "") {
                    classtimes.push(classtimes_tentative[i]);
                }
            }

            if (coursecode == "" || coursename == "" || academicyear == "") {
                swal("Empty Fields", "Please fill in all fields", "error");
            } else {
                $.ajax({
                    type: "POST",
                    url: "./../actions/create_course_action.php",
                    data: {
                        courseCode: coursecode,
                        courseName: coursename,
                        cohort: cohort,
                        semester: semester,
                        academicYear: academicyear,
                        classDays: classdays,
                        classTimes: classtimes
                    },
                    success: function(response) {
                        if (response == "success") {
                            swal("Course Created", "Course has been created successfully", "success");
                            document.getElementById('updateLoading').innerHTML = "";
                            document.getElementById('coursecode').value = "";
                            document.getElementById('coursename').value = "";
                            document.getElementById('cohort').value = "";
                            document.getElementById('academicyear').value = "";
                            document.getElementById('Monday').checked = false;
                            document.getElementById('MondayTime').value = "";
                            document.getElementById('Tuesday').checked = false;
                            document.getElementById('TuesdayTime').value = "";
                            document.getElementById('Wednesday').checked = false;
                            document.getElementById('WednesdayTime').value = "";
                            document.getElementById('Thursday').checked = false;
                            document.getElementById('ThursdayTime').value = "";
                            document.getElementById('Friday').checked = false;
                            document.getElementById('FridayTime').value = "";
                        } else {
                            response = response.trim();
                            swal("Failed", response, "error");
                            document.getElementById('updateLoading').innerHTML = "";
                        }

                    }
                });
            }
        }
    </script>
</body>

</html>