<?php
include('./../settings/config.php');

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_FILES['csv_file'])) {
    $csv_file = $_FILES['csv_file']['tmp_name'];

    if (($handle = fopen($csv_file, "r")) !== FALSE) {
        fgetcsv($handle);

        while (($data = fgetcsv($handle, 1000, ",")) !== FALSE) {
            $student_id = $data[0];
            $name = $data[1];
            $email = $data[2];
            $major = $data[3];
            $year_group = $data[4];

            $password = password_hash($email, PASSWORD_DEFAULT);

            $user_insert_query = "INSERT IGNORE INTO Users (UserID, Name, Email, Password, UserType)
                                  VALUES ('$student_id', '$name', '$email', '$password', 'student')";
            mysqli_query($conn, $user_insert_query);

            $student_insert_query = "INSERT IGNORE INTO Students (StudentID, Major, YearGroup)
                                     VALUES ('$student_id', '$major', '$year_group')";
            mysqli_query($conn, $student_insert_query);
        }

        fclose($handle);
    }

    echo "success";
} else {
    echo "Error: Invalid request.";
}
?>
