<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <title>Enroll Students In School</title>
    <link href="./../css/register.css" rel="stylesheet" type="text/css">
</head>

<body>`
    <div class="register">
        <h1>Upload CSV File To Enroll New Students In the School</h1>
        <form action="./../actions/enrol_students_using_csv_action.php" method="post" enctype="multipart/form-data">
            <label for="csv_file">
                <i class="fas fa-file-csv"></i> Choose File:
            </label>
            <input type="file" id="csv_file" name="csv_file" accept=".csv" required>
            <input type="submit" value="Upload" id = "submit">
        </form>
        <div style="padding:20px">
            <h2>Download CSV Template</h2>
            <p>Download a template CSV file to use as a guide for uploading data:</p>
            <a href='./../templates/enrol_student_template.csv' download>Download Template CSV</a>
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
                                document.getElementById('csv_file').value = '';
                            } else {
                                alert('An error occurred while enrolling students in the school.');
                                document.getElementById('csv_file').value = '';
                            }
                        });
                }
            }
        });



    </script>
</body>

</html>