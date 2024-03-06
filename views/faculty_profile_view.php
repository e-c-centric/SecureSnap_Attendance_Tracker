<!DOCTYPE html>
<html>

<head>
    <title>Profile</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">


    <!--CDN Bootstrap and Jquery-->
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <script type="text/javascript" src="../js/jquery-3.4.1.min.js"></script>
    <script src="../js/bootstrap.min.js"></script>

    <!--Font awesome for icons-->
    <link rel="stylesheet" href="../fontawesome/css/all.css">

    <!--Sweet alert-->
    <script src="../js/sweetalert.min.js"></script>

    <!--Custom js and spinner-->
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
            <div class="col-sm-12 table-responsive-sm">
                <table class="table table-sm table-borderless">
                    <tbody>
                        <td><span class="fas fa-user"></span><strong> Name: </strong></td>
                        <td><i id="name">loading</i></td>
                        </tr>
                        <tr>
                            <td><span class="fas fa-envelope"></span><strong> Email: </strong></td>
                            <td><i id="email">loading</i></td>
                        </tr>
                        <tr>
                            <td><span class="fas fa-address-card"></span><strong> ID: </strong></td>
                            <td><i id="studentID">loading</i></td>
                        </tr>
                        <tr>
                            <td><span class="fas fa-graduation-cap"></span><strong> Department: </strong></td>
                            <td><i id="department">loading</i></td>
                        </tr>
                        <tr>
                            <td><span class="fas fa-calendar-alt"></span><strong> Number Of Courses Taught: </strong></td>
                            <td><i id="courses_number">0</i></td>
                        </tr>
                        <tr>
                    </tbody>
                </table>
            </div>

            <!--Action Buttons-->
            <div class="text-center"><br>
                <button class="btn btn-secondary" data-toggle="modal" data-target="#editaUser" id="editProfile"><span class="fas fa-upload"></span> Edit Profile</button>
            </div>
        </div>


        <!-- The edit user Modal -->
        <div class="modal fade" id="editaUser">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">

                    <!-- Modal Header -->
                    <div class="modal-header">
                        <h4 class="modal-title">Update Account</h4>
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                    </div>

                    <!-- Update Modal body -->
                    <div class="modal-body">
                        <!--Update Form-->
                        <div>
                            <form action="">

                                <div class="row form-group">
                                    <div class="col">
                                        <input type="text" class="form-control" placeholder="Name" id="upname" required="required" maxlength="255">
                                    </div>
                                </div>

                                <div class="row form-group">
                                    <div class="col">
                                        <select class="form-control" id="updepartment">
                                            <option value="0">Select Department</option>
                                            <?php
                                            include './../actions/get_all_departments.php';
                                            foreach ($majors as $major) {
                                                echo "<option value='" . $major['DepartmentID'] . "'>" . $major['DepartmentName'] . "</option>";
                                            }
                                            ?>
                                        </select>
                                        <small class="form-text text-muted">
                                            department
                                        </small>
                                    </div>
                                </div>


                                <div class="form-group">
                                    <button type="button" class="btn btn-block btn-success" id="editButton" onclick="updateFacultyProfile()"><span class="fa fa-check-circle"></span> Update Profile</button>
                                </div>
                            </form>

                            <!--Loading spinner-->
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



    </div>
    <script>
        $(document).ready(function() {
            $.ajax({
                url: './../actions/get_profile_action.php',
                type: 'GET',
                success: function(response) {
                    $('#name').text(response.name);
                    $('#email').text(response.email);
                    $('#studentID').text(response.studentID);
                    $('#department').text(response.major);
                    $('#courses_number').text(response.courseCount);
                }
            });
        });


        function updateFacultyProfile() {
            var name = $('#upname').val();
            var departmentID = $('#updepartment').val();

            var data = {
                name: name,
                departmentID: departmentID
            };

            $.ajax({
                url: './../actions/update_faculty_action.php',
                type: 'POST',
                data: data,
                success: function(response) {
                    if (response === 'success') {
                        swal("Success!", "Profile updated successfully", "success");
                        $('#editaUser').modal('hide');
                        location.reload();
                    } else {
                        swal("Failed!", "Profile update failed", "error");
                    }
                }
            });
        }

        document.getElementById('editProfile').addEventListener('click', function() {
            $.ajax({
                url: './../actions/get_profile_action.php',
                type: 'GET',
                success: function(response) {
                    $('#upname').val(response.name);
                    $('#upstudentid').val(response.studentID);
                    $('#updepartment').val(response.DepartmentID);
                }
            });
        });
    </script>
</body>

</html>