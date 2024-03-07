<?php
include './../settings/config.php';
include './../settings/core.php';

$previous = "javascript:history.go(-1)";
if (isset($_SERVER['HTTP_REFERER'])) {
    $previous = $_SERVER['HTTP_REFERER'];
}

if (!isset($_GET['courseID']) || !isset($_SESSION['UserID'])) {
    if ($_SESSION['UserRole'] == 'student') {
        header("Location: ./../index.php");
        exit();
    }
}
$courseID = $_GET['courseID'];
?>
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
    <?php
    include './../views/head.php';
    ?>
    <div class="register">
        <h1>Upload CSV File To Register Students In Your Course</h1>
        <form action="./../actions/register_student_to_course_action.php" method="post" enctype="multipart/form-data">
            <label for="csv_file">
                <i class="fas fa-file-csv"></i> Choose File:
            </label>
            <input type="file" id="csv_file" name="csv_file" accept=".csv" required>
            <input type="submit" value="Upload" id="submit">
        </form>
        <div style="padding:20px">
            <h2>Download CSV Template</h2>
            <p>Download a template CSV file to use as a guide for uploading data:</p>
            <a href='./../templates/register_student_template.csv' download>Download Template CSV</a>
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
                    var courseID = <?php echo $courseID; ?>;
                    var formData = new FormData();
                    formData.append('csvFile', file);
                    fetch('./../actions/register_student_to_course_action.php?courseID=' + courseID, {
                            method: 'POST',
                            body: formData
                        })
                        .then(response => response.text())
                        .then(data => {
                            if (data === 'success') {
                                alert('Students have been successfully registered to the course.');
                                <?php echo "window.location.href = '$previous'"; ?>;
                            } else {
                                alert('An error occurred while registering students to the course.');
                                document.getElementById('csv_file').value = '';
                            }
                        });
                }

            }
        });
    </script>
</body>

</html>