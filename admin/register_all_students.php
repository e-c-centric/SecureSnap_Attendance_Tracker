<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <title>Enroll Students In Course</title>
    <link href="./../css/register.css" rel="stylesheet" type="text/css">
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
    <nav class="navbar navbar-expand-md navbar-dark" style="background-color: #923D41;">
        <a class="navbar-brand" href="./../views/Dashboard.php">Home</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="collapsibleNavbar">
            <ul class="navbar-nav">

                <li class="nav-item">
                    <a class="nav-link" href="./../login/logout.php">
                        <span>| </span>
                        <span class="fas fa-sign-out-alt"></span>
                        <span>Logout</span>
                    </a>
                </li>

            </ul>
        </div>
    </nav>
    <br> <br>

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
                            <td><i id="ID">loading</i></td>
                        </tr>
                        <tr>
                            <td><span class="fas fa-calendar-alt"></span><strong> Number Of Students Enrolled: </strong></td>
                            <td><i id="studNumber">0</i></td>
                        </tr>
                        <tr>
                            <td><span class="fas fa-calendar-alt"></span><strong> Number Of Courses Registered: </strong></td>
                            <td><i id="courseNumber">0</i></td>
                        </tr>
                    </tbody>
                </table>
            </div>


            <div class="text-center"><br>
                <button class="btn btn-secondary" data-toggle="modal" data-target="#registerModal" id="editProfile"><span class="fas fa-upload"></span>Enroll Students</button>
            </div>
        </div>


        <div class="modal fade" id="registerModal">
            <div class="modal-dialog">
                <div class="modal-content">

                    <div class="modal-header">
                        <h4 class="modal-title">Upload CSV File To Enroll New Students In the School</h4>
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                    </div>

                    <div class="modal-body">
                        <form action="./../actions/enrol_students_using_csv_action.php" method="post" enctype="multipart/form-data">
                            <label for="csv_file">
                                <i class="fas fa-file-csv"></i> Choose File:
                            </label>
                            <input type="file" id="csv_file" name="csv_file" accept=".csv" required>
                            <input type="submit" value="Upload" id="submit">
                        </form>
                        <div style="padding:20px">
                            <h2>Download CSV Template</h2>
                            <p>Download a template CSV file to use as a guide for uploading data:</p>
                            <a href='./../templates/enrol_student_template.csv' download>Download Template CSV</a>
                        </div>
                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                    </div>

                </div>
            </div>
        </div>
        <script>
            document.getElementById('submit').addEventListener('click', function(event) {
                event.preventDefault();
                var file = document.getElementById('csv_file').files[0];
                if (!file) {
                    alert('Please choose a file to upload.');
                } else {
                    var fileSize = file.size;
                    if (fileSize > 1024 * 1024) {
                        alert('The file size is greater than 1MB. Please choose a smaller file.');
                    } else {
                        var formData = new FormData();
                        formData.append('csv_file', file);
                        fetch('./../actions/enrol_students_using_csv_action.php', {
                                method: 'POST',
                                body: formData
                            })
                            .then(response => response.text())
                            .then(data => {
                                if (data === 'success') {
                                    alert('Students have been successfully enrolled in the school.');
                                    $('#registerModal').modal('hide');
                                } else {
                                    alert('An error occurred while enrolling students in the school.');
                                    document.getElementById('csv_file').value = '';
                                }
                            });
                    }
                }
            });

            document.addEventListener('DOMContentLoaded', function() {
                fetch('./../actions/get_admin_profile.php')
                    .then(response => response.json())
                    .then(data => {
                        document.getElementById('name').innerHTML = data.Name;
                        document.getElementById('email').innerHTML = data.Email;
                        document.getElementById('ID').innerHTML = data.ID;
                        document.getElementById('studNumber').innerHTML = data.NumberOfStudents;
                        document.getElementById('courseNumber').innerHTML = data.NumberOfCourses;
                    });
            });
        </script>
</body>

</html>