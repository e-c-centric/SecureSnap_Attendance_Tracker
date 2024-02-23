<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Upload CSV</title>
    <link href="./../css/register.css" rel="stylesheet" type="text/css">
</head>
<body>`
    <div class="register">
        <h1>Upload CSV File</h1>
        <form action="./../actions/upload_csv_action.php" method="post" enctype="multipart/form-data">
            <label for="csv_file">
                <i class="fas fa-file-csv"></i> Choose File:
            </label>
            <input type="file" id="csv_file" name="csv_file" accept=".csv" required>
            <input type="submit" value="Upload">
        </form>
        <div>
            <h2>Download CSV Template</h2>
            <p>Download a template CSV file to use as a guide for uploading data:</p>
            <a href='./../templates/enrol_student_template.csv' download>Download Template CSV</a>
        </div>
    </div>
</body>
</html>
